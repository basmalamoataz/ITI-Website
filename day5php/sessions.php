<?php
// session
session_start();
// echo session_id() . '<br>';
echo '<pre>';
var_dump(value: $_SESSION);
echo '</pre>';

if (isset($_SESSION['page_count'])) {
    $_SESSION['page_count'] += 1;
} else {
    $_SESSION['page_count'] = 1;
}

$msg = "You have visited my awesome page <span style='color:red'>" . $_SESSION['page_count'];
$msg .= "x</span> in this session.";

if ($_SESSION['page_count'] > 10) {
    echo "Thank you for visiting our website <span style='color:green'>10</span> times";
}

/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
*/

// session_destroy();
// unset($_SESSION['page_count']);

?>
<html>
   <head>
      <title>Setting up a PHP session</title>
   </head>
   <body>
      <p><?php echo $msg; ?></p>
   </body>
</html>

