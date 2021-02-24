<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receive Form</title>
<style type="text/css">
</style>
<script type="application/javascript">
</script>
</head>
<body>
<?php

ignore_user_abort(true); //?€å¤§åŸ·è¡Œæ???8 ç§?
//set_time_limit(0);

$output = shell_exec(" python /var/www/html/update_daily_final.py");
echo $output;

/*$handle = popen('/var/www/html/update_daily_final.py 2>&1', 'r');
echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);*/




?>
</body>
</html>
