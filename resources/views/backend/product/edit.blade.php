@extends('backend.layout.app')
@section('title', 'Edit Product')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Product</h5>

        {{-- Show validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Edit form --}}
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $product->name) }}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label for="code" class="form-label">Product Code</label>
                <input type="text" name="code" id="code" 
                       value="{{ old('code', $product->code) }}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" 
                       value="{{ old('price', $product->price) }}" 
                       class="form-control" step="0.01">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" 
                       value="{{ old('stock', $product->stock) }}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label><br>
                @if($product->product_image)
                    <img src="{{ asset('storage/' . $product->product_image) }}" 
                         alt="{{ $product->name }}" height="100" class="mb-2">
                @endif
                <input type="file" name="product_image" id="product_image" class="form-control">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       class="form-check-input" 
                       {{ $product->is_active ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
