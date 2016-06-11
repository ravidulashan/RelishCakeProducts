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
use App\RequestQuantity;
use Illuminate\Support\Facades\Redirect;

class CakeRequestController extends Controller
{

    public function showCake($cake_type)
    {

        $cakes = Cake::where('type', '=', $cake_type)->paginate(12);
        $category = Category::where('seperator', '=', 0)->get();
        return view('requestcake', ['currentcategory' => $cake_type, 'cakes' => $cakes, 'category' => $category]);
    }

    public function requestQuote($cake_type, $cake_id = null)
    {
        $category = Category::where('seperator', '=', 0)->get();
        if ($cake_id != null) {
            $cake = Cake::find($cake_id);
            if ($cake != null) {
                return view('requestquote', ['cake' => $cake, 'categories' => $category,]);
            } else {
                return Redirect::to('/cakedesign/' . $cake_type);
            }
        } else {
            return view('requestquote', ['cake' => null, 'categories' => $category,]);
        }
    }

    public function getServedamount()
    {

        $cake_type=request()->input("CakeType");

        $request_quantities = RequestQuantity::where('type', '=', $cake_type)->get();
      //  $text="<select id='served_amount' name='served_amount'>";
        $text="";
        foreach ($request_quantities as $request_quantity) {
            $text=$text.'<option value="'.$request_quantity->request_quantity_id.'">'.$request_quantity->served_amount.'</option>';
        }
        //    $text=$text.'</select>';
        return response()->json(["served_amount"=>$text]);
    }

}