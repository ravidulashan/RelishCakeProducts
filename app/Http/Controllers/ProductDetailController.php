<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/29/2016
 * Time: 1:08 AM
 */

namespace App\Http\Controllers;

use App\Cake;
use App\CakeDesc;
use App\CakeRequest;
use App\Cart;
use App\CartItem;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductDetailController extends Controller
{
    public function viewCakeDetails($category, $id)
    {
        $cake = Cake::with('cakedesc')->find($id);
        $cake_type = Cake::where('type', '=', $category)->get();
        $category =$category = Category::where('seperator','=',1)->get();;
        return view('productdetails', ['cake' => $cake, 'categories' => $category, 'cakewithtype' => $cake_type]);
    }


    public function addtoCart()
    {
        // This will add items to cart
        $cake_desc_id = request()->input('CakeDescId');
        $qty = request()->input('Quantity');
        $wording = request()->input('Wording');
        $this->commonCart($cake_desc_id, $qty, $wording);
        return response()->json(['retvalue' => $cake_desc_id]);

    }

    public function viewCart()
    {


        $cartitems = \App\Cart::where('user_id','=',Auth::User()->id)->where("status", '=', 1)->first()->cartItem;

        return view('/cart', ['cartItems' => $cartitems]);
    }

    public function updateQuantity()
    {

        $id = request()->input('ID');
        $qty = request()->input('Quantity');

        $cartitem = CartItem::with('cakedesc')->find($id);
        $cartitem->qty = $qty;
        $tot_value = ((int)$qty) * ($cartitem->cakedesc->price);
        $cartitem->price = $tot_value;
        $cartitem->save();
        return response()->json(['tot_value' => $tot_value]);
    }

    public function removeItem($order_id)
    {
        $cartitem = CartItem::find($order_id);
        if ($cartitem != null) {
            $cartitem->delete();
        }
        return $this->viewCart();
    }

    public function addtoCartWithId($id, $qty, $wording = null)
    {
        $this->commonCart($id, $qty, $wording);
        return Redirect::to('/cart');
    }

    public function commonCart($cake_desc_id, $qty, $wording)
    {
        //status will be 1 if the user has add to the cart and not purchased
        $cart = Cart::where('user_id', '=', Auth::User()->id)->where("status", '=', 1)->first();
        $cake_desc = CakeDesc::find($cake_desc_id);
        if ($cart == null) {
            $cart = new Cart();
            $cart->req_date = Carbon::today()->toDateString();
            $cart->sub_total = 0;
            $cart->ord_date = Carbon::today()->toDateString();
            $cart->sms_state = 1;
            $cart->user_id = Auth::User()->id;
            $cart->status = 1;
            $cart->save();

            $cartitem = new CartItem();
            $cartitem->qty = $qty;
            $cartitem->wording = $wording;
            $cartitem->price = ((int)$qty) * ($cake_desc->price);
            $cartitem->cake_desc_id = $cake_desc_id;
            $cart->cartitem()->save($cartitem);

        } else {
            $cartitem = new CartItem();
            $cartitem->qty = $qty;
            $cartitem->wording = $wording;
            $cartitem->price = ((int)$qty) * ($cake_desc->price);
            $cartitem->cake_desc_id = $cake_desc_id;
            $cart->cartitem()->save($cartitem);
        }
    }

    public function viewOrders($order_type){

        if($order_type=="onlineorders"){
            if(($carts = \App\Cart::with('cartItem','user')->where("status", '=', 2)->get())==null){
                $carts=null;
            }
            $cakerequests=null;
        }else{
            if(($cakerequests=CakeRequest::with('requestQuantity','user')->where('state','=',0)->paginate(1))==null){
             $cakerequests=null;
            }
            $carts=null;
        }
        return view('orders',['currentcategory'=>$order_type,'carts'=>$carts,'cakerequests'=>$cakerequests]);
    }


    public function respondOrder(Request $request){

        $requestid=$request->input('requestid');
        $category=$request->input('category');

        if($request->has('declinebtn')){
            $cakerequest=CakeRequest::find($requestid);
            $cakerequest->state=5;
            $cakerequest->save();
            return Redirect::to('/orders/'.$category);
        }else{
            $cakerequest=CakeRequest::find($requestid);
            $cakerequest->state=2;
            $cakerequest->save();
            return Redirect::to('/orders/'.$category);

        }
    }
}