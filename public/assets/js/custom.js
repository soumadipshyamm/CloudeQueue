// login page password
$(".toggle-eye").click(function () {

	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
		input.attr("type", "text");
	} else {
		input.attr("type", "password");
	}
});



//   preloader
$(window).on('load', function () {
	$("#preloader").fadeOut(1000);
});

// profile name
$(document).ready(function () {
	var firstName = $('.firstName').text();
	var intials = firstName.charAt(0);
	var profileImage = $('.profileImage').text(intials);
});




//   application progress bar
function increase() {
 
    let SPEED = 40;    
    let limit = parseInt(document.getElementsByClassName("value1").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementsByClassName("value1").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase();

