/* ===================
    Menu

    Project: PHP_Site;
    Type: Menu;
    Author: Gi3a;

=================== */

(function() { 
	class Menu { 
		constructor(menu, btns) { 
			this.menu = document.querySelector(menu); 
			this.toggleMenu = this.toggleMenu.bind(this); 
			for (var i = 0; i < btns.length; i++) {
                var btn = document.querySelector(btns[i]);
                if (btn) {btn.addEventListener('click', this.toggleMenu);}
            }
		} 
		toggleMenu(e) { 
            e.preventDefault(); 
            if (this.menu.classList.contains('is-open')) {
            var openElements = document.querySelectorAll('.is-open'); 
                Array.prototype.forEach.call(openElements, function(el) {
                    el.classList.remove('is-open');
                }) 
            } else { 
                var openElements = document.querySelectorAll('.is-open');
                Array.prototype.forEach.call(openElements, function(el) {
                    el.classList.remove('is-open');
                })
                this.menu.classList.add('is-open'); 
            } 
        }
	} 
	var menu = new Menu('#menu', ['#btn-menu']); 

	var menu2 = new Menu('#profile', ['#btn-profile']);
}())



$("a[submenu]").click(function(e){
    $('div.sublist').not( $(this).next('div.sublist')).removeClass("expanded").slideUp();
    $(this).next('div.sublist').toggleClass("expanded").slideToggle(250).css('display', 'flex');
});
