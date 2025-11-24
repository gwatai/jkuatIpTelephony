
$(document).ready(function () {

	$("#search").on("input", function () {

		$("#link").empty();

		var searchExt = $(this).val().trim();

		// console.log(searchExt);

		if (searchExt.length != 0) { //searchExt != ''  ||
			$.ajax({
				url: base_url + 'public_dash/search',
				type: 'POST',
				data: {
					ext: searchExt
				},
				success: function (data) {

//					console.log(data.ext);

					var table_data = "";

					table_data += "<thead> <tr> <th>#</th> <th>Campus</th> <th>Department</th> <th>Number</th><th>Owner Assigned</th></tr></thead>"

					table_data += "<tbody id='tbody'>";
					$.each(data.ext, function (i, val) {


						table_data += "<tr>";
						table_data += "<td>" + (i + 1) + "</td>";
						table_data += "<td>" + val.cname + "</td>";
						table_data += "<td>" + val.deptname + "</td>";
						table_data += "<td>" + val.extnumber + "</td>";
						table_data += "<td>" + val.owerassigned + "</td>";
						table_data += "</tr>";


					});
					table_data += "</tbody>"
					table_data += "<tfoot> <tr> <th>#</th> <th>Campus</th> <th>Department</th> <th>Number</th> <th>Owner Assigned</th> </tr> </tfoot>";

					$('#basic-datatables').html(table_data);
					$('#link').html(data.links);

				}

			});
		}
		else {
			$('#tbody').html("");
		}
	});


	$("#tel").on("submit", function (e) {
		e.preventDefault();
	});

	$("#camp").change(function () {
		var selectedCampus = $(this).val();

		if (selectedCampus !== "") {
			$.ajax({
				url: base_url + 'public_dash/get_campuses_depart',
				type: 'POST',
				data: {
					campus: selectedCampus
				},
				success: function (data) {
				//	console.log(data);

					var options = "";
					$.each(data, function (i, val) {

						options += "<option>" + val + "</option> ";


					});

					$('#depart').html(options);

					$('#depart').prepend("<option selected>Select Department</option>");

				}

			});
		}
	});


	$("#depart").change(function () {

		var selectedDepart = $(this).val();
		var selectedCampus = $("#camp").val();

		if (selectedDepart !== "") {
			$.ajax({

				url: base_url + 'public_dash/get_campuses_depart_ext',
				type: 'POST',
				data: {

					depart: selectedDepart,
					campus: selectedCampus

				},
				success: function (data) {

					console.log(data);
					var table_data = "";

					table_data += "<thead> <tr> <th>#</th> <th>Campus</th> <th>Department</th> <th>Number</th><th>Owner Assigned</th></tr></thead>"

					table_data += "<tbody id='tbody'>";
				
						$.each(data, function (i, val) {
						table_data += "<tr>";
						table_data += "<td>" + (i + 1) + "</td>";
						table_data += "<td>" + val.cname + "</td>";
						table_data += "<td>" + val.deptname + "</td>";
						table_data += "<td>" + val.extnumber + "</td>";
						table_data += "<td>" + val.owerassigned + "</td>";
						table_data += "</tr>";


					});

					table_data += "</tbody>"
					table_data += "<tfoot> <tr> <th>#</th> <th>Campus</th> <th>Department</th> <th>Number</th> <th>Owner Assigned</th> </tr> </tfoot>";


					$('#basic-datatables').html(table_data);

				}
			});

		}

	});


	$("#create_ext_camp").on("input", function () {
		// alert("sasa");

		var selectedCampus = $(this).val().trim();
		//console.log(selectedCampus);

		if (selectedCampus.length !== 0) {
			$.ajax({
				url: base_url + 'public_dash/get_campuses_depart',
				type: 'POST',
				data: {
					campus: selectedCampus
				},
				success: function (data) {

					//console.log(data);

					var options = "";
					$.each(data, function (i, val) {

						options += "<option value='" + val + "'>" + val + "</option> ";


					});

					$('#depart').html(options);

					$('#depart').prepend("<option selected>Select Department</option>");

				}
			});
		}

	});





});

function notify_() {
	if (theme == 'admin') {
		// notify_("Telepony admin");


		//console.log(data);

		$.notify({
			icon: 'flaticon-alarm-1',
			title: "Telephony admin",
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
		//console.log(url);
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
							'The extension has been deleted.',
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
