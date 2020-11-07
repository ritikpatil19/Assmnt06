document.querySelector('#register').addEventListener('click',validateDetails);
document.querySelector('#firstname').addEventListener('focusout',validateFName);
document.querySelector('#lastname').addEventListener('focusout',validateLName);
document.querySelector('#collegename').addEventListener('focusout',validateCName);
document.querySelector('#phone').addEventListener('focusout',validatePhone);
document.querySelector('#email').addEventListener('focusout',validateEmail);

function validateFName(){
	var regex = /^[a-zA-Z]{3,}$/;
	var fname = document.getElementById('firstname').value;
	if(!regex.test(fname)){
		document.getElementById('firstname').value = "";
		alert("Invalid First Name...!!!");
	}
}

function validateLName(){
	var regex = /^[a-zA-Z]{3,}$/;
	var lname = document.getElementById('lastname').value;
	if(!regex.test(lname)){
		document.getElementById('lastname').value = "";
		alert("Invalid Last Name...!!!");
	}
}

function validateCName(){
	var regex = /^([a-zA-Z\s]{3,})+$/;
	var cname = document.getElementById('collegename').value;
	if(!regex.test(cname)){
		document.getElementById('collegename').value = "";
		alert("Invalid College Name...!!!");
	}
}

function validatePhone(){
	var phone = document.getElementById('phone').value;
	var regex = /^((?![0-5]))[0-9]{10}$/;

	if (!regex.test(phone)) {
		document.getElementById('phone').value = "";
		alert("Invalid Phone Number....!!!");
	}
}

function validateEmail(){
	var regex = /^(([a-zA-Z0-9_\.\-]{3,})@([a-zA-Z\.])+\.([a-zA-Z]){2,5})$/;
	var email = document.getElementById('email').value;
	if (!regex.test(email)) {
		document.getElementById('email').value = "";
		alert("Invalid Email...!!!");
	}
}

function validateDetails(){
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var collegename = document.getElementById('collegename').value;
	var number = document.getElementById('phone').value;
	var Email = document.getElementById('email').value;

	if (firstname == "" || lastname == "" || collegename == "" || number == "" || Email == "") {
		alert("Enter All The Details...!!!");
	}
	else{
		console.log(number);		
		$.ajax({
        type: "POST",
        cache: "false",
        url: "../assmnt06/data.php",
        data: {
          functionname: "insertdata",
          fname: firstname,
          lname: lastname,
          cname: collegename,
          email: Email,
          phone: number,
        },
        success: function (html) {
        	console.log(html);
          alert(html);
        },
      });
	}
}