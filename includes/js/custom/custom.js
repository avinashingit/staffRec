/*****************************************************

File name: custom.js

Author: Avinash Kadimisetty

File description : This file contains all the required javascript functions for application

Date of creation : 21-03-2015

Revisions:  0.1 22.03.2015
			0.2 26.03.2015
			0.3 01.04.2015


********************************************************/

/***************************    Generic functions        ****************/

function checkData(data)
{
	data=data.trim();
	if(data==12)
	{
		alert("Database error");
	}
	else if(data==000)
	{
		alert("You have already submitted the application.");
	}
	else if(data==9)
	{
		alert("Please login to continue");
		window.location.href="index.php";
	}
	else if(data==16)
	{
		alert("Invalid input");
	}
	/*else if(data.isNan()==1)
	{
		//error occurred
	}*/
	else if(data==19)
	{
		alert("Empty fields are present in the form");
	}
	else if(data==20)
	{
		alert("Username is already taken");
	}
	else if(data==21)
	{
		alert("Email is already registered");
	}
	else if(data==23)
	{
		alert("Username and password combination don't match.");
	}
	else if(data==24)
	{
		alert("Please confirm your identity to continue");
	}
	else if(data==999)
	{
		alert("Do not fiddle with the portal");
		window.location.href='index.php';
	}
	else if(data==101)
	{
		alert("Please check your phone number.");
	}
	else if(data==1001)
	{
		alert("Please check your date of birth");
	}
	else if(data==102)
	{
		alert("Please check your current email id or permanent email");
	}
	else if(data==103)
	{
		alert("Photo should be jpg file");
	}
	else if(data==104)
	{
		alert("Category certificate should be pdf only");
	}
	else if(data==105)
	{
		alert("Disability certificate should be pdf only");
	}
	else if(data==106)
	{
		alert("Year of entry is greater than year of leaving");
	}
	else if(data==107)
	{
		alert("Score given for a scoretype is mismatched");
	}
	else if(data==111)
	{
		alert("Year of entry or year of leaving is not a number.");
	}
	else if(data==112)
	{
		alert("Please check the duration of the course.");
	}
	else if(data==113)
	{
		alert("Please check your from or to date.");
	}
	else if(data==114)
	{
		alert("Interest document should be pdf only.");
	}
	else if(data==115)
	{
		alert("Please check the referee emailId");
	}
	else if(data==116)
	{
		alert("Please check the referee phone.");
	}
	else if(data==140)
	{
		alert("Please enter integers in scores.");
	}
	else
	{
		return 1;
	}
}

function validateDate(e)
{
	var t=e.split("/"),s=[31,28,31,30,31,30,31,31,30,31,30,31],a=[31,29,31,30,31,30,31,31,30,31,30,31];
	if(3!=t.length)
		return -1;
	if(t[1]<1||t[1]>12)
		return-1;
	if(t[2]%4==0)
	{
		if(t[0]<0||t[0]>a[t[1]-1])
			return -1;
	}
	else
	{
		if(t[2]%4!=0)
		{
			if(t[0]<0||t[0]>s[t[1]-1])
				return -1;
		}
		else
		{
			return 1;
		}
		
	}
}
function check_file_image(id)
{
    var suffix=new Array();
    suffix[0]="jpg";
    /*suffix[1]="jpeg";
    suffix[2]="gif";
    suffix[3]="jpg";*/
    var error=1;
    var sFileName=document.getElementById(id).value;
    var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
    // alert(sFileExtension);
    for(var i=0;i<suffix.length;i++)
    {
    	if(sFileExtension==suffix[i])
    	{
    		error=0;
    	}
    }

    if(error==1)
    {
    	alert("Image should be of the specified forms only");
    	document.getElementById(id).value='';
    }
}
function check_file_pdf(id)
{
    var suffix=new Array();
    suffix[0]="pdf";
    var error=1;
    var sFileName=document.getElementById(id).value;
    var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
    for(var i=0;i<suffix.length;i++)
    {
    	if(sFileExtension==suffix[i])
    	{
    		error=0;
    	}
    }

    if(error==1)
    {
    	alert("A file with extension pdf is only accepted.");
    	document.getElementById(id).value='';
    }
}


