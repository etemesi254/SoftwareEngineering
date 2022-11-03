@php use Illuminate\Support\Facades\Storage; @endphp
    <!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body>

<x-header></x-header>

<section class="order-container">

    <div class="make-order">
        <div class="form" id="orderForm">
            <div class="field">
                <label for="{{$menu_data->name}}">Food Item: </label>
                <input type="text" id="foodName" name="name" value="{{$menu_data->name}}" readonly>
            </div>

            <div class="field">
                <label for="{{$customer_id}}">Customer ID: </label>
                <input type='number' id="customer_id" name='customer_id' value="{{$customer_id}}" readonly/>
            </div>

            <div class="field">
                <label for="quantity">Quantity:</label>
                <input type='number' id="quantity" name='quantity' step="1"/>
            </div>

            <div class="field">
                <label for="unit_price">Each product at Ksh</label>
                <input type='text' id="unit_price" name='price' value="{{$unit_price}}" readonly/>
            </div>

            <div class="field">
                <label for="additions">Enter Preferences: </label>
                <textarea name="additions" id="preferences" cols="30" rows="10" style="resize: none;"></textarea>
            </div>

            <div class="field">
                <button type="submit" id='summary'>Generate Summary</button>
            </div>
        </div>
    </div>

    <div class="order-receipt">
        <div class="image-container">
            <img src="{{ Storage::url($menu_data->image) }}" class="m-6">
        </div>
        <div class="receipt-content">
            <form action="submitOrder" method="post">
                @csrf
                <span>
                    <h3>Food Item:</h3>
                    <h2>{{$menu_data->name}}</h2>
                </span>
                <span>
                    <h3>Unit Price:</h3>
                    <h2>Ksh {{$unit_price}}</h2>
                </span>
                <span class="fetch-data">
                    <h3>Quantity: </h3>
                    <input type="text" name="customer_quantity" id="quantity_receipt">
                </span>
                <span class="fetch-data">
                    <h3>Total Price: </h3>
                    <input type="text" name="calculated_price" id="total_price">
                </span>
                <span>
                    <input type='hidden' name='customerId' value='{{$customer_id}}'>
                    <input type='hidden' name='id' value="{{$menu_id}}"/>
                    <input type='hidden' name='unit_price' value='{{$unit_price}}'>
                    <input type='hidden' name='dateTime' value='{{$current_time}}'/>
                    <input type='hidden' name='status' value="pending"/>
                    <input type="hidden" name="customer_preferences" id="preferences_new">
                </span>
                <span class="field">
                    <button type="submit">Submit Order</button>
                    <button>Re-edit Order</button>
                </span>
            </form>
        </div>
    </div>

</section>

<script>
    document.getElementById('summary').addEventListener("click", updateReceipt);

    function updateReceipt() {
        // extracting form information
        var quantity = parseInt(document.getElementById('quantity').value);
        var unit_price = parseFloat(document.getElementById('unit_price').value);
        var preferences = document.getElementById('preferences').value;

        // filling in hidden form content
        document.getElementById('quantity_receipt').value = quantity;
        document.getElementById('total_price').value = "Ksh " + quantity * unit_price;
        document.getElementById('preferences_new').value = preferences;
    }
</script>
</body>
</html>
