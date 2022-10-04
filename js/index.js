// to toggle show password
var state = false;
function toggle() { 
    if(state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").className="far fa-eye";
        state = false;
    } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").className="far fa-eye-slash";
        state = true;
    }
}
// to toggle show password on confirm password field
var state = false;
function toggle2() {
    if(state) {
        document.getElementById("confirmPassword").setAttribute("type", "password");
        document.getElementById("eye2").className="far fa-eye";
        state = false;
    } else {
        document.getElementById("confirmPassword").setAttribute("type", "text");
        document.getElementById("eye2").className="far fa-eye-slash";
        state = true;
    }
}

// notification ajax handler
function pay_notif_seen() {
	// alert('working');
	$(document).ready(function(){
		$('.payNotif').click(function(){
			var id = $(this).data('id');
			// alert (id);
			$.ajax({
				url: 'admins_operations.php?operation=pay_notif_seen',
				type: 'post',
				data: {id:id},
				success: function(response){
					// alert(response);
					// $('.payNotif').addClass('response');
					document.getElementsByTagName('body').append(response);
				}
			})
		})
		
	})
}

// notification ajax handler
function req_notif_seen() {
	// alert('working');
	$(document).ready(function(){
		$('.reqNotif').click(function(){
			var id = $(this).data('id');
			// alert (id);
			$.ajax({
				url: 'admins_operations.php?operation=req_notif_seen',
				type: 'post',
				data: {id:id},
				success: function(response){
					alert(response);
					// $('.payNotif').addClass('response');
					// document.getElementsByTagName('body').append(response);
				}
			});
		});
		
	});
}

// notification ajax handler
function user_notif_seen() {
	// alert('working');
	$(document).ready(function(){
		$('.userNotif').click(function(){
			var id = $(this).data('id');
			// alert (id);
			$.ajax({
				url: 'process.php?operation=user_notif_seen',
				type: 'post',
				data: {id:id},
				success: function(response){
					alert(response);
					// $('.payNotif').addClass('response');
					// document.getElementsByTagName('body').append(response);
				}
			});
		});
		
	});
}

// notification count ajax handler 

