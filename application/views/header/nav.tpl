<nav>
	<div class='nav__left'>
		<a class="nav__link" id="btn-menu"> <i class="fas fa-bars"></i> </a>
	</div>
	<div class='nav__mid'>
		<a href='/' class="nav__link nav__logo"> site </a>
	</div>
	<div class='nav__right'>
		<a class="nav__link" id="btn-profile"> <i class="fas fa-user"></i> </a>
	</div>
</nav>

<?php 
	// Menu session
	if(isset($_SESSION['user'])){
		// User Menu
		if ($_SESSION['user']['role'] == 'user'){require_once 'application/views/header/menu-user.tpl';}

		// Admin Menu
		elseif ($_SESSION['user']['role'] == 'admin'){require_once 'application/views/header/menu-admin.tpl';}
	}

	// Default menu
	else{  require_once 'application/views/header/menu.tpl'; }
?>