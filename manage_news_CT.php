<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Receive Form</title>
<style type="text/css">
</style>
<script type="application/javascript">
</script>
</head>
<body>

<?php


header("Content-Type:text/html; charset=utf-8");
ignore_user_abort(true); //最大執行時間 8 秒
//set_time_limit(0);

/*$output = utf8_encode(shell_exec("python /var/www/html/crawl_china_times6.py"));
echo $output;*/


//exec("java -jar run.jar arguments", $output);

system("python /var/www/html/crawl_china_times7.py");
echo $output;

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

/*$output=exec('python /var/www/html/crawl_china_times6.py');
echo $output;*/




?>
</body>
</html>
