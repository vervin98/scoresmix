<div class="header">
				<img src="img/header.jpg" style="width:100%; height:96%;">
				<div class="register">
					
					<?php
	// Ha rákattintassz a reg gombra
	if (isset($_POST['reg']))
	{
		//felveszed a mezőket
		$nev = escapeshellcmd($_POST['nev']);
        $email = escapeshellcmd($_POST['email']);
		$jelszo1 = escapeshellcmd($_POST['jelszo1']);
		$jelszo2 = escapeshellcmd($_POST['jelszo2']);
		// üresek-e a kötelező mezők
		if (empty($nev) || empty($email) || empty($jelszo1) || empty($jelszo2))
		{
			echo 'Nem adtál meg minden kötelező adatot!';
		}
		else
		{
			//Megnézzük hogy az adatbázisba van e már ilyen email
			$res=$db->query("SELECT * FROM felhasznalok WHERE email='$email'");
			if (mysqli_num_rows($res) != 0)
			{
				echo 'Ezzel az e-mail címmel már regisztráltak! Adj meg másikat!';
			}
			else
			{
				//leellenőrizzük, hogy már regisztráltak-e ezzel a felhasználóval
				$res=$db->query("SELECT * FROM felhasznalok WHERE felhasznalonev='$nev'");
			if (mysqli_num_rows($res) != 0)
			{
				echo 'Ezzel a felhasználóval már regisztráltak! Adj meg másikat!';
			}
			else{
				//Megnézzük hogy a két jelszó egyezik e
				if ($jelszo1 != $jelszo2)
				{
					echo 'A megadott jelszavak nem egyeznek!';
				}
				else
				{
					//Insert into segítségével felvesszük a regisztracio táblába az adatokat
					$jelszo1 = MD5($jelszo1);
					$db->query("INSERT INTO felhasznalok VALUES('', '$nev', '$email', '$jelszo1', 0)");
                    echo'Sikeres';
				}
			}
			}
		}
	}	
//Regisztráció
echo '
<form method="POST" action="?pg=reg">
	<p id="regcim">Regisztráció</p>
	<label for="nev">Felhasználónév:</label><br>
	<input type="text" name="nev" value="'.@$nev.'">
	<br><br>
	<label for="email">E-mail cím:</label><br>
	<input type="text" name="email" value="'.@$email.'">
	<br><br>
	<label for="jelszo1">Jelszó:</label><br>
	<input type="password" name="jelszo1" value="'.@$jelszo2.'">
	<br><br>
	<label for="jelszo2">Jelszó újra:</label><br>
    <input type="password" name="jelszo2" value="'.@$jelszo2.'">
    <br><br><br>
	Minden mezőt kötelező kitölteni!
	<br><br>
	<input class="gomb" type="submit" name="reg" value="Regisztráció">
</form>';

?>
				</div>
		</div>