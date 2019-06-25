/**
* Assignment part 2
*/
"use strict";


/**
* Function to load values
*/

function applyForJob1()
{
		localStorage.jobId=document.getElementById("job1").innerHTML;

}

function applyForJob2()
{
		localStorage.jobId=document.getElementById("job2").innerHTML;

}



function init () {


var applyButton1 = document.getElementById("b1");
var applyButton2 = document.getElementById("b2");
applyButton1.onclick = applyForJob1;
applyButton2.onclick = applyForJob2;
}

window.onload = init;
