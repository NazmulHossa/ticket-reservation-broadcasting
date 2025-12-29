@extends('backend.layout.app')
@section('title', 'Edit Category')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Category</h5>

        {{-- Show validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Edit form --}}
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $category->name) }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" 
                          class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       class="form-check-input" 
                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Update Category</button>
            <a href="{{ route('admin.category.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
