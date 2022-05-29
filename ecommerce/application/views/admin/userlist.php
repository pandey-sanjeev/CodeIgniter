<?php
$admin_info=$this->session->userdata('adminData')[0];
?>
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
    <title>All User List</title>
</head>
<body>
<h1> "<?php echo($admin_info['name'])?>"</h1>
<hr>
<a class="btn btn-success" href="adduser" role="button">Add User</a>
<a class="btn btn-primary" href="admindashboard" role="button"> Admin Dashboard</a>
<a class="btn btn-danger" href="adminlogout" role="button">Log out</a>
<hr>

<h2>All User List</h2>
<hr>
    <table class="table table-hover">
    <thead class="thead-light">
    <tr>
      <th scope="col">serial</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">D.O.B.</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php 
    $i=1;
  foreach($users as $user){?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['fathername']; ?></td>
              <td><?php echo $user['dob']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['password']; ?></td>
              <td><?php echo $user['address']; ?></td>
              <td><a href="<?php echo base_url()?>admin/useredit/<?php echo $user['userid']; ?>" class="btn btn-success">Edit</a> <a onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo base_url()?>admin/userdelete/<?php echo $user['userid']; ?>" class="btn btn-danger">Delete</a></td>

            </tr>
            <?php } ?> 
  </tbody>
</table>
</body>
</html>