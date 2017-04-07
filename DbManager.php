<?php class DbManager { 
    private $connection;
    public function connect($name, $email, $homePage, $reg_date, $text)
    {
        require_once( "connectionParameters.php" );
        $this->connection = new mysqli($host, $user, $password);
        if ($this->connection->connect_error)
        {
            die("Connection failed: " . $this->connection->connect_error);
        } 
        echo "Connected successfully";
        
        $this->createDb($database);
        $this->createTable($database);
        $this->insertMessage($name, $email, $homePage, $reg_date, $text);
        $this->connection->close();
    }
    
    private function createDb($database)
    {
        $sql = "CREATE DATABASE if NOT EXISTS {$database}";
        if ($this->connection->query($sql) === TRUE) {
        echo "Database created successfully";
        } else
        {
            echo "Error creating database: " . $this->connection->error;
        }
    }
    
    private function createTable($database)
    {
        $sql = "CREATE TABLE if NOT EXISTS messages (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        homePage VARCHAR(30),
        reg_date DATETIME,
        text VARCHAR(1000)
        )";
        mysqli_select_db($this->connection, $database);
       if($this->connection->query($sql) === TRUE)
       {
            echo "Table MyGuests created successfully";
        } else
        {
            echo "Error creating table: " . $this->connection->error;
        }
    }
    
    private function insertMessage($name, $email, $homePage, $reg_date, $text)
    {
        $sql = "INSERT INTO messages (name, email, homePage, reg_date, text)
        VALUES ('$name', '$email', '$homePage', '$reg_date', '$text')";
        if ($this->connection->query($sql) === TRUE)
        {
            echo "New record created successfully";
        } else
        {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }
}?>


