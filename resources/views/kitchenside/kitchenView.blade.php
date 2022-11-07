@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
@endphp
    <!doctype html>
<html lang="en">
<head>
    <title>Heavens Taste Kitchen</title>
    <x-header-tag></x-header-tag>
</head>
<body>
<x-header></x-header>

<section class="kitchen-view">
    <div class="order-display">
        @foreach($orderList as $order)
            <form action="" method="post">
                @csrf
                <article class="order-content">
                    <div class="order-content-top">
                        <h2>Order #{{$order['id']}}</h2>
                        <br>
                        <span class="time">
                            @php
                                $timestamp = (strtotime($order['date']));
                                $date = date('Y.j.n', $timestamp);
                                $time = date('H:i:s', $timestamp);
                            @endphp
                            <h3 style="margin: 0 10px">Date:{{$date}}</h3>
                            <br>
                            <h3 style="margin: 0 10px">Time:{{$time}}</h3>
                        </span>
                    </div>

                    <div class="order-content-middle order-list">
                        @php
                            $orderDetails = DB::table('orders')
                            ->selectRaw(
                            'menus.image as image,
                            menus.name as name,
                            order_details.quantity as quantity,
                            order_details.total as total_price'
                            )
                            ->join('order_details','orders.id','=','order_details.order_id')
                            ->join('menus','menus.id','=','order_details.product_id')
                            ->where('orders.id','=',$order['id'])
                            ->get()
                            ->first();
                        @endphp
                        <div class="image-container">
                            <img src="{{ Storage::url($orderDetails->image) }}" alt="">
                        </div>
                        <div class="food-info">
                            <h2>{{$orderDetails->name}}</h2>
                            <h3>Customer Info: "<u>{{$order['description']}}</u>"</h3>
                            <h2>Ksh {{$order['price']}}</h2>
                            <h2>Qty: {{$order['quantity']}}</h2>
                        </div>
                    </div>

                    <div class="order-content-bottom">
                        <div class="subtotals">
                            <span style="display: flex; justify-content: space-around">
                                <h3>Total Qty = </h3>
                                <h2>{{$orderDetails->quantity}} Items</h2>
                            </span>
                            <span style="display: flex; justify-content: space-around">
                                <h3>Total Price = </h3>
                                <h2>Ksh {{$orderDetails->total_price}}</h2>
                            </span>
                        </div>
                        <div class="confirmation">
                            <input type="hidden" name="orderID" value="{{$order['id']}}">
                            <button type="submit" name="completed">Completed</button>
{{--                            <button type="submit" name="rejected">Rejected</button>--}}
                        </div>
                    </div>
                </article>
            </form>
        @endforeach
    </div>
</section>
</body>
</html>
