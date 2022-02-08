<?php
require "Clientconnection.php";
if(isset($_POST['submit'])) {
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
$woocommerce->post('products', $data);
header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Ajouter Produit</title>
</head>
<body><br><br><br><div class="container-sm">
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    

            <div class="form-group">
                <label for="name">Nom du Produit:</label>
                <input type="text" class="form-control" name="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="regular_price">Prix:</label>
                <input type="number" class="form-control" name="regular_price" placeholder="Prix">
            </div>
            <div class="form-group">
                <label for="url">Image du Produit:</label>
                <input type="url" class="form-control" name="url" placeholder="Url image">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            
            <br>
            
            <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
        </form>
</div>    

       
</body>
</html>