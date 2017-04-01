<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google</title>
<style type="text/css">
h1
{
font-family:Arial, Helvetica, sans-serif;
color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
	margin: 20px;
	background-color: #EBEBEB;
	padding: 10px;
	border: #D6D6D6 solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box{
	margin: 20px;
	background-color: #FFF0DD;
	padding: 10px;
	border: #F7CFCF solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box .image{ text-align:center;}
</style>
</head>
<body>
<?php
if(!empty($authUrl)) {
	echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/glogin.png" alt=""/></a>';
	//echo $reg_type;
}else{

?>
<div class="wrapper">
    <h1>Google Profile Details </h1>
    <?php
    echo '<div class="welcome_txt">Welcome <b>'.$userData['user_fname'].'</b></div>';
    echo '<div class="google_box">';
    echo '<p class="image"><img src="'.$userData['user_picture_url'].'" alt="" width="300" height="220"/></p>';
    echo '<p><b>Google ID : </b>' . $userData['oauth_uid'].'</p>';
    echo '<p><b>Name : </b>' . $userData['user_fname'].' '.$userData['user_lname'].'</p>';
    echo '<p><b>Email : </b>' . $userData['user_email'].'</p>';
    echo '<p><b>Gender : </b>' . $userData['user_gender'].'</p>';
    echo '<p><b>Locale : </b>' . $userData['user_locale'].'</p>';
    echo '<p><b>Google+ Link : </b>' . $userData['user_profile_url'].'</p>';
    echo '<p><b>You are login with : </b>Google</p>';

   // echo '<p><b>Go to your <a href="'.base_url().'index.php/validate/teacher_dashboard ">Dashboard</a></b></p>';
    echo '<p><b>Logout from <a href="'.base_url().'index.php/Google_authentication/logout">Google</a></b></p>';
    echo '</div>';
    ?>
</div>
<?php } ?>
</body>
</html>