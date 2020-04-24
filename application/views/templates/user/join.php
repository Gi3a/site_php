<div class="page">

	<?php if ($this->route['role'] == 'user'): ?>
		<!-- Join as User -->
		<div class="block form__under">
			<span> <h2><?php echo $lang['join_user'] ?></h2> </span>
			<span> <i class="fas fa-user-plus" style="color: #985327d4;"></i> </span>
		</div>
		<div class="block">
			<form class="form" method="post" action="/join/user">
				<div class="form-block">
					<label class="form__label"><?php echo $lang['label_email'] ?></label>
					<input class="form__input" type="text" name="email">
				</div>
				<div class="form-block">
					<label class="form__label"><?php echo $lang['label_new_login'] ?></label>
					<input class="form__input" type="text" name="login">
				</div>
				<div class="form-block">
					<label class="form__label"><?php echo $lang['label_name'] ?></label>
					<input class="form__input" type="text" name="name">
				</div>
				<div class="form-block">
					<label class="form__label"><?php echo $lang['label_new_password'] ?></label>
					<input class="form__input" type="password" name="password">
				</div>
				<div class="form-block">
					<input class="form__submit" type="submit" value="<?php echo $lang['label_continue'] ?>">
				</div>
			</form>
		</div>
	<?php else: ?>
		<?php $this->redirect('404'); ?>
	<?php endif; ?>

	<!-- Under Form -->
	<hr>
	<div class="block form__under">
		<span><?php echo $lang['label_already_have'] ?><a href="/login"><?php echo $lang['label_an_account'] ?>?</a></span>
	</div>
	<div class="block form__under">
		<span><?php echo $lang['label_join_or_login'] ?><br><?php echo $lang['label_agree_with'] ?><br>
		<a href="/legal/terms"><?php echo $lang['label_terms'] ?></a> Site <?php echo $lang['label_and'] ?><a href="/legal/privacy"><?php echo $lang['label_privacy'] ?></a>.</span>
	</div>
</div>