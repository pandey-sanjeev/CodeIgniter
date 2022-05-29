<?php
$user_info=$this->session->userdata('userData')[0];
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
    <title>Your Order</title>
</head>
<body>
<hr>
    <a class="btn btn-primary" href="userdashboard" role="button">User Dashboard</a>
    <a class="btn btn-danger" href="userlogout" role="button">Log out</a>
<hr>
<h2>Your ordered Product</h2>
<hr>
    <table class="table table-hover">
    <thead class="thead-light">
    <tr>
      <th scope="col">serial</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($orderproducts as $orderproduct){?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $orderproduct['productname']; ?></td>
              <td><?php echo $orderproduct['aboutproduct']; ?></td>
              <td> <img src=<?php echo  base_url($orderproduct['image']); ?> height='50px' weight='50px'></td>
              <td><a onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo base_url()?>user/removeorder/<?php echo $orderproduct['productid']; ?>" class="btn btn-danger">Cancel Order</a> </td>
            </tr>
            <?php } ?> 
  </tbody>
</table>
</body>
</html>