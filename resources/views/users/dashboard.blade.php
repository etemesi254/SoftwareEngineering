<!doctype html>
<html lang="en">
<head>
    <title>Heavens Taste: User Dashboard</title>
    <x-header-tag></x-header-tag>
</head>
<body>
<x-header></x-header>

<section class="dash navigation">
    <span class="dash_nav__item">
        <a title="{{session('userName')}}'s Home"
           style="cursor: pointer;" id="defaultOpen" class="tablinks" onclick="switchcommon(event, 'main-1')">
            <i class="uil uil-estate"></i>
        </a>
    </span>
    <span class="dash_nav__item">
        <a title="{{session('userName')}}'s Orders"
           style="cursor: pointer;" id="defaultOpen" class="tablinks" onclick="switchcommon(event, 'main-2')">
            <i class="uil uil-shopping-bag"></i>
        </a>
    </span>
    <span class="dash_nav__item">
        <a title="{{session('userName')}}'s Settings"
           style="cursor: pointer;" class="tablinks" onclick="switchcommon(event, 'main-3')">
            <i class="uil uil-setting"></i>
        </a>
    </span>
</section>

@include('users.user-details')
@include('users.user-orders')
@include('users.user-settings')

<script>
    function switchcommon(evt, mainName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(mainName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>
