@php use Illuminate\Support\Facades\Storage; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
    <title>{{$category->category_name}}</title>
</head>
<body>
<x-header></x-header>
<div class="top__container">
    <div class="row">
        <div class="col-2">
            <h1 style="font-weight: normal;font-size: 60px;color: #ff7720">{{$category->category_name}}</h1>
            <p class="my-6 py-6">
                {{$category->description}}
            </p>
            <div class="m-6">
                <a class="menu-btn" href="#menu"> View Menu</a>
                <a class="order-btn"> Make an order</a>
            </div>

        </div>
        <div class="col-2 image-container">
            <img src="{{ Storage::url($category->image) }}" class="m-6">
        </div>

    </div>

    <div id="menu" style="border-top: solid 2px rgba(0,0,0,0.05)">
        <h1 style="font-weight: normal;font-size: 60px;color: #ff7720;text-align: center">Menu</h1>
        @if($errors->any())
            <h4 class="m-auto p-2 f text-rose-500 text-center" style="font-family: 'Outfit',sans-serif">
                {{$errors->first()}}
            </h4>
        @endif
        <div class="row" style="margin: 0 50px">
            @foreach($menus as $menu)
                <div class="col-4 image-container">
                    <div style="height: 250px;width: 100%">
                        <img src="{{Storage::url($menu->image)}}" style="width: 100%;height: 250px;object-fit: fill">
                    </div>
                    <div class="m-6">
                        <h4 class="col-4-title">{{$menu->name}}</h4>
                        <h4 class="col-4-desc">{{$menu->description}}</h4>
                        <div style="display: flex;justify-content: space-between">
                            <p class="col-4-price">Ksh {{$menu->unit_price}} /=</p>
                            <form action="kitchenOrders" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$menu->id}}">
                                <input type="hidden" name="unit_price" value="{{$menu->unit_price}}">
                                <button class="menu-order-btn" style="background-color: #ff7720;" type="submit">Order
                                    Now
                                </button>
                            </form>
                        </div>
                        <p style="color: rgba(0,0,0,0.4);font-size: 17px">{{$menu->subcategory_name}}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>


</body>
</html>
