@extends('products.adminHeader')


@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default" style="margin-top:12px">
                <div class="panel-heading">
                      <span>Orders</span>
                </div>
                <div class="panel-body table">
                <table class="table"  >
                <thead>
                              <th>
                                    id
                              </th>
                              <th>
                                    name
                              </th>
                              <th>
                                    phone
                              </th>
                              <th>
                                    Address
                              </th>
                              <th>
                                    Total
                              </th>
                              <th>
                                    Payment Type
                              </th>
                              <th>
                                  Date
                              </th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                                    <tr>
                                          <td>{{ $order->id }}</td>
                                          <td>{{ $order->name }}</td>
                                          <td>{{ $order->phone }}</td>
                                          <td>{{ $order->address }}</td>
                                          <td>${{ $order->total }}</td>
                                          <td>{{ $order->payment ? "Cash" : "Card" }} </td>
                                          <td>{{ $order->created_at }}</td>
                                          <td><button class="button is-primary is-small ">
                                                <a href="{{ route('order-show', $order->id) }}" style="color:#ffff;font:23px; font-size:16px;" >Show</a>
                                          </button></td>                                          
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection

