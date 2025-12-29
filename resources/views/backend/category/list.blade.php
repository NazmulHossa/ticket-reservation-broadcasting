@extends('backend.layout.app') @section('title', 'Admin Category List') @section('content') <div class="card">
    <div class="card-body">
        <h5 class="card-title">Category List</h5> <a href="{{ route('admin.category.create') }}"
            class="btn btn-primary mb-3">New Category</a>
        @if ($categories->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr id="{{ 'category_id_' . $category->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('admin.category.delete', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="sweetAlert2({{ $category->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
