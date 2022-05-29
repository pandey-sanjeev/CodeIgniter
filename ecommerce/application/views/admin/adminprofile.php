<?php
$admin_info=$this->session->userdata('adminData')[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Profile</title>
</head>
<body>
    <h1>Admin profile</h1>
    <hr>
    <p>Your Name is <?php echo($admin_info['name'])?></p>
    <p>Your Email is <?php echo($admin_info['email'])?></p>
    <p>Your Password is <?php echo($admin_info['password'])?></p>
    <hr>
    <a class="btn btn-primary" href="addproduct" role="button">Add Product</a>
    <a class="btn btn-primary" href="admindashboard" role="button">  Admin Dashboard</a>
    <a class="btn btn-danger" href="adminlogout" role="button">Log out</a>





</body>
</html>