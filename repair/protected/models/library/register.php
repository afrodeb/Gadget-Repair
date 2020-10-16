<?php 
include 'XMPPHP/XMPP.php';
$conn = new XMPPHP_XMPP('127.0.0.1', 5222, 'admin', 'gabby&kudaprezha', 'xmpphp', '127.0.0.1', true, $loglevel=XMPPHP_Log::LEVEL_DEBUG);
try {
    $conn->connect();
    $conn->processUntil('session_start');
    $conn->presence();
    $groups=array();
    //$conn->roster->addContact("0712345678@localhost", $subscription,"0712345678",$groups);
    $conn->addRosterContact("077300000@localhost","0773000000", $groups);
     $conn->disconnect();
} catch(XMPPHP_Exception $e) {
    die($e->getMessage());
    }

?>