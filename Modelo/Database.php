<?php
class Database extends PDO
{

   
    private $tipo_base="mysql";
    private $localhost="localhost";
    private $database="id6400254_tecnicos";
    private $user="id6400254_root";
    private $password="error";
    private $dbh;

    //connect with postgresql and pdo
    public function __construct()
    {
        try {
            $this->dbh = parent::__construct($this->tipo_base.':host='.$this->localhost.';dbname='.$this->database, $this->user, $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }

    }
   
    

    //función para cerrar una conexión pdo
    public function close()
    {
        $this->dbh = null;
    }

}