function check_mobile_number(el,e)
{
	// alert(e.keyCode);
	if(e.keyCode!=8)
	{
		var inputtxt=$(el).val();
		if((inputtxt.length>10))
		{
			alert("Mobile number cannot be more than 10 characters.")  
		}
	}
		
}

/************************        REGISTRATION         ************************/
function register(e)
{
	e.preventDefault();
	var link=$("#registerForm");
	
	var name=link.find("#inputName").val();
	var email=link.find('#inputEmail').val();
	var password=link.find("#inputPassword").val();
	var passwordAgain=link.find("#inputPasswordAgain").val();
	var username=link.find("#inputUsername").val();

	if(password!=passwordAgain)
	{
		alert("Passwords not matching.");
	}
	else
	{
		link.find('button').attr('disabled',"disabled").html('Registering');
		$.post('includes/backend/register.php',{
			_name:name,
			_email:email,
			_username:username,
			_password:password,
			_passwordAgain:passwordAgain
		})
		.error(function(){})
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				alert("Registration done successfully. Please check your email for confirmation.");
				link.find('button').removeAttr('disabled').html('Register');
			}
			else
			{
				link.find('button').removeAttr('disabled').html('Register');
			}
		});
	}
}

function checkIfEmailExists(el)
{
	var email=$(el).val().trim();

	if(email.length!=0)
	{
		$.post('includes/backend/checkIfEmailExists.php',{
			_email:email
		})
		.error()
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				if(data==1)
				{
					$('.emailMessage').html("<i class='fa fa-check'></i>&nbsp;You can carry on to register.").css({'color':'green'});
				}
				else
				{
					$('.emailMessage').html("<i class='fa fa-close'></i>&nbsp;Email is already registered.").css({'color':'#E62727'});
				}
			}
		});
	}
}

function checkIfUsernameExists(el)
{
	var username=$(el).val().trim();
	if(username.length!=0)
	{
		$.post('includes/backend/checkIfUsernameExists.php',{
			_username:username
		})
		.error()
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				if(data==1)
				{
					$('.usernameMessage').html("<i class='fa fa-check'></i>&nbsp;Username is available.").css({'color':'green'});
				}
				else
				{
					$('.usernameMessage').html("<i class='fa fa-close'></i>&nbsp;Username is already taken.").css({'color':'#E62727'});
				}
			}
		});
	}
}


/********************************** Login **********************************/
function login(e)
{
	e.preventDefault();
	var link=$("#loginForm");
	var username=link.find("#inputUsername").val();
	var password=link.find("#inputPassword").val();
	if(username.length==0 || password.length==0)
	{
		alert("Username or password cannot be empty");
	}
	else
	{
		$.post('includes/backend/login.php',{
			_username:username,
			_password:password
		})
		.error()
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				window.location.href="personalDetails.php";
			}
		});
	}
}

function changePassword(e)
{
	e.preventDefault();

	var link=$("#changePasswordForm");

	var op=link.find("#oldPassword").val();
	var np=link.find("#newPassword").val();
	var npa=link.find("#newPasswordAgain").val();

	if(op.length==0 || np.length==0 || npa.length==0)
	{
		alert("Empty fields are not allowed.");
	}
	else
	{
		$.post('includes/backend/changePassword.php',{
			_op:op,
			_np:np,
			_npa:npa
		})
		.error()
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				if(data==1)
				{
					alert("Password successfully changed.");
					window.location.href="index.php";
				}
			}
		});
	}

	
}


