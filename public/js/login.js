let condition = true;

document.getElementById("icon-password").onclick = function()
{
    if(condition)
    {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("icon-password").setAttribute("class", "fa fa-eye");
        condition = false;
    }
    else
    {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("icon-password").setAttribute("class", "fa fa-eye-slash");
        condition = true;
    }
}
