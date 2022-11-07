@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
@endphp
<section class="dash_main tabcontent" id="main-2">
    <div class="orders_title_card">
        <div style="width: fit-content">
            <h1>
                {{session('userName')}}'s Orders
            </h1>
        </div>
    </div>

    <div class="order_info">
        <table>
            <tr class="thead">
                <th><u>Order No</u></th>
                <th style="width: 160px"><u>Food Image</u></th>
                <th><u>Food Name</u></th>
                <th><u>Date of Order</u></th>
                <th><u>Time of Order</u></th>
                <th><u>My Description</u></th>
                <th><u>Quantity Ordered</u></th>
                <th><u>Total Price</u></th>
                <th><u>Order's Status</u></th>
            </tr>
            @foreach($orderDetails as $order)
                <tr class="tbody">
                    @php
                        $timestamp = (strtotime($order->date));
                        $date = date('Y.j.n', $timestamp);
                        $time = date('H:i:s', $timestamp);
                    @endphp
                    <td> # {{$order->orderID}}</td>
                    <td style="width: fit-content">
                        <div class="order_image_container">
                            <img src="{{ Storage::url($order->image) }}" alt="">
                        </div>
                    </td>
                    <td> {{$order->name}}</td>
                    <td> {{$date}}</td>
                    <td> {{$time}}</td>
                    <td> {{$order->description}}</td>
                    <td> {{$order->quantity}}</td>
                    <td> Ksh {{$order->total_price}}</td>
                    <td> {{$order->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
