<?php

if(!isset($_SESSION)){
    session_start();
}
	require 'Database.php';
	
		$connect = new Database;
if(isset($_POST['login'])) {
		$errMsg = '';

		// Get data from FORM
		$cedula = $_POST['cedula'];

		if($cedula == '')
			$errMsg = 'Ingrese cedula';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT * FROM orden_local OL INNER JOIN clientes C 
                ON OL.cli_id = C.cli_id WHERE C.cli_cedula = :cedula');
				$stmt->execute(array(
					':cedula' => $cedula
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "Cliente con CI: $cedula no encontrado.";
				}
				else {
					if($data['cli_cedula']) {
                        $_SESSION['cliente'] = $data['orl_cliente'];
                        $_SESSION['id'] = $data['cli_id'];
                        $_SESSION['orden'] = $data['orl_id'];

						header("Location:cliente.php");
						exit;
					}
					else
                    header("Location:login_cliente.php");
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

?>