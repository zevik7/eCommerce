<?php
namespace mvc\core;
use PDO;

class DB{
    protected $con;
    private $configs;

    function __construct()
	{
		$this->con = $this->connect();
        // Turn off only_full_group_by mode
        $temp = 
            $this->readDB("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
	}

    private function connect(){
        $dbtype = DBTYPE;
        $host = HOST;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;
        try
		{
			//Create an instane to connect db
			$connection = new PDO($dbtype.':host='.$host.';dbname='.$dbname.";charset=utf8", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $connection;

		}catch(PDOException $e)
		{
			echo "PDO ERROR !!!";
            // Put error information to txt file
            $this->putErrorToLog($e->getMessage());
		}
    }

    function disConnect(){
        $this->con = NULL;
    }
 
    // Write to database
	public function writeDB($query, $data = array())
	{
        try {
            $statement = $this->con->prepare($query);
            $result = $statement->execute($data);
            return $result;
        }
        catch(PDOException $e) {
            echo "PDO ERROR !!!";
            // Put error information to txt file
            $this->putErrorToLog($e->getMessage());
        }
        return false;
	}

	// Read from database
	public function readDB($query, $data = array())
	{
        try {
            $statement = $this->con->prepare($query);
            $statement->setFetchMode(PDO::FETCH_ASSOC); 
            
            $check = $statement->execute($data);
            if($check)
            {
                $result = $statement->fetchAll();
                return $result; 
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

    public function cleanDatas(&$data = array()){
        // return htmlspecialchars(strip_tags($data));
    }
    
    public function putErrorToLog($msgError){
        $currentTime = date('Y-m-d H:i:s');
        file_put_contents('./serverLog/PDOErrors.txt',
            PHP_EOL.'---'.$currentTime .'---'.PHP_EOL, FILE_APPEND);
        file_put_contents('./serverLog/PDOErrors.txt',
            $msgError.PHP_EOL, FILE_APPEND);
    }
}
?>