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
								<h4>Update Password</h4>
								<ol class="breadcrumb no-bg mb-1">
									<li class="breadcrumb-item"><a href="<?=base_url().'Home'?>">Home</a></li>
									<li class="breadcrumb-item"><a href="<?=base_url().'Profile'?>">Profile</a></li>
									<li class="breadcrumb-item active">Update Password</li>
								</ol>
							</div>

						</div>
						
						<p style="color: red;text-align: center;"><?=$this->session->flashdata("error")?></p>
						
						
						<div class="box box-block bg-white">
							
							<form name="changepwd" method="POST">
								<div class="container">
									<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>Old Password</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="password" name="oldpass" id="oldpass" placeholder="Old Password" class="form-control" required>
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>New Password</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="password" name="newpass" id="newpass" placeholder="New Password" class="form-control" required>
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
								      		<div class="col col-md-6">
							      				<label><b>Confirm Password</b></label>
							      			</div>
							      			<div class="col-md-3"></div>
							      		</div>
							      		<div class="row">
							      			<div class="col-md-3"></div>
							      			<div class="col col-md-6">
							      				<input type="password" name="confnewpass" id="confnewpass" placeholder="Confirm Password" class="form-control" required>
							      			</div>
							      			<div class="col-md-3"></div>
								      	</div>
							      	</div>

									
							      	
							      	<div class="form-group">
							      		<div class="row">
							      			<div class="col-md-3"></div>
						      				<div class="col col-md-6">
							      				<input type="button" onclick="updatePassword()" class="btn btn-primary" value="Update">
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

			
			function updatePassword() {
				if ($("#newpass").val() != $("#confnewpass").val()) {
					alert("New and Confirm Password does not Match");
				}
				else
				{
					$.ajax({
			          type:"post",
			          data:{user_id:'<?=$this->session->sess_id?>',old_password:$("#oldpass").val(),new_password:$("#newpass").val()},
			          url:'<?=base_url()."Update_password/changePassword/"?>',
			          success: function(data){
			           	var res = JSON.parse(data);
			           	if (res.ResponseCode == 1) {
			           		alert(res.ResponseMsg);
			           		window.location.href="<?=base_url().'Login/Logout'?>";
			           	}
			           	else
			           	{
			           		alert(res.ResponseMsg);
			           	}

			          }
			        });
				}
			}

		   

		</script>

		

		<script src="<?=base_url().'assets/admin/js/jquery.magnific-popup.js'?>"></script>
		<link rel="stylesheet" href="<?=base_url().'/assets/admin/css/magnific-popup.css'?>">

		

	</body>

</html>