		$(document).ready(function(){
			$('.button-collapse').sideNav();
		});
		function savedData(){
			var password1 = document.getElementById('password');
    		var password2 = document.getElementById('password1');
    		if (password1.value != password2.value) {
    			alert('Passwords must match :|');

    		};
    		if (password1.value === password2.value) {
    			var inputUser=document.getElementById('icon_prefix');
    			localStorage.setItem('user', inputUser.value);
    			var inputEmail=document.getElementById('email');
    			localStorage.setItem('email', inputEmail.value);
    			var inputPass=document.getElementById('password');
    			localStorage.setItem('pass', inputPass.value);

    			alert('Sign Up Complete !!!'+'\n'+'Welcome to the comunnity :D');
    			location.assign('login.html');    			

    		}; 		   		    		
     
		}
		 function check(){
    		var storedValue = localStorage.getItem('user');
    		var storedValue1 = localStorage.getItem('email');
    		var storedValue2 = localStorage.getItem('pass');

    		console.log('username '+ storedValue);
    		console.log('email '+ storedValue1);
    		console.log('pass '+ storedValue2);
    	}
    	function login(){
    		var storedValue = localStorage.getItem('user');
    		var inputUser=document.getElementById('icon_prefix');
    		var storedValue1 = localStorage.getItem('pass');
    		var inputPass=document.getElementById('password');

    		if (storedValue===inputUser.value && storedValue1===inputPass.value) {
    			location.assign('welcome.html');
    		}else{
    			alert('Username or Password incorrect'+'\n'+'Try Again :P');
    		};
    	}
		