<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=fastcompany', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

// retrieve token
if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
    $token = $_GET["token"];
}
else {
    throw new Exception("Valid token not provided.");
}
 
// verify token
$query = $db->prepare("SELECT username, tstamp FROM pending_users WHERE token = ?");
$query->execute(array($token));
$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();
 
if ($row) {
    extract($row);
}
else {
    throw new Exception("Valid token not provided.");
}
 
// do one-time action here, like activating a user account
// ...
 
// delete token so it can't be used again
$query = $db->prepare(
    "DELETE FROM pending_users WHERE username = ? AND token = ? AND tstamp = ?"
);
$query->execute(
    array(
        $username,
        $token,
        $tstamp
    )
);

// 1 day measured in seconds = 60 seconds * 60 minutes * 24 hours
// $delta = 32000;
// $delta = 32000;
 
// Check to see if link has expired
if ($_SERVER["REQUEST_TIME"] - $tstamp > $delta) {
    throw new Exception("Token has expired.");
}else{
    include 'pages/directory.php';
}
// do one-time action here, like activating a user account
// ...