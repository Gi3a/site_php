<div id="menu" class="menu">
		<div class="menu__top">
			<div class="divider">
				<a href="/hot"><i class="fas fa-home"></i> <?php echo $lang['home'] ?></a>
			</div>
			<div class="divider">
				<a href="/hot"><i class="fas fa-fire"></i> <?php echo $lang['top'] ?></a>
			</div>

		</div>
		<div class="menu__bottom">
			<div class="divider">
				<!-- <a data-city><i class="far fa-building"></i><?php echo $lang['city'] ?>: <?php echo $_COOKIE['GEOSESS'] ?></a> -->
			</div>
			<div class="divider">
				<a submenu><i class="fas fa-globe-asia"></i> <?php echo $lang['lang'] ?><i class="fas fa-sort-down"></i></a>
				<div class="sublist subdivider">
					<a data-globe="en">EN</a>
                    <a data-globe="ru">RU</a>
				</div>
			</div>
			<div class="divider">
				<a submenu><i class="fas fa-info-circle"></i> <?php echo $lang['more'] ?><i class="fas fa-sort-down"></i></a>
				<div class="sublist subdivider">
					<a data-report><i class="far fa-flag"></i><?php echo $lang['report'] ?></a>
					<a href="/news"><i class="far fa-newspaper"></i> <?php echo $lang['news'] ?></a>
					<a href="/legal"><i class="fas fa-passport"></i> <?php echo $lang['agreement'] ?></a>
					<a href="/about"><i class="fa fa-hashtag"></i> <?php echo $lang['about'] ?></a>
				</div>
			</div>
		</div>
</div>


<div id="profile" class="menu">
	<div class="menu__top">
		<div class="divider">
			<a href="/@<?php echo $_SESSION['user']['login']; ?>"><i class="fa fa-home"></i> <?php echo $lang['home_page'] ?> </a>
		</div>
		<div class="divider mobile-nav">
			<a href="/liked"><i class="fas fa-heart"></i> <?php echo $lang['liked'] ?></a>
		</div>
	</div>
	<div class="menu__bottom">
		<div class="divider">
			<a href="/exit"><i class="fa fa-power-off"></i> <?php echo $lang['exit'] ?></a>
		</div>
	</div>
</div>