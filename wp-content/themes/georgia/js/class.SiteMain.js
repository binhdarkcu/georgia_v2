// JavaScript Document
var SiteMain = (function() {
	function init(){
		
	}
	
	function createScrollbar(){
		jQuery('.scrollbar').mCustomScrollbar({
			theme:"light",
			scrollButtons:{
				enable:false
			}
		});
	}
	
	
	return {
		init:init,
		createScrollbar:createScrollbar
	};
	
})();		

jQuery(document).ready( function() {
	SiteMain.init();
});
jQuery(window).load(function(){
	SiteMain.createScrollbar();
});
