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
        execute("
            INSERT INTO GAME
                (MODE, COLUMNS, `LINES`, BOMBS, START, USER_ID)
                VALUES
                ('$this->Mode', $this->Columns, $this->Lines, $this->Bombs, now(), $userID)
        ");

        $this->ID = $this->getLastGameCreated($userID);
    }

    public function getLastGameCreated($userID) {
        $lastGameCreated = execute("
            SELECT ID
                FROM GAME
                WHERE USER_ID=$userID
                ORDER BY ID DESC
        ");

        return $lastGameCreated->fetch()["ID"];
    }

    public function finish($userID) {
        if ($this->Result != 'win' && $this->Result != 'timeout' && $this->Result != 'exploded')
            return;

        execute("
            UPDATE GAME
                SET RESULT = '$this->Result',
                    END = now()
                WHERE ID = $this->ID
                    AND USER_ID = $userID
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
