<?php

$page = basename(current_url());

?>
<!-- Preloader -->
	<div class="preloader"></div>
	<div class="site-sidebar">
		<div class="custom-scroll custom-scroll-light">
			<ul class="sidebar-menu">						
				
				
				<li class="<?php if($page=='Home'){ echo 'active'; }?>">
					<a href="<?=base_url().'Home'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="ti-gallery"></i></span>
						<span class="s-text">Dashboard</span>
					</a>
				</li>

				<li class="<?php if($page=='Student_management'){ echo 'active'; }?>">
					<a href="<?=base_url().'Student_management'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Student Management</span>
					</a>
				</li>

				<li class="<?php if($page=='Online_learning'){ echo 'active'; }?>">
					<a href="<?=base_url().'Online_learning'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Online Learning</span>
					</a>
				</li>

				<li class="<?php if($page=='Gallery'){ echo 'active'; }?>">
					<a href="<?=base_url().'Gallery'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Gallery</span>
					</a>
				</li>


				<li class="<?php if($page=='Results'){ echo 'active'; }?>">
					<a href="<?=base_url().'Results'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Results</span>
					</a>
				</li>

				<li class="<?php if($page=='TimeTable'){ echo 'active'; }?>">
					<a href="<?=base_url().'TimeTable'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">TimeTable</span>
					</a>
				</li>

				<li class="<?php if($page=='HomeWork'){ echo 'active'; }?>">
					<a href="<?=base_url().'HomeWork'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Home Work</span>
					</a>
				</li>

				<li class="<?php if($page=='OnlineExam'){ echo 'active'; }?>">
					<a href="<?=base_url().'OnlineExam'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-users"></i></span>
						<span class="s-text">Online Exam</span>
					</a>
				</li>	
				

				<li class="<?php if($page=='Profile'){ echo 'active'; }?>">
					<a href="<?=base_url().'Profile'?>" class="waves-effect  waves-light">
						<span class="s-icon"><i class="fa fa-user"></i></span>
						<span class="s-text">Profile</span>
					</a>
				</li>

				
				
				
			</ul>
		</div>
	</div>