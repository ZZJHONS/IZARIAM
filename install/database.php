<?php
/*
 * Project: iZariam
 * File: install/database.php
 * Edited: 07/03/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
include 'include/db.php';

class MYSQL_DB {
	var $connection;
	function MYSQL_DB(){
		$this->connection = mysql_connect(HOST, USER, PASS) or die(mysql_error());
		mysql_select_db(NAME, $this->connection) or die(mysql_error());
	}
	function mysql_exec_batch ($p_query, $p_transaction_safe = true){
		if($p_transaction_safe){
			$p_query = 'START TRANSACTION;'.$p_query.'; COMMIT;';
		};
		$query_split = preg_split ("/[;]+/", $p_query);
		foreach($query_split as $command_line){
			$command_line = trim($command_line);
			if($command_line != ''){
				$query_result = mysql_query($command_line);
				if($query_result == 0){
					break;
				};
			};
		};
		return $query_result;
	}
	function query($query){
		return mysql_query($query, $this->connection);
	}
};
$database = new MYSQL_DB;
?>