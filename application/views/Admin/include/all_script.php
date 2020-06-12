        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/tether.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/mwheelIntent.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/waves.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/switchery.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flot.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/curvedLines.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/tinycolor.js"></script>
		
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.peity.js"></script>


		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/responsive.bootstrap4.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/jszip.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/buttons.colVis.min.js"></script>
		
		<script type="text/javascript" src="<?=base_url()?>assets/js/app.js"></script>
		
		<script type="text/javascript" src="<?=base_url()?>assets/js/tables-datatable.js"></script>

		<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>

		

	  	<script type="text/javascript">
	    

		    function sendData1()
	        {  
	            var fi = document.getElementById('img1'); 
	              if (fi.files.length > 0) {         
	                  var oFReader = new FileReader();
	                  oFReader.readAsDataURL(document.getElementById("img1").files[0]);
	                  oFReader.onload = function (oFREvent) {
	                  document.getElementById("imgUpload1").src = oFREvent.target.result;
	                }
	            }
	        }
	        
		</script>

        <script type="text/javascript">
		    $(document).ready(function() {
		    	$('#table-subcat').DataTable({"ordering": false,"autoWidth": false});


		    	/*$('#table-country').DataTable({"ordering": false});*/

		          $('body').on('keypress','.numbers', function(event){
		               return isNumber(event, this)
		          });

		          function isNumber(evt, element) {

		            var charCode = (evt.which) ? evt.which : evt.keyCode
		            //alert(charCode);
		            if ( (charCode >= 48 && charCode <= 57) || (charCode == 32) || (charCode == 43)|| (charCode == 40) || (charCode == 41))
		                return true;

		            return false;
		          }

		          $('body').on('keypress','.numberPrice', function(event){
		               return isNumberPrice(event, this)
		          });

		          function isNumberPrice(evt, element) {

		            var charCode = (evt.which) ? evt.which : evt.keyCode
		            //alert(charCode);
		            if ( (charCode >= 48 && charCode <= 57)   (charCode == 46))
		                return true;

		            return false;
		          }
		    });

		    //inspect element stop
		    /*$(document).on("contextmenu",function(e){
               return false;
            });

            $(document).keydown(function (event) {
              if (event.keyCode == 123) { // Prevent F12
                  return false;
              } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                  return false;
              }
            });*/

		   
		</script>