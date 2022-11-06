@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
@endphp
<section class="dash_main tabcontent" id="main-2">
    <div class="orders_title_card">
        <div>
            <h1>
                {{session('userName')}}'s Orders
            </h1>
        </div>
    </div>
    <div class="order_info">
        <table>
            <tr>
                <th><u>Food Image</u></th>
                <th><u>Food Name</u></th>
                <th><u>Date of Order</u></th>
                <th><u>My Description</u></th>
                <th><u>Quantity Ordered</u></th>
                <th><u>Total Price</u></th>
                <th><u>Order's Status</u></th>
            </tr>
            @foreach($orderDetails as $order)
                <tr>
                    <td> {{$order->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
