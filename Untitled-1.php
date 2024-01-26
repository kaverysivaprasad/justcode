<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drag & drop file</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css2/uploadstyle.css">
    <script src="uploadscript.js"></script>

    <!-- <script src="newgame.js"></script> -->
</head>

<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="drag-area">
                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                <header>Drag & Drop to Upload File</header>
                <span>OR</span>
                <label for="fileInput" class="browseButton">Browse File</label>
                <input type="file" id="fileInput" name="fileInput" hidden>
            </div>
            
        </form>
    </div>
    <?php
    include 'connection.php';
    $userid = $_GET["userid"];
    $ctitle= $_GET["coursetitle"];
    
  
    if ($pw1 === $pw2) {
      $query = "INSERT INTO user_register(username,emailid,password) VALUES ('$uname','$eid','$pw1')";
      $result = $connect->query($query);
  
      if ($result) {
        echo "<div class='success-message'>Registration successful</div>";
        echo "<div class='welcome-username'>Welcome $uname</div>";
        ?>
        <div class="login-link"><a href="login.html">Login</a></div>
        <?php
      } else {
        echo "Registration unsuccessful. Please try again later.";
      }
    } else {
      echo "Password mismatch. Registration unsuccessful.";
    }
    ?>
</body>

</html>