$(document).ready(function(){
	// hide all error alert boxes until there is error
    $('#alert').css({
    	display: 'none'
    });

    // adding admin ajax handler
    $('#addAdminSubmit').click(function(){
    	// alert('working');
    	var data = {
    		'surname': $('#surname').val(),
			'firstname': $('#firstname').val(),
			'email': $('#email').val(),
			'gender': $('#gender').val(),
			'phone': $('#phone').val(),
			'token': $('#token').val(),
			'addAdminSubmit': true,
    	}
    	$.ajax({ // send ajax request
			url: 'admins_operations.php?operation=add_admin_handler',
			type: 'post',
			data: data,
			success: function(response){ //console.log(response);
				if (response == 1) {
					window.location.replace('admins.php?msg=New Admin Added Successfully&alertClass=alert-success');
					// $('#alert').html(response);
					// $('#alert').css({
				 //    	display: 'block'
				 //    });
				} else {
					$('#alert').html(response);
					$('#alert').css({
				    	display: 'block'
				    });
				}
			}
		});
    })

	// sign up ajax handler
	$('#signupSubmit').click(function(){
		var data = { // collect the values of input fields
			'surname': $('#surname').val(),
			'firstname': $('#firstname').val(),
			'email': $('#email').val(),
			'gender': $('#gender').val(),
			'phone': $('#phone').val(),
			'password': $('#password').val(),
			'confirmPassword': $('#confirmPassword').val(),
			'signupSubmit': true,
		}; //console.log(data);
		$.ajax({ // send ajax request
			url: 'handlers/signup_handler.php',
			type: 'post',
			data: data,
			success: function(response){ //console.log(response);
				if (response == 1) {
					window.location.replace('register.php');
				} else {
					$('#alert').html(response);
					$('#alert').css({
				    	display: 'block'
				    });
				}
			}
		});
	});

	$('#loginAlert').css({
    	display: 'none'
    });
	// user login ajax handler
	$('#loginSubmit').click(function(){ 
		var data = { // collect the values of email and password
			'email': $('#email').val(),
			'password': $('#password').val(),
			'loginSubmit': true,
		}
		$.ajax({ // send ajax request
			url: 'handlers/login_handler.php',
			type: 'post',
			data: data,
			success: function(response){
				if (response == 1) {
					window.location.replace('index.php');
				} else {
					$('#loginAlert').html(response);
					$('#loginAlert').css({
				    	display: 'block'
				    });
				}
			}
		});
	});

	// admin login ajax handler
	$('#adminLoginSubmit').click(function(){
		var data = { // collect the values of email and password
			'email': $('#email').val(),
			'password': $('#password').val(),
			'adminLoginSubmit': true,
		}
		$.ajax({ // send ajax request
			url: '../handlers/login_handler.php',
			type: 'post',
			data: data,
			success: function(response){
				if (response == 1) {
					window.location.replace('index.php');
				} else if (response == 2) {
					window.location.replace('../admin/admins_operations.php?operation=admin_create_password');
				} else {
					$('#alert').html(response);
					$('#alert').css({
				    	display: 'block'
				    });
				}
			}
		});
	});

	// register house ajax handler
	$('#registerSubmit').click(function(){
		var data = { // collect the values of input fields
			'houseName': $('#houseName').val(),
			'houseNo': $('#houseNo').val(),
			'location': $('#location').val(),
			'landmark': $('#landmark').val(),
			// 'gps': $('#gps').val(),
			'district': $('#district').val(),
			'region': $('#region').val(),
			'town': $('#town').val(),
			'area': $('#area').val(),
			'desc': $('#desc').val(),
			// 'area': $('#area').val(),
			// 'area': $('#area').val(),
			'registerSubmit': true,
		}; //console.log(data);
		$.ajax({ // send ajax request
			url: 'handlers/signup_handler.php',
			type: 'post',
			data: data,
			success: function(response){
				if (response == 1) {
					window.location.replace('index.php');
				} else {
					$('#alert').css({
				    	display: 'block'
				    });
					$('#alert').html(response);
				}
			}
		});
	});

	// fetch location google map ajax handler
	$('#location').change(function(){
		var location = $(this).val();
		// alert(location);
		$.ajax({ // send ajax request
			url: 'handlers/signup_handler.php?operation=fetch_loc_on_map',
			type: 'post',
			data: {location: location},
			success: function(response){ //alert(response);
				$('.loc').html(response);
				// if (response == 1) {
				// 	window.location.replace('index.php');
				// } else {
				// 	$('#alert').css({
				//     	display: 'block'
				//     });
				// 	$('#alert').html(response);
				// }
			}
		});
	});

	$('#modalAlert').css({
    	display: 'none'
    });
	// request waste pickup ajax handler
	$('#requestSubmit').click(function(){
			var email =  $('#email').val();
		var data = { // collect the values of input fields
			'email': $('#email').val(),
			'wasteType': $('#wasteType').val(),
			// 'location': $('#location').val(),
			// 'landmark': $('#landmark').val(),
			// 'gps': $('#gps').val(),
			'date': $('#date').val(),
			'payment': $('#payment').val(),
			'size': $('#size').val(),
			'time': $('#time').val(),
			// 'desc': $('#desc').val(),
			// 'area': $('#area').val(),
			// 'area': $('#area').val(),
			'requestSubmit': true,
		}; //console.log(data);
		$.ajax({ // send ajax request
			url: 'process.php?operation=request_pickup',
			type: 'post',
			data: data,
			success: function(response){
				if (response == 1) {
					window.location.replace('index.php?msg=Your request is submited successfully&cssClass=alert-success');
					// $.ajax({
					// 	url: 'process.php?operation=request_pay',
					// 	type: 'post',
					// 	data: {email: email},
					// 	success: function(response){
					// 		$('#payModalBody').html(response);
					// 	}
					// })
					// $('#requestModal').modal('hide');
					// $('#payModal').modal('show');
				} else {
					// alert(response);
					$('#modalAlert').css({
				    	display: 'block'
				    });
					$('#modalAlert').html(response);
				}
			}
		});
	});

	// get amout to pay on waste type change handler
	$('#wasteType').change(function(){
		var wasteType = $(this).val();
		// alert (wasteType);
		var size = $('#size').val();
		// alert (size);
		if ($('#size').val() != '') {
			var data = {
				'wasteType': wasteType,
				'size': size,
				'submit': true,
			};
			$.ajax({
				url: 'process.php?operation=fetch_price',
				type: 'POST',
				data: data,
				success: function(response){
					// alert(response);
					$('#totalAmount').html(response);
				}
			});
		}
	});

	// get amout to pay on waste size change handler
	$('#size').keyup(function(){
		var size = $(this).val();
		// alert (wasteType);
		var wasteType = $('#wasteType').val();
		// alert (size);
		if ($('#wasteType').val() != '') {
			var data = {
				'wasteType': wasteType,
				'size': size,
				'submit': true,
			};
			$.ajax({
				url: 'process.php?operation=fetch_price',
				type: 'POST',
				data: data,
				success: function(response){
					// alert(response);
					$('#totalAmount').html(response);
				}
			});
		}
	});

	// delete user confirmation pop up handler
	$('.deleteBtn').on('click', function() {
		$('#deleteModal').modal('show');
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();

		// console.log(data);
		$('#delete_id').val(data[1]);

	});

	// postpone modal js code
	$(document).ready(function(){
        $('.postponeBtn').on('click', function(){
            $('#postponeModal').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#email').val(data['0']);
            $('#oldDate').val(data[4]);
            $('#oldTime').val(data[5]);
            // console.log($('#time').val(data[5]));

        });
    });

	$('#msgAlert').css({
    	display: 'none'
    });
    // user contact message to admin handler
    $('#msgSubmit').click(function () {
    	var data = {
    		'name': $('#name').val(),
    		'email': $('#email').val(),
    		'msg': $('#msg').val(),
    		'msgSubmit': true,
    	}
    	// console.log(data);
    	$.ajax({
    		url: 'process.php?operation=contact',
    		type: 'post',
    		data: data,
    		success: function(response){
    			if (response == 1) {
    				$('#msgAlert').addClass('alert-success').removeClass('alert-danger');
    				$('#msgAlert').css({
				    	display: 'block'
				    });
	    			$('#msgAlert').html("Thank you for contacting us, we will reply you through your email provided");
    			} else {
    				$('#msgAlert').addClass('alert-danger').removeClass('alert-success');
    				$('#msgAlert').css({
				    	display: 'block'
				    });
	    			$('#msgAlert').html(response);
    			}
    			
    		}
    	})
    });

    // view more info about pick up handler
    $('.more_info').click(function(){
    	var userEmail = $(this).data('id');
    	// alert (userEmail);
    	$.ajax({
    		url: 'requests_handler.php?operation=more_info',
    		type: 'post',
    		data: {userEmail: userEmail},
    		success: function(response){
    			$('.moreInfoModalBody').html(response);
    			$('#moreInfoModal').modal('show');
    		}
    	});
    });

    // finished ajax handler
    $('.finished').click(function(){
    	var fin = this;
    	var requestId = $(this).data('id');
    	// alert(requestId);
    	$.ajax({
    		url: 'requests_handler.php?operation=finished',
    		type: 'post',
    		data: {requestId: requestId},
    		success: function(response){ //alert(response);
    			if (response == 1) {
    				$(fin).closest('tr').css('background', '#001c6c');
	                $(fin).closest('tr').fadeOut(800, function () {
	                    $(this).remove();
	                });
    			} else {
    				$('#alert').css({
				    	display: 'block'
				    });
    				$('#alert').html(response);
    			}
    		}
    	});
    });

    // cancel waste pickup request ajax handler
    $('.cancelRequest').click(function(){
    	var cancel = this;
    	var cancelRequest = $(this).data('id');
    	// alert(cancelRequest);
    	$.ajax({
    		url: 'process.php?operation=cancel_request',
    		type: 'post',
    		data: {cancelRequest: cancelRequest},
    		success: function(response){ //alert(response);
    			if (response == 1) {
    				$(cancel).closest('tr').css('background', '#001c6c');
	                $(cancel).closest('tr').fadeOut(800, function () {
	                    $(this).remove();
	                });
    			} else {
    				$('#alert').css({
				    	display: 'block'
				    });
    				$('#alert').html(response);
    			}
    		}
    	});
    });

    $('#spinner').hide(); //hide spinner until loading
    // admin reply message ajax handler
    $('.replyMsgBtn').click(function () {
    	// $('.replyModal').modal('hide');
    	var data = {
    		'email': $('#email').val(),
    		'toMsg': $('#toMsg').val(),
    		'replyMsg': $('textarea#replyMsg').val(),
    		'replyMsgSubmit': true,
    	}
    	// console.log(data);
    	$.ajax({
    		url: 'messages_handler.php',
    		type: 'post',
    		data: data,
    		beforeSend: function(){
    			// $('.spinner').show();
    			$('.replyMsgBtn').html('<div class="spinner-border spinner-border-sm" id="spinner" role="status"></div> Sending Reply...');
    		},
    		success: function(response){
    			$('.replyMsgBtn').html('Reply');
    			if (response == 1) {
    				$('.replyModal').modal('hide');
    				$('#alert').css({
				    	display: 'block'
				    });
    				$('#alert').addClass('alert-success').removeClass('alert-danger');
    				$('#alert').html('Reply send successfully');//alert(response);
    			} else {
    				$('#alert').css({
				    	display: 'block'
				    });
    				$('#alert').html(response);
    				$('.replyModal').modal('hide');
    				//alert(response);
    			}
    		},
    	});
    });

    // Pay pop up handler
	$('.payModalBtn').on('click', function() {
		$('#payModal').modal('show');
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();

		// console.log(data);
		$('#payId').val(data[0]);
	});

	// display number of notification
    function showOnline() { //code to show comment
        $.ajax({ 
            url: 'admins_operations.php?operation=notification_count',
            type: 'post',
            success:function(response){
                $('#notifCount').html(response);
                // alert('response');
            }
        });
        
    }
    showOnline();
    setInterval(function(){ //function to reload the notification every ten seconds
        showOnline();
    }, 1000);

	// clear notification count when notification button click
    $('#notifBtn').click(function(){
        var notification = $('#notifCount').innerText;
        $.ajax({
            url: 'admins_operations.php?operation=notification_clear',
            method: 'post',
            data: {notification:notification},
            // dataType: 'text',
            success: function(response){
                $('#notifCount').html(response);
            }
        });
    });

	// display number of notification
    function notif_page() { //code to show comment
        $.ajax({ 
            url: 'admins_operations.php?operation=notif_page',
            type: 'post',
            success:function(response){
                $('#notifDisplay').html(response);
                // alert(response);
            }
        })
    }
    notif_page();
    setInterval(function(){ //function to reload the comment every ten seconds
        notif_page();
    }, 1000);

    // display number of user notification
    function user_notif_page() { //code to show comment
        $.ajax({ 
            url: 'process.php?operation=user_notif_page',
            type: 'post',
            success:function(response){
                $('#userNotifDisplay').html(response);
                // alert(response);
            }
        })
    }
    user_notif_page();
    setInterval(function(){ //function to reload the comment every ten seconds
        user_notif_page();
    }, 1000);

	// display number of user notification
    function userNotifCount() { //code to show comment
        $.ajax({ 
            url: 'process.php?operation=user_notif_count',
            type: 'post',
            success:function(response){
                $('#userNotifCount').html(response);
                // alert(response);
            }
        })
    }
    userNotifCount();
    setInterval(function(){ //function to reload the comment every ten seconds
        userNotifCount();
    }, 1000);

	// clear user notification count when notification button click
    $('#userNotifBtn').click(function(){
        var notification = $('#userNotifCount').innerText;
        $.ajax({
            url: 'process.php?operation=user_notif_clear',
            method: 'post',
            data: {notification:notification},
            // dataType: 'text',
            success: function(response){
                $('#userNotifCount').html(response);
            }
        });
    });

});
