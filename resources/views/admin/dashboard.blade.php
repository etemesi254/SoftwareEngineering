<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Outfit&display=swap" rel="stylesheet">
    <link href="{{asset("css/app.css")}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
            integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background-color: rgba(107,162,146,0.1)">

<div class="w-50 h-10 bg-[#0C0B0D]"></div>

<div class="flex h-full">
    <div class="panel">
    </div>

    <div class="m-6" style="width: 124%">

        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: #ff7720">
            Dashboard
        </h1>
        <div>
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 23px;color:#ff7720">
                Navigation
            </h1>

            <p> Links to get you where you want faster</p>

            <div class="m-6">
                <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                    Categories
                </h1>
                <div class="flex justify-between mx-5  flex-wrap">

                    <a href="/admin/categories_dashboard" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-chart-line fa-2xl my-5"></i>

                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Categories
                            <br>
                            Dashboard
                        </div>

                    </a>

                    <a href="/admin/add_categories" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-upload fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Upload <br>
                            New Category
                        </div>
                    </a>

                    <a href="/admin/view_categories" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-upload fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">View <br>
                            Categories
                        </div>
                    </a>

                    <a href="http://127.0.0.1/phpmyadmin/index.php?route=/sql&pos=0&db={{$database_name}}&table=categories"
                       style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-database fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Categories
                            <br>
                            Database
                        </div>
                    </a>

                </div>
            </div>

            <div class="m-6">
                <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                    Sub Categories
                </h1>
                <div class="flex justify-between mx-5  flex-wrap">

                    <a href="/admin/add_subcategories" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-cloud-upload fa-2xl my-5"></i>

                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Upload New
                            <br>
                            Sub Category
                        </div>

                    </a>

                    <a href="http://127.0.0.1/phpmyadmin/index.php?route=/sql&pos=0&db={{$database_name}}&table=sub_categories"
                       style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-database fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">SubCategories
                            <br>
                            Database
                        </div>
                    </a>

                </div>
            </div>


            <div class="m-6">
                <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                    Menu
                </h1>
                <div class="flex justify-between mx-5  flex-wrap">

                    <a href="/admin/add_menu" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                        <i class="fa-solid fa-cloud-upload fa-2xl my-5"></i>

                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Upload New
                            <br>
                            Menu
                        </div>

                    </a>

                    <a href="http://127.0.0.1/phpmyadmin/index.php?route=/sql&pos=0&db={{$database_name}}&table=menus"
                       style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-database fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Menu <br>
                            Database
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>


    <div style="border-left: solid 1px rgba(0,0,0,0.1);height: 100%" class="px-6 my-6">
        <div style="display: flex;justify-content: center;margin-bottom: 30px">
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px" class="text-center">
                Hello <span style="color:#FF9F1C"> {{$user->fullname}}</span>
            </h1>
        </div>
        <div class="avatar-image">
            <div style="margin: auto;border-radius: 9999px;background-color: #1b171d;width: 100px;height: 100px"></div>
        </div>

{{--        <div style=" display: flex;justify-content: flex-end;flex-direction: column;">--}}
{{--            <h3>email:{{$user->email}}</h3>--}}
{{--        </div>--}}

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


</body>
</html>
