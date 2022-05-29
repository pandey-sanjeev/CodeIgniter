
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
    <title>Admin Login</title>
</head>
<body>
    <h1>Hi Admin Please login<h1>
    <form action="<?php echo base_url();?>admin/checkadmin" method="post">
        <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>