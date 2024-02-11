<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use Illuminate\Http\Request;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('category')){
            $category = $request->input('category');
            $categories = Category::where('name', 'like', '%' . $category . '%')->paginate(10);
        }
        else {
            $categories = Category::paginate(10);
        }

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect('/category')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($request->all());

        return redirect('/category')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/category')->with('success', 'Category deleted successfully.');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importCategory()
    {
        // Excel::import(new UsersImport, request()->file('file'));
        // Excel::import(new CategoryImport, request()->file('file'));
        Excel::import(new CategoryImport, request()->file('file'));
        return back();
    }
}
