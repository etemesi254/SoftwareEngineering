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

    <div class="m-6">

        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: #ff7720">
            Dashboard
        </h1>


    </div>


    <div style="width: 500px;border-left: solid 1px rgba(0,0,0,0.1);height: 100%" class="px-6 my-6">
        <div style="display: flex;justify-content: space-between;margin-bottom: 30px">
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px">
                Hello <span style="color:#FF9F1C"> {{$user->name}}</span>
            </h1>
        </div>
        <div class="avatar-image">
            <div style="margin: auto;border-radius: 9999px;background-color: #1b171d;width: 100px;height: 100px"></div>
        </div>

        <div style=" display: flex;justify-content: flex-end;flex-direction: column;">
            <h3>email:{{$user->email}}</h3>
        </div>
    </div>

</div>


</body>
</html>
