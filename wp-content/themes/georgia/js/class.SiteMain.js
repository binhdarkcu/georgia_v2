$arrayMonths_Long = ['januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december'];
$arrayMonths_short = ['jan','feb','maa','apr','mei','jun','jul','aug','sep','okt','nov','dec'];

var SiteMain = (function() {
    //INIT
	function init(){
		initEvent();
        initCSS();
	}
	
	function initEvent(){
		jQuery('#header-menu li.clslogin a').click(function(){
			openPopup('#login-user');
			return false;
		});
		jQuery('.popup .overlays').click(function(){
			closePopup();
		});
		jQuery('.add_guest a').click(function(){
			openPopup('#add_guest');
		});
	}

    function initCSS(){
        //set menu top last have border
        $('#menu-item-61').addClass('special');
    }

    //FUNCTIONS
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
	            /*jQuery('.cropit-image-loaded').css({
                    'background-image': 'url('+this.src+')',
                    'background-size': w + 'px ' + h + 'px'
                });*/
                $('.pictureUpload img.imgPreview').attr('src', this.src);

                $('.image-editor').cropit('imageSrc', this.src);
                $('.p_picture').html(this.src);


	            $('#editPhoto').hide();
	    		$('#submit-btn').show();

                SiteMain.openPopup('#message-cropit');
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

    //DROP FUNCTIONS
    function dropImage () {
        var src = $('.image-editor').cropit('export');
        $('.pictureUpload img.imgPreview').attr('src', src);
        $('.p_picture').html(src);
        closePopup();
    }

    //RETURN

	return {
		init:init,
		openPopup:openPopup,
		closePopup:closePopup,
		createScrollbar:createScrollbar,
        dropImage:dropImage,
		readImage:readImage
	};
	
})();		

jQuery(document).ready( function() {
	SiteMain.init();
});
jQuery(window).load(function(){
	SiteMain.createScrollbar();
    $('.scrollbar.scrollbarGuest').mCustomScrollbar("scrollTo", "bottom");
});
