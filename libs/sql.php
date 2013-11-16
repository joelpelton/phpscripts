<?php

class SQL
{
	/*
	 * 
	 */
	private $MYSQL = array(
		"HOST" => "localhost",
		"USER" => "root",
		"PASS" => "jackson",
	);
	private $query;
	private $TableName;
	
	public function __construct($MYSQL['DB']) {
		mysql_connect($MYSQL['HOST'], $MYSQL['USER'], $MYSQL['PASS']);
		mysql_select_db($MYSQL['DB']);
	}
	public function query($query)
	{
		$this->query = $query;
		if (!mysql_query($query)) {
			exit("
				We have a mysql error number: ".mysql_errorno."<br>\n
				Here is the error: ".mysql_error()."<br>\n
				Please contact an administrator.
			");
		}
	}
	public function insert($columns, $values) 
	{
		$query = "INSERT INTO ".$this->TableName." (";

		$i = 0;
		foreach($array as $column => $value) {
			$i++;
			if (count($column) < $i) {
				$query .= $column.", ";
			} else {
				$query .= $column;
			} 
		}
		
		$query .= ") VALUES (";
		
		$i = 0;
		foreach($array as $column => $value) {
			$i++;
			if (count($value) < $i) {
				$query .= $value.", ";
			} else {
				$query .= $value;
			}
		}
		
		$query .=")";
		
		query($query);
	}
	public function setTableName($tablename) 
	{
		$this->TableName = $tablename;
	}
	public function rowCount() 
	{
		$rowCount = mysql_num_rows(mysql_query($this->query));
		return $rowCount;
	}
	public function __destruct() {
		mysql_close();
	}
	
}
