$(document).ready(function() {
	$('form[name=formaction]').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
                    window.location.href = json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
});