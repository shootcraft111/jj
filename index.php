<?php
require 'config.php';
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Terps Only Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #1C1B1A;
      color: white;
    }
    .card {
      background-color: #333;
      color: white;
      margin-bottom: 20px;
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-4">Terps Only Shop</h1>
    <div class="row">
      <?php foreach ($products as $product): ?>
        <div class="col-md-4">
          <div class="card">
            <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
              <p class="card-text">Prix unitaire : <?= number_format($product['price'], 2) ?>€</p>
              <p class="card-text"><small><?= htmlspecialchars($product['quantity_prices']) ?></small></p>
              <a href="https://t.me/rolexbordeaux" class="btn btn-success btn-block" target="_blank">Commander</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>