function validateLogin() {
    var school = document.getElementsByName("schoolInput")[0].value
    var username = document.getElementsByName("usernameInput")[0].value
    var password = document.getElementsByName("passwordInput")[0].value
    var failed = false;
    if(!school){
        document.getElementById("erschool").innerHTML = "No school entered";
        failed = true;
    }
    if(!username){
        document.getElementById("eruser").innerHTML = "No username entered";
        failed = true;
    }
    if(!password){
        document.getElementById("erpass").innerHTML = "No password entered";
        failed = true;
    }
    if(failed){
        return failed;
    }
    return failed;
}