<?php

  // global vars
	$validation_error = FALSE;
	$validation_error_text = "default error";
	$entered_id = "";
	$entered_email = "";
	$entered_real = "";

	if(!empty($_POST['submitted']))
	{// if submitted do validations


		$entered_real = ($_POST['p']);
		$entered_email = ($_POST['e']);
		$entered_id = ($_POST['u']);

		require "functions.php";
		//Set user's data while escaping to avoid SQL Injection
		$user_id = mysql_escape_mimic($_POST['u']);
		$user_email = mysql_escape_mimic($_POST['e']);
		$user_real = mysql_escape_mimic($_POST['r']);
		$user_pass = mysql_escape_mimic($_POST['p']);

		// check validity of real name
		if (!preg("/^[a-zA-Z ]*$/", $user_real)) {
			$validation_error = TRUE;
			$validation_error_text = 'Kein gültiger Vor- und Nachname eingegeben !';
		}

		// check validity of email
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
			$validation_error = TRUE;
			$validation_error_text = 'Keine gültige eMail-Adresse eingegeben !';		
		}


		// check valid reCAPTCHA response

		//

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
					<div id="header">
						<div class="logo svg">
							<h1 class="hidden-visually">OwndCloud</h1>
						</div>
						<div id="logo-claim" style="display:none;"></div>
					</div>
				</header>
								
				<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
				<form method="post" action="?" name="login">
					<fieldset>
						<p id="message" class="hidden">
							<img class="float-spinner" alt="" src="/core/img/loading-dark.gif" />
							<span id="messageText"></span>
							<!-- the following div ensures that the spinner is always inside the #message div -->
							<div style="clear: both;"></div>
						</p>
						<p class="grouptop">
							<input
								type="text"
								name="r" 
								id="newuserfullname"
							    style="width: 255px; padding-left: 36px"
								placeholder="Vor- und Nachname"
								value="<?php echo htmlentities($entered_real) ?>"
								autofocus
								autocomplete="on" 
								autocapitalize="off" 
								autocorrect="off" 
								required 
							/>
							<label for="newuserfullname" class="infield">Vor- und Nachname</label>
						</p>
					
						<p class="groupbottom">
							<input 
								type="text" 
								name="e" 
								id="newuseremail" 
								value="<?php echo htmlentities($entered_email) ?>"
								style="width: 255px; padding-left: 36px"
								placeholder="eMail"
						    autocomplete="on" 
						    autocapitalize="off" 
						    autocorrect="off" 
						    required 
						   />
							<label for="newuseremail" class="infield">eMail</label>
						</p>
						
						
						<p class="grouptop">
							<input 
								type="text" 
								name="u" 
								id="newusername" 
								value="<?php echo htmlentities($entered_id) ?>"
								style="width: 255px; padding-left: 36px"
								placeholder="Benutzername"
						    autocomplete="on" 
						    autocapitalize="off" 
						    autocorrect="off" 
						    required 
						  />
							<label for="newusername" class="infield">Benutzername</label>
							<img class="svg" style="top: 22px;" id="password-icon" src="/core/img/actions/user.svg" alt=""/> 
						</p>
						
						<p class="groupbottom">
							<input 
								type="password" 
								name="p" 
								id="newuserpassword" 
								value=""
								style="width: 255px; padding-left: 36px"
								placeholder="Passwort"
						    autocomplete="on" 
						    autocapitalize="off" 
						    autocorrect="off" 
						    required 
						  />
							<label for="newuserpassword" class="infield">Passwort</label>
							<img class="svg" id="password-icon" src="/core/img/actions/password.svg" alt=""/>
						</p>
						
						<!-- reCAPTCHA widget -->
						<div class="g-recaptcha" data-sitekey="6Ld6ogQTAAAAADzkW1e_w-ymWcoPnn_PF1mzYGSi"></div>
						
						<!-- Submit button -->
						<p><input style="width: 304px; margin-top: 20px" type="submit" value="Benutzer registrieren"></p>

						static text
						<?php echo " ststic php text "; ?>
						<?php echo htmlentities($test) ?>

						<!-- error handling -->
						<?php
						  echo htmlentities($validation_error_text);
						  echo htmlentities($validation_error);

							if (!empty($validation_error_text)) {
								echo '<ul><li class="error">';
								echo $validation_error_text; 
							

						        //<br></br>
						        //<p class="hint">Das ausgewählte Dokument wurde auf dem Server nich…</p>
						        //<p class="hint"><a href="/index.php">Du kannst zur Rückkehr zu OwndCloud hier klicken.</a></p>

						    echo '</li></ul>';
						  }    
						?>
							
					</fieldset>
				</form>
				
				end of form

				<div class="push"></div><!-- for sticky footer -->
			</div>
		</div>

		<footer>
			<p class="info" style="padding-left: 30px;">
				<a href="http://www.waldorfkindergarten-deggenhausertal.de" target="_blank">Waldorfkindergarten Deggenhausertal</a></p>
		</footer>
	</body>
</html>

