<?php require_once("include/head.php"); ?>

	<body class="fixed-sidebar fixed-header content-appear skin-default">
		
		<div class="wrapper">
		<?php require_once("include/sidebar.php"); ?>
		
		<?php require_once("include/header.php"); ?>

			<div class="site-content">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-10">
								<h4>Video Management</h4>
								<ol class="breadcrumb no-bg mb-1">
									<li class="breadcrumb-item"><a href="<?=base_url().'Home'?>">Home</a></li>
									<li class="breadcrumb-item active">Video List</li>
								</ol>
							</div>
							

							<div class="col-md-1">
								
								<div class="">
									<button title="Add Group" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addVideo">Add Video</button>
								</div>
								
							</div>
							
							<div class="col-md-1"></div>

						</div>
						
						<p style="color: red;text-align: center;"><?=$this->session->flashdata("error")?></p>
						
						
						<div class="box box-block bg-white">
							
								<table class="table table-striped table-bordered dataTable " id="table-1">
									<thead>
										<tr>
											<th style="width: 15%;">Video Name</th>
											<th style="width: 15%;">Standard</th>
											<th style="width: 20%;">Subject</th>
											<th style="width: 20%;">Video URL</th>
											<th style="width: 10%;">Active</th>
											<th style="width: 20%;">Action</th>
										</tr>
										
									</thead>
									<tbody>
										<?php foreach ($videoDtl as $key => $value) { ?>
										<tr id="trtbl2_<?=$value->Video_RowId;?>" >
											<td style="text-align: left;" ><?=$value->Video_Name;?></td>
											<td style="text-align: left;" ><?=$value->Video_StandsId;?></td>
											<td style="text-align: left;" ><?=$value->Video_SubjectId;?></td>
											<td style="text-align: left;" ><?=$value->Video_VideoId;?></td>
											<td ><?=($value->Video_IsActDct == 1)?'Deactive':'Active'?></td>

											<td>
												<a style="cursor: pointer;">
													
													<button title="Edit" class="btn btn-default btn_edit" onclick="editCatModal(<?=$value->Video_RowId;?>)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#edit_video">
													<i class="fa fa-pencil-square" style="text-align: center;    position: relative;left: -2px;"></i></button>
													
													<button title="Delete" class="btn btn-default btn_delete" onclick="deleteVideo(<?=$value->Video_RowId;?>)" >
													<i class="fa fa-trash" style="text-align: center; position: relative;left: -2px;"></i></button>

													
			                                    </a> 
											</td>

										</tr>
										<?php } ?>
									</tbody>
									
								</table>
								
							
							
						</div>						
					</div>
				</div>
				
				
			</div>

		</div>

		
		<?php require_once("include/all_script.php"); ?>
		
		
		<div id="addVideo" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
			    <form name="addvideoform" method="post" enctype="multipart/form-data" autocomplete="off">
			    	
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add Video</h4>
			      </div>

			      <div id="" class="modal-body">
			      	<div class="container">
			      		<div class="form-group">
		                  <div class="row">
		                    <label><b>Video Name</b></label>
		                    <div class="row">
		                      <div class="col col-md-12">
		                        <input type="text" name="Video_Name" placeholder="Video Name" value="" class="form-control" required>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="row">
		                    <label><b>Video URL</b></label>
		                    <div class="row">
		                      <div class="col col-md-12">
		                        <input type="text" name="Video_VideoId" placeholder="Video URL" value="" class="form-control" required>
		                      </div>
		                    </div>
		                  </div>
		                </div>
			      	</div>
			      	
			      </div>

			      <div class="modal-footer">
			      	
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			        <input type="submit" name="addvideo" value="Add" class="btn btn-primary">
			      </div>
		      </form>
		    </div>

		  </div>
		</div>

		<!-- edit item modal -->
		<div class="modal fade in" id="edit_video" role="dialog">  </div>
		<!-- edit item modal end -->

		<script type="text/javascript">

			
			function editCatModal(id) {
				
				$.ajax({
		          type:"post",
		          data:{id:id},
		          url:'<?=base_url()."Online_learning/edit_video/"?>',
		          success: function(data){
		           $("#edit_video").html(data);

		          }
		        });
			}

		    function deleteVideo(id){ 
		    	if(confirm("Are you sure to delete Video?")==true){

			        $.ajax({
			          type:"post",
			          data:{id:id},
			          url:'<?=base_url()."Online_learning/delete_video/"?>',
			          success: function(data){
			           	window.location.href="<?=current_url()?>";

			          }
			        });
		    	}
		    }

		</script>

		

		<script src="<?=base_url().'assets/admin/js/jquery.magnific-popup.js'?>"></script>
		<link rel="stylesheet" href="<?=base_url().'/assets/admin/css/magnific-popup.css'?>">

		

	</body>

</html>