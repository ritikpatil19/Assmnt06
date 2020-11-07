<?php

include "dbconn.php"; // Using database connection file here

$phoneOld = $_GET['phone']; // get id through query string

$qry = mysqli_query($conn,"select * from register where phone='$phoneOld';"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $cname = $_POST['collegename'];
    $phoneNew = $_POST['phone'];
    $email = $_POST['email'];
	
    $edit = $conn->prepare("update register set fname='$fname', lname='$lname', cname='$cname',phone='$phoneNew', email='$email' where phone='$phoneOld';");
    $edit->execute();
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:index.html"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Update</title>

        <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


    #lessWidth{
        display: none;
    }

.container{
    text-align: center;
    justify-content: center;
    align-items: center;
}

.container form{
    color: black;
    display: flex;
    flex-direction: column;
    margin: auto;
    text-align: center;
    justify-content: center;
    align-items: center;
    border: 2px solid gray;
    padding: 20px;
    width: 26pc;
    margin-top: 5%;
}

#forgot{
    color: black;
    margin-top: 15px;
    margin-left: 200px;
}

#forgot:hover{

}

input{
    width: 60%;
    margin: auto;
    margin-top: 10px;
    padding: 16px;
    font-size: 15px;
    border-radius: 10px;
    border: none;
    border-bottom: 2px solid grey;
    background: transparent;
}

input:focus{
    outline: none;
    background: transparent;
}

.container .login-logo{
    width: 300px;
    height: 150px;
}

.container button{
    margin-top: 20px;
    font-size: 15px;
}

    </style>
</head>
<body>
    <div class="alert alert-danger alert-dismissible text-center" id="lessWidth" style="margin-top: 5%;">
          <b>Note: Please use desktop to view content..!!!</b>
        </div>
<header id="head">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand" href="index.html">Innovationz</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarsExample05" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html" id="home">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="register.html" id="register">Register</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="show.php" id="showlist">Show Registrants</a>
      </li>
    </ul>
  </div>
</nav>
</header>




<div class="container" id="form">
    <h3 style="margin-top: 2%;">Update Data</h3>
        <div id="message"></div>
        <form method="POST">
        <input type="text" name="firstname" id="firstname" value="<?php echo $data['fname'] ?>" placeholder="First Name" required>
        <input type="text" name="lastname" id="lastname" value="<?php echo $data['lname'] ?>" placeholder="Last Name" required>
        <input type="text" name="collegename" id="collegename" value="<?php echo $data['cname'] ?>" placeholder="College Name" required>
        <input type="text" name="phone" id="phone" value="<?php echo $data['phone'] ?>" placeholder="Mobile Number" required>
        <input type="email" name="email" id="email" value="<?php echo $data['email'] ?>" placeholder="Email Id" required>
        <button class="btn btn-lg btn-primary" name="update" value="UPDATE" type="submit" id="submit">UPDATE</button>
        </form>
</div>

<!-- Optional JavaScript -->    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
    var width = $(window).width();
    if (width <=1000 ) {
        console.log("lessWidth");
        document.getElementById('head').style.display = "none";
        document.getElementById('form').style.display = "none";
        document.getElementById('lessWidth').style.display = "block";
    }
    else{
        document.getElementById('head').style.display = "block";
        document.getElementById('form').style.display = "block";
        document.getElementById('lessWidth').style.display = "none";
    }
});

$(window).resize(function(){
    var width = $(window).width();
    if (width <=1000 ) {
        console.log("lessWidth");
        document.getElementById('head').style.display = "none";
        document.getElementById('form').style.display = "none";
        document.getElementById('lessWidth').style.display = "block";
    }
    else{
        document.getElementById('head').style.display = "block";
        document.getElementById('form').style.display = "block";
        document.getElementById('lessWidth').style.display = "none";
    }
});
</script>
</body>
</html>

