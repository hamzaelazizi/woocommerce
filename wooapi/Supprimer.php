<?php
require "Clientconnection.php";
$id = $_GET['id'];
    $woocommerce->delete('products/'.$id, ['force' => true]);
    header('Location: index.php');