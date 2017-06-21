<?php include ("if_ad_login.php");?>

<?php
header('Content-Type:text/html;charset=utf-8');
include_once"../conn/conn.php";

$seal = $_POST['seal'];

$rowRst_mark = $conne->getRowsRst("SELECT * FROM tb_user WHERE name='$name'");
$mark = $rowRst_mark['mark'];
$conne->close_rst($rowRst_mark);

$sql = "SELECT * FROM tb_user WHERE mark ='$mark'";
$num = $conne->getRowsNum($sql);
$rowsArray = $conne->getRowsArray($sql);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>公章授权</title>

<style type="text/css">
.hide{
	display:none;
	}
div{
	width:500px;
	margin:0 auto;
	margin-top:100px;
	}
a{
	text-decoration:none;
	background-color:#6DCFA6;
	color:#fff;
	padding:2px;
	}
a:hover{
	background-color:#fff;
	border:2px solid #6DCFA6;
	color:#6DCFA6;
	padding:2px;
	}
</style>
</head>

<body>
<div>
    <a href="ad.php#toSealManage" >返回</a> <br /><br />
    <legend>公章 <b> <?php echo($seal)?> </b>的授权:</legend>    
    <p></p>
     
     <table>
            <thead>
              <tr>
                <th>用户编号</th>
                <th>用户名</th>
                <th>授权</th>
              </tr>
            </thead>
        <?php
		  for($i= 0;$i<$num;$i++){
		?>
                  <tr>
                      <td ><?php echo($rowsArray[$i]['id'])?></td>
                      <td><?php echo($rowsArray[$i]['name'])?></td>
                      
                      <td>
                        <?php
						$users = $rowsArray[$i]['name'];
                        $sql_if = "SELECT * FROM tb_authorizedseal WHERE name='$seal' AND users ='$users' ";
						$num_if = $conne->getRowsNum($sql_if);
						if($num_if==0){
						?>  
							<form action="authorizeSeal_on.php" method="post">
                              <input type="date" name="date" required="required"/>                           
                              <button type="submit" title="点击授权"><img src="../images/icon_authorize_on.png"/></button>
                              <input name="users" value="<?php echo($rowsArray[$i]['name'])?>" class="hide" />
                              <input name="seal" value="<?php echo($seal) ?>" class="hide" />
                            </form> 
                        <?php 
							}
						else{
					    ?>
                            <form action="authorizeSeal_off.php" method="post">
                              <button type="submit" title="已授权，点击取消授权"><img src="../images/icon_authorize_off.png"/></button>
                              <input name="users" value="<?php echo($rowsArray[$i]['name'])?>" class="hide" />
                              <input name="seal" value="<?php echo($seal) ?>" class="hide" />
                            </form>
                        <?php     
							}
	                    ?>
                      </td>
                  </tr>
        <?php 
		  }
		//$conne->close_rst($sql);
	    ?>
          </table>
         </div>
</body>
</html>