/************************  Personal details  **********************/
function fillPersonalDetails(data)
{
	var link=$("#personalDetails");
	link.find("#inputPostApplied").val(data.post);
	link.find("#inputName").val(data.name);
	link.find("#dateOfBirth").val(data.dob);
	link.find("#nationality").val(data.nationality);

	$('input[name=gender]').eq(data.sex-1).prop("checked",true);
	$('input[name=category]').eq(data.category-1).prop("checked",true);
	$('input[name=phd]').eq(data.disabled-1).prop("checked",true);
	$('input[name=exServiceman]').eq(data.service-1).prop("checked",true);
	// console.log(gender);
	// new_data.append("_gender",gender);
	//cateogry
	var categories=document.getElementsByName("category");
	var categoryLength=categories.length;
	var category;
	for(var i=0;i<categoryLength;i++)
	{
		if(categories[i].checked)
		{
			category=categories[i].value;
		}
	}
	// console.log(category);
	// new_data.append("_category",category);
	// new_data.append("_photo",link.find("#photo")[0].files[0])
	//category certificate
	// new_data.append("_categoryCertificate",link.find("#categoryCertificate")[0].files[0]);
	//service man
	var serviceMan=document.getElementsByName("exServiceman");
	var serviceLength=serviceMan.length;
	var service;
	for(var i=0;i<serviceLength;i++)
	{
		if(serviceMan[i].checked)
		{
			service=serviceMan[i].value;
		}
	}
	// console.log(service);
	// new_data.append("_service",service);
	//pd
	var pds=document.getElementsByName("phd");
	var pdsLength=pds.length;
	var disability;
	for(var i=0;i<pdsLength;i++)
	{
		if(pds[i].checked)
		{
			disability=pds[i].value;
		}
	}
	// console.log(disability);
	// new_data.append("_disability",disability);
	//disability certificate
	// new_data.append("_disabilityCertificate",link.find("#disabilityCertificate")[0].files[0]);

	var currentAddress=data.currentAddress.split("$%^");

	link.find("#currentAddressLine1").val(currentAddress[0]);
	link.find("#currentAddressLine2").val(currentAddress[1]);
	link.find("#currentPhone").val(currentAddress[2]);
	link.find("#currentEmail").val(currentAddress[3]);
	

	var permanentAddress=data.permanentAddress.split("$%^");
	link.find("#permanentAddressLine1").val(permanentAddress[0]);
	link.find("#permanentAddressLine2").val(permanentAddress[1]);
	link.find("#permanentPhone").val(permanentAddress[2]);
	link.find("#permanentEmail").val(permanentAddress[3]);
	link.find("#fatherName").val(data.fatherName);

	if(data.photo==1)
	{
		$("#photoUploaded").removeClass("hidden");
	}
	else
	{
		$("#photoUploaded").addClass("hidden");
	}

	if(data.categoryCertificate==1)
	{
		$("#categoryUploaded").removeClass("hidden");
	}
	else
	{
		$("#categoryUploaded").addClass("hidden");
	}

	if(data.disabilityCertificate==1)
	{
		$("#disabilityUploaded").removeClass("hidden");
	}
	else
	{
		$("#disabilityUploaded").addClass("hidden");
	}
}

function fetchPersonalDetails()
{
	$.post('includes/backend/fetchPersonalDetails.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillPersonalDetails(data);
		}
	});
}

