<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['index', 'a', 'show', 'store']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::all();

    return view('welcome')->with('products', $products);
  }

  public function a()
  {
    $products = Product::all();

    return view('welcome2')->with('products', $products);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'price' => 'required',
      'description' => 'required',
      'cover_image' => 'image|nullable|max:1999'
    ]);

    if ($request->hasFile('cover_image')) {
      // get file with extension
      $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

      // get filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

      // GET JUST EXTENSION
      $extension = $request->file('cover_image')->getClientOriginalExtension();

      // filename to store
      $fileNameToStore = $filename . '_' . time() . '.' . $extension; //like blah_2020-08-26.png

      // upload image
      $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->cover_image = $fileNameToStore;
    $product->in_stock = true;
    $product->save();

    return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // find product by id
    $product = Product::find($id);

    return view('/details')->with('product', $product);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
