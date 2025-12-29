@extends('backend.layout.app')
@section('title', 'Admin Product Create')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product List</h5>

        <a href="{{ route('admin.product.list') }}">Back Product List</a>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i>Create New Product
                        </h4>
                        <p class="text-muted mb-0">Add a new product to your inventory</p>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">-- Select category --</option>

                                        @foreach($categories as $category)

                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected':'' }}>{{ $category->name }}</option>

                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter product name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="code" class="form-label">Product Code</label>
                                    <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control" placeholder="Enter product code">
                                    @error('code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" id="price" value="{{ old('price') }}" name="price" class="form-control" placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" id="stock"  value="{{ old('stock') }}" name="stock" class="form-control" placeholder="Enter stock quantity">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="product_image" class="form-label">Product Image</label>
                                    <input type="file" id="product_image" name="product_image" class="form-control" accept="image/*">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input">
                                    <label for="is_active" class="form-check-label">Active</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.product.list') }}" class="btn btn-outline-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>



    @endsection