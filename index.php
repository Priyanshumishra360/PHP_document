<?php
        $insert = false;
        if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        $conn =  mysqli_connect($server, $username, $password);

        if(!$conn){
            die("connection to this database failed due to ". mysqli_connect_error());
        }
      //  echo "success connecting to the database";

      $name = $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST["gender"];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $desc = $_POST['desc'];

      
      $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`,`dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc',CURRENT_TIMESTAMP ());";
      //  echo $sql;

       if($conn->query($sql) == true ){
        //  echo "successfully inserted";

        $insert = true;
       }
       else{
         echo "Error: $sql <br> $conn->error";
       }
        $conn-> close();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=w">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <img class="bg" src="arya.jpg" alt="AIET">
    <div class="container">
        <h1> <center> Welcome to Arya jaipur US Trip Form </center> </h1>
        <p>  Enter your Details and submit your form to confirm your participation in the trip</p>

        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks to submitting your form. we are happy to welcome you in this trip.</p>";
        }
        ?>

        <form action="index.php" method="POST">
        <input type="name" name="name" id="name" placeholder="Enter Your name">
        <input type="text" name="age" id="age" placeholder="Enter Your age">
        <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter the information here" ></textarea>
        <button class="btn">submit </button>
       

            </form>


        
    </div>
     
    <script src="index.js"> </script>
    


    
</body>
</html>
