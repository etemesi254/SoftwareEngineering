@extends('layout')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" type="text/css">
    <body class="relative bg-white-mg-20">
    <br><br>
    <div class="cont content-center flex m-auto">
        <form id="login" class="form sign-in" style="margin-left: 20%" action="/login-post" method="post">
            @csrf
            <h2>Welcome</h2>
            <label>
                <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Email</span>
                <input type="email" name="email" required/>
            </label>
            <label>
                <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Password</span>
                <input type="password" name="password" required/>
            </label>
            <p class="forgot-pass text-black" style="font-family: 'Outfit',sans-serif">Forgot password?</p>

            @if($errors->any())
                <h4 class="m-auto p-2 f text-rose-500 text-center"
                    style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
            @endif
            <button type="submit" class="submit">Sign In</button>

        </form>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <h3>Don't have an account? Please Sign up!</h3>
                </div>
                <div class="img__text m--in">

                    <h3>If you already have an account, just sign in.</h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <form id="sign_up" class="form sign-up p-3" method="post" action="/sign-up-post">
                @csrf
                <h2>Create your Account</h2>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Username</span>
                    <input type="text" name="username"/>
                </label>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Password</span>
                    <input type="password" name="password"/>
                </label>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Full name</span>
                    <input type="text" name="full_name"/>
                </label>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Telephone</span>
                    <input type="text" name="telephone"/>
                </label>
                <label>
                    <span class="text-black text-base" style="font-family: 'Outfit',sans-serif">Date of Birth</span>
                    <input type="date" name="dob"/>
                </label>
                @if($errors->any())
                    <h4 class="m-auto p-2 f text-rose-500 text-center"
                        style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
                @endif
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        if (params.has('window')) {
            const value = params.get('window');
            if (value !== 'login') {
                document.querySelector('.cont').classList.toggle('s--signup');
            }
        } else {
            document.querySelector('.cont').classList.toggle('s--signup');
        }

        document.querySelector('.img__btn').addEventListener('click', function () {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
    </body>
@endsection
