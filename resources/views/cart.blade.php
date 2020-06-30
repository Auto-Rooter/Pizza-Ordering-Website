@extends('layout')

@section('title', 'Cart')

@section('content')

    <span id="status"></span>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach((array) session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">$<span class="product-subtotal">{{ $details['price'] * $details['quantity'] }} / {{ currency($details['price'] * $details['quantity'], 'USD', 'EUR') }}</span></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-check-circle"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Order: <span class="cart-total">{{ $total." " }}$ / {{  currency($total, 'USD', 'EUR') }} </span> 
            @if ($total > 0)
               + Deleivary Cost: <span class="cart-total">4 $/ {{ currency(4, 'USD', 'EUR') }} </span>  
            @endif
            </strong>     
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="text-center"><strong> =  <span class="cart-total">
            @if ($total > 0)
                {{ $total + 4 }}{{" " }}$ / {{ currency($total + 4 , 'USD', 'EUR') }} 
            @else
                0.0
            @endif
            </span> </strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td colspan="2" class="hidden-xs"></td>
            <td><button class="btn btn-info">
                @if(session('qnt')>0)
                        <a href="{{ url('/check-out') }}" style="text-decoration: none;color:#FFFF"><i class="fa fa-shopping-basket"></i> CheckOut </a>
                @else
                        Your cart is Empty
                @endif
            </button></td></tr>
        </tfoot>
    </table>

@endsection

@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();
            //alert(quantity);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {
                    if(response.subTotal <= 0){
                        loading.hide();
                        parent_row.remove();
                        $(this).parents("tr").remove();
                    }else{
                        product_subtotal.text(response.subTotal+" / "+response.subTotal_EU);
                        loading.hide();
                    }

                    

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    setTimeout(function(){ $("span#status").html(''); }, 2000);
                    $("#header-bar").html(response.data);

                    cart_total.text(response.total+" / "+response.total_EU);

                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                        setTimeout(function(){ $("span#status").html(''); }, 2000);
                        $("#header-bar").html(response.data);

                        cart_total.text(response.total+" / "+response.total_EU);
                    }
                });
            }
        });

    </script>

@endsection