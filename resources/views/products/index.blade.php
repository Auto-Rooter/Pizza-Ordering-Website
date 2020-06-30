@extends('products.adminHeader')


@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default" style="margin-top:12px">
                <div class="panel-heading">
                      <span>Products</span>
                      <a class="button is-primary" href="{{ route('dashboard.create') }}" style="float:right;bottom: 8px;"> <i class="fas fa-plus" style="margin-right: 8px;"></i>  Add new Product</a>
                </div>
                <div class="panel-body table">
                <table class="table" style="width: 100%;">
                        <thead>
                        <tr>
                              <th>
                                    Name
                              </th>
                              <th>
                                    Price
                              </th>
                              <th>
                                    Edit
                              </th>
                              <th>
                                    Delete
                              </th>
                        </tr>
                        </thead>
                        <tbody>
                              @foreach($products as $product)
                                    <tr>
                                          <td>{{ $product->name }}</td>
                                          <td>{{ $product->price }}</td>
                                          <td>
                                                <button class="button is-primary is-small "><a href="{{ route('dashboard.edit', $product->id) }}" style="color:#ffff;font:23px" >Edit</a></button>
                                                
                                          </td>
                                          <td>
                                                <form action="{{ route('dashboard.destroy',  $product->id) }}" method="post">
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE') }}
                                                      <button class="button is-danger is-small">Delete</button>
                                                </form>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection

