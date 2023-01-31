<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categorys = Category::all();

        return view('frontend.products' , compact('products' , 'categorys'));
    }

    public function single_product($id)
    {
        $products = Product::find($id);
        $categorys = Category::all();
     
        return view('frontend.single_product' , compact('products' , 'categorys'));
    }

    public function category($id)
    {
        $products = Product::where('category_id' , $id)->get();
        $categorys = Category::all();
     
        return view('frontend.products' , compact('products' , 'categorys'));
    }

    public function all_products()
    {
        $products = Product::all();
        return view('backend.products.all_products' , compact('products'));
    }  

    public function create()
    {
        $categorys = Category::all();
        return view('backend.products.add_product' , compact('categorys'));
    }

    public function store(Request $request)
    {
        $name         = $request->name;
        $category     = $request->category;
        $type         = $request->type;
        $category_id  = $request->category_id;
        $price        = $request->price;
        $sale_price   = $request->sale_price;
        $quantity     = $request->quantity;
        $description  = $request->description;
        
        //image

        $product_image = $request->file('image'); 
 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($product_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $product_image->move($upload_location,$img_name); 


        $products = Product::create([
            'name'         => $name,
            'category'     => $category,
            'type'         => $type,
            'category_id'  => $category_id,
            'price'        => $price,
            'sale_price'   => $sale_price,
            'quantity'     => $quantity,
            'description'  => $description,
            'image'        => $image,
        ]);

        $products->save();

        return redirect()->route('all_product.all');
    }


    public function edit($id)
    {
        $categorys = Category::all();
        $products = Product::find($id);
        return view('backend.products.edit_product' , compact('products' , 'categorys'));
    }

    public function update(Request $request, $id)
    {
        $name         = $request->name;
        $category     = $request->category;
        $type         = $request->type;
        $category_id  = $request->category_id;
        $price        = $request->price;
        $sale_price   = $request->sale_price;
        $quantity     = $request->quantity;
        $description  = $request->description;


                //image

                $product_image = $request->file('image'); 
 
                $name_gen = hexdec(uniqid()); 
                $img_ext = strtolower($product_image->getClientOriginalExtension()); 
                $img_name = $name_gen . '.' . $img_ext; 
                 
                $upload_location = 'frontend/images/'; 
                $image = $img_name; 
                $product_image->move($upload_location,$img_name);

                $products = Product::find($id);
                $products->update([
                    'name'         => $name,
                    'category'     => $category,
                    'type'         => $type,
                    'category_id'  => $category_id,
                    'price'        => $price,
                    'sale_price'   => $sale_price,
                    'quantity'     => $quantity,
                    'description'  => $description,
                    'image'        => $image,
                ]);
        
                $products->save();
        
                return redirect()->route('all_product.all');

    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('all_product.all');

    }
}
