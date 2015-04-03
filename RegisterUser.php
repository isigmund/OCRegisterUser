<?php

  // global vars
	$validation_error = FALSE;
	$validation_error_texts = array();
	$user_id = "";
	$user_email = "";
	$user_real = "";
	$user_pass = "";
	$reCAPTCHAResponse = "";

  // config settings
  require "config.php"; 

	if(!empty($_POST['submitted']))
	{// if submitted do validations

		require "lib/functions.php";
		//Set user's data while escaping to avoid SQL Injection
		$user_id = mysql_escape_mimic($_POST['u']);
		$user_email = mysql_escape_mimic($_POST['e']);
		$user_real = mysql_escape_mimic($_POST['r']);
		$user_pass = mysql_escape_mimic($_POST['p']);


		// check validity of real name
		if (!preg_match("/^[a-zA-Z ]*$/", $user_real)) {
			$validation_error = TRUE;
			array_push($validation_error_texts, 'Kein gültiger Vor- und Nachname eingegeben !');
		}


		// check validity of email
		if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
			$validation_error = TRUE;
			array_push($validation_error_texts, 'Keine gültige eMail-Adresse eingegeben !');	
		}


		// check valid reCAPTCHA response
		$reCAPTCHAResponse = $_POST['g-recaptcha-response'];
		if(!$reCAPTCHAResponse){
			$validation_error = TRUE;
			array_push($validation_error_texts, 'Bitte bestätigen Sie, dass Sie kein Roboter sind !');	
     }

    // assemble validation URL, call it and check response
		$reCAPTCHAValidationURL = "https://www.google.com/recaptcha/api/siteverify?secret=".$recaptchaSecret."&response=".$reCAPTCHAResponse."&remoteip=".$_SERVER['REMOTE_ADDR'];
    $reCAPTCHAVerifyResponse = file_get_contents($reCAPTCHAValidationURL);
    if($reCAPTCHAVerifyResponse.success==false){
			$validation_error = TRUE;
			array_push($validation_error_texts, 'reCAPTCHA Prüfung fehlgeschlagen !');	      	
    }


		//Hash the user's password
		$user_hash = password_hash($user_pass, PASSWORD_BCRYPT);
		
		//Establish connection with your mySQL server
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn and !$validation_error) {
			$validation_error = TRUE;
			array_push($validation_error_texts, 'Datenbankverbindung fehlgeschlagen !');
		}


		//Check for duplicates for records that must be unique. If found, abord.
		//Check username
		$numrows = mysqli_num_rows(mysqli_query($conn, "SELECT uid from ".$prefix."users WHERE uid = '$user_id'"));				
		if ( $numrows > 0 and !$validation_error ) {
			$validation_error = TRUE;
			array_push($validation_error_texts, 'Benutzername existiert bereits !');
		} 


		//Check Email
    $numrows = mysqli_num_rows(mysqli_query($conn, "SELECT configvalue from ".$prefix."preferences WHERE configvalue = '$user_email'"));
		if ( $numrows > 0 and !$validation_error ) {
			$validation_error = TRUE;
			array_push($validation_error_texts, 'eMail bereits registriert !');
		} 



	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="ng-csp ie ie6 lte9 lte8 lte7" data-placeholder-focus="false" lang="de"><![endif]-->
