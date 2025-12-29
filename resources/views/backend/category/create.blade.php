@extends('backend.layout.app')
@section('title', 'Create Category')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Category</h5>

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

        {{-- Create form --}}
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name') }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" 
                          class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       class="form-check-input" {{ old('is_active') ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Create Category</button>
            <a href="{{ route('admin.category.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
