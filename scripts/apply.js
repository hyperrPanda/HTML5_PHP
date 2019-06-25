/**
* Assignment part 2
*/
"use strict";


/**
* Function to check form values
*/

function checkValues(){
resetvalues();
var userMsg = "";
var flag = true;
var selectedState = getState();
var dateOfBirth = document.getElementById("dob").value;



if(!(checkTextArea()))
{
	flag= false;
}
if(!dateOfBirth.match(/^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/][0-9][0-9][0-9][0-9]$/ ))
{
 document.getElementById("error-date").innerHTML = "Please Enter Date in Correct dd/mm/yyyy format";
 document.getElementById("error-msg").innerHTML = "Please Check Entered Data Again";
flag = false;
}
if(!(checkAgeGroup(dateOfBirth)))
 {
	 document.getElementById("error-date").innerHTML = "Sorry, your age group cant apply";
		document.getElementById("error-msg").innerHTML = "Please Check Entered Data Again";
		flag= false;
 }
if(!(checkStatePostCode(selectedState)))
{
	 document.getElementById("error-msg").innerHTML = "Please Check Entered Data Again";
	 document.getElementById("error-state").innerHTML = "State do not match with post code";
	document.getElementById("error-code").innerHTML = "Post code do not match with state";
  flag = false;
}


if(userMsg != "")
{alert(userMsg);}
if(flag)
{storeDetails();}
return flag;
}

function storeDetails()
{
sessionStorage.firstName = document.getElementById("fname").value;
sessionStorage.lastName= document.getElementById("lname").value;
sessionStorage.dob= document.getElementById("dob").value;
sessionStorage.gender= applicantGender();
sessionStorage.address= document.getElementById("address").value;
sessionStorage.town= document.getElementById("town").value;
sessionStorage.state= getState();
sessionStorage.postCode= document.getElementById("pcode").value;
sessionStorage.email= document.getElementById("email").value;
sessionStorage.phoneNumber=  document.getElementById("pnumber").value;
sessionStorage.skill= storeSkills();

}

function applicantGender()
{
var gender= "";
var male = document.getElementById("male");
if(male.checked)
{gender="male";}
else {
	gender ="female";}
return gender;

}

function checkTextArea()
{
	var flag= true;
var otherSkill = document.getElementById("os");
	if(otherSkill.checked)
	{
		var textArea= document.getElementById("otherskillsarea").value;
		if (textArea=="")
		{
			flag = false;
			document.getElementById("error-msg").innerHTML = "Please Check Entered Data Again";
			document.getElementById("error-skill").innerHTML = "Please fill other skills text";
		}
	}
return flag;
}

function checkStatePostCode(selectedState)
{
	var tmpflag = true;
var postCode = document.getElementById("pcode").value;
var firstDigit = postCode.charAt(0);
switch(selectedState){
case "2":
if (!(firstDigit== 3 || firstDigit== 8) ){tmpflag= false; }
break;
case "3":
if (!(firstDigit== 1|| firstDigit== 2) ){tmpflag= false; }
break;
case "4":
if (!(firstDigit== 4 || firstDigit== 9) ){tmpflag= false; }
break;
case "5":
if (!(firstDigit== 0) ){tmpflag= false; }
break;
case "6":
if (!(firstDigit== 6) ){tmpflag= false; }
break;
case "7":
if (!(firstDigit== 5) ){tmpflag= false; }
break;
case "8":
if (!(firstDigit== 7) ){tmpflag= false; }
break;
case "9":
if (!(firstDigit== 0) ){tmpflag= false; }
break;
default:
tmpflag= true;
}
return tmpflag;
}

function checkAgeGroup(dateOfBirth)
{
	var ageGroupFlag = true;
	var formdate= new Date(dateOfBirth);
	var currentdate = new Date();
	var formyear = formdate.getFullYear();
	var currentyear = currentdate.getFullYear();
	if((formyear>currentyear-15)||(formyear<currentyear-80))
	{
		 ageGroupFlag = false;
	 }
	 return ageGroupFlag;
}

function resetvalues()
{
	document.getElementById("error-date").innerHTML = "";
	 document.getElementById("error-msg").innerHTML = "";
	 document.getElementById("error-state").innerHTML = "";
	 document.getElementById("error-code").innerHTML = "";
	 document.getElementById("error-skill").innerHTML = "";
}

