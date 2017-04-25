<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coalition test</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
</head>
<body>
<h3 class="text-center"><b>Product Form</b></h3><br/><br/>
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @elseif(Session::has('err_message'))
            <div class="alert alert-danger">{{Session::get('err_message')}}</div>
        @endif
        <form role="form" action='{{URL::to("/submit")}}' method="post">
            {{csrf_field()}}
            <input type="text" name="product_name" placeholder="Product Name" class="form-control" value="" id="product_name"/><br/>
            <input type="number" name="quantity" placeholder="Quantity in Stock" class="form-control" value="" id="quantity"/><br/>
            <input type="number" name="price" placeholder="Price per Item" class="form-control" value="" id="price"/><br/>
            <input type="hidden" name="total" value="" id="total" />
            <input type="submit" id="submit" class="btn-lg btn-primary" value="submit" onclick="updateTotal()" />
        </form>
    </div>
    <div class="container table-display">
        <table class="table-responsive table">
            <thead>
                <th>Product Name</th>
                <th>Quantity in Stock</th>
                <th>Price per Item</th>
                <th>Total Amount</th>
            </thead>
            <tbody>
                <?php $grandtotal=0;?>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->total}}</td>
                        <?php $grandtotal+=$product->total ?>
                    </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$grandtotal}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
    <script>
        var updateTotal=function(){
            var unit_price=$("#price").val();
            var purchase_quantity=$("#quantity").val();
            var total=(1*unit_price)*(1*purchase_quantity);
            $("#total").val(total);
        }
    </script>
</body>
</html>