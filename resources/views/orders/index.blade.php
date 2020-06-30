@extends('layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>

                <div class="panel-body">
                    <table class="table">
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
                                          <td>{{ $order->total }}</td>
                                          <td>{{ $order->date }}</td>                                          
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
