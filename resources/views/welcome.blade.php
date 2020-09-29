@extends('layouts.app')

@section('head')
<style>
  /* product top */

  .product-top img {
    width: 100%;
    width: 410px;

  }

  .overlay-right {
    display: block;
    opacity: 0;
    position: absolute;
    top: 10%;
    margin-left: 0;
    width: 100px;
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
    font-size: 17px;
    text-align: center;
  }

  .product-bottom h2 {
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    width: 410px;
  }

  .product-bottom h5 {
    font-size: 18px;
    padding-bottom: 10px;
    text-align: center;
    width: 410px;
  }

  .row2 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    max-width: 410px;
    width: 102.5px;
  }

  .col3 {
    align-items: center;
    flex: 0 0 25%;
    max-width: 25%;
  }


  /* .individual-product {
    height: 300px;
    width: 280px;
    float: left;
    margin: 10px;
  } */

  .container-Parent {
    display: grid;
    grid-template-columns: 350px 350px;
    grid-template-rows: 20%;
    justify-items: center;
    /* items will be in the center of the blocks */

    justify-content: space-evenly;
    align-content: space-evenly;

    place-content: space-evenly;
    /* sets both justify-content &
    align-content */
  }

  .column-Child {
    grid-area: auto;
  }
</style>
@endsection


@section('content')
<section class="on-sale">
  <div class="conatiner-Parent">
    <ul class="ulcol column-Child">
      @foreach ($products as $product)
      <div class="row2 ">
        <div class="">
          <div class="product-top" style="width: 160px;">
            @if ($product->cover_image == null)
            <img src="/storage/cover_images/noimage.jpg" alt="">
            @else
            <img src="/storage/cover_images/{{$product->cover_image}}" alt="">
            @endif
            <div class="overlay-right">

              <a href="{{ route('description', $product->id) }}" class="btn btn-secondary">
                Description
              </a>
            </div>
          </div>
          <div class="product-bottom text-center">
            <h2>{{$product->name}}</h2>
            <h5>${{ $product->price }}</h5>
          </div>
        </div>
      </div>

      @endforeach
    </ul>
  </div>
</section>
@endsection