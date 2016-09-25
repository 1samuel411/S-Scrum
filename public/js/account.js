var messages = 
    [
         "Please enter your information",
         "Logging in...", 
         "Success!", 
         "Password or username cannot be found.", 
         "Password must have,<br><ul><li>6-20 Characters</li><li>One number</li></ul>",
         "Passwords do not match",
         "Creating your account..."
    ];

function displayMessage(x)
{
    document.getElementById("information").innerHTML = messages[x];
}

function validateInfo()
{
    var formPass = document.forms["accountFormRegister"]["password"].value;
    var formPassConfirm = document.forms["accountFormRegister"]["confirm_password"].value;
    if(formPass.length < 6 || formPass.length > 20)
    {
        displayMessage(4);
        return false;
    }
    if(!/\d/.test(formPass))
    {
        displayMessage(4);
        return false;
    }
    if(formPass != formPassConfirm)
    {
        displayMessage(5);
        return false;
    }
    displayMessage(6);
}
document.getElementById("information").innerHTML = messages[0];