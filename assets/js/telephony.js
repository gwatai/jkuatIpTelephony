$(document).ready(function() {

	if (theme == 'admin') {
		notify_("Telepony admin");
	}


	$("#create_ext_camp").on("input",function()
	{
		var selectedCampus = $(this).val();

		alert("sasa");
		console.log(selectedCampus);


	});

	
});



function notify_(data)
{
	$.notify({
		icon: 'flaticon-alarm-1',
		title: data,
		message: 'Welcome Back',
	}, {
		type: 'secondary',
		placement: {
			from: "bottom",
			align: "right"
		},
		time: 1000,
	});
}



function check(id) {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		// toast: true,
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'

	}).then((result) => {
		var url = base_url + 'dashboard/delete_extension';
		console.log(url);
		//ajax 
		if (result.value) {
			$.ajax({
				url: base_url + 'dashboard/delete_extension',
				type: 'POST',
				data: {
					extension_id: id
				},
				success: function (data) {
					if (result.isConfirmed) {

						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						)
					}
				},
				complete: function () {
					swal.hideLoading();
				},
				error: function (jqXHR, textStatus, errorThrown) {
					swal.hideLoading();
					swal.fire("!Opps ", "Something went wrong, try again later", "error");
				}

			});
		}

	})
}