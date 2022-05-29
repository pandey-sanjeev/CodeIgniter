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
    <title>User Dashboard</title>
</head>
<body>
<hr>
    <a class="btn btn-primary" href="orderlist" role="button">Your Orders</a>
    <a class="btn btn-primary" href="userprofile" role="button">User Profile</a>
    <a class="btn btn-danger" href="userlogout" role="button">Log out</a>
<hr>
<h2>Product List</h2>
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
  foreach($products as $product){?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $product['productname']; ?></td>
              <td><?php echo $product['aboutproduct']; ?></td>
              <td> <img src=<?php echo  base_url($product['image']); ?> height='50px' weight='50px'></td>
              <td><a href="<?php echo base_url()?>user/insertcart/<?php echo $product['productid']; ?>" class="btn btn-success">Order now</a> </td>
            </tr>
            <?php } ?> 
  </tbody>
</table>
</body>
</html>