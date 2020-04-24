<script>
	swal({
		title: 'Поздравляем <?php echo $name; ?>',
		text: 'Регистрация завершена успешно!',
		icon: 'success',
		button: 'Войти',
		}).then(function() {
			location.href = '/login';
	});
</script>