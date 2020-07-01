@extends('products.adminHeader')


@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default" style="margin-top:12px">
                <div class="panel-heading">Order for <span style="color:#8BC34A;font-size:18px;">{{ $elements['username'] }}</span> in <span style="color:#8BC34A;font-size:17px;">{{ $elements['date'] }}</span> : <b>({{$elements['items']->count()}})</b> </div>
                    
                <div class="panel-body table">
                    <table class="table" style="width: 100%;">
                        <thead>
                              <th>
                                    Item
                              </th>
                              <th>
                                    Price
                              </th>
                        </thead>
                        <tbody>
                        @foreach($elements['items'] as $element)
                                    <tr>
                                          <td>{{ $element->name }}</td>
                                          <td>${{ $element->price }}</td>                                          
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
