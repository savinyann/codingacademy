<!doctype html>

<html>
<head>
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel='stylesheet' href="css/bootstrap.css" type="text/css">
    <link rel='stylesheet' href="css/style.css" type="text/css">
	<title>Flask_D01</title>
</head>
<body>


	<div class="container" style="padding-top: 15px">
	    <div class="row centered-form">
	        <div class="col-xs-12 col-sm-10 col-md-11 col-sm-offset-0 col-md-offset-0">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title">Log In</h3>
	                </div>
	                <div class="panel-body">
		                <form method="POST">
		                    <div class="row">
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="username">Username :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" name="username" id="username" class="form-control input-sm">
		                            </div>
	                           	</div>

		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="password">Password :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="password" name="password" id="password">
		                            </div>
		                        </div>
		                    </div>
		                    <input type="submit" class="btn btn-info btn-block" value="Log in">
		                </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>




	<div class="alert alert-success">
		<?php
			if(isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] != "")
			{
				$curl = curl_init();

			curl_setopt_array($curl, array
				(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'http://localhost:5000/login_api',
			    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
			    CURLOPT_POST => 1,
			    CURLOPT_POSTFIELDS => array(
			        'username' => $_POST['username'],
			        'password' => $_POST['password']
			    )
			));
			$resp = curl_exec($curl);
			curl_close($curl);
			echo '<pre>';
			var_dump(json_decode($resp));
			echo '</pre>';
/*
				$url = "http://localhost:5000/login_api/".$_POST['username'].'/'.$_POST['password'];
				$raw = file_get_contents($url);
				$user = (json_decode($raw));
				if(gettype($user) == "string")
				{
					echo($user);
				}
				else
				{
					foreach ($user as $key => $value)
					{
						echo($value.'<br>');
					}
				}
*/
			}
			else
				echo('Bad usage: You should have an username and a password.')
		?>
	</div>
</body>

