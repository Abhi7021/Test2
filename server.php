<?php
	try {
    $conn = new PDO("sqlsrv:server = tcp:dserver123.database.windows.net,1433; Database = UniversityDB", "loginadmin", "Abhishek@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
	}
	
	print("Connection to database Established<br>");

	$roll=$_POST["RollNo"];
	$fname=$_POST["FirstName"];
	$lname=$_POST["LastName"];
	$cgpa=$_POST["GPA"];
	$Major=$_POST["Major"];
	$data=[
	 'r'=>$roll,
	 'f'=>$fname,
	 'l'=>$lname,
	 'c'=>$cgpa,
	 'm'=>$Major,
	];

	$sql="insert into TopStudents(RollNo,FirstName,LastName,GPA,Major) values(:r,:f,:l,:c,:m);";

	$smt=$conn->prepare($sql);
	$smt->execute($data);
	
	print("Data Entered in Database<br>Redirecting in 5 seconds");
	sleep(3);
	header('location: index.html');

?>