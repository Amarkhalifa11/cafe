<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::all();
        return view('backend.category.all_category' , compact('categorys'));
    }


    public function create()
    {
        return view('backend.category.add_category');
    }


    public function store(Request $request)
    {
        $name = $request->name;
        $categorys = Category::create([
            'name'  => $name,
        ]);

        return redirect()->route('all_category');

    }


    public function edit($id)
    {
        $categorys = Category::find($id);
        return view('backend.category.edit_category' , compact('categorys'));
    }


    public function update(Request $request,$id)
    {
        $categorys = Category::find($id);
        $categorys->update([
            'name'  => $request->name,
        ]);

        $categorys->save();

        return redirect()->route('all_category');
    }

    public function destroy($id)
    {
        $categorys = Category::find($id);
        $categorys->delete();

        return redirect()->route('all_category');

    }
}
