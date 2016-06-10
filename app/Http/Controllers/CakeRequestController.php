<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 6/11/2016
 * Time: 12:53 AM
 */

namespace App\Http\Controllers;


use App\Cake;
use App\Category;

class CakeRequestController extends Controller
{

    public function showCake($cake_type,$anniv=null){
        if($anniv!=null){
            $cake_type="Wedding/Anniversary cakes";
        }
        $cakes = Cake::where('type', '=', $cake_type)->paginate(12);
        $category = $category = Category::where('seperator','=',0)->get();;
        return view('requestcake',['currentcategory'=>$cake_type,'cakes'=>$cakes,'category'=>$category]);
    }

}