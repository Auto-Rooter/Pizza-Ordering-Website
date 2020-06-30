@extends('layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order {{ $elements->id ? '#'.$elements->id  : ' :' }} elements: </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                              <th>
                                    name
                              </th>
                              <th>
                                    price
                              </th>
                        </thead>
                        <tbody>
                        @foreach($elements as $element)
                                    <tr>
                                          <td>{{ $element->name }}</td>
                                          <td>{{ $element->price }}</td>                                          
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
