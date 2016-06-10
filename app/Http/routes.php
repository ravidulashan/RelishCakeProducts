<?php
use App\User;
use App\Cake;
use App\Category;
use App\CartItem;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/cart', 'ProductDetailController@viewCart');

        Route::get('/productdetails/addtocart', 'ProductDetailController@addtoCart');

        Route::get('/productdetails/addtocart/{id}/{qty}/{wording?}', 'ProductDetailController@addtoCartWithId');

    });

    Route::get('/', function () {
        // This will return the top 8 cakes with heighest sales
        $query = DB::table('cake')
            ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
            ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
            ->select(DB::raw('SUM(qty) as Count,img_url,name,type,cake.cake_id'))
            ->orderBy('Count', 'desc')
            ->groupBy('cake.name')
            ->take(8)
            ->get();

        //this will return 8 cakes
        $cakes = Cake::get()->take(8);
        return view('index', ['query' => $query, 'cakes' => $cakes]);
    });


    Route::get('/check/', 'Auth\AuthController@checkAvailability');

    Route::get('/onlinemenu/{category}', 'OnlineMenuController@viewCategorizedCakes');

    Route::get('/onlinemenu/{category}/{id}', 'ProductDetailController@viewCakeDetails');

    Route::post('/signup', 'Auth\AuthController@registerUser');
    Route::get('/signup', 'Auth\AuthController@registerUser');

    Route::get('/contact', function () {
        return view('contactus');
    });

    Route::get('/aboutus', function () {
        return view('aboutus');
    });

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('login');
        }

    });


    Route::get('/onlinecake/pricerange', 'OnlineMenuController@setPriceRange');

    Route::get('/onlinecake/customizedpricerange', 'OnlineMenuController@setCustomizedPriceRange');


    Route::get('/cart/updateqty', 'ProductDetailController@updateQuantity');

    Route::get('/cart/remove/{order_id}', 'ProductDetailController@removeItem');

    Route::post('/login', 'Auth\AuthController@authenticate');


    Route::get('/logout', 'Auth\AuthController@getLogout');

    Route::get('/{cake_type}','');

    Route::get('/test', function () {
        $category = Category::where('seperator','=',1)->get();
        echo $category;
        /*$cake_desc = Auth::user()->user_type;
        echo $cake_desc;*/
        /*   $cartitem=CartItem::with('cakeDesc')->find(23);
           echo $cartitem->cakedesc->price*90;
         *//*  $cartitems= \App\Cart::find(Auth::User()->id)->where("status", '=', 1)->first()->cartItem;
    foreach($cartitems as $cartitem){
        $cakedesc=\App\CakeDesc::with('cake')->where('cake_desc_id','=',$cartitem->cake_desc_id)->get();
        echo $cakedesc[0]['price'];
    }*/
//    $cartitems= \App\Cart::find(Auth::User()->id)->first();
//    echo $cartitems->user_id;

        /*  foreach($cakedesc as $cake){
             echo $cake->cake->name;
          }*/
        //$cartitems=\App\Cart::where('user_id','=',Auth::User()->id)->cartItem;
        // $cartitems= \App\Cart::with('cartItem','cakeDesc','cake')->find(1);
//    $test=\App\CakeDesc::find($cartitems);
//    $cake=Cake::find($test);
        //  echo $cartitems;
        //  echo $cartitems;
        /* $cart=new \App\Cart();
         $cart->req_date=Carbon::today()->toDateString();
         $cart->sub_total=0;
         $cart->ord_date=Carbon::today()->toDateString();
         $cart->sms_state=1;
         $cart->user_id=Auth::User()->id;
         $cart->status=1;
         $cart->save();*/
        //   return response()->json(['retvalue'=>'test']);
        /*  $cakes = Cake::where('type','=','chocolate cake')->with(array('cakedesc' => function($query)
          {
              $query->where('quantity', '=', '1 kg')->whereBetween('price',[1,100]);

          })*/
        /*  foreach($cakes as $cake){
              echo $cake->name;
          }*/
        //   echo json_encode($cakes);
//    foreach($cakes as $cake){
//       echo $cake->name;
//    }
        //   $newcakes = Cake::whereDate('created_at','>=', date('Y-m-d', strtotime('first day of last month')))->whereDate('created_at','<=',date('Y-m-d'))->get()->take(9);
        /* $query = DB::table('cake')
             ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
             ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
             ->select(DB::raw('SUM(qty) as Count,img_url,name'))
             ->orderBy('Count', 'desc')
             ->groupBy('cake.name')
             ->take(8)
             ->get();*/
        /* $cakes = DB::table('cake')
             ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
             ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
             ->select(DB::raw('SUM(qty) as Count,img_url,name,type'))
             ->orderBy('Count', 'desc')
             ->groupBy('cake.name')
             ->take(6)
             ->get();
         for($i=0;$i<4;++$i){
            echo $cakes[$i]->img_url;
         }*/
        /*$category=Category::all();
        foreach($category as $cat){
            echo $cat->type;
        }*/
        /*  $cakes = Cake::where('type', '=','chocolate cake')->get()->take(6);
          foreach($cakes as $cake){
              echo $cake->created_at;
          }*/
        //  print_r($cakes);
        /*  $c=Cake::where('type','=','chocolate cake')->whereIn('cake_id',Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')),date('Y-m-d')])->get(array('cake_id')))->get();
          $cakes=Cake::where('type','=','chocolate cake')->whereNotIn('cake_id',Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')),date('Y-m-d')])->get(array('cake_id')))->get();
          foreach($c as $cake){
              echo $cake->name;
          }*/
        /*$cake_descs = Cake::with('cakedesc')->find(2);
    //print_r($cake_descs);
       // foreach($cake_descs as $cake_desc){
          echo  $cake_descs->cakedesc->quantity;*/
        //  }
//    $cake_type=Cake::where('type','=','chocolate cake')->get();
//    foreach($cake_type as $cake){
//        echo $cake->name;
//    }
        //  $cake_descs->cakedesc->quantity;
        /*  $cakes = DB::table('cake')
              ->join('cake_desc', 'cake_desc.cake_id', '=', 'cake.cake_id')
              ->join('cart_item', 'cart_item.cake_desc_id', '=', 'cake_desc.cake_desc_id')
              ->select(DB::raw('SUM(qty) as Count,img_url,name,type'))
              ->whereNotIn('cake.cake_id',Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')),date('Y-m-d')])->get(array('cake_id')))
              ->orderBy('Count', 'desc')
              ->groupBy('cake.name')
              ->take(9)
              ->get();
          $newcakes = Cake::whereBetween('created_at', [date('Y-m-d', strtotime('first day of last month')), date('Y-m-d')])->get()->take(9);
          echo sizeof($newcakes);
          foreach($newcakes as $cake){
              echo $cake->name;
          }*/
//echo date('Y-m-d',strtotime('first day of last month'));
        //date('Y-m-d', strtotime('first day of last month'))
        // date('Y-m-d')

        /* foreach($query2 as $c){
             echo $c->name;
         }
         echo sizeof($query2);
         //print_r($query2);*/
    });


    Route::get('/onlinemenu', 'OnlineMenuController@viewCakes');
});
//Route::auth();

//Route::get('/home', 'HomeController@index');
