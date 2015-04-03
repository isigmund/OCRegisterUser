<?
//User
$quota = "1 GB";
//Configuration file
//General
$websiteUrl = "https://cloud.waldorfkindergarten-deggenhausertal.de";
//Path to files
$pathToActivate = $websiteUrl . "/OCRegisterUser/activate.php";
$pathToTerminate = $websiteUrl . "/OCRegisterUser/terminate.php";
//Define Connection Records
$servername = "dd17524.kasserver.com";
$username = "d01db8bb";
$password = "zuRV2ePreNRmtC9E";
$dbname = "d01db8bb";
$prefix = "oc_";

// reCAPTCHA
$recaptchaSecret = "6Ld6ogQTAAAAAPSxVV5TLWj_3YcBef-Gw5ETDIp-";
$recaptchaSiteKey = "6Ld6ogQTAAAAADzkW1e_w-ymWcoPnn_PF1mzYGSi";

//Email
$sendFrom = "noreply@waldorfkindergarten-deggenhausertal.de";
$yourEmail = "webmaster@waldorfkindergarten-deggenhausertal.de";


// eMail templates ------------------------------------------------

// registration email
// sent to registree upon sucessful completion of th eregistration form
//  possible placeholders : 
//  ?USERNAME?          
//  ?ACTIVATIONURL?     
//  ?WEBSITEURL?        
$registrationEmailTemplate = "email_templates/registration_success.html";

// administrator information email
// sent to $youreamaul upon sucessful completion if a registration
//  possible placeholders : 
//  ?USERNAME?       
//  ?USERID?         
//  ?USEREMAIL?      
//  ?TERMINATIONURL? 
$registrationInfoEmailTemplate = "email_templates/registration_info.html";



//Email Headers (Should not modify)
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "From: $sendFrom";

