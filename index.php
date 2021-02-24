<!DOCTYPE html>
<html>
<head>
 <title>管理員登入</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<br><br><br><br>

<form action="cloud/logintest.php" method="POST">  


<div class="container">
 <div class="row jumbotron">
 <div class="col-md-6 col-md-offset-3">
 <h2 class="text-center">管理員登入</h2><br/>
 
 <input class="form-control input-lg" id="pass" type="text" name="username" required="TRUE" placeholder="帳號"/><br/>
 <input class="form-control input-lg" id="pass" type="password" name="password" required="TRUE" placeholder="密碼"/><br/>
 <input class="btn btn-primary btn-lg btn-block" type="submit" value="登入"/>
 <input class="btn btn-primary btn-lg btn-block" type="button" value="管理員註冊" onclick="location.href='cloud/newmembers.php'"/>
 </form>
 <br/>
 <a href="/eat/index.php">進入eattongue首頁</a>

 </div>
 </div>
</div>
</body>
</html>