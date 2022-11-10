<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function index() {
        $data['categories'] = Category::all();
        $data['products'] = Product::with('variant')->get();
        // pr($data);
        return view('welcome')->with($data);
    }

    public function addProduct(Request $request) {
        
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->desc;

            $nameImg = '';
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $nameImg = time().'.'.$request->img->extension();  
                $destinationPath = public_path('/product_images');
                $image->move($destinationPath, $nameImg);
            }

            $product->image = $nameImg;
            $product->save();

            if(!empty($request->var_name) && !empty($request->var_price) && !empty($request->var_oprice)) {
                // pr($request->all());
                $pvar = new ProductVariant();
                $pvar->product_id = $product->id;
                $pvar->name = $request->var_name;
                $pvar->price = $request->var_price;
                $pvar->offer_price = $request->var_oprice;
                // pr($pvar);
                $pvar->save();
            }

            return redirect(url('/'));
        } catch (\Throwable $th) {
            return redirect(url('/'));
        }
    }
}
