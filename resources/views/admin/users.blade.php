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
<div  class="w-50 h-10 bg-[#00000]">

</div>
<div class="flex h-full">
    <div class="panel">


    </div>
    <div class="m-6">
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
                    Users
                </div>

                <div
                    style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_users}}</div>
            </div>

            {{--    @endforeach--}}
        </div>
        <div>
            <canvas id="myChart" style="width:100%;margin: 20px"></canvas>

            <script>
                let cNames = [];
                let cValues = [];
                Chart.defaults.font.family = "'Outfit', sans-serif";
                Chart.defaults.font.size = 15;

                @foreach ($users as $user)
                cNames.push("{{$user->username}}");
                cValues.push({{$user->quantity}});
                @endforeach

                const max = Math.max(...cValues)
                new Chart("myChart", {
                    type: "bar",

                    data: {
                        datasets: [
                            {
                                data: cValues,
                                label: "Users",
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
    </div>
</div>

</body>
</html>
