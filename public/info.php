<!DOCTYPE html>
<html>
<head>
    <title>Info Page</title>
</head>
<body>
<div><h1>info Page</h1></div>
<?php

if (defined('PDO::ATTR_DRIVER_NAME')) {
    print_r(PDO::getAvailableDrivers());
} else {
    echo '<h1>PDO unavailable</h1>';
}

phpinfo();
?>
</body>
</html>
