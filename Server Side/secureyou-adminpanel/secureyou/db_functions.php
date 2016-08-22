<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
		
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($User1,$User2) {
        // Insert user into database
		
        $result = mysql_query("INSERT INTO location(lat,lon) VALUES('$User1','$User2')");
		
        if ($result) {
			
			return true;
			
        } else {			
				// For other errors
				
				return false;
				
		}
    }
	 /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM location");
        return $result;
    }
	/**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
        $result = mysql_query("SELECT * FROM location WHERE syncsts = FALSE");
        return $result;
    }
	
	public function updateSyncSts($id, $sts){
		$result = mysql_query("UPDATE location SET syncsts = $sts WHERE id = $id");
		return $result;
	}
}

?>