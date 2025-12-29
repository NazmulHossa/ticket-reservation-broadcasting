<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('backend.product.list', compact('products'));

    }

    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name')->get();

        return view('backend.product.create', compact('categories'));

    }


    public function store(Request $request)
    {
        // manual validation
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:250',
            'code' => 'required|string|max:100|unique:products,code',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_image' => 'nullable|image|max:650',
            'is_active' => 'nullable|boolean',
        ]);



        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error_message', 'Validation Failed');
        }


        // image value
        $fileName = '';

        if ($request->hasFile('product_image')) {
            $imageFile = $request->file('product_image');
            $extension = $imageFile->getClientOriginalExtension();

            $fileName = time() . 'product-' . uniqid() . '.' . $extension;

            $imageFile->storeAs('products', $fileName,'public');

        }



        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_image' => $fileName,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.product.list')
            ->with('success_message', 'Product has been created successfully');

    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:250',
            'code' => 'required|string|max:100|unique:products,code,' . $id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_image' => 'nullable|image|max:650',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = $product->product_image;
        if ($request->hasFile('product_image')) {
            $imageFile = $request->file('product_image');
            $extension = $imageFile->getClientOriginalExtension();
            $fileName = time() . 'product-' . uniqid() . '.' . $extension;
            $imageFile->storeAs('public/products', $fileName, 'public');
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_image' => $fileName,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.product.list')->with('success_message', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.list')->with('success_message', 'Product deleted successfully');
    }

}
