<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Electricity Bill -->
    <h1>Electricity Bill</h1>
    <form action="#" method="$_GET">
        <label for="unit">Enter Unit
            <input type="number" name="bill" id="unit">
        </label><br><br>
        <input type="submit" value="Calculate Bill">
    </form>
    <?php
    $value = $_GET["bill"];
    $amount = 0;
    if (isset($_GET["bill"])) {
        if ($value > 250) {
            $amount = 175 + 400 + 520 + (($value - 250) * 6.5);
            echo "<br>$amount";
        } else if ($value > 150) {
            $amount = 175 + 400 + (($value - 150) * 5.2);
            echo "<br>$amount";
        } else if ($value > 50) {
            $amount = 175 + (($value - 50) * 4);
            echo "<br>$amount";
        } else if (($value <= 50) && ($value > 0)) {
            $amount = ($value) * 3.5;
            echo "<br>$amount";
        } else {
            echo "<br>Please Enter a Valid Number";
        }
    }
    ?>
    <hr>

    <!-- Simple Calculator -->
    <?php
    $result = 0;
    $first = $_GET["first"];
    $second = $_GET["second"];
    $btn = $_GET["button"];
    if (isset($_GET["first"]) && $_GET["second"]) {
        switch ($btn){
            case '+':
                $result = $first + $second;
                break;
            case '-':
                $result = $first - $second;
                break;
            case '*':
                $result = $first * $second;
                break;
            case '/':
                $result = $first / $second;
                break;
        }
    }
    ?>
    <h1>Simple Calculator</h1>
    <form action="#" method="$_GET">
        <label for="first_input">Number 1
            <input type="number" name="first" id="first_input">
        </label><br><br>
        <label for="second_input">Number 2
            <input type="number" name="second" id="second_input"><br>
        </label><br>
        <label for="result">Result
            <input type="number" name="result" value="<?php echo (isset($result)) ? $result : ''; ?>" id="result" disabled><br>
        </label><br>
        <input type="submit" value="+" name="button">
        <input type="submit" value="-" name="button">
        <input type="submit" value="*" name="button">
        <input type="submit" value="/" name="button">
    </form>
    <hr>

    <!-- Area and Perimeter -->
    <h1>Area and Perimeter</h1>
    <form action="#" method="$_GET">
        <label for="length">Length of Rectangle
            <input type="number" name="length" id="length">
        </label><br><br>
        <label for="width">Width of Rectangle
            <input type="number" name="width" id="width">
        </label><br><br>
        <input type="submit" value="Calculate Area & Perimeter">
    </form>
    <?php
    if (isset($_GET["length"]) && ($_GET["width"])) {
        $length = $_GET["length"];
        $width = $_GET["width"];
        echo "<br>Area is " . ($length * $width) . " Sq. mtr. <br><br>";
        echo "Perimeter is " . (2 * ($length + $width)) . " Sq. mtr.";
    }
    ?>
    <hr>

    <!-- Conversion -->
    <?php
    $value = $_GET["input_value"];
    $type = $_GET["convert"];
    $display = 0;
    if ($type=="htm"){
        $display = $value." Hours = ".($value*60)." Minuts";
    }
    else if ($type=="hts"){
        $display = $value." Hours = ".($value*3600)." Seconds";
    }
    ?>
    <h1>Conversion</h1>
    <form action="#" method="get">
        <input type="number" name="input_value" placeholder="Input Hours"><br><br>
        <input type="radio" id="htm" name="convert" value="htm">
        <label for="html">Hours To Mins</label><br>
        <input type="radio" id="hts" name="convert" value="hts">
        <label for="hts">Hours To Seconds</label><br><br>
        <?php echo (isset($display)) ? $display : ''; ?><br>
        <input type="submit" value="Convert">
    </form>
    <hr>

    <!-- Upload Image -->
    <h1>Upload Image</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="image">
            <input type="file" name="fileToUpload" id="image">
        </label><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
    $target_dir = "./image/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_GET["submit"])) {
        // print_r($_FILES);die;
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
      } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 2097152) {
      echo "Sorry, your file is too large.<br>";
      $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.<br>";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
        echo "<img src=".$target_file." height=300 width=300 />";
      } else {
        echo "Sorry, there was an error uploading your file.<br>";
      }
    }
    ?>
    <hr>  
</body>
</html>