<?php

define("DB_HOST", "inthava-db-do-user-14392713-0.b.db.ondigitalocean.com");
define("DB_NAME", "laodev_db");
define("PORT", 25060);
define("DB_USER", "doadmin");
define("DB_PASS", "AVNS__s1Q9IsO_kg_WzKVuuw ");


class Database
{

    public $connection;

    function __construct()
    {
        $this->connect_db();
    }
    private function connect_db()
    {
        // connect to database with port 25060 
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, PORT);   
        if (mysqli_error($this->connection)) {
            die("connect to database failed " . mysqli_connect_error($this->connection));
        } else {
            $this->connection->set_charset("utf8mb4");
        }
    }
    public function query($sql)
    {
        // $sql = $this->escape_string($sql);
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }
    public function escape_string($sql)
    {
        return mysqli_real_escape_string($this->connection, $sql);
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("query failed " . mysqli_error($this->connection));
        }
    }
    public function fatch_assoc($result)
    {
        return mysqli_fetch_assoc($result);
    }
    public function fatch_all($result)
    {
        return mysqli_fetch_all($result);
    }
}

$db = new Database();

// $query = $db->query("SELECT * FROM posts;");
// $result = $db-fetch_all($db->query("SELECT * FROM posts;"));

// foreach ($result as $key) {
//   foreach ($key as $keys => $value) {
//     echo $keys. " " . $value;
//   }
//   echo "<br>";
// }