<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Show Registrantss</title>

  <style type="text/css">
  body{
    background-image:url("bg.jpg");
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:100% 100%;	
}

    #lessWidth{
      display: none;
    }
    #customers {
  border-collapse: collapse;  
  width: 95%;
  margin-left: 3%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}

  </style>
</head>
<body>

<header id="head">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarsExample05" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html" id="register">Register</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="show.php" id="showlist">Show Registrants</a>
      </li>
    </ul>
  </div>
</nav>
</header>


<div id="showlistDiv">
  <h2 style="margin-left: 40%;margin-top: 2%;margin-bottom: 2%;">Registrants</h2>

<table id="customers">
  <tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>College</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

<?php

include "dbconn.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from register order by date desc"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['fname']; ?></td>
    <td><?php echo $data['lname']; ?></td>
    <td><?php echo $data['cname']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['phone']; ?></td>    
    <td><a href="edit.php?phone=<?php echo $data['phone']; ?>">Edit</a></td>
    <td><a href="delete.php?phone=<?php echo $data['phone']; ?>">Delete</a></td>
  </tr> 
<?php
}
?>
</table>


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
    document.getElementById('showlistDiv').style.display = "none";
    document.getElementById('lessWidth').style.display = "block";
  }
  else{
    document.getElementById('head').style.display = "block";
    document.getElementById('showlistDiv').style.display = "block";
    document.getElementById('lessWidth').style.display = "none";
  }
});

$(window).resize(function(){
  var width = $(window).width();
  if (width <=1000 ) {
    console.log("lessWidth");
    document.getElementById('head').style.display = "none";
    document.getElementById('showlistDiv').style.display = "none";
    document.getElementById('lessWidth').style.display = "block";
  }
  else{
    document.getElementById('head').style.display = "block";
    document.getElementById('showlistDiv').style.display = "block";
    document.getElementById('lessWidth').style.display = "none";
  }
});
    </script>
</body>
</html>