function getState()
{
var stateName ="";
var stateArray = document.getElementById("state")
stateName = stateArray[stateArray.selectedIndex].value;
return stateName;
}


function loadSessionData()
{

if(!(sessionStorage.firstName==""))
{

 document.getElementById("fname").value =	sessionStorage.firstName;
 document.getElementById("lname").value = 	sessionStorage.lastName;
	document.getElementById("dob").value = sessionStorage.dob;
 	fillGender();
	document.getElementById("address").value = 	sessionStorage.address;
  document.getElementById("town").value = 	sessionStorage.town;
	fillState();
	document.getElementById("pcode").value = sessionStorage.postCode;
	document.getElementById("email").value = sessionStorage.email;
  document.getElementById("pnumber").value = 	sessionStorage.phoneNumber;
	fillSkill();

}}


function fillSkill()
{
	var skillArray = document.getElementById("category").getElementsByTagName("input");
 if((sessionStorage.skill1 != undefined) && (sessionStorage.skill1 !==""))
{skillArray[0].checked=true;}
if((sessionStorage.skill2 != undefined) && (sessionStorage.skill2 !==""))
{skillArray[1].checked=true;}
if((sessionStorage.skill3 != undefined) && (sessionStorage.skill3 !==""))
{skillArray[2].checked=true;}
if((sessionStorage.skill4 != undefined) && (sessionStorage.skill4 !==""))
{skillArray[3].checked=true;}
if((sessionStorage.skill5 != undefined) && (sessionStorage.skill5 !==""))
{skillArray[4].checked=true;}
if((sessionStorage.skill6 != undefined) && (sessionStorage.skill6 !==""))
{skillArray[5].checked=true;
document.getElementById("otherskillsarea").innerHTML= sessionStorage.skill6
}
}

function storeSkills()
{
if(sessionStorage.skill)
{cleanup();}


var skills = false;
var skillArray = document.getElementById("category").getElementsByTagName("input");
if(skillArray[5].checked)
{
sessionStorage.skill6= document.getElementById("otherskillsarea").value;

}

for(var i =0; i<skillArray.length-1; i++)
{
if(skillArray[i].checked)
{

	switch (i) {
		case 0:
	 sessionStorage.skill1= "html";
			break;
			case 1: sessionStorage.skill2= "css";
				break;
				case 2: sessionStorage.skill3= "javascript";
					break;
					case 3: sessionStorage.skill4= "php";
						break;
						case 4: sessionStorage.skill5= "mysql";
							break;

		default:
var i=0;
	}}


skills = true;
	}

	return skills;
}

function cleanup()
{
sessionStorage.skill1="";
sessionStorage.skill2="";
sessionStorage.skill3="";
sessionStorage.skill4="";
sessionStorage.skill5="";
sessionStorage.skill6="";
}
function loadLocalData()
{

	if (!(localStorage.jobId==""))
	{
		document.getElementById("jnumber").value = localStorage.jobId;
		document.getElementById("jnumber").disabled = true;
		localStorage.jobId="";
	}
}



function fillGender()
{
if(sessionStorage.gender=="male")
{
	document.getElementById("male").checked= true;
}
else {
	document.getElementById("female").checked= true;
}

}
function fillState()
{
	var stateArray = document.getElementById("state")
switch (sessionStorage.state) {
	case "2":	  document.getElementById("state").selectedIndex= "1";
		break;
		case "3":	  document.getElementById("state").selectedIndex= "2";
			break;
			case "4":	  document.getElementById("state").selectedIndex= "3";
				break;
				case "5":	  document.getElementById("state").selectedIndex= "4";
					break;
					case "6":	  document.getElementById("state").selectedIndex= "5";
						break;
						case "7":	  document.getElementById("state").selectedIndex= "6";
							break;
							case "8":	  document.getElementById("state").selectedIndex= "7";
								break;
								case "9":	  document.getElementById("state").selectedIndex= "8";
									break;
	default:

}

}



function init () {


document.getElementById("otherskillsarea").innerHTML="";
var applyForm = document.getElementById("applyform");

var resetButton = document.getElementById("resetbutton");
resetButton.onclick = resetvalues;
if (sessionStorage.firstName != undefined)
{
	loadSessionData();
}

if (localStorage.jobId != undefined)
{
	loadLocalData();

}

}

window.onload = init;