<!--[if IE 7]><html class="ng-csp ie ie7 lte9 lte8 lte7" data-placeholder-focus="false" lang="de" ><![endif]-->
<!--[if IE 8]><html class="ng-csp ie ie8 lte9 lte8" data-placeholder-focus="false" lang="de" ><![endif]-->
<!--[if IE 9]><html class="ng-csp ie ie9 lte9" data-placeholder-focus="false" lang="de" ><![endif]-->
<!--[if gt IE 9]><html class="ng-csp ie" data-placeholder-focus="false" lang="de" ><![endif]-->
<!--[if !IE]><!-->
<html class="ng-csp" data-placeholder-focus="false" lang="de" ><!--<![endif]-->
	<head>
		<title>
		OwnCloud Waldorfkindergarten Deggenhausertal</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-itunes-app" content="app-id=543672169">
		<link rel="shortcut icon" type="image/png" href="/core/img/favicon.png" />
		<link rel="apple-touch-icon-precomposed" href="/core/img/favicon-touch.png" />
		<link rel="stylesheet" href="/core/css/styles.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/header.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/mobile.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/icons.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/fonts.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/apps.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/fixes.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/multiselect.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/vendor/jquery-ui/themes/base/jquery-ui.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/jquery-ui-fixes.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/jquery-tipsy.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/jquery.ocdialog.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/core/css/share.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/files_versions/css/versions.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/search_lucene/css/lucene.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/files_videoviewer/css/style.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/files_videoviewer/css/mediaelementplayer.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/firstrunwizard/css/colorbox.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/firstrunwizard/css/firstrunwizard.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/gallery/css/slideshow.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/apps/imprint/css/reference.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/themes/kiga/core/css/styles.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		<link rel="stylesheet" href="/themes/kiga/core/css/header.css?v=d6629cc302df4e6194051178f12ff7fc" type="text/css" media="screen" />
		
				
		<script src='https://www.google.com/recaptcha/api.js?hl="de"'></script>			
		<!-- format recaptcha iframe to match the entry fields -->	
		<style>
			iframe {border-radius: 10px; margin: 5px;}
		</style>
	
	</head>
	
	<body id="body-login">
		<noscript><div id="nojavascript"><div>Diese Anwendung benötigt ein aktiviertes JavaScript zum korrekten Betrieb.  Bitte <a href="http://enable-javascript.com/" target="_blank">aktiviere JavaScript</a> und lade diese Seite neu.</div></div></noscript>
		<div class="wrapper"><!-- for sticky footer -->
			<div class="v-align"><!-- vertically centred box -->
				<header>
					<div id="header" style="width: auto;">
						<div class="logo svg">
							<h1 class="hidden-visually">OwndCloud</h1>
						</div>
						<div id="logo-claim" style="display:none;"></div>
					</div>
				</header>

				<?php
					if (!$validation_error) {

						if(empty($_POST['submitted'])) {
							// form not yet submitted  --> show form
							include("lib/form.php"); 
						}
						else { 
							// form was submitted and no validation error --> create user account
							$sql = "INSERT INTO `$dbname`.`".$prefix."users` (`uid`, `displayname`, `password`) VALUES ('$user_id', '$user_real', '$user_hash');"; //Create Usable Account
							mysqli_query($conn, $sql);
							$sql = "INSERT INTO `$dbname`.`".$prefix."preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES ('$user_id', 'settings', 'email', '$user_email');"; //Associate Email with Acccount
							mysqli_query($conn, $sql);

							//Delete the next 2 lines if you want the account to be instantly activated.
							$sql = "INSERT INTO `$dbname`.`".$prefix."preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES ('$user_id', 'files', 'quota', '0 B');"; //Set quota to 0 B in order to disable account
							mysqli_query($conn, $sql);

							//Account registered
							//Dispatch 2 emails, 1 to activate user's account to the registree's account and another to the admin's with some of their data and the option to terminate the account.
							//The following may need a LOT of modifying.
							$registrationEmailHTML = file_get_contents($registrationEmailTemplate);
							$registrationEmailHTML = str_replace("?USERNAME?", $user_real, $registrationEmailHTML);
							$registrationEmailHTML = str_replace("?WEBSITEURL?", $websiteUrl, $registrationEmailHTML);
							$registrationEmailHTML = str_replace("?ACTIVATIONURL?", $pathToActivate . "?key=" . md5($user_id . $user_id) . "&amp;user=" . $user_id, $registrationEmailHTML);
							mail("$yourEmail", "New User", $registrationInfoEmailHTML, $headers);

							$registrationInfoEmailHTML = file_get_contents($registrationInfoEmailTemplate);
							$registrationInfoEmailHTML = str_replace("?USERNAME?", $user_real, $registrationInfoEmailHTML);
							$registrationInfoEmailHTML = str_replace("?USERID?", $user_id, $registrationInfoEmailHTML);
							$registrationInfoEmailHTML = str_replace("?USEREMAIL?", $user_email, $registrationInfoEmailHTML);
							$registrationInfoEmailHTML = str_replace("?TERMINATIONURL?", $pathToTerminate . "?user=" . $user_id, $registrationInfoEmailHTML);
							mail("$user_email", "Welcome to our Cloud" ,$emailHTML, $headers);
							
							//Emails sent, process complete.	
							echo "</br></br><h1 class='header-appname'>Konto wurde erfolgreich angelegt !</h1>";	
							echo "</br></br><h2 class='header-appname'>Eine eMail mit informationen zur Aktivierung des Kontos wurde an Ihre eMail-Adresse versendet.</h2>";	
							echo "</br><a href='".$websiteUrl."'>Zurück zum Anmeldebildschirm... </a>";
						}			
	
				  }
				  else {
				  	// an validation error occured

						// show form again
						include("lib/form.php"); 

						// show error info
						echo '<div><ul><li class="error">';
						foreach($validation_error_texts as $error_text)
							echo $error_text,"<br><br/>";
					
				        //<br></br>
				        //<p class="hint">Das ausgewählte Dokument wurde auf dem Server nich…</p>
				        //<p class="hint"><a href="/index.php">Du kannst zur Rückkehr zu OwndCloud hier klicken.</a></p>
				    echo '</li></ul></div>';
				  }    
				?>

				<div class="push"></div><!-- for sticky footer -->
			</div>
		</div>

		<footer>
			<p class="info" style="padding-left: 30px;">
				<a href="http://www.waldorfkindergarten-deggenhausertal.de" target="_blank">Waldorfkindergarten Deggenhausertal</a></p>
		</footer>
	</body>
</html>

