@extends('layouts.app')

@section('head')

<style>
  .cetnerTT * {
    align-content: center;
  }

  .centerTT-child {
    border: 4px rgba(23, 23, 23, 0.2) solid;
    display: block;
    text-align: center;
    padding-top: 4px;
    width: 1000px;
    height: 600px;
  }



  img.tt {
    max-width: 50%;
    max-height: 50%;
  }

  h4 {
    padding-top: 2px;
    text-align: center;
    font-weight: 888;
    color: rgba(123, 83, 83, 0.82);
    background-color: rgba(90, 100, 222, 0.025);
  }

  hr.separator {
    border-top: 4px solid rgba(0, 0, 0, 0.2);
  }


  .container2 {
    width: 100%;
    height: 250px;

    display: flex;
    flex-flow: row wrap;

  }

</style>

@endsection

@section('content')
<h2>UUelcome to TT-Shirt Store!!</h2>
<hr>
<!-- order by Price, Name -->


<!-- show all products -->

<div class="">
  <ul class=" tt-ul list-group-flush list-group">
    @foreach($products as $product)
    <div class="container2 centerTT-child">
      @if ($product->cover_image == null)
      <div class="item">
        <img class="tt" src="/storage/cover_images/noimage.jpg" alt="">
      </div>
      @else
      <div class="item">
        <img class="tt" src="/storage/cover_images/{{$product->cover_image}}" alt="{{ $product->name }}">
      </div>
      @endif
      <div class="item">
        <h4>{{$product->name}}</h4>
      </div>
      <hr>
      <div class="item">
        <details>
          <summary>Description</summary>
          <small>{{ $product->description }}</small>
        </details>
      </div>
      <hr>
      <div class="item">
        <p>${{$product->price}}</p>
      </div>
      <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">Buy</a>
    </div>
    @endforeach
  </ul>
</div>


@endsection


@extends('layouts.app')

@section('head')
<style>
  /* product top */

  .product-top img {
    width: 50%;
  }

  .overlay-right {
    display: block;
    opacity: 0;
    position: absolute;
    top: 10%;
    margin-left: 0;
    width: 70px;
  }

  .overlay-right .btn-secondary {
    background: none !important;
    border: none !important;
    box-shadow: none !important;
  }

  .product-top:hover .overlay-right {
    opacity: 1;
    background-color: black;
    margin-left: 5%;
    transform: 0.52s;
  }


  /* prod bottom */
  .product-bottom {
    font-size: 10px;
  }

  .product-bottom h2 {
    font-size: 20px;
    font-weight: bold;
  }

  .product-bottom h5 {
    font-size: 15px;
    padding-bottom: 10px;
  }
</style>
@endsection


@section('content')
<ul>
  @foreach ($products as $product)
  <div class="row">
    <div class="col-md-3">
      <div class="product-top">
        @if ($product->cover_image == null)
        <img src="/storage/cover_images/noimage.jpg" alt="">
        @else
        <img src="/storage/cover_images/{{$product->cover_image}}" alt="">
        @endif
        <div class="overlay-right">
          <a href="{{ route('make.payment') }}" class="btn btn-secondary">
            Buy Now
          </a>

        </div>
      </div>
      <div class="product-bottom text-center">
        <h2>{{$product->name}}</h2>
        <h5>{{ $product->price }}</h5>
      </div>
    </div>
  </div>

  @endforeach
</ul>


@endsection