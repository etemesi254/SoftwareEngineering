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
        <form action="" method="post">
            @csrf
            <div class="field">
                <label for="{{$menu_data->name}}">Food Item: </label>
                <input type='hidden' name='id' value="{{$menu_id}}"/>
                <input type="text" name="name" value="{{$menu_data->name}}" readonly>
            </div>

            <div class="field">
                <label for="{{$customer_id}}">Customer ID:</label>
                <input type='number' name='customer_id' value="{{$customer_id}}" readonly/>
            </div>

            <div class="field">
                <label for="quantity">Quantity:</label>
                <input type='number' name='quantity' step="1"/>
            </div>

            <div class="field">
                <label for="unit_price">Each product at Ksh</label>
                <input type='text' name='price' step="1" value="{{$unit_price}}" readonly/>
            </div>

            <div class="field">
                <label for="additions">Enter Preferences: </label>
                <textarea name="additions" cols="30" rows="10" style="resize: none;"></textarea>
            </div>

            <div class="field">
                <input type='hidden' name='dateTime' value="{{$current_time}}" readonly/>
                <input type='hidden' name='status' value="pending"/>
            </div>

            <div class="field">
                <button type="submit" name='place_order'>Generate Summary</button>
            </div>
        </form>
    </div>

    <div class="order-receipt">
        <div class="image-container">
            <img src="{{ Storage::url($menu_data->image) }}" class="m-6">
        </div>
        <div class="receipt-content">
            <form action="" method="post">
                <span>
                    <h3>Food Item:</h3>
                    <h2>{{$menu_data->name}}</h2>
                </span>
                <span>
                    <h3>Unit Price:</h3>
                    <h2>{{$unit_price}}</h2>
                </span>
                <span>
                    <h3>Quantity:</h3>
                    <h2>(not applicable yet)</h2>
                </span>
                <span>
                    <h3>Total Price:</h3>
                    <h2>(not applicable yet)</h2>
                </span>
                <span>
                    <h3>Number of Items</h3>
                    <h2>(not applicable yet)</h2>
                </span>
                <span class="field">
                    <button type="submit">Submit Order</button>
                    <button type="submit">Re-edit Order</button>
                </span>
            </form>
        </div>
    </div>
</section>

</body>
</html>
