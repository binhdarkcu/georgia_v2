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
	
	function readImage(file) {
	
	    var reader = new FileReader();
	    var image  = new Image();
	
	    reader.readAsDataURL(file);  
	    reader.onload = function(_file) {
	        image.src    = _file.target.result;              // url.createObjectURL(file);
	        image.onload = function() {
	            var w = this.width,
	                h = this.height,
	                t = file.type,                           // ext only: // file.type.split('/')[1],
	                n = file.name,
	                s = ~~(file.size/1024) +'KB';
	            jQuery('.pictureUpload img.imgPreview').attr('src', this.src);
	        };
	        image.onerror= function() {
	            alert('Invalid file type: '+ file.type);
	        };      
	    };
	
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
		createScrollbar:createScrollbar,
		readImage:readImage
	};
	
})();		

jQuery(document).ready( function() {
	SiteMain.init();
});
jQuery(window).load(function(){
	SiteMain.createScrollbar();
});
