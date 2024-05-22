
jQuery(document).on("click", '#wordpress_ajax_form_btn', 
function(event) {
	event.preventDefault();

	var form = jQuery('#wordpress_ajax_form').serialize();
	// console.log(form);
	jQuery.ajax({
		url:my_ajax_obj.ajax_url,
		data:{
			'data': form,
			'action': 'custom_action'
		},
		type:'post',
		success:function(result){
			

		}

	});
});