function insertPersonalDetails(e,type)
{
	e.preventDefault();
	var new_data=new FormData($("#personalDetails")[0]);
	var link=$("#personalDetails");
	var post=link.find("#inputPostApplied").val();
	new_data.append("_post",post);
	var name=link.find("#inputName").val();
	new_data.append("_name",name);
	var dob=link.find("#dateOfBirth").val();
	new_data.append("_dob",dob);
	var nationality=link.find("#nationality").val();
	new_data.append("_nationality",nationality);
	var genders=document.getElementsByName("gender");
	var genderLength=genders.length;
	var gender;
	for(var i=0;i<genderLength;i++)
	{
		if(genders[i].checked)
		{
			gender=genders[i].value;
		}
	}
	if(gender!=1 && gender!=2)
	{
		gender=1;
	}
	new_data.append("_gender",gender);
	var categories=document.getElementsByName("category");
	var categoryLength=categories.length;
	var category;
	for(var i=0;i<categoryLength;i++)
	{
		if(categories[i].checked)
		{
			category=categories[i].value;
		}
	}

	if(category<=0 || category>=5)
	{
		category=4;
	}
	new_data.append("_category",category);
	new_data.append("_photo",link.find("#photo")[0].files[0])
	new_data.append("_categoryCertificate",link.find("#categoryCertificate")[0].files[0]);
	var serviceMan=document.getElementsByName("exServiceman");
	var serviceLength=serviceMan.length;
	var service;
	for(var i=0;i<serviceLength;i++)
	{
		if(serviceMan[i].checked)
		{
			service=serviceMan[i].value;
		}
	}
	new_data.append("_service",service);
	var pds=document.getElementsByName("phd");
	var pdsLength=pds.length;
	var disability;
	for(var i=0;i<pdsLength;i++)
	{
		if(pds[i].checked)
		{
			disability=pds[i].value;
		}
	}
	new_data.append("_disability",disability);
	new_data.append("_disabilityCertificate",link.find("#disabilityCertificate")[0].files[0]);
	var caline1=link.find("#currentAddressLine1").val();
	new_data.append("_caline1",caline1);
	var caline2=link.find("#currentAddressLine2").val();
	new_data.append("_caline2",caline2);
	var currentPhone=link.find("#currentPhone").val();
	new_data.append("_currentPhone",currentPhone);
	var currentEmail=link.find("#currentEmail").val();
	new_data.append("_currentEmail",currentEmail);
	var element=$("#pmasaca");
	var pmasaca=element.is(":checked");
	if(pmasaca)
	{
		pmasaca=1;
	}
	else
	{
		pmasaca=0;
	}
	new_data.append("_pmasaca",pmasaca);
	var paline1=link.find("#permanentAddressLine1").val();
	new_data.append("_paline1",paline1);
	var paline2=link.find("#permanentAddressLine2").val();
	new_data.append("_paline2",paline2);
	var pphone=link.find("#permanentPhone").val();
	new_data.append("_pphone",pphone);
	var pemail=link.find("#permanentEmail").val();
	new_data.append("_pemail",pemail);
	var father=link.find("#fatherName").val();
	new_data.append("_fatherName",father);
	$.ajax({
		url:'includes/backend/insertPersonalDetails.php',
		type:'POST',
		data:new_data,
		processData: false,
    	contentType: false,
    	success:function(data){
    		console.log(data);
    		if(checkData(data)==1)
    		{
    			alert("Saved");
    			if(type==0)
    			{
    				fetchPersonalDetails();
    			}
    			else
    			{
    				window.location.href="educationalQualifications.php";
    			}
    		}
    	}
	});
}


/************************************ EDUCATIONAL QUALIFICATIONS *************************/

function fillEducationalQualifications(data)
{
	var link=$("#educationalQualificationsForm");

	

	var degrees=data.degrees.split("$%^");
	var branches=data.branches.split("$%^");
	var institutes=data.institutes.split("$%^");
	var yoes=data.yoes.split("$%^");
	var yols=data.yols.split("$%^");
	var fupacs=data.fullTimeOrPartTimes.split("$%^");
	var scoreTypes=data.scoreTypes.split("$%^");
	var scores=data.scores.split("$%^");

	var length=degrees.length;

	for(var i=0;i<length-1;i++)
	{
		insertNewEducationalRow('event',0);
	}

	for(var i=0;i<length;i++)
	{
		link.find('.degree').eq(i).val(degrees[i]);
		link.find('.branch').eq(i).val(branches[i]);
		link.find('.institute').eq(i).val(institutes[i]);
		link.find('.yoe').eq(i).val(yoes[i]);
		link.find('.yol').eq(i).val(yols[i]);
		link.find('.fupac').eq(i).val(fupacs[i]);
		link.find('.scoreType').eq(i).val(scoreTypes[i]);
		link.find('.score').eq(i).val(scores[i]);
	}
}

function fetchEducationalQualifications()
{
	$.post('includes/backend/fetchEducationalQualifications.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillEducationalQualifications(data);
		}
	});
}

