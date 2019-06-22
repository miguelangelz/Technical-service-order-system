<?php
require_once("Database.php");
require_once("IPersonas.php");

class Personas implements IPersonas
{
    private $con;
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $empresa;
    private $direccion;
    private $telefono;
    private $celular;
    private $correo;
    private $username;
    private $password;
    private $tipo;

    public function __construct(Database $db)
    {
        $this->con = new $db;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
      public function setApellido($apellido)
      {
          $this->apellido = $apellido;
      }

    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
      public function setDireccion($direccion)
      {
          $this->direccion = $direccion;
      }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
      public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
   
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    //insertamos usuarios en una tabla con postgreSql
    public function guardarCliente()
    {
        try{
            $query = $this->con->prepare('INSERT INTO clientes (cli_cedula, cli_nombre,cli_apellido,cli_empresa,cli_direccion,cli_telefono,cli_celular,cli_correo) VALUES (?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $this->cedula, PDO::PARAM_STR);
            $query->bindParam(2, $this->nombre, PDO::PARAM_STR);
            $query->bindParam(3, $this->apellido, PDO::PARAM_STR);
            $query->bindParam(4, $this->empresa, PDO::PARAM_STR);
            $query->bindParam(5, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(6, $this->telefono, PDO::PARAM_STR);
            $query->bindParam(7, $this->celular, PDO::PARAM_STR);
            $query->bindParam(8, $this->correo, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
     //insertamos usuarios en una tabla con postgreSql
    public function guardarUsuario()
    {
        try{
            $query = $this->con->prepare('INSERT INTO users (usu_nombre,usu_usuario, usu_password,usu_direccion,usu_tipo) VALUES (?,?,?,?,?)');
            $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $query->bindParam(2, $this->username, PDO::PARAM_STR);
            $query->bindParam(3, $this->password, PDO::PARAM_STR);
            $query->bindParam(4, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(5, $this->tipo, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
    public function actualizarCliente()
    {
        try{
            $query = $this->con->prepare('UPDATE clientes SET cli_cedula = ?, cli_nombre = ?,cli_apellido = ?, cli_empresa = ?
                                                              ,cli_direccion = ?, cli_telefono = ?,cli_celular = ?,cli_correo = ? WHERE cli_id = ?');
            $query->bindParam(1, $this->cedula, PDO::PARAM_STR);
            $query->bindParam(2, $this->nombre, PDO::PARAM_STR);
            $query->bindParam(3, $this->apellido, PDO::PARAM_STR);
            $query->bindParam(4, $this->empresa, PDO::PARAM_STR);
            $query->bindParam(5, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(6, $this->telefono, PDO::PARAM_STR);
            $query->bindParam(7, $this->celular, PDO::PARAM_STR);
            $query->bindParam(8, $this->correo, PDO::PARAM_STR);
            $query->bindParam(9, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
     public function actualizarUsuario()
    {
        try{
            $query = $this->con->prepare('UPDATE users SET usu_nombre = ?,usu_usuario = ?, usu_password = ?,usu_direccion ,usu_tipo = ? WHERE usu_id = ?');
                $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
                $query->bindParam(2, $this->username, PDO::PARAM_STR);
                $query->bindParam(3, $this->password, PDO::PARAM_STR);
                $query->bindParam(4, $this->direccion, PDO::PARAM_STR);
                $query->bindParam(5, $this->tipo, PDO::PARAM_STR);
                $query->bindParam(6, $this->id, PDO::PARAM_INT);
                $query->execute();
            $this->con->close();
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }

    //obtenemos usuarios de una tabla con Mysql
    public function mostrarCliente()
    {
        try{
            if(is_int($this->id))
            {
                $query = $this->con->prepare('SELECT * FROM clientes WHERE cli_id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM clientes');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
     //obtenemos usuarios de una tabla con postgreSql
    public function mostrarUsuario()
    {
        try{
            if(is_int($this->id))
            {
                $query = $this->con->prepare('SELECT * FROM users WHERE usu_id = ?');
                $query->bindParams(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM users');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
    public function getOrden()
    {
        try{          
                $query = $this->con->prepare("SELECT * FROM users WHERE usu_tipo = 'Técnico'");
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
    
    public function eliminarCLiente()
    {
        try{
            $query = $this->con->prepare('DELETE FROM clientes WHERE cli_id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }
    public function eliminarUsuario()
    {
        try{
            $query = $this->con->prepare('DELETE FROM users WHERE usu_id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }

    public static function baseurl()
    {
        return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/STO/";
    }

    public function checkUser($user)
    {
        if( ! $user )
        {
            header("Location:" . Personas::baseurl() . "Vista/Tecnico/listaClientesU.php");
        }
    }
}