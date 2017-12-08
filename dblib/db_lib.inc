<?php 
/* -----------------
Author: E.Eagles
-------------------*/
class sensor_db
{
    public  $db_msg = "";
    private $db = "";
	protected $results = "";
	protected $singlevalue = "";
	private $debug = 0;
	
	/*----------------------------------------------*/
	/* GENERIC DB TABLE PROCESSING FUNCTIONS */
	/*----------------------------------------------*/
	/*
		This function will perform a PDO query
		and return an array based on the query it receives.
	*/
    private function tbl_query_all($sql)
	{
		if ($this->debug==1)
			echo "dbapi: $sql";
		try 
		{
			$query = $this->db->prepare( $sql );
			$query->execute();
			$results = $query->fetchAll( PDO::FETCH_ASSOC ); 
			/* Need to generate the following for Google Chart*/
			if ($results)
			{
			  $this->results = $results;
			}
		}
		catch(PDOException $ex) 
		{
			$this->db_msg = "An Error occured writing to database: " .$ex->getMessage() ;
		}
	}
	/*
		This function will perform a PDO query
		and return one value based on the query it receives.
	*/
	
	private function tbl_query_one($sql)
	{
		if ($this->debug==1)
			echo "dbapi: $sql";
		try 
		{
			$query = $this->db->prepare( $sql );
			$query->execute();
			$this->singlevalue = $query->fetchColumn(); 
		}
		catch(PDOException $ex) 
		{
			 $this->db_msg = "An Error occured writing to database: " .$ex->getMessage() ;
		}
		
		return $this->singlevalue;
	}
 	/*
		This function will add data to the database via PDO 
		it does not return any data.
		in a future solution, it should return status.
	*/  
    private function tbl_insert($sql)
	{
		if ($this->debug==1)
			echo "dbapi: $sql";
		try 
		{
			//echo $sql;
			$query = $this->db->prepare( $sql );
			$query->execute();
		}
		catch(PDOException $ex) 
		{
			$this->db_msg = "An Error occured writing to database: " .$ex->getMessage() ;
		}	
	}
  
  	/*
		This function will update data in the database via PDO 
		it does not return any data.
		in a future solution, it should return status.
	*/
    private function tbl_update($sql)
	{
		if ($this->debug==1)
			echo "dbapi: $sql";
		try 
		{
			//echo $sql;
			$query = $this->db->prepare( $sql );
			$query->execute();
		}
		catch(PDOException $ex) 
		{
			$this->db_msg = "An Error occured writing to database: " .$ex->getMessage() ;
		}
	}	
	/*----------------------------------------------*/
	/* END OF GENERIC DB TABLE PROCESSING FUNCTIONS */
	/*----------------------------------------------*/
	

	
	
	/* ----------------------------------------------------------------
	   function: record_sensor()
	   data: $name - sensor name, $value - sensor value, 
			 $status - status value,
			 
	   Responsible for recording sensor data from remote XML if changed
	   returns: n/a
	   ---------------------------------------------------------------- */
	public function record_sensor($name,  $status, $value)
	{
		$sID = ltrim($name, "Sensor ");
		
		$sql = "INSERT INTO sensors (sID, sStatus, sValue) VALUES ($sID, \"$status\",  $value )";
		$this->tbl_insert($sql);
	}

	
	/* ----------------------------------------------------------------
    function: __construct()
    Responsible for creating the object
	and connecting to the database using more secure PDO
    creates database handle $db
    ---------------------------------------------------------------- */

	public function __construct()
    {
		/*** mysql hostname ***/
		$hostname = "localhost";
		/*** mysql username ***/
		$username = "root";
		/*** mysql password ***/
		$password = "usbw";
	   
		try 
		{
			$this->db = new PDO("mysql:host=localhost;port=3308;dbname=smonitor", $username, $password);
			// stores the outcome of the connection into a class variable
		}
		catch(PDOException $e)
		{
		   $this->db = -1;
		   $this->db_msg = "Could not connect to student centered learning system database: ".$e->getMessage();
		}
	}
 
  	/* ----------------------------------------------------------------
	   function: get_sensors()
	   data: none
			 
	   Responsible for getting sensor data 
	   returns: n/a
	   ---------------------------------------------------------------- */
	// class private method to get sensor data
	private function get_sensors($sid)
	{	
		if ($sid>=1)
			$sql = "SELECT * from sensors WHERE sID = $sid";
		else
			$sql = "SELECT * from sensors";
		$this->tbl_query_all($sql);
	}
	
	
	//  method for obtaining results.
	public function get_sensor_data($sid)
    {
		$this->get_sensors($sid);
		return $this->results;	
    }
	
}


/* HELP WITH DATE
//(sID, sStatus, sValue)
	if ($range == 1)
		$sql = "SELECT sTime, sValue, sStatus FROM sensors WHERE sID= $id AND sTime < NOW() AND sTime > NOW()-INTERVAL 1 DAY";		
	else if ($range == 7)
		$sql = "SELECT sTime, sValue, sStatus FROM sensors WHERE sID= $id AND sTime < NOW() AND sTime > NOW()-INTERVAL 1 WEEK";		
	else if ($range == 30)
		$sql = "SELECT sTime, sValue, sStatus FROM sensors WHERE sID= $id AND sTime < NOW() AND sTime > NOW()-INTERVAL 1 MONTH";		
	else
		$sql = "SELECT sTime, sValue, sStatus FROM sensors WHERE sID= $id ";


*/