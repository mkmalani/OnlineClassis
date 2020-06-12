<div class="site-header">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider1 {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ddd;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider1:before {
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

        input:checked + .slider1 {
            background-color: #0097a7;
        }

        input:focus + .slider1 {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider1:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider1.round {
            border-radius: 36px;
        }

        .slider1.round:before {
            border-radius: 50%;
        }
    </style>
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" href="<?=base_url().'Home'?>">
							<div class="logotxt"><h3><?=server_name?></h3></div>
                            <!-- <img src="assets/images/headerlogo.png" width="100%"> -->
						</a>

						<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>

						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<i class="ti-arrow-left"></i>
						</div>

						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more">
								
							</span>
						</div>

					</div>

					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">

            <ul class="nav navbar-nav float-md-right">

              
                
                <div class="row" style="margin-top: 8px">
                    
                    <div class="col-sm-3">
                        <li class="nav-item dropdown hidden-sm-down">
                            <a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32">
										<img src="<?= base_url() ?>assets/images/1.png" alt="">
									</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                                <a class="dropdown-item" href="<?= base_url() . 'Login/logout' ?>"><i
                                        class="ti-power-off mr-0-5"></i> Sign out</a>
                            </div>
                        </li>

                        <div
                    </div>


            </ul>
        </div>

				</nav>
			</div>
			<script>
   
     
   

</script>