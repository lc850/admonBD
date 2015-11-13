<?php 
	$mysqli = new mysqli("localhost", "root", "", "imss");

	if($mysqli->connect_errno){
		print("Conexion fallida: ". $mysqli->connect_error);
		exit();
	}
	$mysqli->begin_transaction();
	//read uncommited
	$mysqli->begin_transaction();
	

	$sql="select * from pacientes where id=85";
	$result=$mysqli->query($sql);
	print("Lectura inicial--------------------<br>");
	if($result){
		while($obj = mysqli_fetch_object($result)){
			print("-----PACIENTE " .$obj->id. "-----<br>");
			print("Nombre: ".$obj->nombre."<br>");
			print("Edad: ".$obj->edad."<br>");
		}
	}

	$sql="update pacientes set edad=90 where id=85";
	$result=$mysqli->query($sql);

	$sql="select * from pacientes where id=85";
	$result=$mysqli->query($sql);

	print("Despues del update--------------------------<br>");

	if($result){
		while($obj = mysqli_fetch_object($result)){
			print("-----PACIENTE " .$obj->id. "-----<br>");
			print("Nombre: ".$obj->nombre."<br>");
			print("Edad: ".$obj->edad."<br>");
		}
	}

	$mysqli->rollback();

	$sql="select * from pacientes where id=85";
	$result=$mysqli->query($sql);

	print("Despues del rollback------------------<br>");

	if($result){
		while($obj = mysqli_fetch_object($result)){
			print("-----PACIENTE " .$obj->id. "-----<br>");
			print("Nombre: ".$obj->nombre."<br>");
			print("Edad: ".$obj->edad."<br>");
		}
	}
	$mysqli->commit();


	$mysqli->close();
?>