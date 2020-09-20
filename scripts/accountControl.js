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
    return !failed;
}

function validatePupilSearch() {
    var fname = document.getElementsByName("pupilfname")[0].value
    var sname = document.getElementsByName("pupilsname")[0].value
    var failed = false;
    if(!fname){
        document.getElementById("ername").innerHTML = "No first name entered";
        failed = true;
    }
    if(!sname){
        document.getElementById("ersurname").innerHTML = "No surname entered";
        failed = true;
    }
    else{
        return !failed
    }  
}

function validatePupilReg() {
    var fname = document.getElementsByName("fnameInput")[0].value
    var sname = document.getElementsByName("snameInput")[0].value
    var sex = document.getElementsByName("sexInput")[0].value
    var dob = document.getElementsByName("dobInput")[0].value
    var form = document.getElementsByName("formInput")[0].value
    var year = document.getElementsByName("yearInput")[0].value
    var failed = false;
    if(!fname){
        document.getElementById("erfirstname").innerHTML = "No first name entered";
        failed = true;
    }
    if(!sname){
        document.getElementById("ersurname").innerHTML = "No surname entered";
        failed = true;
    }
    if(!sex){
        document.getElementById("ersex").innerHTML = "No sex entered";
        failed = true;
    }
    if(!dob){
        document.getElementById("erdob").innerHTML = "No date of birth entered";
        failed = true;
    }
    if(!form){
        document.getElementById("erform").innerHTML = "No date of birth entered";
        failed = true;
    }
    if(!year){
        document.getElementById("eryear").innerHTML = "No date of birth entered";
        failed = true;
    }
    else{
        return !failed
    }  
}

function validateIntervention() {
    var intType = document.getElementsByName("intType")[0].value
    var desc = document.getElementsByName("descInput")[0].value
    var intDate = document.getElementsByName("passwordInput")[0].value
    var failed = false;
    if(!school){
        document.getElementById("ertype").innerHTML = "No type entered";
        failed = true;
    }
    if(!desc){
        document.getElementById("erdesc").innerHTML = "No description entered";
        failed = true;
    }
    if(!intDate){
        document.getElementById("erdate").innerHTML = "No date entered";
        failed = true;
    }
    return !failed;
}

function validateBehaviour() {
    var incType = document.getElementsByName("incType")[0].value
    var descInput = document.getElementsByName("descInput")[0].value
    var incDate = document.getElementsByName("incDate")[0].value
    var failed = false;
    if(!incType){
        document.getElementById("ertype").innerHTML = "No type entered";
        failed = true;
    }
    if(!incDate){
        document.getElementById("erdate").innerHTML = "No date entered";
        failed = true;
    }
    if(!descInput){
        document.getElementById("erdesc").innerHTML = "No description entered";
        failed = true;
    }
    return !failed;
}