@extends('products.adminHeader')

@section('content')
<div class="container">


      <div class="card col-12 col-lg-4 login-card mt-5 mr-auto hv-center" style=" margin-top:12px;   >
            <header class="card-header">
            <p class="card-header-title">
                  New Product
            </p>
            </header>

            <div class="card-content">
                  <div class="content">
                              <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                                          @csrf

                                          <div class="field">
                                          <p class="control ">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" class="input" value="{{ old('name') }}">
                                          </p>
                                          </div>


                                          <div class="field">
                                          <p class="control    ">
                                          <label for="image">Price</label>
                                          <input type="number" name="price" class="input" value="{{ old('price') }}">
                                          </p>
                                          </div>

                                          <div class="field">
                                          <p class="control    ">
                                          <label for="image">Image</label>
                                          <input type="file" name="image" class="input">
                                          </p>
                                          </div>

                                          <div class="field">
                                          <p class="control    ">
                                          <label for="description">Description</label>
                                          <textarea name="description" id="description" cols="30" rows="10" class="input">{{ old('description') }}</textarea>
                                          </p>
                                          </div>



                                          <button type="submit" class="button is-primary">Save Product</button>

                                    </form>
                  </div>
            </div>





<!-- 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                              <label for="image">Price</label>
                              <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                              <button class="form-control btn btn-success">Save Product</button>
                        </div>
                  </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
