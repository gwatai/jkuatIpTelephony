$(document).ready(function ()
{

//var base_url = <?php //echo base_url(); ?>;

console.log(base_url);

//Notify

$.notify({
	icon: 'flaticon-alarm-1',
	title:'Telephony Admin',
	message: 'Welcome Back',
},{
	type: 'secondary',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

});

function testing(data)
{
	alert(data);
	console.log("working");
}