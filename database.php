<?php
class database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function  __construct()
    {
        $this->connectDB();
    }
    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $error = "Connection Fail" . $this->link->connect_error;
        }
    }
    // Select or Read Data
    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    // Create Data
    public function insert($query)
    {
        $insert_rows = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_rows) {
            header("Location:index.php?msg=" . urlencode('Data inserted Successfully'));
            exit();
        } else {
            die("Error: (" . $this->link->errno . ")" . $this->link->error);
        }
    }
    // Update Data
    public function update($query)
    {
        $update_rows = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($update_rows) {
            header("Location:index.php?msg=" . urlencode('Data updated Successfully'));
            exit();
        } else {
            die("Error: (" . $this->link->errno . ")" . $this->link->error);
        }
    }
}
