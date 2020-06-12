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
								<h4>Student Management</h4>
								<ol class="breadcrumb no-bg mb-1">
									<li class="breadcrumb-item"><a href="<?=base_url().'Home'?>">Home</a></li>
									<li class="breadcrumb-item active">Student List</li>
								</ol>
							</div>
							

							<div class="col-md-1">
								
								<div class="">
									<button title="Add Group" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addUser">Add Student</button>
								</div>
								
							</div>
							
							<div class="col-md-1"></div>

						</div>
						
						<p style="color: red;text-align: center;"><?=$this->session->flashdata("error")?></p>
						
						
						<div class="box box-block bg-white">
							
								<table class="table table-striped table-bordered dataTable " id="table-1">
									<thead>
										<tr>
											<th style="width: 15%;">Name</th>
											<th style="width: 20%;">Email</th>
											<th style="width: 5%;">School ID</th>
											<th style="width: 20%;">Password</th>
											<th style="width: 10%;">Active</th>
											<th style="width: 20%;">Action</th>
										</tr>
										
									</thead>
									<tbody>
										<?php foreach ($userDtl as $key => $value) { ?>
										<tr id="trtbl2_<?=$value->Login_RowId;?>" >
											<td style="text-align: left;" ><?=$value->Login_Name;?></td>
											<td style="text-align: left;" ><?=$value->Login_Email;?></td>
											<td style="text-align: left;" ><?=$value->Login_SchoolId;?></td>
											<td style="text-align: left;" ><?=$value->Login_Password;?></td>
											<td ><?php
												$checked = '';
												if ($value->Login_IsActDct == 0) {
													$checked = 'checked';
												}
												?>
												<label class="switch">
												  <input type="checkbox" id="user_<?=$value->Login_RowId?>" onchange="userStatus('user_<?=$value->Login_RowId?>','<?=$value->Login_RowId?>')" <?=$checked?> >
												  <span class="slider round"></span>
												</label>
											</td>

											<td>
												<a style="cursor: pointer;">
													
													<button title="Edit" class="btn btn-default btn_edit" onclick="editCatModal(<?=$value->Login_RowId;?>)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editUser">
													<i class="fa fa-pencil-square" style="text-align: center;    position: relative;left: -2px;"></i></button>
													
													<button title="Delete" class="btn btn-default btn_delete" onclick="deleteUser(<?=$value->Login_RowId;?>)" >
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

		<style>
			.switch {
			  position: relative;
			  display: inline-block;
			  width: 60px;
			  height: 34px;
			}

			.switch input { 
			  opacity: 0;
			  width: 0;
			  height: 0;
			}

			.slider {
			  position: absolute;
			  cursor: pointer;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background-color: #ccc;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			.slider:before {
			  position: absolute;
			  content: "";
			  height: 26px;
			  width: 26px;
			  left: 4px;
			  bottom: 4px;
			  background-color: white;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			input:checked + .slider {
			  background-color: #2196F3;
			}

			input:focus + .slider {
			  box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			  -webkit-transform: translateX(26px);
			  -ms-transform: translateX(26px);
			  transform: translateX(26px);
			}

			/* Rounded sliders */
			.slider.round {
			  border-radius: 34px;
			}

			.slider.round:before {
			  border-radius: 50%;
			}
			</style>

		<?php require_once("include/all_script.php"); ?>
		
		
		<div id="addUser" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
			    <form name="adduserform" method="post" enctype="multipart/form-data" autocomplete="off">
			    	
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add User</h4>
			      </div>

			      <div id="" class="modal-body">
			      	<div class="container">
			      		<div class="form-group">
		                  <div class="row">
		                    <label><b>Name</b></label>
		                    <div class="row">
		                      <div class="col col-md-12">
		                        <input type="text" name="name" placeholder="Name" value="" class="form-control" required>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="row">
		                    <label><b>Email</b></label>
		                    <div class="row">
		                      <div class="col col-md-12">
		                        <input type="email" name="email" placeholder="Email" value="" class="form-control" required>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="row">
		                    <label><b>Password</b></label>
		                    <div class="row">
		                      <div class="col col-md-12">
		                        <input type="text" name="Login_Password" placeholder="Password" value="" class="form-control" required>
		                      </div>
		                    </div>
		                  </div>
		                </div>
			      	</div>
			      </div>

			      <div class="modal-footer">
			      	
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			        <input type="submit" name="adduser" value="Add" class="btn btn-primary">
			      </div>
		      </form>
		    </div>

		  </div>
		</div>

		<!-- edit item modal -->
		<div class="modal fade in" id="editUser" role="dialog">  </div>
		<!-- edit item modal end -->

		<script type="text/javascript">

			
			function editCatModal(id) {
				
				$.ajax({
		          type:"post",
		          data:{id:id},
		          url:'<?=base_url()."Student_management/edit_user/"?>',
		          success: function(data){
		           $("#editUser").html(data);

		          }
		        });
			}

		    function deleteUser(id){ 
		    	if(confirm("Are you sure to delete Student?")==true){

			        $.ajax({
			          type:"post",
			          data:{id:id},
			          url:'<?=base_url()."Student_management/delete_user/"?>',
			          success: function(data){
			           	window.location.href="<?=current_url()?>";

			          }
			        });
		    	}
		    }

		    function userStatus(id,uid){ 

		        $.ajax({
		          type:"post",
		          data:{status:document.getElementById(id).checked,id:uid},
		          url:'<?=base_url()."Student_management/user_status/"?>',
		          success: function(data){
		          	alert("user status changed successfully");
		           	
		          }
		        });
		    	
		    }

		   

		</script>

		

		<script src="<?=base_url().'assets/admin/js/jquery.magnific-popup.js'?>"></script>
		<link rel="stylesheet" href="<?=base_url().'/assets/admin/css/magnific-popup.css'?>">

		

	</body>

</html>