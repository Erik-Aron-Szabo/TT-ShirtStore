@extends('layouts.app')

@section('head')
<style>
  .price {
    font-size: 25px;
    font-weight: bold;
    padding-top: 20px;
  }

  .single-product {
    margin-top: 70px;
  }
</style>
@endsection

@section('content')
<h2>Details</h2>
<section class="single-product">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        @if ($product->cover_image == null)
        <img src="/storage/cover_images/noimage.jpg" alt="">
        @else
        <img src="/storage/cover_images/{{$product->cover_image}}" alt="">
        @endif
        <!-- can add more pictures here -->

      </div>
    </div>
  </div>

</section>
<div class="col-md-7">
  <h2>{{$product->name}}</h2>
  <small>Product ID:{{$product->id}}</small>
  <p class="price">USD: ${{ $product->price }}</p>
  <p><b>Availability:</b>
    @if ($product->in_stock == true)
    In Stock
    @else
    Out of Stock
    @endif
  </p>
  <a href="{{ route('make.payment') }}" class="btn btn-secondary">
    Buy Now
  </a>
  <!-- add quantity -->

</div>

@endsection