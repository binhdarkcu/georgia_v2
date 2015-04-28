// JavaScript Document
var SiteMain = (function() {
	function init(){
		initEvent();
	}
	
	function initEvent(){
		jQuery('.sf-menu li.clslogin a').click(function(){
			openPopup('#login-user');
			return false;
		});
		jQuery('.popup .overlays').click(function(){
			closePopup();
		});
	}
	function createScrollbar(){
		jQuery('.scrollbar').mCustomScrollbar({
			theme:"light",
			scrollButtons:{
				enable:false
			}
		});
	}
	
	function openPopup(idDiv){
		jQuery('.popup').css('display','none');
		jQuery(idDiv).css('display','block');
	}
	
	function closePopup(){
		jQuery('.popup').css('display','none');
	}
	
	return {
		init:init,
		openPopup:openPopup,
		closePopup:closePopup,
		createScrollbar:createScrollbar
	};
	
})();		

jQuery(document).ready( function() {
	SiteMain.init();
});
jQuery(window).load(function(){
	SiteMain.createScrollbar();
});
