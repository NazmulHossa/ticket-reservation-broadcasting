@extends('backend.layout.app')
@section('title', 'Admin Product List')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product List</h5>

            <a href="{{ route('admin.product.create') }}">New Product</a>

            @if ($products->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>
                                    <img src="{{ asset('storage/products/' . $product->product_image) }}"
                                        alt="{{ $product->name }}" title="{{ $product->name }}" height="100">

                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @endif
        </div>
    </div>



@endsection
