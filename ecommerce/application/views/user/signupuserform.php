<?php if($responce = $this->session->flashdata('Message')): ?>
      <div class="box-header">
        <div class="col-lg-4 ">
           <div class="alert alert-success"><?php echo $responce;?></div>
        </div>
      </div>
    <?php endif;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>user Sign Up</title>
</head>
<body>
    <h1>Please Signup</h1>
    <hr>
    <form  enctype="multipart/form-data" action="<?php echo base_url()?>user/usersignup" method="post">
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="fathername">Father Name </label>
        <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Enter Father Name" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="dob">DOB </label>
        <input type="date" class="form-control" placeholder="Dob" name="dob" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
        </div>
        </div>              
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        </div>
        <div class="col-sm-12 ">
        <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" rows="4" cols="40" placeholder="address" name="address" required></textarea>
        </div>
        </div>
        <div class="col-sm-12 ">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      	</form>
</body>
</html>