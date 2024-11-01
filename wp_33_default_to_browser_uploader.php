<?php
/*
Plugin Name: WP 3.3 default to browser uploader
Plugin URI: http://bostinno.com/all-series/defaulting-the-wordpress-media-uploader-to-the-browser-uploader-in-wp-3-3-2
Description: This plugin defaults your media uploader to show the browser uploader. Useful if your users are experiencing frequent issues with the new HTML5 uploader.
Version: 0.1
Author: Streetwise Media
Author URI: http://streetwise-media.com
License: GPL2
*/

add_action('pre-html-upload-ui', 'streetwise_switch_to_browser_uploader');

function streetwise_switch_to_browser_uploader()
{
	?>
	<script type="text/javascript">
		(function($, exports) {
			$('document').ready(function() {
				var divs = $('#plupload-upload-ui, #html-upload-ui');
				var links = $('a').filter(function() { return $(this).text() == 'Switch to the new uploader' || $(this).text() == 'browser uploader'});
				links.click(function() {
					divs.each(function() {
						if ($(this).css('display') == 'none') $(this).show();
						else $(this).hide();
					});
				});
				$('#plupload-upload-ui').hide();
				$('#html-upload-ui').show();
			});
		})(jQuery, window);
	</script>
<?php
}