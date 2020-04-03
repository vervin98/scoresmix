<?php 
echo'<img src="img/header.jpg" style="width:100%; height:90%;">
<h3>ScoresMix |<br>'.$_SESSION['unev'];echo'<br></h3><br>
<img src="img/hatter.jpg" style="width:100%; height:52%; z-index:-5; position:absolute;">
    <div class="profilcim">
        <h1 style="text-align:center;">Adatok változtatása <i class="fas fa-edit"></i></h1>
		<hr style="width:50%">
		<div class="ikonok1">
		<a href="https://www.facebook.com/pg/TippMix-Elemz%C3%A9s-minden-napra-2270088999924773/posts/?ref=page_internal"><i class="fab fa-facebook-square"></i></a><br>
		<a href="https://www.instagram.com/tippmix.info/?hl=hu"><i class="fab fa-instagram"></i></a><br><br>
		</div>
    </div>
    <div class="bal">
        <h5>Felhasználónév</h5>
		<br><br>';
		
        //Ha rányomsz a usernameval gombra, POST metódust használva
        if (isset($_POST['usernameval'])) {
		//Leellenőrizzük hogy üres e
		if (empty($_POST['user']))
		{
		echo '<p id="kicsi">Nem adtad meg az új felhasználó nevet!</p>';
		}
		else{
		//lemented a mostani felhasználónevet, és az inputból beolvasod amire cserélni akarod
		$username = $_SESSION['unev'];
		$newusername = escapeshellcmd($_POST['user']);
		//update segítségével a regisztracio tablában átírod a régi felhasználót a megadottra
		$sql="UPDATE felhasznalok SET felhasznalonev='$newusername' where felhasznalonev='$username'";  
		$stmt = $db->query($sql);
		//$_SESSION['UNAME']-et is átálítom az új felhasználóra hogy mikor kiíratom valahol akkor már az jelenjen meg, és ugrung a belepve.php-ra  
        $_SESSION['unev']=$newusername;
        header("location:index.php");
		}
		}
		//ez maga az új felhasználó beolvasásához létrehzott rész
		echo '
		<form method="POST" action="?pg=profil">
		<div class="informa" style="margin-left:170px;">
		Felhasználónév változtatás<br>
		<input type="text" name="user"><br><br><br>
		Ha sikeres a változtatás akkor átdob belépve a főoldalra!<br><br>
		<input class="gomb" type="submit" name="usernameval" value="Mentés">
        </div>
        </form>
        
    </div>
    <div class="jobb">
        <h5>Jelszó</h5>
		<br><br>';
		
			//ugyanúgy POST metódussal ha a jelszoval gombra kattintunk
			if (isset($_POST['jelszoval'])) {
				if (empty($_POST['jelszo1']) || empty($_POST['jelszo2']))
				{
					echo '<p id="kicsi">Valamelyik helyre nem írtál!</p>';
				}
				else{
				//itt is lementjük a mostani felhasználót és a új jelszót, meg az ellenőrző jelszót
				$username = $_SESSION['unev'];
				$jelszo1 = escapeshellcmd($_POST['jelszo1']);
				$jelszo2 = escapeshellcmd($_POST['jelszo2']);
				//ellenőrizzük hogy a két jelszó megegyezik e
				if ($jelszo1 != $jelszo2) {
					echo 'A ket jelszo nem egyezik meg!';
				}
				//ha nincs hiba táblázat updatelése
				else{
					//update segítségével a regisztracio tablában átírod a régi jelszót a megadottra
					$password = md5($jelszo1);
					$sql="UPDATE felhasznalok SET jelszo='$password' where felhasznalonev='$username'";  
					$stmt = $db->query($sql);
					header("location:index.php");
	            }
				}
            }
			
			//ez maga az új jelszó beolvasásához létrehzott rész
			echo '
			<form method="POST" action="?pg=profil">
			<div class="informa">
			Új jelszó<br>
			<input name="jelszo1" type="password"><br><br><br>
			Új jelszó ismét<br>
			<input name="jelszo2" type="password"><br><br><br>
			Ha sikeres a változtatás akkor átdob belépve a főoldalra!<br><br>
			<input name="jelszoval" type="submit" class="gomb" value="Mentés">
			</div>
            </form><br>
            </div>

            ';
			
			?>
    