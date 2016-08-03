$(function () {

	$('#getPhoneCode').click(function() {

		var phone = $('#phone').val();
		if (phone == '') {
			alert('填写手机号');
            return false;
		}

		var url = $(this).attr('code-url');

		$.post(url, {phone: phone}, function(msg) {
            if (msg) {
                $('#msgword').val(msg);
            }
		}, 'json')
	});

	$('#paySub').click(function() {

		var url = $(this).attr('sub-url');
		var data = $('#payForm').serialize();
		
		$.post(url, data, function(msg){
            console.log(msg);
			if (msg == 1) {

				location.href = location.href;
			} else if (typeof msg == 'string') {

                $('#errorTip').empty().html('<div class="alert alert-warning fade in"><button type="button" class="close" data-dismiss="alert">×</button> <strong>'+msg+'</strong></div>');
            }
		}, 'json');
	});
});
