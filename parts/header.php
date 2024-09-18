<nav class="navbar navbar-expand-lg bg-secondary-subtle">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Techcarrer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form action="search.php" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == "true"):?>
        <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "true"):?>
          <a href="../admin/" class="btn btn-outline-danger mx-2">Admin Paneli</a>
        <?php else:?>
          <a href="u_write.php" class="btn btn-outline-danger mx-2">Yazı ekle <i class="fa-solid fa-plus"></i></a>  
        <?php endif?>
        <a href="phpPro/logout.php" class="btn btn-outline-danger mx-2">Çıkış yap</a>
      <?php else:?>
        <a href="login.php" class="btn btn-success mx-2">Giriş yap</a>
      <?php endif?>
    </div>
  </div>
</nav>

