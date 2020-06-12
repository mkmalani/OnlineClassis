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
							<div class="col-md-12">
								<h4>Profile</h4>
								<ol class="breadcrumb no-bg mb-1">
									<li class="breadcrumb-item"><a href="<?=base_url().'Home'?>">Home</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ol>
							</div>

						</div>
						
						<p style="color: red;text-align: center;"><?=$this->session->flashdata("error")?></p>
						
						
						<div class="box box-block bg-white">
							
							<form name="updateprofile" method="POST">
								<div class="container">
									
							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>First Name</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="text" name="name" id="fname" value="<?=$userData->name?>" placeholder="First Name" class="form-control" required >
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>Last Name</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="text" name="lname" id="lname" value="<?=$userData->lname?>" placeholder="Last Name" class="form-control" required >
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>Email</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="email" name="email" id="email" value="<?=$userData->email?>" placeholder="Email" class="form-control" required readonly>
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>


							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      				<div class="col col-md-6">
								      				<input type="button" onclick="updateProfile()" class="btn btn-primary" value="Update">
								      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<a href="<?=base_url().'Update_password';?>" >Change Password</a>
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

								</div>
							</form>
							
						</div>						
					</div>
				</div>
				
				
			</div>

		</div>

		
		<?php require_once("include/all_script.php"); ?>
		
		
		
		<script type="text/javascript">

			
			function updateProfile() {
				
				$.ajax({
		          type:"post",
		          data:{user_id:'<?=$this->session->sess_id?>',fname :$("#fname").val(),lname:$("#lname").val(),email:$("#email").val()},
		          url:'<?=base_url()."Profile/updateProfile/"?>',
		          success: function(data){
		           	var res = JSON.parse(data);
		           	if (res.ResponseCode == 1) {
		           		alert(res.ResponseMsg);
		           	}
		           	else
		           	{
		           		alert(res.ResponseMsg);
		           	}

		          }
		        });
				
			}

		   

		</script>

		

		<script src="<?=base_url().'assets/admin/js/jquery.magnific-popup.js'?>"></script>
		<link rel="stylesheet" href="<?=base_url().'/assets/admin/css/magnific-popup.css'?>">

		

	</body>

</html>