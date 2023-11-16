jQuery(function(){
	initStickyHeader();
	initNavOpener();
});
function initNavOpener(){
	jQuery('body').each(function() {
		var holder = jQuery(this);
			navOpener = holder.find('.nav-opener'),
			navActiveClass = 'nav-active';

		navOpener.on('click', function(e){
			e.preventDefault();
			holder.toggleClass(navActiveClass);
		})
	});
}
// sticky header init
function initStickyHeader(){
	var win = jQuery(window),
		header = jQuery('#header'),
		headerHolder = jQuery('.header-holder'),
		navigation = jQuery('#nav'),
		fixedClass = 'header-fixed';

	win.on('scroll', function(){
        var headerHolderHeight = headerHolder.outerHeight(),
			navigationHeight = navigation.outerHeight(),
			scroll = jQuery(window).scrollTop();

		if(scroll > headerHolderHeight) {
			header.addClass(fixedClass).css('padding-bottom', navigationHeight);
        } else {
			header.removeClass(fixedClass).css('padding-bottom', 0);
		}
	});
}
