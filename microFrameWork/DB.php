<?php
namespace sessions\microFrameWork;

use PDO;
use PDOException;

class DB
{
    private $conn;

    public function __construct($localHost, $username, $password, $dbname)
    {
        try {
            $dsn = "mysql:host=$localHost;dbname=$dbname;charset=utf8mb4";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function selectAll($col, $table)
    {
        $query = "SELECT $col FROM $table";
        $runQuery = $this->conn->query($query);
        
        $data = $runQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $data ?: false;
    }

    public function selectByCond($col, $table, $cond)
    {
        $query = "SELECT $col FROM $table WHERE $cond";
        $runQuery = $this->conn->query($query);
        
        $dataArr = $runQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $dataArr ?: false;
    }


    public function delete($table, $cond)
    {
        $query = "DELETE FROM $table WHERE $cond";
        $runQuery = $this->conn->prepare($query);
        
        if ($runQuery->execute()) {
            echo 'Your data was deleted successfully';
        } else {
            return false;
        }
    }



    public function insert($table, $data)
    {
        $columns = "`" . implode("`, `", array_keys($data)) . "`";
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        $runQuery = $this->conn->prepare($query);
        
        foreach ($data as $key => $value) {
            $runQuery->bindValue(":$key", $value);
        }
        
        if ($runQuery->execute()) {
            echo 'Your data was inserted successfully';
        } else {
            echo 'Failed to insert data';
            return false;
        }
    }


    
    public function update($table, $colAndValue, $cond)
    {
        $setClause = [];
        foreach ($colAndValue as $col => $value) {
            $setClause[] = "`$col` = :$col";
        }
        $requiredDat = implode(', ', $setClause);
        $query = "UPDATE $table SET $requiredDat WHERE $cond";

        $runQuery = $this->conn->prepare($query);

        foreach ($colAndValue as $col => $value) {
            $runQuery->bindValue(":$col", $value);
        }

        if ($runQuery->execute()) {
            echo 'Your data has been updated successfully';
        } else {
            echo 'Failed to update data';
        }
    }
}
?>
