<?php
require "Clientconnection.php";
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
$name = $_POST['name'];
$regular_price = $_POST['regular_price'];
$description = $_POST['description'];
$url_image = $_POST['url'];
    $data = [
    'name' => $name,
    'regular_price' => $regular_price,
    'description' => $description,
    'images' => [ array('src' => $url_image, 'position' => '0')]

];
echo $id;
$woocommerce->put('products/'.$id, $data);
header('Location: index.php'); 
  } else {
    $id = $_GET['id'];
    $product = json_encode($woocommerce->get('products/'.$id));
    $product = json_decode($product, true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit product</title>
</head>

<body><br><br><br><div class="container-sm">
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    

            <div class="form-group">
                <label for="name">Nom du Produit:</label>
                <input type="text" class="form-control" name="name" placeholder="Nom" value="<?php echo $product['name']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Prix:</label>
                <input type="number" class="form-control" name="regular_price" placeholder="Prix" value="<?php echo $product['price']; ?>">
            </div>
            <div class="form-group">
                <label for="url">Image du Produit:</label>
                <input type="url" class="form-control" name="url" placeholder="Url image" value="<?php echo $product["images"][0]["src"]; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"><?php echo $product['description']; ?></textarea>
            </div>
            
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" class="btn btn-primary" value="Modifier">
        </form>
</div>    

       
</body>
</html>