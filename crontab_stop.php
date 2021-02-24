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

$output = exec("echo ' ' > /var/spool/cron/root");
echo $output;
echo "finish";

/*$handle = popen('/var/www/html/crawl_china_times5.py 2>&1', 'r');
echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);*/

/*$command = escapeshellcmd('python /var/www/html/crawl_china_times5.py');
$output = shell_exec($command);
echo $output;*/

/*$command = system('python /var/www/html/crawl_china_times5.py');
$output = shell_exec($command);
echo $output;*/


/*$output=passthru('python /var/www/html/crawl_china_times5.py');
echo $output;*/

/*$output=exec('python /var/www/html/crawl_china_times5.py');
echo $output;*/




?>
</body>
</html>
