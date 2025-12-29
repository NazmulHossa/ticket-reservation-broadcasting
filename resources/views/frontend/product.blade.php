@extends('frontend.layout.app')

@section('title', 'Simpleshop-Product')


@section('content')


    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Products</h1>
        <input class="form-control w-25" type="search" placeholder="Search products" aria-label="Search">
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="https://placehold.co/600x400?text=Product+A" class="card-img-top" alt="Product A">
            <div class="card-body">
              <h5 class="card-title">Product A</h5>
              <p class="card-text">Basic product description for Product A.</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span class="text-primary fw-bold">$12.00</span>
              <button class="btn btn-sm btn-success">Add to cart</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="https://placehold.co/600x400?text=Product+B" class="card-img-top" alt="Product B">
            <div class="card-body">
              <h5 class="card-title">Product B</h5>
              <p class="card-text">Basic product description for Product B.</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span class="text-primary fw-bold">$22.00</span>
              <button class="btn btn-sm btn-success">Add to cart</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="https://placehold.co/600x400?text=Product+C" class="card-img-top" alt="Product C">
            <div class="card-body">
              <h5 class="card-title">Product C</h5>
              <p class="card-text">Basic product description for Product C.</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span class="text-primary fw-bold">$32.00</span>
              <button class="btn btn-sm btn-success">Add to cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection