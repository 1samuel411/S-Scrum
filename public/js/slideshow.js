var slideIndex = -1;
var slideElements = document.getElementsByClassName("slideshow");
var dots = document.getElementsByClassName("dot");

slideshow();


var timeout;

function slideshow()
{
    slideElements = document.getElementsByClassName("slideshow");
    dots = document.getElementsByClassName("dot");
    var i;

    changeSlide();
    
    timeout = setTimeout(slideshow, 4000);
}

function changeSlide()
{
    for(i = 0; i < slideElements.length; i++)
    {
        slideElements[i].style.display = "none";
    }
    for(i = 0; i < dots.length; i++)
    {
        //dots[i].blur();
    }

    slideIndex++;
    if(slideIndex >= slideElements.length)
    {
        slideIndex = 0;
    }
    
    //dots[slideIndex].focus();
    slideElements[slideIndex].style.display = "block";
}

function setSlide(x)
{
    slideIndex = x - 1;

    changeSlide();

    clearTimeout(timeout);
    timeout = setTimeout(slideshow, 4000);
}