<?php

function download(){
    ?>
	
    <script type="text/javascript">
		function SaveToDisk(fileURL, fileName) {
			// for non-IE
			if (!window.ActiveXObject) {
				var save = document.createElement('a');
				save.href = fileURL;
				save.target = '_blank';
				save.download = fileName || 'unknown';

				var evt = new MouseEvent('click', {
					'view': window,
					'bubbles': true,
					'cancelable': false
				});
				save.dispatchEvent(evt);

				(window.URL || window.webkitURL).revokeObjectURL(save.href);
			}

			// for IE < 11
			else if ( !! window.ActiveXObject && document.execCommand)     {
				var _window = window.open(fileURL, '_blank');
				_window.document.close();
				_window.document.execCommand('SaveAs', true, fileName || fileURL)
				_window.close();
			}
		}


     var downloadURL = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';   
        document.addEventListener( 'wpcf7mailsent', function( event ) {
		if ( '25' == event.detail.contactFormId ) {

		var m = /[^/]*$/.exec(downloadURL)[0];
		SaveToDisk(downloadURL, m);
		}
		}, false );
		//document.addEventListener( 'wpcf7submit', function( event ) { alert( "Fire!" ); location = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'; }, true );
    </script>
    <?php
}
add_action('wp_footer', "download");
