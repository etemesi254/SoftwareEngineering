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
        <x-panel></x-panel>
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
                <div style="display: flex;justify-content:space-around">
                    <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                        Sub Categories
                    </h1>
                    <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                        Menu
                    </h1>
                </div>
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


            <div class="m-6">
                <div style="display: flex;justify-content:space-around">
                    <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                        Orders
                    </h1>
                    <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 20px;color:#7c3000">
                        Users
                    </h1>
                </div>
                <div class="flex justify-between mx-5  flex-wrap">

                    <a href="/admin/view_orders" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-truck-moving fa-2xl my-5"></i>

                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">View
                            <br>
                            Orders
                        </div>

                    </a>

                    <a href="http://127.0.0.1/phpmyadmin/index.php?route=/sql&pos=0&db={{$database_name}}&table=orders"
                       style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-database fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Orders
                            <br>
                            Database
                        </div>
                    </a>


                    <a href="/admin/view_users" style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                        <i class="fa-solid fa-cloud-upload fa-2xl my-5"></i>

                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">View Users
                            <br>
                            Dashboard
                        </div>

                    </a>

                    <a href="http://127.0.0.1/phpmyadmin/index.php?route=/sql&pos=0&db={{$database_name}}&table=users"
                       style="background-color: rgba(230,96,1,0.2)"
                       class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-40 text-center">

                        <i class="fa-solid fa-database fa-2xl my-5"></i>
                        <div
                            style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Users <br>
                            Database
                        </div>
                    </a>

                </div>

            </div>

        </div>
    </div>

    <x-side-bar></x-side-bar>

</div>


</body>
</html>
