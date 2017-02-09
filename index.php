<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hello <?php echo 'World'; ?></h1>

<?php 

$host = "us-cdbr-iron-east-04.cleardb.net";
$username = "b83946cb15195a";
$password = "e1473e89";
$db = "heroku_0c63ce6730cdd8f";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    echo "<br>";

/*********************************************************/
    $id = 7;
    $name = "Mani";

    $stmt = $conn->prepare("INSERT INTO tb_test (id, name) VALUES(:id, :name)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);


    $stmt->execute();

    echo 'Insertado';
    echo '<br>';
/*********************************************************/


	$query = $conn->prepare("SELECT id, name FROM tb_test");
    $query->execute();
    
foreach ($query as $valor){
	echo 'Id: '.$valor[0];
	echo ' Name: '.$valor[1];
	echo '<br/>';
}


$conn = null;


    }catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }

 ?>


</body>
</html>