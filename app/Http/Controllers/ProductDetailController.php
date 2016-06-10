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


        $cartitems = Cart::find(Auth::User()->id)->where("status", '=', 1)->first()->cartItem;

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
}