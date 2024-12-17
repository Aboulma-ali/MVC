<?php

$current_url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<header>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($current_url_path, 'produit&page=list') !== false ? 'active' : ''); ?>" href="?controller=produit&page=list">Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($current_url_path, 'categorie&page=list') !== false ? 'active' : ''); ?>" href="?controller=categorie&page=list">Categorie</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($current_url_path, 'user&page=list') !== false ? 'active' : ''); ?>" href="?controller=user&page=list">User</a>
          </li>

          
        </ul>
      </div>
    </div>
  </nav>
</header>