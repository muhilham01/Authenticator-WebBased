<?php
//session_start();

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = "O45KWYL4RXKFEANB";
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

var deadline = new Date().getTime();
var wait  = 30; // Timer
var x = setInterval(function() { 
    var now = new Date().getSeconds(); 
    // var t = deadline - now;
    // seconds = Math.floor(((now % (1000 * 60)) / 1000) % wait); 
    seconds = Math.floor(wait - (now % wait));
    document.getElementById("count").innerHTML = seconds + "s "; 
    if (seconds <= 1) { 
        alert("Ok");
    } 
    }, 1000);
</script> 
  
</body> 
</html> 