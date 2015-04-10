


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
					//Mess around with it
					$key = $_GET['key'];
					$user = $_GET['user'];
					$dberror = false;

					if (md5($user . $user)==$key){
						require("config.php");

						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
						if (!$conn) {
							mail("$yourEmail", "Cloud Activation Failed", "Database Connection could not be opened. Effected user user :".$user."\r\nConnection failed: ".mysqli_connect_error(), $headers);
							echo "</br></br><h1 class='header-appname'>Aktivierung fehlgeschlagen, Administrator wurde benachrichtigt ....</h1>";
						  $dberror = true;
						}

						if (!$dberror){

							// get email associated to activated account
							$sql = "SELECT `configvalue` from `$dbname`.`".$prefix."preferences` WHERE `userid`='$user' AND `appid`='settings' AND `configkey` ='email';";
							$select_result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($select_result);
							$email =$row['configvalue'];

							//Removes quota limit
							$sql = "REPLACE `$dbname`.`".$prefix."preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES ('$user', 'files', 'quota', '$quota');";

							if (mysqli_query($conn, $sql)) {
							  echo "</br></br><h1 class='header-appname'>Konto wurde erfolgreich aktiviert !</h1>";
							  echo "</br></br><a style='color: #ccc;  font-weight: bold;' href='".$websiteUrl."'>cloud.waldorfkindergarten-deggenhausertal.de</a>";
							  $activationInfoEmailHTML = file_get_contents($activationInfoEmailTemplate);
								$activationInfoEmailHTML = str_replace("?USERID?", $user, $activationInfoEmailHTML);
							  mail("$email", "could.waldorfkindergarten.deggenhausertal Konto aktiviert" ,$activationEmailHTML, $headers);
							} 
							else {
								mail("$yourEmail", "Cloud Activation Failed", "Error Updating record. Effected user user :".$user."\r\nError updating record: " . mysqli_error($conn), $headers);
								echo "</br></br><h1 class='header-appname'>Aktivierung fehlgeschlagen, Administrator wurde benachrichtigt ....</h1>";
						  	$dberror = true;
							}
						}
						mysqli_close($conn);
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