<?php
require_once dirname(__FILE__)."/include/head.php";
require_once dirname(__FILE__)."/login_nav.php";

unset($_SESSION['login']);
unset($_SESSION['id']);
unset($_SESSION['username']);
?>

<div class="container" >
	<div class=wrapper >
		<form
			id="form"
			class="form-signin" 
			method="get"  
			action="/php_project_demo/models/login_check.php" 
		>       
			<h3 class="form-signin-heading" style="color:black; font-size:30px; font-family: monospace;">LOGIN</h3>
			<input
				id="username"
				name="username" 
				type="text" 
				class="form-control" 
				style="text-align:center; font-family: monospace;"
				placeholder="Username" 
				required=""
			>
			<input
				id="password"
				name="password"  
				type="password" 
				class="form-control" 
				style="text-align:center; font-family: monospace;"
				placeholder="Password" 
				required=""
			>     		  
			<button 
				class="btn btn-lg btn-primary btn-block"  
				name="submit" 
				value="Login" 
				type="submit"
			><b>登入</b></button>  			
		</form>			
	</div>
</div>

<script>
if(getUrlVars()['error']) {
	Swal.fire({
			icon: 'warning',
			title: 'On no...',
			text: decodeURIComponent(getUrlVars()['error']),
	});
}
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}
</script>


<style>
.wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
	max-width: 420px;
	padding: 30px 38px 66px;
	margin: 0 auto;
	background-color:#a8d1ec;
	border-style: double;
	border-color: #1E90FF;
	border-width:5px;
	border-radius: 15px 50px;
}

.form-signin-heading {
	text-align:center;
	margin-bottom: 30px;
}

.form-control {
	position: relative;
	font-size: 16px;
	height: auto;
	padding: 10px;
}

input[type="text"] {
	margin-bottom: 0px;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}

input[type="password"] {
	margin-bottom: 20px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}
</style>