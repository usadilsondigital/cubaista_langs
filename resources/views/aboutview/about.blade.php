@extends('layouts.layout')

@section('css')
    * {box-sizing: border-box;}
    input[type=text], select, textarea {width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;margin-top: 6px;margin-bottom: 16px;resize: vertical;}
    input[type=submit] {background-color: #04AA6D;color: white;padding: 12px 20px;border: none;border-radius: 4px;cursor: pointer;}
    input[type=submit]:hover {background-color: #45a049;}

    //Flip card
    .flip-card {background-color: transparent;width: 300px;height: 200px;border: 1px solid #f1f1f1;perspective: 1000px; /* Remove this if you don't want the 3D effect */}
    /* This container is needed to position the front and back side */
    .flip-card-inner {position: relative;width: 100%;height: 100%;text-align: center;transition: transform 0.8s;transform-style: preserve-3d;}
    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {transform: rotateY(180deg);}
    /* Position the front and back side */
    .flip-card-front, .flip-card-back {width: 100%;height: 100%;-webkit-backface-visibility: hidden; /* Safari */backface-visibility: hidden;}
    .flip-card-back{position: absolute;top: 0px;}
    /* Style the front side (fallback if image is missing) */
    .flip-card-front {/*background-color: #bbb;*/color: black;}
    /* Style the back side */
    .flip-card-back {/*background-color: dodgerblue;*/color: black;transform: rotateY(180deg);}

    /*BUTTON TOP*/
    #myBtn {display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;border: none;outline: none;background-color: red;color: white;cursor: pointer;padding: 15px;border-radius: 4px;}
@endsection

@section('current')
    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.about') }}</li>
@endsection

@section('content')
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <div id="aboutDiv" class="card text-center">
        <div class="card-body">
            <h5 class="card-title"> {{ __('messages.about') }} {{ __('messages.our') }} {{ __('messages.company') }}</h5>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="/storage/img_avatar.png" alt="Avatar" style="width:300px;height:150px;">
            </div>
            <div class="flip-card-back">
                <h1>{{ $about->title}}</h1>
                <p> </p>
                <p>{{ $about->body}}</p>
            </div>
        </div>
    </div>

    <h3>        
        Committed to significantly improving the lives of as many people as possible
    </h3>
    <br/>

    <div id="contactDiv" class="card text-center">
        <div class="card-body">
            <h5 class="card-title"> {{ __('messages.contact') }} {{ __('messages.form') }}</h5>
        </div>
    </div>


    <div>
        <form action="/action_page.php">
            <label for="fname">{{ __('messages.full') }} {{ __('messages.name') }}</label>
            <input type="text" id="fullname" name="fullname" placeholder="{{ __('messages.your') }} {{ __('messages.name') }} .." autocomplete="off" required>

            <label for="email">{{ __('messages.email') }}</label>
            <input type="text" id="email" name="email" placeholder="{{ __('messages.your') }} {{ __('messages.email') }} .." autocomplete="off" required>

            <label for="country">{{ __('messages.country') }}</label>
            <select id="country" name="country" required>
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
            </select>

            <label for="subject">{{ __('messages.subject') }}</label>
            <textarea id="subject" name="subject" placeholder="{{ __('messages.write') }} {{ __('messages.something') }} .." style="height:200px" autocomplete="off"
                required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
@endsection

@section('script_end')
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    } else {
    mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }
@endsection
