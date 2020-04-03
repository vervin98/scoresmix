<?php
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['UNAME']);
	header("location:index.php");
}

if(isset($_SESSION['uid'])){

  echo'<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="index.php">SM<i class="fab fa-phoenix-framework"></i></a>
    </div>
    <nav id="menunav">
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="gallery/gallery.php">Galéria <i class="far fa-images"></i></a>
        </li>
        <li>
          <a href="#!">Eredmények<i class="far fa-futbol"></i></a>
          <ul class="nav-dropdown">
            <li>
              <a href="?pg=csapatok">Football<i class="far fa-futbol"></i></a>
            </li>
            <li>
              <a href="?pg=csapatokkosar">Kosárlabda<i class="far fa-futbol"></i></a>
            </li>
          </ul>
        </li>
        <li>
          <a href="?pg=fogadas">Fogadás<i class="fas fa-pencil-alt"></i></a>
        </li>
        <li>
          <a href="?pg=profil">Profil<i class="fas fa-user-alt"></i></a>
        </li>
        <li>
          <a href="index.php?logout=1">Kilépés<i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </nav>
  </div>
</section>';

}else{
echo'<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="index.php">SM<i class="fab fa-phoenix-framework"></i></a>
    </div>
    <nav id="menunav">
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="gallery/gallery.php">Galéria <i class="far fa-images"></i></a>
        </li>
        <li>
          <a href="#!">Eredmények<i class="far fa-futbol"></i></a>
          <ul class="nav-dropdown">
            <li>
              <a href="?pg=csapatok">Football<i class="far fa-futbol"></i></a>
            </li>
            <li>
              <a href="?pg=csapatokkosar">Kosárlabda<i class="far fa-futbol"></i></a>
            </li>
          </ul>
        </li>
        <li>
          <a href="?pg=belep">Belépés<i class="fas fa-user-alt"></i></a>
        </li>
        <li>
          <a href="?pg=reg">Regisztráció<i class="fas fa-user-edit"></i></a>
        </li>
      </ul>
    </nav>
  </div>
</section>';
}
?>