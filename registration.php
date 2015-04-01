<?
/*
u is the user ID.
e is the user's email address.
r is the user's display name.
p is the user's password.
*/
//Check if all requred data is set.
$allow = 1;
if (!isset($_POST['u'])){
  $allow = 0;
}
if (!isset($_POST['e'])){
  $allow = 0;
}
if (!isset($_POST['r'])){
  $allow = 0;
}
if (!isset($_POST['p'])){
  $allow = 0;
}
if ($allow==0){
  //Some data is missing from the request, abord.
  echo "Invalid Request, no further ressources shall be used.";
  die();
} 

//Import pswd.php file, it contains BCRYPT which OwnCloud uses to hash passwords.
//You don't need to include it if you are running the latest version of PHP.
require "functions.php";
//Set user's data while escaping to avoid SQL Injection
$user_id = mysql_escape_mimic($_POST['u']);
$user_email = mysql_escape_mimic($_POST['e']);
$user_real = mysql_escape_mimic($_POST['r']);
$user_pass = mysql_escape_mimic($_POST['p']);
//Hash the user's password
require "pswd.php";
$user_hash = password_hash($user_pass, PASSWORD_BCRYPT);
//We are now ready to create the account
require "config.php";
echo "<b>If you get an error please contact us ASAP and include this log.</b><br/>";
echo "Preparing to register account...<br/>";

//Set database credentials in config.php

echo "Establishing connection...<br/>";
//Establish connection with your mySQL server
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
  echo "Failed to establish connection. Halted.";
  die();
} else {
  echo "Connection established. Proceeding...<br/>";
}
//Check for duplicates for records that must be unique. If found, abord.
echo "Checking records for duplicates...<br/>";
//Check username
echo "Checking User ID (username)...<br/>";
if (mysqli_num_rows(mysqli_query($conn, "SELECT uid from ".$prefix."users WHERE uid = '$user_id'")) > 0) {
    //echo "User id already exists. Halted.";
    die();
} else {
  echo "User id does not exist. Proceeding...<br/>";
}
//Check Email
echo "Checking email address...<br/>";
if (mysqli_num_rows(mysqli_query($conn, "SELECT configvalue from ".$prefix."preferences WHERE configvalue = '$user_email'")) > 0) {
    echo "Email already registered. Halted.";
    die();
} else {
  echo "Email is not registered. Proceeding...<br/>";
}

//No duplicates found. Register account.
echo "Record validation complete!<br/>";
echo "Registering Account...<br/>";
$sql = "INSERT INTO `$dbname`.`".$prefix."users` (`uid`, `displayname`, `password`) VALUES ('$user_id', '$user_real', '$user_hash');"; //Create Usable Account
mysqli_query($conn, $sql);
$sql = "INSERT INTO `$dbname`.`".$prefix."preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES ('$user_id', 'settings', 'email', '$user_email');"; //Associate Email with Acccount
mysqli_query($conn, $sql);
//Delete the next 2 lines if you want the account to be instantly activated.
$sql = "INSERT INTO `$dbname`.`".$prefix."preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES ('$user_id', 'files', 'quota', '0 B');"; //Set quota to 0 B in order to disable account
mysqli_query($conn, $sql);
//Account registered
echo "The account should now be registered. If you have trouble logging in contact us.<br/>";
//Dispatch 2 email, 1 to activate user's account to the registree's account and another to the admin's with some of their data and the option to terminate the account.
//The following may need a LOT of modifying.
echo "Sending activation link to inbox...";
mail("$yourEmail","New User","
  <h2>A new user has registered</h2><ul><li>Name: $user_real</li><li>Email: $user_email</li><li>Username: $user_id</li></ul><a href='$pathToTerminate?user=$user_id'>Terminate User?</a>
  ",$headers);
    mail("$user_email", "Welcome to our Cloud" ,"$emailHTML",$headers);
//Emails sent, process complete.
echo "Sent!<br/>";
echo "The registration process is now complete. Use the link sent to your inbox to activate your account.<br/>Task complete. Halted.<br/>OwnCloud Registration Script by Slava Knyazev (<a href='http://twitter.com/viruzx5'>@ViruZX5</a>) via <a href='http://knyz.org'>KNYZ.org</a>";
die();
?>
