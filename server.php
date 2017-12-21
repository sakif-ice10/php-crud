<?php
  session_start();
  //initialize variables
  $name = "";
  $address = "";
  $id = 0;
  $edit_state = false;

  //connect to database
  $db = mysqli_connect('localhost', 'root', '', 'php_crud');

  //if save button is clicked
  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "INSERT INTO users (name, address) VALUES ('$name', '$address')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Address saved successfully!";
    header("location:index.php");
  }

  //update record
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE users SET name= '$name', address = '$address' WHERE id = $id");
    $_SESSION['msg'] = " Address updated Successfully";
    header("location:index.php");
  }

  //delete $records
  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM users WHERE id= $id");
    $_SESSION['msg'] = "Address deleted successfully";
    header("location:index.php");
  }

  //retrieve data from database
  $results = mysqli_query($db, "SELECT * FROM users");

?>
