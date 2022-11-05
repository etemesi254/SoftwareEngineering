<div style="height: 90%">

    <link href="{{asset("css/panel.css")}}" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>

    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div style="display: flex;flex-direction: column;
    justify-content: space-between;
    height: 90%;">
        <div class="panel-maintext">
            <a href="/admin">
                Heavens Taste Administrator Dashboard
            </a>
        </div>
        <a class="panel-action" href="/">
            <span class="material-symbols-outlined">home</span>
            <span class="panel-action-text">Home Page</span>
        </a>

        <a class="panel-action" href="/admin/add_categories">
            <span class="material-symbols-outlined">add_circle</span>
            <span class="panel-action-text">Add Menu Category</span>
        </a>

        <a class="panel-action" href="/admin/view_users">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="panel-action-text">View Users Table</span>
        </a>


        <a class="panel-action" href="/admin/add_menu">
            <span class="material-symbols-outlined">add_shopping_cart</span>
            <span class="panel-action-text">Add Product</span>
        </a>
        <a class="panel-action" href="/admin/categories_dashboard">
            <span class="material-symbols-outlined">inventory</span>
            <span class="panel-action-text">View Categories Dashboard</span>
        </a>
        <a class="panel-action" href="/kitchenView">
            <span class="material-symbols-outlined">list_alt</span>
            <span class="panel-action-text">Kitchen Orders</span>
        </a>
        <a class="panel-action" href="order_fulfilled.php">
            <span class="material-symbols-outlined">grading</span>
            <span class="panel-action-text">View Fulfilled Orders</span>
        </a>
        <div class="panel-action">
            <span class="material-symbols-outlined">insights</span>
            <span class="panel-action-text">Transactions</span>
        </div>
        <a href="/logout" class="panel-bottom panel-action">
            <span class="material-symbols-outlined">logout</span>
            <span class="panel-action-text">Logout</span>
        </a>


    </div>

</div>
