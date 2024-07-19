<aside id="sidebar-left" class="sidebar-left" style="background-color: #374151">
				
	<div class="sidebar-header">
		<div class="sidebar-title">
			
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle"  style="margin: 0; padding:0;">
			<i class="fa-solid fa-bars" aria-label="Toggle sidebar" style="position: absolute; top: 17px; font-size: 17px;"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="nav-active">
						<a href="./index.php">
							<i class="fa-solid fa-home" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
							<span style="font-family: 'Cutive Mono'; font-size: 16px;">Dashboard</span>
						</a>
					</li>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == "r")){ ?>
					<li class="nav-parent">
						<a>
							<i class="fa-solid fa-chair" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
							<span style="font-family: 'Cutive Mono'; font-size: 16px;">Restaurant Table</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="./addTable.php">
									<span class="pull-right label label-primary">add</span>
									<i class="fa-solid fa-plus-square" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
									<span style="font-size: 14px;">Table</span>
								</a>
							</li>
							<li>
								<a href="./tableList.php">
									<span class="pull-right label label-success" style="padding: 4px 8px;">list</span>
									<i class="fa-solid fa-table-list" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
									<span style="font-size: 14px;">Table</span>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == "r")){ ?>
					<li class="nav-parent">
						<a>
							<i class="fa-solid fa-kitchen-set" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
							<span style="font-family: 'Cutive Mono'; font-size: 16px;">Menu Item</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="./addMenu.php">
									<span class="pull-right label label-primary">add</span>
									<i class="fa-solid fa-plus-square" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
									<span style="font-size: 14px;">Menu</span>
								</a>
							</li>
							<li>
								<a href="./menuList.php">
									<span class="pull-right label label-success"  style="padding: 4px 8px;">list</span>
									<i class="fa-solid fa-table-list" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
									<span style="font-size: 14px;">Menu</span>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == "r")){ ?>
					<li class="nav-parent">
						<a>
							<i class="fa-solid fa-receipt" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
							<span style="font-family: 'Cutive Mono'; font-size: 16px;">Booking</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="./bookingList.php">
									<span class="pull-right label label-info">list</span>
									<i class="fa-solid fa-table-list" aria-hidden="true" style="font-size: 16px; margin-right: 10px;"></i>
									<span style="font-size: 14px;">Booking</span>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?> 
				</ul>
			</nav>

			<hr class="separator" />
		</div>

	</div>

</aside>