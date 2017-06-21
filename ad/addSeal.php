<?php include ("if_ad_login.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上传公章</title>

</head>

<body>
    <form  action="addSeal_chk.php" method="post" enctype="multipart/form-data" >
      <p><input type="file" name="seal" /></p>
      <label>所属部门:</label><input name="department" type="text"/>
      <p><input type="submit" value="添加"></p>
    </form>
</div>

</body>
</html>