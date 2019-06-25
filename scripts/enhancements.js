$(document).ready(function(){
  $("input[type=text]").focus(function () {
    $(this).animate({ width: "360px" }, 100);
});
$(this).focusout(function () {
    $("input[type=text]").animate({ width: "230px" }, 100);
});
$("input[type=textbox]").focus(function () {
    $(this).animate({ width: "360px" }, 100);
});
$(this).focusout(function () {
    $("input[type=textbox]").animate({ width: "230px" }, 100);
});


function redirectUser(){
alert("Time over, please try again");
window.location.replace("jobs.php");
}




function warnUser(){

alert("You have 2 minutes more to fill the form");
setTimeout(redirectUser, 30000);
}

setTimeout(warnUser, 30000);


});
