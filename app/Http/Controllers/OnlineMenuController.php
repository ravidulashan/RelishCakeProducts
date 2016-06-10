<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/28/2016
 * Time: 12:01 PM
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Support\Facades\DB;
use App\Cake;
use Illuminate\Support\Facades\Response;


class OnlineMenuController extends Controller
{

    public function viewCakes()
    {

        //return new cakes which are only month or less old
        $newcakes = Cake::whereDate('created_at','>=', date('Y-m-d', strtotime('first day of last month')))->whereDate('created_at','<=',date('Y-m-d'))->get()->take(9);
//

        //return 6 ckaes with the most sales
        $cakes = DB::table('cake')
            ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
            ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
            ->select(DB::raw('SUM(qty) as Count,img_url,name,type,cake.cake_id'))
            ->whereNotIn('cake.cake_id',Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')),date('Y-m-d')])->get(array('cake_id')))
            ->orderBy('Count', 'desc')
            ->groupBy('cake.name')
            ->take(9)
            ->get();
        //return all categories of cakes
        $category = Category::all();

        return view('shop', ['cakes' => $cakes, 'category' => $category, 'newcakes' => $newcakes]);
    }

    public function viewCategorizedCakes($currentcategory)
    {

        //return cakes with the given category
        $cakes = Cake::where('type', '=', $currentcategory)->paginate(12);
        $category = Category::all();
        return view('categorizedcakes',['currentcategory'=>$currentcategory,'cakes'=>$cakes,'category'=>$category]);

    }

    public function setPriceRange(){
        $lowvalue=request()->input('LowValue');
        $highvalue=request()->input('HighValue');
        $cakess = DB::table('cake')
        ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
        ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
        ->select(DB::raw('SUM(qty) as Count,img_url,name,type,cake.cake_id'))
        ->where('cake_desc.quantity','=','1 kg')
        ->whereBetween('cake_desc.price',[$lowvalue,$highvalue])
        ->whereNotIn('cake.cake_id',Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')),date('Y-m-d')])->get(array('cake_id')))
        ->orderBy('Count', 'desc')
        ->groupBy('cake.name')
        ->take(9)
        ->get();

        return $cakess;

    }

    public function setCustomizedPriceRange(){

        $category=request()->input('Category');

        $cakes = Cake::where('type','=',$category)->with(array('cakedesc' => function($query)
        {
            $lowvalue=request()->input('LowValue');
            $highvalue=request()->input('HighValue');
            $query->where('quantity', '=', '1 kg')->whereBetween('price',[$lowvalue,$highvalue]);

        }))->paginate(12);
        return $cakes;
    }

}