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
    <title>User </title>
</head>
<body>
    <hr>
    <div class="col-sm-12 ">
    <h1>Please Login</h1>
    <a>If you have account</a>
    <a class="btn btn-primary" href="<?php echo base_url()?>user/userlogin" role="button">Log In</a>
    <hr>
    </div>
    <div class="col-sm-12 ">
    <h1>Please Signup</h1>
    <a>Don't have account</a>
    <a class="btn btn-primary" href="<?php echo base_url()?>user/signupuserform" role="button">Sign Up</a>
    </div>
    <hr>
</body>