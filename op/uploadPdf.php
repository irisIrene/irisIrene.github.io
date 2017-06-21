<?php include ("if_login.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上传PDF文件</title>

</head>

<body>
    <form  action="uploadPdf_chk.php" method="post" enctype="multipart/form-data" >
      <p><input type="file" name="pdf"/></p>
      <p><input type="submit" value="添加"></p>
    </form>
</div>

</body>
</html>