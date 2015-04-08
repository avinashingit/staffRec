<?php

	session_start();

	if(!isset($_SESSION['oi']))
	{
		echo '<script>window.location.href="index.php";</script>';
	}

	require_once("header.php");

	include_once("topBar.php");

	include_once('formTabs.php');

?>

<div class="row">

	<div class="col-md-9 col-md-offset-1">

		<form method="post"class="form-horizontal"  id="personalDetails">

			<fieldset>

				<div class="form-group">

					<label for="inputPostApplied" class="col-lg-3 control-label">Post applied for</label>

		            <div class="col-lg-9">

		                <select class="form-control" name="postAppliedFor" id="inputPostApplied">

		                	<option value="0">Select</option>

							<option value="1">Office assistant</option>

							<option value="2">Junior assistant</option>

							<option value="3">Technical super intendent</option>

							<option value="4">Junior technician</option>

							<option value="5">Junior technical super intendent</option>

							<option value="6">Technical officer</option>

							<option value="7">Assistant registrar</option>

							<option value="8">Deputy registrar</option>

							<option value="9">Registrar</option>

							<option value="10">Assistant warden</option>

							<option value="11">Manager</option>

							<option value="12">Library assistant</option>

		                </select>

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="inputName" class="col-lg-3 control-label">Full name</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="inputName" placeholder="Full name" type="text" name="name">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="dateOfBirth" class="col-lg-3 control-label">Date of birth</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="dateOfBirth" placeholder="dd/mm/yyyy" type="text" name="dateOfBirth">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="nationality" class="col-lg-3 control-label">Nationality</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="nationality" placeholder="Nationality" type="text" name="nationality">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="photo" class="col-lg-3 control-label">Upload your photo</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="photo" placeholder="Photo" type="file" name="photo">

		                <p class="hidden" id="photoUploaded">You already uploaded your photo. Uploading again will rewrite the previous one.</p>

		            </div>

				</div>

				<br/>

				<div class="form-group">

		            <label class="col-lg-3 control-label">Sex</label>

		            <div class="col-lg-9">

		                <div class="radio radio-primary">

		                    <label>

		                        <input name="gender" id="gender" value="1"  type="radio">
		                        Male

		                    </label>

		                    <label>

		                        <input name="gender" id="gender" value="2" type="radio">
		                        Female

		                    </label>

		                </div>

		            </div>

		        </div>

		        <br/>

		        <div class="form-group">

		            <label class="col-lg-3 control-label">Category</label>

		            <div class="col-lg-9">

		                <div class="radio radio-primary">

		                    <label>

		                        <input name="category" id="category" value="1"   type="radio">
		                        SC

		                    </label>

		                    <label>

		                        <input name="category" id="category" value="2"  type="radio">
		                        ST

		                    </label>

		                    <label>

		                        <input name="category" id="category" value="3" type="radio">
		                        OBC

		                    </label>

		                    <label>

		                        <input name="category" id="category" value="4" type="radio">
		                        GEN

		                    </label>

		                </div>

		            </div>
		            
		        </div>

		        <br/>

		        <div class="form-group">

					<label for="categoryCertificate" class="col-lg-3 control-label">Upload category certificate</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="categoryCertificate" placeholder="Nationality" type="file" name="categoryCertificate">

		                <p class="hidden" id="categoryUploaded">You already uploaded your certificate. Uploading again will rewrite the previous one.</p>

		            </div>

				</div>

				<br/>

				<div class="form-group">

		            <label class="col-lg-3 control-label">Ex-serviceman (ES)</label>

		            <div class="col-lg-9">

		                <div class="radio radio-primary">

		                    <label>

		                        <input name="exServiceman" id="serviceman" value="1"  type="radio">
		                        Yes

		                    </label>

		                    <label>

		                        <input name="exServiceman" id="serviceman"  value="2" type="radio">
		                        No

		                    </label>

		                </div>

		            </div>

		        </div>

		        <br/>

		        <div class="form-group">

		            <label class="col-lg-3 control-label">Person with Disability</label>

		            <div class="col-lg-9">

		                <div class="radio radio-primary">

		                    <label>

		                        <input name="phd" id="pd" value="1"  type="radio">
		                        Yes

		                    </label>

		                    <label>

		                        <input name="phd" id="pd" value="2"  type="radio">
		                        No

		                    </label>

		                </div>

		            </div>

		        </div>

		        <br/>

		        <div class="form-group">

					<label for="disabilityCertificate" class="col-lg-3 control-label">Upload disability certificate</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="disabilityCertificate" placeholder="Upload" type="file" name="disabilityCertificate">

		                <p class="hidden" id="disabilityUploaded">You already uploaded your certificate. Uploading again will rewrite the previous one.</p>

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="currentAddressLine1" class="col-lg-3 control-label">Current address</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="currentAddressLine1" placeholder="Line 1" type="text" name="currentAddressLine1">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="currentAddressLine2" class="col-lg-3 control-label"></label>

		            <div class="col-lg-9">

		                <input class="form-control" id="currentAddressLine2" placeholder="Line 2" type="text" name="currentAddressLine2">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="currentPhone" class="col-lg-3 control-label">Phone</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="currentPhone" placeholder="Phone number" type="text" name="currentPhone">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<label for="currentEmail" class="col-lg-3 control-label">Email</label>

		            <div class="col-lg-9">

		                <input class="form-control" id="currentEmail" placeholder="Email ID" type="email" name="currentEmail">

		            </div>

				</div>

				<br/>

				<div class="form-group">

					<div class="col-lg-3">

					</div>

		            <div class="col-lg-9">
		                
		                <div class="checkbox">

		                    <label>

		                        <input type="checkbox" id="pmasaca" onchange="
		                        if($(this).is(':checked')==true)
		                        {
		                        $('#permanentAddress').find('input').each(function(){
		                        $(this).attr('disabled','disabled');
		                        });}
		                        else
		                        {
		                        $('#permanentAddress').find('input').each(function()
		                        {$(this).removeAttr('disabled');
		                        });}"> Is permanent address same as current address?
		                   
		                    </label>
		                
		                </div>

	                </div>
		       
		        </div>

		        <br/>

		        <div id="permanentAddress">

					<div class="form-group">

						<label for="permanentAddressLine1" class="col-lg-3 control-label">Permanent address</label>

			            <div class="col-lg-9">

			                <input class="form-control" id="permanentAddressLine1" placeholder="Line 1" type="text" name="permanentAddressLine1">

			            </div>

					</div>

					<br/>

					<div class="form-group">

						<label for="permanentAddressLine2" class="col-lg-3 control-label"></label>

			            <div class="col-lg-9">

			                <input class="form-control" id="permanentAddressLine2" placeholder="Line 2" type="text" name="permanentAddressLine2">

			            </div>

					</div>

					<br/>

					<div class="form-group">

						<label for="permanentPhone" class="col-lg-3 control-label">Phone</label>

			            <div class="col-lg-9">

			                <input class="form-control" id="permanentPhone" placeholder="Phone number" type="text" name="permanentPhone">

			            </div>

					</div>

					<br/>

					<div class="form-group">

						<label for="permanentEmail" class="col-lg-3 control-label">Email</label>

			            <div class="col-lg-9">

			                <input class="form-control" id="permanentEmail" placeholder="Email ID" type="email" name="permanentEmail">

			            </div>

					</div>

					<br/>

				</div>

				<div class="form-group">

						<label for="fatherName" class="col-lg-3 control-label">Name of Father/Spouse</label>

			            <div class="col-lg-9">

			                <input class="form-control" id="fatherName" placeholder="Father/Spouse Name" type="text" name="fatherName">

			            </div>

					</div>

					<br/>


				<div class="form-group text-center">

		            <div class="col-lg-10 col-lg-offset-2">

		                <button onclick="insertPersonalDetails(event,0);" class="btn btn-primary" name="personalDetailsSave" >Save</button>

		                <button onclick="insertPersonalDetails(event,1);" class="btn btn-warning" name="personalDetailsSaveAndNext">Save & Next</button>
		           
		            </div>
		        
		        </div>

			</fieldset>

		</form>

	</div>

</div>

<?php

	include_once("footer.php");

?>

<script>

$(document).ready(function(){
	$("#pmasaca").change(function(){
		if($(this).checked)
		{
			alert("H");
		}		
	});
	// alert($("#pmasaca").val());
	fetchPersonalDetails();
});

</script>