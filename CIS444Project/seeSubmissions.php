
<!DOCTYPE html>
<html>
<head>
    <title>CS Smokes</title>
    <style>
     button{
        width:150px; 
        height:45px; 
        border-color:#1186bd;
        border-radius:10%;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; 
        background-color:#1186bd; 
        font-size:20px;
        font-family: 'Space Mono', monospace; 
        color:white;
        margin-bottom:3%;
        }
           button:hover{
        background-color: #034a96;
    }
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

 $sql = "SELECT * FROM user_submissions WHERE map = ?";
 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(1, $_COOKIE["Map"]);
     $stmt->execute();
  // $rowCount = $stmt->rowCount();
 //echo "Number of rows returned: " . $rowCount;
     echo " <button id = 'back'>Back</button> ";
   // echo $_COOKIE["Map"];
  while ($row = $stmt->fetch()) {
    echo "<h2>";
    echo $row['map'];
    echo "<br>";
    echo $row['explanation'];
    echo "<br/> </h2>";
 
    
 }
    $pdo = null;
 
    ?>
    <script>

function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}
      
  document.getElementById("back").addEventListener('click', function(){
      let map = getCookie("Map");
      let url = map +".php";
        window.location.href=url;
       });
  </script>
    
</body>
</html>
