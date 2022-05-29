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
    <title>Admin</title>
</head>
<body>
    <h1> "<?php echo($admin_info['name'])?>"</h1>
    <hr>
    <a class="btn btn-primary" href="addproduct" role="button">Add Product</a>
    <a class="btn btn-primary" href="adduser" role="button">Add User</a>
    <a class="btn btn-primary" href="userlist" role="button">User List</a>
    <a class="btn btn-primary" href="adminprofile" role="button">Admin Profile</a>
    <a class="btn btn-danger" href="adminlogout" role="button">Log out</a>

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
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
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
              <td><a href="<?php echo base_url()?>admin/editproduct/<?php echo $product['productid']; ?>" class="btn btn-success">Edit</a></td>
              <td><a onclick="return confirm('Are you sure you want to delete this product?');" href="<?php echo base_url()?>admin/productdelete/<?php echo $product['productid']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?> 
  </tbody>
</table>
</body>
</html>