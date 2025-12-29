@extends('frontend.layout.app')

@section('title', 'Simpleshop-Home')


@section('content')


<div class="container">
      
        <!-- hero sectiion -->

        @include('frontend.partials.hero', ['title' => 'Welcome to SimpleShop', 'short_description' => 'A minimal Bootstrap e‑commerce starter — plain HTML files so you can demonstrate conversion to Blade or Vue later.'])       

      <div class="row mb-4">
        <div class="col-md-4">
          <h4>Fast Setup</h4>
          <p>Drop files into a folder and open index.html in the browser.</p>
        </div>
        <div class="col-md-4">
          <h4>Simple Design</h4>
          <p>Bootstrap 5 + tiny CSS so students can follow how pages are structured.</p>
        </div>
        <div class="col-md-4">
          <h4>Vue Ready</h4>
          <p>Pages are structured so you can later mount Vue components on the #app element.</p>
        </div>
      </div>

      <h3 class="mb-3">Featured Products</h3>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        
        
        @foreach($products as $product)
        
        <div class="col">
          <div class="card h-100">
            <img src="{{ $product->product_image }}" class="card-img-top" alt="{{ $product->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $product->title }}</h5>
              <p class="card-text">{{ $product->short_description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <strong>{{ $product->price }}</strong>
              <a href="product_details.html" class="btn btn-sm btn-outline-primary">View</a>
            </div>
          </div>
        </div>

        @endforeach

        
      </div>
    </div>




    @endsection