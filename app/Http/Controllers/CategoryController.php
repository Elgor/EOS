<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }


    public function edit($categoryId)
    {
        $category = Category::find($categoryId);
        return view('admin.edit_category', compact('category'));
    }

    public function update(Request $request, $categoryId)
    {
        DB::table('categories')
            ->where('id', $categoryId)
            ->update([
                'name' => $request->name
            ]);

            return redirect()->route('category.index');

    }

    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        return redirect()->route('category.index');

    }
}
