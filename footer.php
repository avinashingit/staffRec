<div class="row" style="position:relative;bottom:0px;width:100%">

	<div class="col-md-2 text-center">

		<button class="btn btn-fab btn-md btn-info" title="About us" onclick="$('.about').modal('show');"><i class="fa fa-info"></i></button>

	</div>

	<div class="col-md-4 col-md-offset-2 text-center">

		<p>Copyright <i class="fa fa-copyright"></i> 2015 <a href="https://www.iiitdm.ac.in">IIITD&M Kancheepuram</a></p>

	</div>

	<div class="col-md-2 col-md-offset-2 text-center">

		<button class="btn btn-fab btn-md btn-success" title="Contact us" onclick="$('.contact').modal('show');"><i class="fa fa-envelope"></i></button>

	</div>


</div>

</body>


	 <!-- Twitter Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<!-- Material js -->
	<script src="includes/js/material/material.min.js" type="text/javascript"></script>
	<script src="includes/js/material/ripples.min.js" type="text/javascript"></script>
	

	<script>

		$.material.init();

		$.material.input();


	</script>

	<!-- Dropdown.js -->
    <script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script>



    <div class="modal about">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">About us</h4>
            </div>
            <div class="modal-body">
                <p>IIITD&M Kancheepuram</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Contact</h4>
            </div>
            <div class="modal-body">
                <p>IIITD&M Kancheepuram</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

