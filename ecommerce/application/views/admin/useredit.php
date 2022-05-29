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
    <title>Edit User</title>
</head>
<body>
<h1>Hii <?php echo($admin_info['name'])?>  Please Edit the User Information</h1>
<hr>
<form   enctype="multipart/form-data" action="<?php echo base_url()?>admin/insertuseredit" method="post">
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" value="<?php echo $userdata['name'] ?>" name="name" id="name" placeholder="Enter Name" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="fathername">Father Name </label>
        <input type="text" class="form-control" value="<?php echo $userdata['fathername'] ?>" name="fathername" id="fathername" placeholder="Enter Father Name" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="dob">DOB </label>
        <input type="date" class="form-control" value="<?php echo $userdata['dob'] ?>" placeholder="Dob" name="dob" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo $userdata['email'] ?>" name="email" id="email" placeholder="Enter email" required>
        </div>
        </div>              
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="password">Password</label>
        <input type="Text" class="form-control" value="<?php echo $userdata['password'] ?>" name="password" id="password" placeholder="Password" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="address">Address</label>
        <input type="Text" class="form-control" value="<?php echo $userdata['address'] ?>" name="address" id="address" placeholder="address" required>
        </div>
        </div>
        <input type="hidden" name="userid" value="<?php echo $userdata['userid'] ?>">

        <div class="col-sm-12 ">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      	</form>
</body>
</html>