function insertNewEducationalRow(e,type)
{
	if(type==1)
	{
		e.preventDefault();
	}

	var input="";

	var length=$(".eduRow").length;

	var x=length+1;

		input+='<tr id="edu'+x+'" class="eduRow">';

			input+='<td><select class="form-control degree">';
				input+='<option value="0">Select</option>';
				input+='<option value="1">Diploma</option>';
				input+='<option value="2">B.Tech/B.E</option>';
				input+='<option value="3">B.Sc/B.Com/B.A/BLIS</option>';
				input+='<option value="4">M.E/M.Tech</option>';
				input+='<option value="5">M.Com/M.Sc/M.A/MLIS</option>';
			input+='</select></td>';

			input+='<td><input class="form-control branch"></td>';

			input+='<td><input class="form-control institute"></td>';

			input+='<td><input class="form-control yoe" type="number"></td>';

			input+='<td><input class="form-control yol" type="number"></td>';

			input+='<td><select class="form-control fupac"><option value="1">Full time</option><option value="2">Part time</option></select></td>';

			input+='<td><select class="form-control scoreType"><option value="1">Percentage</option><option value="2">CGPA out of 10</option><option value="3">CGPA out of 8</option><option value="4">CGPA out of 4</option></select></td>';

			input+='<td><input class="form-control score" type="number"></td>';

			input+='<td><button class="btn btn-sm btn-danger" onclick="deleteEducationalRow(event,\''+x+'\')">Delete</button></td>';

		input+='</tr>';

	$("#educationalQualificationsForm").find("table").append(input);
}

function deleteEducationalRow(e,id)
{
	e.preventDefault();

	$("#edu"+id).remove();
}

function insertEducationalQualifications(e,type)
{
	e.preventDefault();

	var link=$("#educationalQualificationsForm");

	var degrees=new Array();
	var branches=new Array();
	var institutes=new Array();
	var yoes=new Array();
	var yols=new Array();
	var fupacs=new Array();
	var scoreTypes=new Array();
	var scores=new Array();

	var length=link.find('.eduRow').length;

	for(var i=0;i<length;i++)
	{
		degrees[i]=link.find('.degree').eq(i).val();
		branches[i]=link.find(".branch").eq(i).val();
		institutes[i]=link.find(".institute").eq(i).val();
		yoes[i]=link.find('.yoe').eq(i).val();
		yols[i]=link.find('.yol').eq(i).val();
		fupacs[i]=link.find('.fupac').eq(i).val();
		scoreTypes[i]=link.find(".scoreType").eq(i).val();
		scores[i]=link.find(".score").eq(i).val();
	}

	$.post('includes/backend/insertEducationalQualifications.php',{
		_degrees:degrees,
		_branches:branches,
		_institutes:institutes,
		_yoes:yoes,
		_yols:yols,
		_fupacs:fupacs,
		_scoreTypes:scoreTypes,
		_scores:scores
	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			alert("Saved");
			if(type==0)
			{
				window.location.href="educationalQualifications.php";
			}
			else
			{
				window.location.href="additionalQualifications.php";
			}
		}
	});
}


/************************************ ADDITIONAL QUALIFICATIONS *************************/

function fillAdditionalQualifications(data)
{
	var course=data.course.split("$%^");
	var duration=data.duration.split("$%^");
	var organization=data.organization.split("$%^");
	var govt=data.govt.split("$%^");
	var scoreType=data.scoreType.split("$%^");
	var score=data.scores.split("$%^");

	for(var i=0;i<course.length-1;i++)
	{
		insertNewAdditionalQualification('event',1);
	}

	var link=$("#additionalQualificationsForm");

	var courses=link.find('.course');
	var durations=link.find('.duration');
	var organizations=link.find('.organization');
	var govts=link.find(".govt");
	var scoreTypes=link.find(".scoreType");
	var scores=link.find(".score");

	for(var i=0;i<course.length;i++)
	{
		courses.eq(i).val(course[i]);
		durations.eq(i).val(duration[i]);
		organizations.eq(i).val(organization[i]);
		govts.eq(i).val(govt[i]);
		scoreTypes.eq(i).val(scoreType[i]);
		scores.eq(i).val(score[i]);
	}
}

