<?php

class DB{
    public $con;
    private $configs;

    function __construct()
	{
        $this->configs = include($_SERVER['DOCUMENT_ROOT'].'/eCommerce/configs.php');
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
			//create an instane to connect db
			$connection = new PDO($dbtype.':host='.$host.';dbname='.$dbname, $username, $password);
            $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			return $connection;

		}catch(PDOException $e)
		{
			echo $e->getMessage();
			die;
		}

		return false;
    }
    function disConnect(){
        $this->con = NULL;
    }
    //write to database
	public function write($query, $data = array())
	{
        try {
            $statement = $this->con->prepare($query);
            $check = $statement->execute($data);
            if($check)
            {
                return true;
            }
        }
        catch(PDOException $e) {
            echo "PDO ERROR !!!";
            file_put_contents('./serverReport/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return false;
	}

	//read from database
	public function read($query,$data = array())
	{
        try {
            $statement = $this->con->prepare($query);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $check = $statement->execute($data);
            if($check)
            {
                // return object data with column name
                $result = $statement->fetchAll();
                if(is_array($result) && count($result) > 0)
                {
                    return $result;
			    }
            }
        }
        catch(PDOException $e) {
            echo "PDO ERROR !!!";
            //put error information to txt file
            $timeError = date('Y-m-d H:i:s');
            file_put_contents('./serverReport/PDOErrors.txt','--------'.$timeError .'--------'.PHP_EOL, FILE_APPEND);
            file_put_contents('./serverReport/PDOErrors.txt',$e->getMessage().PHP_EOL, FILE_APPEND);
        }
		return false;
	}

}

?>