<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function getSubCategoty($id) {
        try {
            if(!empty($id)) {
                $data = Category::find($id)->subcategories;
                $html = '';
                if(!empty($data)) {
                    foreach ($data as $value) {
                        $html .= '<li class="nav-item"><a class="nav-link active category" aria-current="page" href="#">'.$value->name.'</a></li>';
                    }
                }
                return response()->json(['success' => true, 'html' => $html]);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false]);
        }
    }

    public function addCategory(Request $request) {
        // pr($request->all());
        try {
            if(!empty($request->name) && empty($request->parent_cat)) {
                $cat = new Category();
                $cat->name = $request->name;
                $cat->save();
            } else if(!empty($request->name) && !empty($request->parent_cat)) {
                $cat = new SubCategory();
                $cat->category_id = $request->parent_cat;
                $cat->name = $request->name;
                $cat->save();
            }
            return redirect(url('/'));
        } catch (\Throwable $th) {
            return redirect(url('/'));
        }
    }
}
