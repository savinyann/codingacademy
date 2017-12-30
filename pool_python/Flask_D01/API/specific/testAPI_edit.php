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
	                    <h3 class="panel-title">Registration</h3>
	                </div>
	                <div class="panel-body">
		                <form method="POST" action="">
		                    <div class="row">
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="username">Username :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" class="form-control input-sm" name="username" id="username">
		                            </div>
	                           	</div>

		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="password">Password :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="password" class="form-control input-sm" name="password" id="password">
		                            </div>
		                        </div>
		                    </div>
							<div class="row">

		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="confirm">Confirm Password :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="password" class="form-control input-sm" name="confirm" id="confirm">
		                            </div>
		                        </div>
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="firstname">First Name :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
										<input type="text" class="form-control input-sm" name="firstname" id="firstname">
		                            </div>
	                           	</div>
		                    </div>
							<div class="row">
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="lastname">Last Name :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" class="form-control input-sm" name="lastname" id="lastname">
		                            </div>
		                        </div>
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="email">Email :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" class="form-control input-sm" name="email" id="email">
		                            </div>
		                        </div>
		                    </div>
							<div class="row">
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="birthdate">Birthdate :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="date" class="form-control input-sm" name="birthdate" id="birthdate">
		                            </div>
	                           	</div>

		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="Address">Address :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" class="form-control input-sm" name="address" id="address">
		                            </div>
		                        </div>
		                    </div>
							<div class="row">
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="eyecolor">Eye Color</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="color" id="eye_color" name="eyecolor" value="#FF25A0" size="20" style="height:40px;width:100%">
		                            </div>
		                        </div>
		                        <div class="col-xs-2 col-sm-2 col-md-2">
		                        	<div>
		                        		<label for="ADN">favorite ADN sequence :</label>
		                        	</div>
		                        </div>
		                        <div class="col-xs-4 col-sm-4 col-md-4">
		                            <div class="form-group">
		                            	<input type="text" class="form-control input-sm" name="ADN" id="ADN">
		                            </div>
		                        </div>
		                    </div>
		                    <input type="submit" class="btn btn-info btn-block" value="Register">
		                </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>




	<div class="alert alert-success">
		<?php
			echo('<pre>');
			var_dump($_POST);
			echo('</pre>');
			if(isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] != "")
			{
				$curl = curl_init();
				curl_setopt_array($curl, array
				(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => 'http://localhost:5000/user_api/10',
				    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
				    CURLOPT_POST => 1,
				    CURLOPT_POSTFIELDS => $_POST
				));

				$reponse = curl_exec($curl);
				echo('<pre>');
				var_dump(json_decode($reponse));
				echo('</pre>');
				/*
				$curl = curl_init();
				curl_setopt_array($curl, array
				(
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => 'http://localhost:5000/edit_api',
					CURLOPT_USERAGENT => 'Codular Sample cURL Request',
					CURLOPT_PUT => 1,
					CURLOPT_POSTFIELDS => $_POST
			));

			$resp = curl_exec($curl);
			curl_close($curl);
			echo '<pre>';
			var_dump(json_decode($resp));
			echo '</pre>';
			echo('lol');
				*/
/*
			curl_setopt_array($curl, array
				(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'http://localhost:5000/user_api/10',
			    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
			    CURLOPT_CUSTOMREQUEST => 'PUT',
			    CURLOPT_POSTFIELDS => $_POST
			));
				$resp = curl_exec($curl);
*/
			}
			else
				echo('Bad usage: You should have an username and a password.')
		?>
	</div>
</body>

