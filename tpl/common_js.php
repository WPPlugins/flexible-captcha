<script language="javascript" type="text/javascript">
	jQuery(function() {
		jQuery('#FC-ui-notices').dialog({
			dialogClass: 'FC-ui-dialog',
			closeText: 'X',
			autoOpen: false,
			resizable: false,
			height: "auto",
			width: (jQuery(window).width() > 400)?'400':jQuery(window).width()-20,
			modal: true,
			position: {within: '.FC-content-wrap'},
			buttons: {
				"Ok": function() {
					jQuery(this).dialog("close");
				}
			},
			open: function(event, ui) {
				jQuery('.ui-widget-overlay.ui-front').css('position', 'fixed');
				jQuery('.ui-widget-overlay.ui-front').css('left', '0px');
				jQuery('.ui-widget-overlay.ui-front').css('right', '0px');
				jQuery('.ui-widget-overlay.ui-front').css('top', '0px');
				jQuery('.ui-widget-overlay.ui-front').css('bottom', '0px');
				jQuery('.ui-widget-overlay.ui-front').css('background', '#000');
				jQuery('.ui-widget-overlay.ui-front').css('opacity', '.5');
				jQuery('.ui-widget-overlay.ui-front').css('zIndex', '9998');
			}
		});
	});

	function FC_toggle_loading(container) {
		jQuery(container+' .FC-loading-container').toggle();
		jQuery(container+' .inside').toggle();
	}

	function FC_submit_ajax(action, postVars, container, callback) {
		FC_toggle_loading(container);
		jQuery.post(encodeURI(ajaxurl + '?action='+action), postVars, function (result) {
			if (typeof(callback) == 'function') {
				callback();
			}
			FC_display_ui_dialog('Submission Result', result);

			FC_toggle_loading(container);
		});
	}

	function FC_display_ui_dialog(dialogTitle, dialogText) {
		jQuery('.FC-ui-dialog .ui-dialog-title').html(dialogTitle);
		jQuery('#FC-ui-notices-container').html(dialogText);
		jQuery('#FC-ui-notices').dialog('open');
	}
</script>