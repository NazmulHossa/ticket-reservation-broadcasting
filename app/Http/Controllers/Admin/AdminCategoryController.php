<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('backend.category.list', compact('categories'));
    }

    // Show create form
    public function create()
    {
        return view('backend.category.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:250|unique:categories,name',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('admin.category.list')
                         ->with('success_message', 'Category created successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:250|unique:categories,name,' . $id,
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('admin.category.list')
                         ->with('success_message', 'Category updated successfully');
    }

    // Delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'status'=>'success',
            'message'=> 'Category deleted successfully',
        ]);

        // return redirect()->route('admin.category.list')
                        //  ->with('success_message', 'Category deleted successfully');
    }
}

