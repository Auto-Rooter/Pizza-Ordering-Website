@extends('products.adminHeader')

@section('content')
<div class="container">


      <div class="card col-12 col-lg-4 login-card mt-5 mr-auto hv-center" style=" margin-top:12px; " >
            <header class="card-header">
            <p class="card-header-title">
                  Edit Product
            </p>
            </header>

            <div class="card-content">
                  <div class="content">
                    <form action="{{ route('dashboard.update', $product->id ) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="field">
                        <p class="control ">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="input"  value="{{ $product->name }}">
                        </p>
                        </div>


                        <div class="field">
                        <p class="control    ">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="input" value="{{ $product->price }}">
                        </p>
                        </div>

                        <div class="field">
                        <p class="control    ">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="input">
                        </p>
                        </div>

                        <div class="field">
                        <p class="control    ">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="input">{{ $product->description }}</textarea>
                        </p>
                        </div>


                        <button type="submit" class="button is-primary">Save Product</button>
                  </form>
                </div>
            </div>
        </div>
@endsection
