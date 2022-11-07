<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavens Taste Administrator - Orders Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Outfit&display=swap" rel="stylesheet">
    <link href="{{asset("css/app.css")}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset("favicon_io/favicon.ico")}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
            integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background-color: rgba(107,162,146,0.1)">

<div class="flex h-full">
    <x-panel></x-panel>

    <div style="width: 37%"></div>

    <div class="m-6 w-full">

        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: #ff7720">
            Dashboard
        </h1>
        <h1 style="font-family:'Outfit',sans-serif;font-weight: lighter;font-size: 20px;color: #6b7280">
            Information about orders were made
        </h1>
        <div class="flex justify-between mx-10  flex-wrap">

            {{--    @foreach ($categories as $category)--}}
            <div style="background-color: rgba(230,96,1,0.2)"
                 class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col w-48 text-center">

                <i class="fa-solid fa-hand-holding-dollar fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">Total number <br>of
                    Sales
                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_sales}}</div>
            </div>
            <div style="background-color: rgba(230,96,1,0.2)"
                 class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-48 text-center">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Amount made

                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_price}}</div>
            </div>

            <div style="background-color: rgba(230,96,1,0.2)"
                 class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-48 text-center">
                <i class="fa-solid fa-chart-line fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Best seller

                </div>
                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $best_seller->name}}</div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $best_seller->max_ordered}}</div>
            </div>

            <div style="background-color: rgba(230,96,1,0.2)"
                 class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-48 text-center">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl my-5"></i>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Average totals per sale

                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $avg}}</div>
            </div>

        </div>
        <div>

            <div style="width: 95%;">
                <canvas id="myChart1" style="width:100%;margin: 30px"></canvas>

                <script>
                    let cNames = [];
                    let cValues = [];
                    Chart.defaults.font.family = "'Outfit', sans-serif";
                    Chart.defaults.font.size = 15;

                    @foreach ($orders as $order)
                    cNames.push("{{$order->name}}");
                    cValues.push({{$order->total}});
                    @endforeach

                    const max2 = Math.max(...cValues)
                    new Chart("myChart1", {
                        type: "bar",

                        data: {
                            datasets: [
                                {
                                    data: cValues,
                                    label: "Orders",
                                    backgroundColor: "#ff7720"
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



            <div style="width: 95%;">
                <canvas id="myChart2" style="width:100%;margin: 30px;display: none"></canvas>

                <script>
                    Chart.defaults.font.family = "'Outfit', sans-serif";
                    Chart.defaults.font.size = 15;


                    new Chart("myChart2", {
                        type: "line",

                        data: {
                            datasets: [
                                {
                                    data: cValues,
                                    label: "Orders",
                                    backgroundColor: "#ff7720"
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
                <button class="tablinks" onclick="showSubCategories()"> Bar Chart</button>
                <button class="tablinks" onclick="showCategories()"> Line Chart</button>
            </div>
            <script>
                function showSubCategories() {
                    document.getElementById("myChart1").style.display = "block";
                    document.getElementById("myChart2").style.display = "none";
                }

                function showCategories() {
                    document.getElementById("myChart1").style.display = "none";
                    document.getElementById("myChart2").style.display = "block";

                }
            </script>


        </div>


    </div>

    <x-side-bar></x-side-bar>

</div>


</body>
</html>
