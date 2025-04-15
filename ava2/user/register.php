<?php 
include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if($result->num_rows > 0){
        header("Location: signup.php?error=Email+Address+Already+Exists");
        exit();
    }
    else{
        $insertQuery = "INSERT INTO users(firstName, lastName, email, password)
                       VALUES ('$firstName', '$lastName', '$email', '$password')";
        
        if($conn->query($insertQuery) == TRUE){
            header("location: signin.php?success=Registration+Successful.+Please+sign+in");
            exit();
        }
        else{
            header("Location: signup.php?error=Registration+Failed:+".urlencode($conn->error));
            exit();
        }
    }
}

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password) ;
    
    $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
     session_start();
     $row=$result->fetch_assoc();
     $_SESSION['email']=$row['email'];
     header("Location: ../home.html");
     exit();
    }
    else{
     header("Location: signin.php?error=Incorrect+Email+or+Password");
     exit();
    }
 }
?>