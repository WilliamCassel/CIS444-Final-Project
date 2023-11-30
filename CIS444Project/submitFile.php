<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $explanation = $_POST['explanation'];

    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["videoFile"]["name"]);
    $uploadOk = 1;
    
 
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $targetFile)) {
            $connString = "mysql:host=localhost;dbname=smoke_submissions";
            $user = "will";
            $pass = "will";

            $pdo = new PDO($connString, $user, $pass);

            $sql = "INSERT INTO user_submissions (map, explanation, file) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            
            // Bind parameters by reference
	    
	    $stmt->bindParam(1, $_COOKIE["Map"]);
            $stmt->bindParam(2, $explanation);
            $stmt->bindParam(3, $targetFile);
            
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
            $loc = "Location: ". $_COOKIE["Map"].".php";
            header($loc); 
            exit();
	
            } else {
                echo "Error inserting data.";
            }
        }
    }
}
?>