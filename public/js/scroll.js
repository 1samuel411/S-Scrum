function scollToLocation(x)
{
    if(window.location.pathname == "/")
    {
        $('html, body').animate({
            scrollTop: $("#" + x).offset().top
        }, 900);
    }
    else
    {
        window.location.href = "/";
        $('html, body').animate({
            scrollTop: $("#" + x).offset().top
        }, 900);
    }
}