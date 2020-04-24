/* ===================
	Scripts

	Project: PHP_Site;
	Type: Scripts;
	Author: Gi3a;

=================== */


/* ===================
	Scripts && Jquery
=================== */

$(document).ready(function() {


	/* Default Settings */
 	var curPage = location.href;
	var prevPage = sessionStorage.getItem('curPage');
	var hostPage = location.hostname;

	sessionStorage.setItem('curPage', curPage);
	sessionStorage.setItem('prevPage', prevPage);

/*=== Language Function ===*/


// Set Language as default
	if (!($.cookie('SSLANG'))) {
		var language = window.navigator ? (window.navigator.language ||
		window.navigator.systemLanguage ||
		window.navigator.userLanguage) : "ru";
		language = language.substr(0, 2).toLowerCase();
		if ((language != 'ru') || (language != 'en') || (language != 'cn') || (language != 'es')) {language = 'en';}
		$.cookie('SSLANG',language);
	}

// Set language as choosen
	$("a[data-globe]").click(function(){
		var language = $(this).attr('data-globe');
		$.cookie('SSLANG',language);
		location.reload();
	});

});