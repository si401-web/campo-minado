<?php

class Game {
    public $ID;
    public $Mode;
    public $Columns;
    public $Lines;
    public $Bombs;
    public $Result;
    public $Start;
    public $End;

    public function create($userID) {
        return execute("
            INSERT INTO GAME
                (MODE, COLUMNS, `LINES`, BOMBS, START, USER_ID)
                VALUES
                ('$this->Mode', $this->Columns, $this->Lines, $this->Bombs, now(), $userID)
        ");
    }
}

function execute($sql) {
    try {
        $server = $_ENV["DB_SERVER"];
        $name = $_ENV["DB_NAME"];
        $user = $_ENV["DB_USER"];
        $pass = $_ENV["DB_PASS"];
        $conn = new PDO("mysql:host=$server;dbname=$name", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result = $conn->query($sql);
        
        $conn = null;

        return $result;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
    
?>
