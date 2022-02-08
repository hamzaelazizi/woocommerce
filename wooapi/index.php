<!doctype html>
<html lang="en">
  <head>
  	<title>Wooproject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
    <?php  
		require "Clientconnection.php";
		
		$products = json_encode($woocommerce->get('products'));
		$products = json_decode($products, true);
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">List des Produits</h2>
				</div>
                
			</div>
			<a class="btn btn-success" href="AjouterProduit.php">Ajouter un produit</a><br>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped">
						  <thead>
						    <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>date de creation</th>
                            <th>Voir produit</th>							
                            <th>Editer</th>
                            <th>Supprimer</th>
						    </tr>
						  </thead>
						  <tbody>
                          <?php
                                foreach($products as $product){
                                    echo "<tr>
										<th scope='row'><img height='100px' width='100px' src='".$product["images"][0]["src"]."'></td>
										<td>" . $product["id"]."</td>
                                        <td>" . $product["name"]."</td>
                                        <td>" . $product["price"]."</td>
                                        <td>" . $product["date_created"]."</td>
										<td><a class='btn btn-primary' href='".$product['permalink']."'>Voir</a></td>
                                        <td><a class='btn btn-primary' href='ModifierProduit.php?id=".$product['id']."'>Modifier</a></td>
                                        <td><a class='btn btn-danger' href='Supprimer.php?id=".$product['id']."' onclick=\"Delete()\">Supprimer</a></td>
										</tr>";
                                }
                            ?>
						 
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
function Delete() {
  confirm("veux tu vraiment supprimer ce produit?");
}
</script>

	</body>
	
</html>

