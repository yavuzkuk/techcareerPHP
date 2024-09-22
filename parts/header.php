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
      </ul>
      <form action="search.php" method="get" class="d-flex" role="search">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == "true"):?>
          <div class="dropdown" style="margin-left: 10px;">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              İşlemler
            </a>
            <ul class="dropdown-menu">
              <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "true"):?>
                <li><a class="dropdown-item" href="../admin/">Admin paneli</a></li>
              <?php endif?>
              <li><a class="dropdown-item" href="../pages/myblogs.php">Yazılarım</a></li>
              <li><a class="dropdown-item" href="u_write.php">Yazı ekle <i class="fa-solid fa-plus"></i></a></li>
              <li><a class="dropdown-item" href="../pages/phpPro/logout.php">Çıkış yap</a></li>
            </ul>
          </div>
        <?php else:?>
          <a href="login.php" class="btn btn-success mx-2">Giriş yap</a>
        <?php endif?>
    </div>
  </div>
</nav>

