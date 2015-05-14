jQuery(document).ready(function(){
	$('#filePicture').change(function(){
		if(this.disabled) return alert('File upload not supported!');
	    var F = this.files;
	    if(F && F[0]) 
			for(var i=0; i<F.length; i++) {
				var file = F[i];
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
						$('#editPhoto').hide();
				$('#submit-btn').show();
					};
					image.onerror= function() {
						alert('Invalid file type: '+ file.type);
					};      
				};
			}
				
	});
});