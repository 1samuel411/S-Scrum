document.onreadystatechange = function()
{
    var state = document.readyState;
    if(state == 'interactive')
    {
        $("#header").fadeOut(0);
        $("#contents").fadeOut(0);
    } 
    else if(state == 'complete')
    {
        setTimeout(function()
        {
            $("#loadingBar").fadeOut();

            $("#header").fadeIn();
            $("#contents").fadeIn();
        });
    }
}