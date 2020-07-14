<?php
    session_start();
    $ga = new PHPGangsta_GoogleAuthenticator();
    $secret = $ga->createSecret();
    $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
    $oneCode = $ga->getCode($secret);
?>