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
<body class="bg-[#DFDFF0]">

<div class="w-50 h-10 bg-[#0C0B0D]"></div>

<div class="flex h-full">
    <div class="panel">
    </div>

    <div class="m-6">
        <div style="display: flex;justify-content: space-between;margin-bottom: 30px">
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px">
                Hello <span style="color:#FF9F1C"> Darian</span>
            </h1>
        </div>

        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px">
            Dashboard
        </h1>
        <h1 style="font-family:'Outfit',sans-serif;font-weight: lighter;font-size: 20px;color: #6b7280">
            Information about Categories and sub-categories present in the Restaurant
        </h1>
        <div class="flex justify-between mx-10  flex-wrap">

            {{--    @foreach ($categories as $category)--}}
            <div
                class="m-5 p-5 rounded-3xl bg-white shadow-lg hover:shadow-2xl flex justify-between flex-col w-56 text-center">

                <i class="fa-solid fa-list fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Total number <br>of
                    categories
                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_categories}}</div>
            </div>
            <div
                class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-56 text-center">
                <i class="fa-solid fa-list-1-2 fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Total number <br>of
                    sub categories
                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_subcategories}}</div>
            </div>
            {{--    @endforeach--}}
        </div>
        <div>
            <canvas id="myChart1" style="width:100%;margin: 20px"></canvas>

            <script>
                let cNames = [];
                let cValues = [];
                Chart.defaults.font.family = "'Outfit', sans-serif";
                Chart.defaults.font.size = 15;

                @foreach ($subcategories as $sub_category)
                cNames.push("{{$sub_category->subcategory_name}}");
                cValues.push({{$sub_category->counts}});
                @endforeach

                const max2 = Math.max(...cValues)
                new Chart("myChart1", {
                    type: "bar",

                    data: {
                        datasets: [
                            {
                                data: cValues,
                                label: "Sub Categories",
                                backgroundColor: "black"
                            }],
                        labels: cNames
                    },
                    options: {
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                max: max2 + 1,
                                alignToPixels: true,
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
        <div>
            <canvas id="myChart2" style="width:100%;margin: 20px;display: none"></canvas>

            <script>
                let cNames1 = [];
                let cValues1 = [];
                Chart.defaults.font.family = "'Outfit', sans-serif";
                Chart.defaults.font.size = 15;

                @foreach($categories_aggregate as $category_aggregate)
                cNames1.push("{{$category_aggregate->category_name}}");
                cValues1.push({{$category_aggregate->counts}});
                @endforeach

                const max = Math.max(...cValues1)
                new Chart("myChart2", {
                    type: "bar",

                    data: {
                        datasets: [
                            {
                                data: cValues1,
                                label: "Categories",
                                backgroundColor: "black"
                            }],
                        labels: cNames1
                    },
                    options: {
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                max: max + 1,
                                alignToPixels: true,
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
        <div class="tab">
            <button class="tablinks" onclick="showSubCategories()"> Categories</button>
            <button class="tablinks" onclick="showCategories()"> Sub Categories</button>
        </div>
        <script>
            function showSubCategories() {
                document.getElementById("myChart1").style.display = "block";
                document.getElementById("myChart2").style.display = "none";
            }
            function showCategories(){
                document.getElementById("myChart1").style.display = "none";
                document.getElementById("myChart2").style.display = "block";

            }
        </script>


    </div>

    <div class="m-6">
        <div class="search_bar">
            <div class="cntr">
                <div class="cntr-innr">
                    <label class="search" for="inpt_search">
                        <input id="inpt_search" type="text" />
                    </label>
                </div>
            </div>
        </div>
        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px"> History</h1>

        <p style="font-family: 'Outfit',sans-serif;"> Last records added into the database</p>

        <div class="h-10"></div>
        <table>
            <tr style="margin-bottom:10px">
                <th> Image</th>
                <th> ID</th>
                <th> Name</th>
                <th> Unit Price</th>
                <th> Subcategory Name</th>

            </tr>
            <tr>
                <td></td>
            </tr>
            @foreach ($menus as $menu)

                <tr>
                    <td class="rounded-full bg-[#ffffff]"></td>
                    <td> {{$menu->id}}</td>

                    <td style=""> {{$menu->name}}</td>
                    <td> {{$menu->unit_price}}</td>
                    <td> {{$menu->subcategory_name}}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


</body>
</html>