function fetchAdditionalQualifications()
{
	$.post('includes/backend/fetchAdditionalQualifications.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillAdditionalQualifications(data);
		}
	});
}

function insertNewAdditionalQualification(e,type)
{
	if(type!=1)
	{
		e.preventDefault();
	}

	var length=$("#additionalQualificationsForm").find(".addQRow").length;

	var newLength=length+1;

	var input="";

		input+='<tr id="add'+newLength+'" class="addQRow">';

			input+='<td><input class="form-control course" type="text" id="add'+newLength+'course"></td>';

			input+='<td><input class="form-control duration" type="text" id="add'+newLength+'duration"></td>';

			input+='<td><input class="form-control organization" type="text" id="add'+newLength+'Organization"></td>';

			input+='<td><select class="form-control govt" id="add'+newLength+'govt"><option value="1">Yes</option><option value="2">No</option></select></td>';

			input+='<td><select class="form-control scoreType" id="add'+newLength+'scoreType"><option value="1">Percentage</option><option value="2">CGPA out of 10</option><option value="3">CGPA out of 8</option><option value="4">CGPA out of 4</option></select></td>';

			input+='<td><input class="form-control score" type="number" id="add'+newLength+'score"></td>';

			input+='<td><button class="btn btn-sm btn-danger" onclick="deleteAdditionalQualificationRow(\'add'+newLength+'\',event);">Delete</button></td>';

		input+='</tr>';

	$("#additionalQualificationsForm").find("table").append(input);
}

function deleteAdditionalQualificationRow(el,e)
{
	e.preventDefault();
	$("#additionalQualificationsForm").find('#'+el).remove();
}

function insertAdditionalQualifications(e,type)
{
	e.preventDefault();

	var link=$("#additionalQualificationsForm");

	var courses=link.find('.course');
	var durations=link.find('.duration');
	var organizations=link.find('.organization');
	var govts=link.find(".govt");
	var scoreTypes=link.find(".scoreType");
	var scores=link.find(".score");

	var courseArray=new Array();
	var durationArray=new Array();
	var organizationArray=new Array();
	var govtArray=new Array();
	var scoreTypeArray=new Array();
	var scoreArray=new Array();

	for(var i=0;i<courses.length;i++)
	{
		courseArray[i]=courses.eq(i).val();
		durationArray[i]=durations.eq(i).val();
		organizationArray[i]=organizations.eq(i).val();
		govtArray[i]=govts.eq(i).val();
		scoreTypeArray[i]=scoreTypes.eq(i).val();
		scoreArray[i]=scores.eq(i).val();
	}
	var error=0;
	for(var i=0;i<courses.length;i++)
	{
		if(durationArray[i].length!=0)
		{
			var x=durationArray[i].split(":");
			if(x.length!=2)
			{
				alert("Enter proper duration.");
				error=1;
				break;
			}
			else
			{
				if(x[0]<0 || x[0]>99 || x[1]<0|| x[1]>12)
				{
					alert("Enter proper duration.");
					error=1;
					break;
				}
			}
		}
		
	}

	if(error==0)
	{
		$.post('includes/backend/insertAdditionalQualifications.php',{
			_course:courseArray,
			_duration:durationArray,
			_organization:organizationArray,
			_govt:govtArray,
			_scoreType:scoreTypeArray,
			_score:scoreArray
		})
		.error()
		.success(function(data){
			console.log(data);
			if(checkData(data)==1)
			{
				alert("Saved");
				if(type==0)
				{
					window.location.href="additionalQualifications.php";
				}
				else
				{
					window.location.href="experience.php";
				}
			}
		});
	}
}


/******************************** EXPERIENCE ***********************************/

