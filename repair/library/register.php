<?php 
include 'XMPPHP/XMPP.php';
$user=$_REQUEST['user'];
$conn = new XMPPHP_XMPP('127.0.0.1', 5222, 'admin', 'gabby&kudaprezha', 'xmpphp', '127.0.0.1', false,null);// $loglevel=XMPPHP_Log::LEVEL_INFO);
try {
    $conn->connect();
    $conn->processUntil('session_start');
    $conn->presence();
    $groups=array();
    //$conn->roster->addContact("0712345678@localhost", $subscription,"0712345678",$groups);
    $conn->addRosterContact("{$user}@localhost","{$user}", $groups);
     $conn->disconnect();
     $url="http://localhost/repair/index.php/stock/index";
      $string = '<script type="text/javascript">';
            $string .= 'window.location = "' . $url . '"';
            $string .= '</script>';
            echo $string;
} catch(XMPPHP_Exception $e) {
    die($e->getMessage());
    }

?>