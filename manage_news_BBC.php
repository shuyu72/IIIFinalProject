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

ignore_user_abort(true); //最大執行時間 8 秒
//set_time_limit(0);

$output = shell_exec(" python /var/www/html/crawl_BBC.py");
echo $output;

/*$handle = popen('/var/www/html/crawl_BBC.py 2>&1', 'r');
echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);*/




?>
</body>
</html>