function fillExperience(data)
{
	var link=$("#experienceForm");

	link.find("#noYE").val(data.noYE);

	var organisations=data.orgs.split("$%^");

	var designations=data.designations.split("$%^");

	var fromDates=data.fromDates.split("$%^");

	var toDates=data.toDates.split("$%^");

	var scales=data.scales.split("$%^");

	var natures=data.naturesOfWork.split("$%^");

	var length=organisations.length;

	for(i=0;i<length-1;i++)
	{
		insertNewExperienceRow('event',0);
	}

	for(var i=0;i<length;i++)
	{
		link.find('.org').eq(i).val(organisations[i]);

		link.find('.des').eq(i).val(designations[i]);

		link.find('.from').eq(i).val(fromDates[i]);

		link.find('.to').eq(i).val(toDates[i]);

		link.find('.scale').eq(i).val(scales[i]);

		link.find('.nature').eq(i).val(natures[i]);
	}
}

function fetchExperience()
{
	$.post('includes/backend/fetchExperience.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillExperience(data);
		}
	});
}

function insertNewExperienceRow(e,type)
{
	if(type==1)
	{
		e.preventDefault();
	}

	var length=$("#experienceForm").find(".expRow").length;

	var newLength=length+1;

	var input="";

	input+='<tr id="exp'+newLength+'" class="expRow">';

		input+='<td><input class="form-control org" type="text" id="exp'+newLength+'Org"></td>';

		input+='<td><input class="form-control des" type="text" id="exp'+newLength+'Des"></td>';

		input+='<td><input class="form-control from" type="text" id="exp'+newLength+'From"></td>';

		input+='<td><input class="form-control to" type="text" id="exp'+newLength+'To"></td>';

		input+='<td><input class="form-control scale" type="text" id="exp'+newLength+'Scale"></td>';

		input+='<td><input class="form-control nature" type="text" id="exp'+newLength+'Nature"></td>';

		input+='<td><button class="btn btn-danger btn-sm" onclick="deleteExperienceRow(\'exp'+newLength+'\',event);">Delete</button></td>';

	input+='</tr>';

	$("#experienceForm").find('table').append(input);
}

function deleteExperienceRow(el,e)
{
	e.preventDefault();

	$("#experienceForm").find("#"+el).remove();
}

function insertExperience(e,type)
{
	e.preventDefault();

	var link=$("#experienceForm");

	var length=link.find(".expRow").length;
	var noYE=link.find("#noYE").val();
	var organization=new Array();
	var designation=new Array();
	var fromDate=new Array();
	var toDate=new Array();
	var totalpay=new Array();
	var natureOfWork=new Array();

	for(var i=0;i<length;i++)
	{
		organization[i]=link.find(".org").eq(i).val();
		designation[i]=link.find(".des").eq(i).val();
		fromDate[i]=link.find(".from").eq(i).val();
		toDate[i]=link.find(".to").eq(i).val();
		totalpay[i]=link.find(".scale").eq(i).val();
		natureOfWork[i]=link.find(".nature").eq(i).val();
	}

	$.post('includes/backend/insertExperience.php',{
		_organization:organization,
		_designation:designation,
		_fromDate:fromDate,
		_toDate:toDate,
		_totalpay:totalpay,
		_natureOfWork:natureOfWork,
		_noYE:noYE
	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			alert("Saved");
			if(type==0)
			{
				window.location.href="experience.php";
			}
			else
			{
				window.location.href="otherDetails.php";
			}
		}
	});
}

/*************************************** OTHER DETAILS *****************************/
function fillOtherDetails(data)
{
	var link=$("#otherDetailsForm");

	link.find("#presentEmployment").val(data.organization);

	link.find("#natureOfWork").val(data.natureOfWork);

	link.find('#timeRequired').val(data.timeRequired);

	if(data.sop==1)
	{
		link.find('#uploadedSOP').removeClass("hidden");
	}
}

function fetchOtherDetails()
{
	$.post('includes/backend/fetchOtherDetails.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillOtherDetails(data);
		}
	});
}

