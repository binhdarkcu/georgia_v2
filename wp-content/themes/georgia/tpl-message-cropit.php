<div class="popup message-popup" id="message-cropit" style="display: none;">
	<div class="overlays" onclick="window.location.reload()"></div>
		<div class="popup-content">
			<a href="javascript:void(0)" class="close" onclick="SiteMain.closePopup()">x</a>
            <style>

            </style>
            <div class="image-editor">
                <div class="image-size-label">
                    Resize image
                </div>
                <div class="col1">
                    <div class="cropit-image-preview"></div>

                    <div class="slider-wrapper"><span class="icon icon-image small-image"></span><input type="range" class="cropit-image-zoom-input custom" min="0" max="1" step="0.01"><span class="icon icon-image large-image"></span></div>
                </div>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn left" onclick="SiteMain.closePopup()">Cancel</a>
                    <a href="javascript:void(0)"  class="btn right" onclick="SiteMain.dropImage()">Drop Image</a>
                </div>

            </div>


		</div>
	</div>
</div>