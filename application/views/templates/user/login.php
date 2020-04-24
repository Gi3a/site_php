<div class="page">
	<div class="block form__under">
		<span><h2><?php echo $lang['login'] ?></h2></span>
		<span> <i class="fas fa-walking" style="color: #2a81dd;"></i> </span>
	</div>
	<div class="block">
		<form class="form" method="post" action="/login">
			<div class="form-block">
				<label class="form__label"><?php echo $lang['label_login'] ?></label>
				<input class="form__input" type="text" name="login">
			</div>
			<div class="form-block">
				<label class="form__label"><?php echo $lang['label_password'] ?></label>
				<input class="form__input" type="password" name="password">
			</div>
			<div class="form-block">
				<input class="form__submit" type="submit" value="<?php echo $lang['label_continue'] ?>">
			</div>
		</form>
	</div>
	<hr>
	<div class="block form__under">
		<span><?php echo $lang['label_create'] ?><a href="/join"><?php echo $lang['label_an_account'] ?>?</a></span>
	</div>
	<div class="block form__under">
		<span><?php echo $lang['label_join_or_login'] ?><br><?php echo $lang['label_agree_with'] ?><br>
		<a href="/legal/terms"><?php echo $lang['label_terms'] ?></a> Shef <?php echo $lang['label_and'] ?><a href="/legal/privacy"><?php echo $lang['label_privacy'] ?></a>.</span>
	</div>
</div>