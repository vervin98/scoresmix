
	<div class="header">
				<img src="img/header.jpg" style="width:100%; height:96%;">
				<div class="belepes">
					<?php
                    if(isset($_SESSION['uid'])) header("location: index.php");

					if(isset($_POST['login'])){
						$nev    = escapeshellcmd($_POST['nev']   );
						$password = escapeshellcmd($_POST['jelszo']);
				
						if(empty($nev) || empty($password)){
							showError("Nem adot meg minden adatot!");
						} else {
							$res = $db->query("SELECT * FROM felhasznalok WHERE felhasznalonev='$nev'");
							$res = $db->fetchAll();
				
							if($db->numRows() == 0){
								showError("Nem regisztált felhasználónév!");
							} else {
								if(MD5($password) != $res[0]['jelszo']){
									showError("Az e-mail címhez tartozó jelszó nem egyezik!");
								} else {
									$_SESSION['unev'] = $res[0]['felhasznalonev'];
									$_SESSION['uid']   = $res[0]['ID'];
									header("location: index.php");
								}
							}
						}
					}
		
		//Belépés
		echo '<h5>Belépés</h5><br><br>
		<form method="POST" action="?pg=belep">
			<label for="nev">Felhasználónév:</label><br>
			<input type="text" name="nev"><br><br><br>
			
			<label for="jelszo">Jelszó:</label><br>
			<input type="password" name="jelszo">
			<br><br><br>
			<input type="submit" class="gomb" name="login" value="Belépés">
			</form>
		';

?>
				</div>
		</div>
		