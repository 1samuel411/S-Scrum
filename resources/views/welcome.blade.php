@extends ('layout')

@section('content')

<div class = "slideshow-container" id = "slideshow"  style = "text-align:center">
    <div class = "slideshow">
        <img class = "slideshow-image" src = "/images/slideshow/slideshow_1.jpg">
        <div class = "caption">Agile Development can speed up your project significantly!</div>
    </div>
    <div class = "slideshow">
        <img class = "slideshow-image" src = "/images/slideshow/slideshow_2.jpg">
        <div class = "caption">Keep the project focused!</div>
    </div>
    <div class = "slideshow">
        <img class = "slideshow-image" src = "/images/slideshow/slideshow_3.jpg">
        <div class = "caption">Hit your milestones 100% of the time!</div>
    </div>
</div>

<div style = "text-align:center">
    <button class="dot" onclick="setSlide(0)"></button>
    <button class="dot" onclick="setSlide(1)"></button>
    <button class="dot" onclick="setSlide(2)"></button>
</div>

<script src = "/js/slideshow.js"></script>

<div class = "bar">
    <div style="float:left; width: 25%; margin-left:25px">
        <div class = "quoteBody division">
            "Totally helped!"<br>
        </div>

        <div class = "quoteTitle">
            Jan the man, Inside Sales
        </div>
    </div>

    <div style="float:left; width: 32%;">
        <div class = "quoteBody division">
            "We're back on track to finishing this project!"
        </div>

        <div class = "quoteTitle">
            Keith, Northeast Regional
        </div>
    </div>
    <div style="float:left; width: 38%;">
        <div class = "quoteBody division">
            "We were able to finish the project a month ahead of the deadline!"
        </div>

        <div class = "quoteTitle">
            Doug, Shadowing Keith
        </div>
    </div>
</div>
<div id = "about" name = "about" style = "padding-top: 30px;">
</div>
<div class = "about" id = "about" name = "about">
    <h1 >What are we?</h1>
    <p>We are a <b>project management</b> solution that can fit to fit any of your production needs!</p>
    <p>Use our next generation tools to produce apps in lightning speed and effeciency.</p>

    <ul>
        <li style = "margin-left:20%; margin-top:5px;">Exponentially increase your production speed!</li>
        <li style = "margin-left:20%; margin-top:5px;">Amazing tools to make your development team into killers, of deadlines that is. or is it...</li>
        <li style = "margin-left:20%; margin-top:5px;">Encourage and improve communication.</li>
        <li style = "margin-left:20%; margin-top:5px;">Gives your team the advantage in development.</li>
        <li style = "margin-left:20%; margin-top:5px;">Created by developers, for developers.</li>
    </u>
</div>

<hr>

<div id = "contact" name = "contact" style = "padding-top: 30px;">
<div class = "contact">
    <h1>Contact Us</h1>
    <p>Feel free to contact us for any questions, support, or suggestions!</p>
    <p>Fill the form out and hit submit, we'll be back to you as soon as possible</p>

    <form method="POST" action="/send" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Name:<br>
        <input type = "text" name = "name" required><br>
        Email:<br>
        <input type = "email" name = "email" required><br>
        Message:<br>
        <textarea class = "message" type = "text" name = "message" required></textarea><br>

        <input class = "send" type = "submit" value = "Send">
    </form>
    <p id = "success" style = "text-align:center; padding-left:50px;">
    @if(isset($sent))
        @if($sent)
            Success.
        @else
            Failed.
        @endif
    @endif
    </p>
</div>
@stop