function insertOtherDetails(e,type)
{
	e.preventDefault();

	var link=$("#otherDetailsForm");

	var presentEmployment=link.find("#presentEmployment").val();

	var natureOfWork=link.find("#natureOfWork").val();

	var timeRequired=link.find('#timeRequired').val();

	var new_data=new FormData(link[0]);

	new_data.append("_presentEmployment",presentEmployment);

	new_data.append("_natureOfWork",natureOfWork);

	new_data.append("_timeRequired",timeRequired);

	new_data.append("_mentionInterest",link.find("#fileSOP")[0].files[0]);

	$.ajax({
			url:'includes/backend/insertOtherDetails.php',
			type:'POST',
			data:new_data,
			processData: false,
	    	contentType: false,
	    	success:function(data){
	    		console.log(data);
	    		if(checkData(data)==1)
	    		{
	    			alert("Saved")
	    			if(type==0)
	    			{
	    				fetchOtherDetails();
	    			}
	    			else
	    			{
	    				window.location.href="referreeDetails.php";
	    			}
	    		}
	    	}
		});
}



/********************************** REFEREE DEATAILS *************************/

function fillRefereeDetails(data)
{
	var link=$("#refereeDetailsForm");

	var names=data.names.split("$%^");

	var designations=data.designations.split("$%^");

	var addresses=data.addresses.split("$%^");

	var emails=data.emails.split("$%^");

	var phones=data.phones.split("$%^");

	link.find('#referee1name').val(names[0]);

	link.find("#referee2name").val(names[1]);

	link.find("#referee3name").val(names[2]);

	link.find("#referee1Address").val(addresses[0]);

	link.find("#referee2Address").val(addresses[1]);

	link.find("#referee3Address").val(addresses[2]);

	link.find("#referee1Phone").val(phones[0]);

	link.find("#referee2Phone").val(phones[1]);

	link.find("#referee3Phone").val(phones[2]);

	link.find("#referee1Email").val(emails[0]);

	link.find("#referee2Email").val(emails[1]);

	link.find('#referee3Email').val(emails[2]);

	link.find("#referee1Designation").val(designations[0]);

	link.find("#referee2Designation").val(designations[1]);

	link.find("#referee3Designation").val(designations[2]);
}

function fetchRefereeDetails()
{
	$.post('includes/backend/fetchRefereeDetails.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			data=JSON.parse(data);
			fillRefereeDetails(data);
		}
	});
}

function insertRefereeDetails(e,type)
{
	e.preventDefault();

	var link=$("#refereeDetailsForm");

	var r1name=link.find('#referee1name').val();

	var r2name=link.find("#referee2name").val();

	var r3name=link.find("#referee3name").val();

	var r1address=link.find("#referee1Address").val();

	var r2address=link.find("#referee2Address").val();

	var r3address=link.find("#referee3Address").val();

	var r1phone=link.find("#referee1Phone").val();

	var r2phone=link.find("#referee2Phone").val();

	var r3phone=link.find("#referee3Phone").val();

	var r1email=link.find("#referee1Email").val();

	var r2email=link.find("#referee2Email").val();

	var r3email=link.find('#referee3Email').val();

	var r1designation=link.find("#referee1Designation").val();

	var r2designation=link.find("#referee2Designation").val();

	var r3designation=link.find("#referee3Designation").val();

	$.post('includes/backend/insertRefereeDetails.php',{
		_r1name:r1name,
		_r2name:r2name,
		_r3name:r3name,
		_r1address:r1address,
		_r2address:r2address,
		_r3address:r3address,
		_r1email:r1email,
		_r2email:r2email,
		_r3email:r3email,
		_r1phone:r1phone,
		_r2phone:r2phone,
		_r3phone:r3phone,
		_r1designation:r1designation,
		_r2designation:r2designation,
		_r3designation:r3designation
	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{
			alert("Saved");
			if(type==0)
			{
				window.location.href="referreeDetails.php";
			}
			else
			{
				window.location.href="declaration.php";
			}
		}
	});
}

/**************************************DECLARATION*********************************/

function checkFormCompleteness(e)
{
	e.preventDefault();

	$.post('includes/backend/checkFormCompleteness.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(data.trim()==1)
		{
			alert("Your form is complete. You are allowed to submit.");
		}
		else
		{
			$("#errors").html(data);
		}
		
	});
}


function submit(e)
{
	
	e.preventDefault();

	$.post('includes/backend/submit.php',{

	})
	.error()
	.success(function(data){
		console.log(data);
		if(checkData(data)==1)
		{

		}
	});


}