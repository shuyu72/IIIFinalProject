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

$output = shell_exec('crontab -l');
echo $output;




?>
</body>
</html>
