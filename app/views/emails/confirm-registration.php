<!DOCTYPE html>
<html>
<head>
 <title>Confirm Registration</title>
 <meta charset="UTF-8">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style>
 body{
	 text-align: center;
	 background-color: pink;
 }
 </style>
</head>
	
	<body>
		<h1>Confirm registration</h1>
		<p>Confirm your registration from <a href="<?= action('HomeController@index') ?>/#/confirm/<?= $user->id ?>/<?= $user->confirmation_token ?>">here</a></p>
	</body>