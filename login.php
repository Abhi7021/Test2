<?php
	try {
    $conn = new PDO("sqlsrv:server = tcp:dserver123.database.windows.net,1433; Database = UniversityDB", "loginadmin", "Abhishek@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
	}
	
	$roll=$_POST["RollNo"];
	$sql= "Select * from TopStudents where RollNo=$roll";
	
	try
 	{
 	 	$rows=$conn->query($sql);
 	} 
	catch(PDOException $r)
	{ 
		print("$r");
 	}
	 
	 foreach ($rows as  $row)
	{
	   if ($row!=NUll)
	   {
		$Name = $row['FirstName'];
		$GPA  = $row['GPA'];
		$M= $row['Major'];
	   }
	   else
		{
		print("NO RECORD FOUND !!");	
		}
	}
	print("<center>Name :- $Name <br>GPA :- $GPA <BR>Major Project :- $M</center>");

$conn.close();
?>