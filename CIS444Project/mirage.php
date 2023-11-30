<!DOCTYPE html>
<html lang="en">
  <?php

  $expiryTime = time()+60*60*24;
  $name="Map";
  $value="mirage.php";
  setcookie($name, $value, $expiryTime);
   ?>
<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        }
    #toolbar {
        width: 12%;
        padding: 20px;
        background-color: rgb(83, 80, 80);
        margin-right:5%;
        }
    #image-container {
        width: 70%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; 
        }

    .image {
        width: calc(50% - 40px); 
        padding: 10px;
        box-sizing: border-box;
        background-color: rgb(83, 80, 80);
        border: 20px solid #12012e;
        border-radius: 20px;
        margin-bottom: 5%;
        box-sizing: border-box;
    }

    .overlay-text {
        text-align: center;
        font-family: 'Space Mono', monospace;
        font-size: 20px;
        color: white;
        margin-top: 5%; 
        }


    img {
        max-width: 100%; 
        height: auto;
        display: block;
        width: 100%; 
        height: 100%;
    }

@media (max-width: 768px) {
    .image {
        width: 100%; 
        margin-right: 0;
    }
}
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
  

    #submitForm {
        display: none;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
    }

    #submitForm label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 90%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #1186bd;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #034a96;
    }
    button:hover{
        background-color: #034a96;
    }
    h1 {
        width: 100%;
        font-family: 'Space Mono', monospace;
        font-size: 45px;
        color: #977c84;
        text-align: center;
        background-color: #12012e;
        border-radius: clamp(0.25rem, 0.75vw, 1rem);
        margin-top: 20px; 
        margin-bottom: 20px; 
        margin-left: auto;
        margin-right: auto;
        padding:10px;
    }

    </style>
</head>
<script>
function hover(element, url) {
    element.setAttribute('src', url);
  }
  

</script>
<body style="background-color: rgb(83, 80, 80);">
    <div id="toolbar">
        <h2>Filter</h2>
        <button onclick="filterImages('all')">All</button>
        
        <button onclick="filterImages('T')">T</button> 
        <button onclick="filterImages('CT')">CT</button> 
        <button id ="sub" style="font-size:14px;">Submit New Smoke</button>
	<form>
	  <button id = "seeSub" formaction="seeSubmissions.php">See Submissions</button>
	  </form>
        <button id = "back">Back</button> 
    </div>
    <div id="image-container">
        <h1 data-value="Map Name">Mirage</h1>
        <div class="image T">
            <img src="mirage/mirage_window.png" alt="T 1" onmouseover="hover(this, 'mirage/mirage_windowVid.mov');" onmouseout="hover(this,'mirage/mirage_window.png');">
            <div class="overlay-text">
                <p>Window</p>
            </div>
        </div>
        <div class="image T">
            <img src="mirage/mirage_ct.png" alt="T 2" onmouseover="hover(this, 'mirage/mirage_ctVid.mov');" onmouseout="hover(this,'mirage/mirage_ct.png');">
            <div class="overlay-text">
                <p>CT</p>
            </div>
        </div>
        <div class="image T">
            <img src="mirage/mirage_stairs.png" alt="T 3" onmouseover="hover(this, 'mirage/mirage_stairsVid.mov');" onmouseout="hover(this,'mirage/mirage_stairs.png');">
            <div class="overlay-text">
                <p>Stairs</p>
            </div>
        </div>
        <div class="image CT">
            <img src="mirage/mirageJungle.png" alt="CT 1" onmouseover="hover(this, 'mirage/mirage_jungleVid.mov');" onmouseout="hover(this,'mirage/mirageJungle.png');">
            <div class="overlay-text">
                <p>Jungle</p>
            </div>
        </div>
        <div class="image CT">
            <img src="mirage/mirage_marketWindow.png" alt="CT 2" onmouseover="hover(this, 'mirage/mirage_marketWindowVid.mov');" onmouseout="hover(this,'mirage/mirage_marketWindow.png');">
            <div class="overlay-text">
                <p>Market Window</p>
            </div>
        </div>
        <div class="image CT">
            <img src="mirage/mirage_marketDoor.png" alt="CT 3" onmouseover="hover(this, 'mirage/mirage_marketDoorVid.mov');" onmouseout="hover(this,'mirage/mirage_marketDoor.png');">
            <div class="overlay-text">
                <p>Market Door</p>
            </div>
        </div>

        <div id="submitForm" style="display: none;">
        <form id="smokeSubmissionForm" action="submitFile.php" method="post" enctype="multipart/form-data">
            <label for="explanation">Explanation:</label> <br>
            <textarea id="explanation" name="explanation" rows="8" required></textarea><br>
            <label for="videoFile">Upload Video:</label>
            <input type="file" id="videoFile" name="videoFile" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    </div>

    

    <script>
        function filterImages(category) {
            let images = document.querySelectorAll('.image');
            images.forEach(image => {
                if (category == 'all' || image.classList.contains(category)) {
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                }
            });
        }


    document.getElementById('sub').addEventListener('click', function(){
        let form = document.getElementById('submitForm');
        if (form.style.display === 'none') {
            form.style.display = 'block';
            document.getElementById('toolbar').appendChild(form); 
        } else {
            form.style.display = 'none';
        }
    });

    document.getElementById("back").addEventListener('click', function(){
        window.location.href="index.html";
    });

    </script>
</body>
</html>
