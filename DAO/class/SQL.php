<?php

class SQL extends PDO
{
    private $_conn;

    public function __construct()
    {
        try
        {
            $this->_conn = new PDO(
                "sqlsrv:Database=dbphp7;
                server=localhost\SQLEXPRESS;
                ConnectionPooling=0", null, null
            );
        }
        catch(PDOException $e)
        {
            throw new PDOException($e);
        }
        
    }

    private function setParams($statment, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($key, $value);
        }
    }

    private function setParam($statment, $key, $value)
    {
        $statment->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array())
    {
        $stmt = $this->_conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()):array
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>