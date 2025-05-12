<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $quantity_prices = $_POST['quantity_prices'];

  $stmt = $pdo->prepare("INSERT INTO products (name, price, image, quantity_prices) VALUES (?, ?, ?, ?)");
  $stmt->execute([$name, $price, $image, $quantity_prices]);
  header("Location: admin.php");
  exit();
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $pdo->prepare("DELETE FROM products WHERE id = ?")->execute([$id]);
  header("Location: admin.php");
  exit();
}

$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin Terps Only</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container py-4">
  <h1>Admin - Terps Only</h1>
  <form method="POST" class="mb-4">
    <h4>Ajouter un produit</h4>
    <div class="form-group">
      <label>Nom</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Prix</label>
      <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Image (URL ou chemin)</label>
      <input type="text" name="image" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Prix par quantité</label>
      <input type="text" name="quantity_prices" class="form-control" placeholder="Ex: 1=999€, 5+=950€, 10+=900€">
    </div>
    <button type="submit" name="add" class="btn btn-success">Ajouter</button>
  </form>

  <h4>Produits existants</h4>
  <table class="table table-bordered">
    <thead>
      <tr><th>Nom</th><th>Prix</th><th>Image</th><th>Quantités</th><th>Action</th></tr>
    </thead>
    <tbody>
      <?php foreach ($products as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p['name']) ?></td>
          <td><?= number_format($p['price'], 2) ?>€</td>
          <td><img src="<?= htmlspecialchars($p['image']) ?>" width="100"></td>
          <td><?= htmlspecialchars($p['quantity_prices']) ?></td>
          <td><a href="?delete=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>