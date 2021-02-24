<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML4 Form</title>
<style type="text/css">
.word1{
    font-family: "微軟正黑體";
    font-size: 18px;
    letter-spacing: 1px;
    color: #222222;
}
.tdone{
    background-color: rgb(243, 225, 204);
}
.tdtwo{
    background-color:rgb(193, 247, 247);
}
.tdthree{
    background-color: rgb(247, 244, 207);
}
</style>
<script type="application/javascript" src="html4form.js">
</script>
</head>
<body onload="">
<form method="POST" enctype="multipart/form-data" action="http://localhost/demophp7rec.php" onsubmit="return checkFormData()">
    <!--or <form method="GET"> GET傳送速度比較快-->
    <table width="600"  border="0" align="center" cellpadding="8" cellspacing="5">
        <tr>
            <td class="tdone"><label class="word1">使用者代號:</label></td>
            <td class="tdtwo"><input type="text" class="word1" name="username" value="請輸入帳號名稱" size="20" maxlength="50" id="txtusername" onfocus="clearInputText(this)"></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">姓名:</label></td>
            <td class="tdtwo"><input type="text" class="word1" name="username" value="請輸入帳號名稱" size="20" maxlength="50" id="txtusername" onfocus="clearInputText(this)"></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">密碼:</label></td>
            <td class="tdthree"><input type="password" class="word1" name="password" size="20" max="50" id="txtpassword"></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">性別</label></td>   
            <td class="tdtwo">
                <input type="radio" class="word1" name="gender" value="1"><label>男</label>
                <input type="radio" class="word1" name="gender" value="2"><label>女</label>
            </td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">自我介紹:</label></td>
            <td class="tdthree">
                <textarea class="word1" name="bio"" id="txtselfinfo" cols="40" rows="8" onfocus="clearInputText(this)">介紹自己一下吧...</textarea>
            </td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">居住城市:</label></td>
            <td class="tdtwo">
                <select name="city" class="word1" size="1">
                    <optgroup label="五都-6H送達">
                    <option value="高雄市">高雄市</option>
                    <option value="台南市" selected>台南市</option>
                    <option value="台中市">台中市</option>
                    <option value="新北市">新北市</option>
                    <option value="台北市">台北市</option>
                    </optgroup> 
                    <optgroup label="其他縣市-24H送達">
                    <option value="嘉義市">嘉義市</option>
                    <option value="新竹市">新竹市</option>
                    <option value="桃園市">桃園市</option>
                    </optgroup>
                </select>
                <input class="word1" type="text" name="address" size="20" value="請輸入地址...">
            </td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">生日:</label></td>
            <td class="tdthree"></td>
            <td class="tdtwo"><input type="date" class="word1" name="birthday" value="請輸入帳號名稱" size="20" maxlength="50" id="txtusername" onfocus="clearInputText(this)"></td></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">Email:</label></td>
            <td class="tdtwo"><input type="email" class="word1" name="email" value="請輸入email" size="20" maxlength="50" id="txtusername" onfocus="clearInputText(this)"></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">電話:</label></td>
            <td class="tdtwo"><input type="text" class="word1" name="phone" value="" size="20" maxlength="50" id="txtusername" onfocus="clearInputText(this)"></td>
        </tr>
        <tr>
            <td class="tdone"><label class="word1">興趣嗜好:</label></td>
            <td class="tdtwo">
                <input type="checkbox" class="word1" name="hobby1" value="電影"><label>電影</label>
                <input type="checkbox" class="word1" name="hobby2" value="唱歌"><label>唱歌</label>
                <input type="checkbox" class="word1" name="hobby3" value="美食"><label>美食</label>
            </td>
        </tr>
        
        
        <tr>
            <td class="tdone"></td>
            <td class="tdtwo">
                <input type="hidden" name="formno" value="123">
            </td>
        </tr>
        <tr>
            <td class="tdone"></td>
            <td class="tdthree">
                <input type="submit" value="送出資料" class="word1" >
                <input type="reset" value="重設表單" class="word1">
            </td>
        </tr>
    </table>
</form> 
</body>
</html>