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
    <title>Add Product</title>
</head>
<body>
    <h1>Hii <?php echo($admin_info['name'])?>  Please add new Product</h1>
    <hr>
    <a class="btn btn-danger" href="admindashboard" role="button">  Admin Dashboard</a>

    <hr>
    <form enctype="multipart/form-data" action="<?php echo base_url()?>admin/insertproduct" method="post">
        <div class="form-group">
        <label for="productname">Product Name</label>
        <input type="text" class="form-control" name="productname" id="productname" placeholder="Enter Product Name" required>
        </div>
        <div class="form-group">
        <label for="aboutproduct">Product Description</label>
        <input type="text" class="form-control" name="aboutproduct" id="aboutproduct" placeholder="Product Description" required>
        </div>
        <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" class="form-control-file" name="image" id="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>