<?php

class DB{
    protected $con;
    private $configs;

    function __construct()
	{
        $this->configs = include($_SERVER['DOCUMENT_ROOT'].'/configs.php');
		$this->con = $this->connect();
	}
    private function connect(){
        $dbtype = $this->configs['dbtype'];
        $host = $this->configs['host'];
        $dbname = $this->configs['dbname'];
        $username = $this->configs['username'];
        $password = $this->configs['password'];
        try
		{
			//Create an instane to connect db
			$connection = new PDO($dbtype.':host='.$host.';dbname='.$dbname, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $connection;

		}catch(PDOException $e)
		{
			echo "PDO ERROR !!!";
            // Put error information to txt file
            $this->putErrorToLog($e->getMessage());
		}

		return false;
    }
    function disConnect(){
        $this->con = NULL;
    }
    //Write to database
	public function writeDB($query, $data = array())
	{
        $result = false;
        try {
            $statement = $this->con->prepare($query);
            $check = $statement->execute($data);
            if($check)
            {
                $result = true;
            }
        }
        catch(PDOException $e) {
            echo "PDO ERROR !!!";
            // Put error information to txt file
            $this->putErrorToLog($e->getMessage());
        }
        return $result;
	}

	//Read from database
	public function readDB($query, $data = array())
	{
        try {
            $statement = $this->con->prepare($query);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            
            $check = $statement->execute($data);
            if($check)
            {
                // Peturn object data with column name
                $result = $statement->fetchAll();
                if(is_array($result) && count($result) > 0)
                {
                    return $result; 
			    }
            }
        }
        catch(PDOException $e) {
            echo "PDO ERROR !!!";
            // Put error information to txt file
            $this->putErrorToLog($e->getMessage());
        }
		return false;
	}
    public function cleanData(&$data){
        return htmlspecialchars(strip_tags($data));
    }
    public function cleanDataArray(&$data = array()){
        // return htmlspecialchars(strip_tags($data));
    }
    public function putErrorToLog($msgError){
        $currentTime = date('Y-m-d H:i:s');
        file_put_contents('./serverReport/PDOErrors.txt','--------'.$currentTime .'--------'.PHP_EOL, FILE_APPEND);
        file_put_contents('./serverReport/PDOErrors.txt',$msgError.PHP_EOL, FILE_APPEND);
    }
}
?>