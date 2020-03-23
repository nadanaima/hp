<?php
class DBController {
	// // database host

	
	private $host = "localhost";
	// database user and password
	private $user = "root";
	private $password = "";
	//schema name
	private $database = "tuto";

	private $conn;
	
	// constructor of DBcontroller class
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	// Connection to mysql
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	// query function to retrieve data from the server and return them
	// as an array of data
	//  here you can add sqli prevention logic afterwards
	function runQuery($query) {
		// run the query passed through variable and store in $result
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			// store each row in $resultset
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			// return $resultset
			return $resultset;
	}
	// a function to calculate the number of rows in a query
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>