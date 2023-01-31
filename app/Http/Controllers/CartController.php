<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CartController extends Controller
{

    public function index(){
        $categorys = Category::all();
        return view('frontend.cart' , compact('categorys'));
    }


    public function add_to_cart(Request $request){
        
        
        if ($request->session()->has('cart')) {
            
            $cart              = $request->session()->get('cart');
            $products_array_id = array_column($cart , 'id');
            $id                = $request->input('id');

            if(!in_array($id , $products_array_id)){

            $name              = $request->input('name');
            $image             = $request->input('image');
            $category          = $request->input('category');
            $type              = $request->input('type');
            $quantity          = $request->input('quantity');
            $price             = $request->input('price');
            $sale_price        = $request->input('sale_price');

            if($sale_price != null){
                $the_price = $sale_price;
            }else{
                $the_price = $price;
            }

            $product_array = array(
                'id'       =>$id,
                'name'     =>$name,
                'image'    =>$image,
                'category' =>$category,
                'type'     =>$type,
                'quantity' =>$quantity,
                'price'    =>$the_price,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart' , $cart);


            }else{

                echo "<script>alert('product has been in the cart')</script>";
            }

            $this->calc($request);

            $categorys = Category::all();
            return view('frontend.cart' , compact('categorys'));


        }else{

            $cart = array();

            $id                = $request->input('id');
            $name              = $request->input('name');
            $image             = $request->input('image');
            $category          = $request->input('category');
            $type              = $request->input('type');
            $quantity          = $request->input('quantity');
            $price             = $request->input('price');
            $sale_price        = $request->input('sale_price');

            if($sale_price != null){
                $the_price = $sale_price;
            }else{
                $the_price = $price;
            }

            $product_array = array(
                'id'       =>$id,
                'name'     =>$name,
                'image'    =>$image,
                'category' =>$category,
                'type'     =>$type,
                'quantity' =>$quantity,
                'price'    =>$the_price,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart' , $cart);


            $this->calc($request);

            $categorys = Category::all();
            return view('frontend.cart' , compact('categorys'));

            
        }

    }


    public function calc(Request $request){

        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach ($cart as $id => $product) {
            $product = $cart[$id];

            $price = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity +$quantity ;
        }

        $request->session()->put('total' , $total_price);

    }


    public function remove(Request $request){

        $cart = $request->session()->get('cart');
        $id   = $request->input('id');

        unset($cart[$id]);
        $request->session()->put('cart' , $cart);

        $this->calc($request);

        $categorys = Category::all();
        return view('frontend.cart' , compact('categorys'));        
    }


    public function edit_quantity(Request $request){

            if($request->session()->has('cart')){

                $product_id = $request->input('id');
                $product_quantity = $request->input('quantity');

                if($request->has('add_one')){
                    $product_quantity = $product_quantity + 1;

                }elseif($request->has('minus_one')){
                    $product_quantity = $product_quantity - 1;

                }else{
                    $product_quantity = $product_quantity;

                }

                if($product_quantity <=0){
                    $this->remove($request);
                }

                $cart = $request->session()->get('cart');

                if(array_key_exists($product_id , $cart)){
                    $cart[$product_id] ['quantity'] = $product_quantity ;
                    $request->session()->put('cart' , $cart);
                    $this->calc($request);
                }

            }
            $categorys = Category::all();
            return view('frontend.cart' , compact('categorys'));
    }
    

    public function checkout(){
            $categorys = Category::all();
            return view('frontend.checkout' , compact('categorys'));
    }


    public function place_order(Request $request){
            if($request->session()->has('cart')){

                $name    = $request->name;
                $email   = $request->email;
                $phone   = $request->phone;
                $city    = $request->city;
                $address = $request->address;
                $date    = date('Y-m-d h:i:s');
                $status  = 'not paid';
                $cost    = $request->session()->get('total');

                $cart    = $request->session()->get('cart');


               $order_id = DB::table('orders_tables')->InsertGetId([
                    'name'    => $name,
                    'email'   => $email,
                    'phone'   => $phone,
                    'city'    => $city,
                    'address' => $address,
                    'date'    => $date,
                    'status'  => $status,
                    'cost'    => $cost,

                ] , 'id');


                foreach ($cart as $id => $product) {
                    
                    $product  = $cart[$id];
                    
                    $product_id        = $product['id'];
                    $product_name      = $product['name'];
                    $product_image     = $product['image'];
                    $product_category  = $product['category'];
                    $product_type	   = $product['type'];
                    $product_quantity  = $product['quantity'];
                    $product_price     = $product['price'];

                    DB::table('orderss_items')->insert([

                        'order_id'          => $order_id,
                        'product_id'        => $product_id,
                        'product_name'      => $product_name,
                        'product_image'     => $product_image,
                        'product_category'  => $product_category,
                        'product_type'      => $product_type,
                        'product_quantity'  => $product_quantity,
                        'product_price'     => $product_price,
                        'product_date'      => $date,
                    ]);
                }

                $request->session()->put('order_id' , $order_id);
                
                $categorys = Category::all();
                return view('frontend.payment' , compact('categorys'));


            }else{
                return redirect()->route('home');
            }
    }

}
