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
                            <h3>Date:{{$date}}</h3>
                            <h3>Time:{{$time}}</h3>
                        </span>
                    </div>

                    <div class="order-content-middle order-list">

                        <div class="image-container">
                            <img src="" alt="">
                        </div>
                        <div class="food-info">
                            <h2>Food Name</h2>
                            <h3>{{$order['description']}}</h3>
                            <h2>{{$order['price']}}</h2>
                            <h2>{{$order['quantity']}}</h2>
                        </div>
                    </div>

                    <div class="order-content-bottom">
                        <div class="subtotals">
                            <h3>Total Qty = 10 Items</h3>
                            <h2>Total Price = Ksh 1200</h2>
                        </div>
                        <div class="confirmation">
                            <input type="hidden" name="orderID" value="{{$order['id']}}">
                            <button type="submit" name="completed">Completed</button>
                            <button type="submit" name="rejected">Rejected</button>
                        </div>
                    </div>
                </article>
            </form>
        @endforeach
    </div>
</section>
<x-footer></x-footer>
</body>
</html>
