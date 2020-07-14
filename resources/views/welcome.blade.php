<?php
//session_start();

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
echo nl2br("Secret is: ".$secret."\r\n");

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
echo nl2br("Google Charts URL for the QR-Code: ".$qrCodeUrl."\r\n");

$oneCode = $ga->getCode($secret);
echo "Checking Code '$oneCode' and Secret '$secret':\r\n";

$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
    echo 'OK';
} else {
    echo 'FAILED';
}

?>

<!DOCTYPE HTML> 
<html> 
<head> 
<style> 
p { 
  text-align: center; 
  font-size: 60px; 
} 
</style> 
</head> 
<body> 
<p id="count"></p> 
<script> 

var deadline;
 if (localStorage.getItem("time") != 0)
 {
     deadline = localStorage.getItem("time");
 } else if (localStorage.getItem("time") == null ){
     deadline = new Date().getTime()+35000; 
 }

var x = setInterval(function() { 
var now = new Date().getTime(); 
var t = deadline - now;
seconds = Math.floor(((t % (1000 * 60)) / 1000) +1); 
document.getElementById("count").innerHTML = seconds + "s "; 
if (t < 1) { 
    deadline = new Date().getTime()+34000;  
} 
 localStorage.setItem("time", deadline);
}, 1000); 
</script> 
  
</body> 
</html> 



