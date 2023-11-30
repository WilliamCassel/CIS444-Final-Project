
<!DOCTYPE html>
<html>
<head>
    <title>CS Smokes</title>
    <style>
    
       
        h1 {
            width: 60%;
            font-family: 'Space Mono', monospace;
            font-size: 45px;
            color: #977c84;
            text-align: center;
            background-color: #12012e;
            border-radius: clamp(0.25rem, 0.75vw, 1rem);
            margin-top: 20px; 
            margin-bottom: 0; 
            margin-left: auto;
            margin-right: auto;
            padding:10px;
        }

        h2 {
            width: 40%;
            font-family: 'Space Mono', monospace;
            font-size: 30px;
            color: #977c84;
            text-align: center;
            background-color: #12012e;
            border-radius: clamp(0.25rem, 0.75vw, 1rem);
            margin-top: 10px; 
            margin-bottom: 0; 
            margin-left: auto;
            margin-right: auto;
            padding:10px;
        }

    </style>
    

</head>
<body style="background-color: rgb(83, 80, 80);">
    
    <h1 data-value="CS Smokes">CS Smokes</h1>
 <?php
 $connString = "mysql:host=localhost;dbname=smoke_submissions";
 $user = "will";
 $pass = "will";
 $pdo = new PDO($connString, $user, $pass);

 $sql = "SELECT * FROM user_submissions";
 $result = $pdo->query($sql);

 while ($row = $result->fetch()) {
    echo "<h2>";
      echo $row['map'];
      echo "<br>";
    echo $row['explanation'];
    echo "<br/> </h2>";

   
}
    $pdo = null;
 
?>
</body>
</html>
