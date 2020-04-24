<!-- <div class="page">
	<div class="info-geo">
		<div class="info-geo__tagline">
			<span class="info-geo__tagline__top-text">Food Marketplace</span>
			<span class="info-geo__tagline__low-text">A great online platform for buying / selling food</span>
		</div>
		<div class="info-geo__form">
			<button class="info-geo__form-button"><i class="fas fa-map-pin"></i></button>
			<input class="info-geo__form-input" type="text" placeholder="Enter your address...">
			<button class="info-geo__form-button"><i class="fas fa-angle-right"></i></button>
		</div>
	</div>
	<div class="info-steps">
		<div class="info-steps__title">
			<span class="info-steps__title__top-text">How it works?</span>
		</div>
		<div class="info-steps__list-step">
			<div class="info-steps__list-step__step">
				<object  data="/public/icons/svg/find.svg" class="info-steps__list-step__step__icon__find" type="image/svg+xml" width="50px;"></object>
				<span>1. Search</span>
				<p>Find your location and food</p>
				<p>Search => View</p>
			</div>
			<div class="info-steps__list-step__step">
				<object class="info-steps__list-step__step__icon__choose" type="image/svg+xml" data="/public/icons/svg/choose.svg"></object>
				<span>2. Choose</span>
				<p>Choosing delivery and wait</p>
				<p>Choose => Call</p>
			</div>
			<div class="info-steps__list-step__step">
				<object class="info-steps__list-step__step__icon__enjoy" type="image/svg+xml" data="/public/icons/svg/enjoy.svg"></object>
				<span>3. Enjoy</span>
				<p>Check and enjoy</p>
				<p>Pay => Enjoy</p>
			</div>
		</div>
	</div>
	<div class="info-cuisine">
		<div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true }'>
			<?php foreach ($listCuisine as $cuisine) {
				echo '<a class="carousel-cell"><object class="carousel__carousel-cell__svg" type="image/svg+xml" data="/public/icons/svg/'.$cuisine['cuisine'].'.svg"></object>'.$cuisine['cuisine'].'</a>';
			} ?>
		</div>
	</div>
	<div class="info-cities">
		<div class="info-cities__list-cities">
			<?php foreach ($listCities as $city) {
				echo '<a href="#" class="info-cities__list-cities__city" title="'.$city['city'].'">'.$city['city_native'].'</a>';
			} ?>
		</div>
	</div>
	<div class="info-feed">
		<div class="info-feed__puzzle">
			<div class="info-feed__puzzle__left">
				<object  data="/public/icons/svg/secure.svg" class="info-feed__puzzle__secure" type="image/svg+xml" width="150px;"></object>
			</div>
			<div class="info-feed__puzzle__right">
				<span class="info-feed__puzzle__title">Privacy and secure</span>
				<p class="info-feed__puzzle__text">All is save</p>
			</div>
		</div>
		<div class="info-feed__puzzle">
			<div class="info-feed__puzzle__left">
				<span class="info-feed__puzzle__title">Left side</span>
				<p class="info-feed__puzzle__text">Text side</p>
			</div>
			<div class="info-feed__puzzle__right">
				<span class="info-feed__puzzle__title">Right side</span>
				<p class="info-feed__puzzle__text">Text side</p>
			</div>
		</div>
	</div>
	<div class="info-ready">
		
	</div>
</div>


<hr>
<div class="puzzle">
	<div class="puzzle__right">
		<span>We give you a rating</span>
		<p>Just rate it!</p>
	</div>
	<div class="puzzle__left">
		<span>We give you a action</span>
		<p>Just use it!</p>
	</div>
</div>
<hr>

<div class="main-bottom_block">
	<span>Ready to Order?</span>
		<p>Let's do it!</p>
		<input type="text" placeholder="Enter your address...">
</div>


 -->