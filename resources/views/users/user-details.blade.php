<section class="dash_main tabcontent" id="main-1">

    <div class="user_preview">
        <div class="dash_image-container">
            <img src="{{URL::asset('/image/foods/burger.jpg')}}" alt="">
        </div>

        <div class="title-card">
            <div>
                <h1>
                    {{session('userName')}}
                </h1>
            </div>
            <div>
                <span style="display: flex; justify-content: space-between">
                    <h3 style="margin-top: 15px; margin-right: 10px;">Heaven's Taste Occupation :</h3>
                    <h2>{{session('userRole')}}</h2>
                </span>
                <span style="display: flex; justify-content: space-evenly">
                    <h3 style="margin-top: 15px; margin-right: 10px;">Nickname :</h3>
                    <h2>{{session('nickname')}}</h2>
                </span>
            </div>
        </div>
    </div>

    <div class="user_details">
        <div class="email_password">
            <div><h2 style="color: whitesmoke;">My Specifics:</h2></div>
            <span style="display: flex; justify-content: space-evenly;">
                <h3 style="margin-top: 3px; margin-right: 10px;">Email : </h3>
                <h2 style="margin-left: 10px">{{session('email')}}</h2>
            </span>
            <span style="display: flex; justify-content: space-between">
                <h3 style="margin-top: 3px; margin-right: 10px;">Phone Number : </h3>
                <h2>{{session('phoneNumber')}}</h2>
            </span>
            <span style="display: flex; justify-content: space-evenly">
                <h3 style="margin-top: 3px; margin-right: 10px;">Location : </h3>
                <h2>Nairobi</h2>
            </span>
        </div>

        <div class="payment_methods">
            <div class="wallet_container"
                 style="width: 400px; margin-bottom: 10px; margin-left: 20px; height: 150px; background-color: #1c7430; border-radius: 20px; padding: 10px; border: 2px solid #4a271d">
                <div class="wallet">
                    <h2 style="color: whitesmoke">Heaven's Gold:</h2>
                    <h1>KES 0.00</h1>
                </div>
            </div>

            <div class="methods" style="display: flex;">
                <span class="cash" style="margin: 0 20px;">
                    <div class="cash_container"
                         style="width: 200px; height: 150px; background-color: #1c7430; border-radius: 20px; padding: 10px; border: 2px solid #4a271d">
                        <h2 style="color: whitesmoke">Cash</h2>
                        <div><i class="uil uil-bill" style="color: #4a271d"></i></div>
                    </div>
                </span>

                <span class="credit_card" style="margin: 0 20px;">
                    <div class="credit_container"
                         style="width: 200px; height: 150px; background-color: #1c7430; border-radius: 20px; padding: 10px; border: 2px solid #4a271d">
                        <h2 style="color: whitesmoke">Credit Card</h2>
                        <div><i class="uil uil-credit-card" style="color: #4a271d"></i> 01-xxxxxx-2332</div>
                    </div>
                </span>
            </div>
        </div>
    </div>
</section>
