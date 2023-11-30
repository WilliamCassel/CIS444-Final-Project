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

            $sql = "INSERT INTO submissions (explanation, video_file) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            
            // Bind parameters by reference
            $stmt->bindParam(1, $explanation);
            $stmt->bindParam(2, $targetFile);
            
            if ($stmt->execute()) {
                echo "Data inserted successfully.";
                $pdo = null;
                $loc = "Location: ". $_COOKIE["Map"];
                header($loc);
                exit();
	
            } else {
                echo "Error inserting data.";
                $pdo = null;
            }
        }
    }
    
}
?>