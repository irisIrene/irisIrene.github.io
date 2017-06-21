<?php
class opmysql{
	private $host = 'localhost';
	private $name = 'None';
	private $pwd = '000000';
	private $dBase = 'pdf_db';
	
	private $conn = '';
	
	private $result = '';
	private $msg = '';	
	private $field;
	private $fieldsNum = 0;
	private $rowsNum = 0;
	private $rowsRst = '';
	
	private $fieldsArray = array();
	private $rowsArray = array();
	
	//构造函数
	function construct($host='',$name='',$pwd='',$dBase=''){
		if($host!=''){
			$this->host = $host;
			}
		if($name!=''){
			$this->name = $name;
		    }
		if($pwd!=''){
			$this->pwd = $pwd;
			}
		if($dBase!=''){
			$dBase->dBase = $dBase;
			}
		$this->init_conn();
		}
		
	//连接数据库  
	function init_conn(){
		$this->conn = @mysql_connect($this->host,$this->name,$this->pwd);
		@mysql_select_db($this->dBase,$this->conn);
		mysql_query("set names utf-8");  //设置编码
		}
	
	//操作函数
	//查询结果
	function mysql_query_rst($sql){
		if($this->conn==''){
			$this->init_conn();
			}
			$this->result = @mysql_query($sql,$this->conn);
		}
		
	//根据查询结果，返回记录数
	function getRowsNum($sql){
		$this->mysql_query_rst($sql);
		if(mysql_error()==0){
			return @mysql_num_rows($this->result);
			}
		else{
			return '';
			}
		}
		
	//取得记录组函数：将查询结果输出成一个数组并返回。该函数处理的是单条记录
	function getRowsRst($sql){
		$this->mysql_query_rst($sql);
		if(mysql_error()==0){
			$this->rowsRst = mysql_fetch_array($this->result,MYSQL_ASSOC);
			return $this->rowsRst;
			}
		else{
			return '';
			}
		}
		
	//取得记录数组函数：将查询结果输出成一个数组并返回。该函数返回一个有多条记录的二维数组
	function getRowsArray($sql){
		$this->mysql_query_rst($sql);
		if(mysql_error()==0){
			while($row=mysql_fetch_array($this->result,MYSQL_ASSOC)){
				$this->rowsArray[] = $row;
				}
				return $this->rowsArray;
			}
		else{
			return '';
			}
		}
		
	//返回更新、删除、添加的记录数函数：用来更新、删除、添加记录并获取受影响的记录数，进而判断操作是否成功
	function uidRst($sql){
		if($this->conn==''){
			$this->init_conn();
			}
		@mysql_query($sql);
		$this->rowsNum = @mysql_affected_rows();
		if(mysql_error()==0){
			return $this->rowsNum;
			}
		else{
			return '';
			}
		}
	
	//释放结果集函数：将不再使用的数据删除，释放内存
	function close_rst(){
		mysql_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->fieldsArray = '';
		$this->rowsArray = '';
	    }
	
	//关闭数据库函数：关闭数据库
	function close_conn(){
		$this->close_rst();
		mysql_close($this->conn);
		$this->conn = '';
	    }
}
	$conne = new opmysql();
?>















