<header class="header">
				<div class="logo-container" style="margin-top: 5px;">
					<a href="#" class="logo" style="text-decoration: none;">
						<span style="font-family: 'Dancing Script'; font-size: 20px;">Restaurant Booking Web <small style="font-family: 'Cutive Mono'; font-size: 14px; color: #34495E;">
							<?php 
								if($_SESSION["role"] == "r") echo "(admin)";
								else echo "(user)";
							?>
						</span></>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa-solid fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right mt-2" style="margin-top: 5px;">
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="../upload/<?php echo $_SESSION["image"]; ?>" alt="profile-pp" class="img-circle" data-lock-picture="../upload/<?php echo $_SESSION["image"]; ?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?php echo $_SESSION['name']; ?>" data-lock-email="<?php echo $_SESSION['email']; ?>">
								<span class="name"><?php echo $_SESSION['name']; ?></span>
								<span class="role">
									<?php 
										if($_SESSION["role"] == "r") echo "administrator";
										else echo "customer";
									?>
								</span>
							</div>
			
							<i class="custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<?php if($_SESSION["role"] == "r") { ?>
								<li>
									<a role="menuitem" tabindex="-1" href="../restaurant/profile.php"><i class="fa-solid fa-user"></i>&emsp; My Profile</a>
								</li>
								<?php } ?>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa-solid fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="../../logout.php"><i class="fa-solid fa-power-off"></i>&emsp; Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>