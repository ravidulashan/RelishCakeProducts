<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 6/11/2016
 * Time: 12:53 AM
 */

namespace App\Http\Controllers;


use App\Cake;
use App\CakeRequest;
use App\Category;
use App\RequestQuantity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function requestQuoteSub(Request $request){

        $img_url=$request->input('img_url');
        $cake_type=$request->input('cake_type');
        $request_quantity_id=$request->input('served_amount');
        $req_date=$request->input('reqdate');

        $newDate = date("Y-m-d", strtotime($req_date));

        $request_cake=new CakeRequest();
        $request_cake->img_url=$img_url;
        $request_cake->req_date=$req_date;
        $request_cake->request_date=Carbon::now()->format('Y-m-d');
        $request_cake->state=0;
        $request_cake->user_id=Auth::User()->id;
        $request_cake->request_quantity_id=$request_quantity_id;
    //    $request_cake->save();
        return $req_date;
    }

}