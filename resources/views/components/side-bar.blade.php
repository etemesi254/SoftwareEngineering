<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <div style="border-left: solid 1px rgba(0,0,0,0.1);height: 100%" class="px-6 my-6">
        <div style="display: flex;justify-content: center;margin-bottom: 30px">
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px" class="text-center">
                Hello <span style="color:#FF9F1C"> {{$user->fullname}}</span>
            </h1>
        </div>
        <div class="avatar-image">
            <div style="margin: auto;border-radius: 9999px;background-color: #1b171d;width: 100px;height: 100px"></div>
        </div>


        <div>
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 23px;color:#ff7720">
                Insights
            </h1>

            <h3 style="color: #6b7280" class="text-center"> A look into how things are faring on</h3>

            <div class="flex justify-between mx-10  flex-wrap">

                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col text-center">

                    <i class="fa-solid fa-list fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Categories
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{$total_categories}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col text-center">
                    <i class="fa-solid fa-list-1-2 fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Sub Categories
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_subcategories}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col text-center">
                    <i class="fa-solid fa-users fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Users
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_users}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                    <i class="fa-solid fa-shopping-cart fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Orders
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_orders}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                    <i class="fa-solid fa-utensils fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Menus
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_menus}}</div>
                </div>
            </div>


        </div>
    </div>

</div>
