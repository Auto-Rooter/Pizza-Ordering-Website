@extends('layout')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <span id="status"></span>
        <div class="row">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $product->photo }}" width="250" height="250">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 80) }}</p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn btn-warning btn-block text-center add-to-cart" role="button">Add to cart</a>
                                <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}',
                method: "post",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                dataType: "json",
                success: function (response) {
                    ele.siblings('.btn-loading').hide();
                    //alert(response.data);
                   // $("#qnt-value").text(response.qnt);
                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                    setTimeout(function(){ $("span#status").html(''); }, 2000);
                    
                }
            });
        });
    </script>

@stop

