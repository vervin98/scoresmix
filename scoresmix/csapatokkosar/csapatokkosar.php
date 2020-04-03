<div class="kozep1">	
		<hr>
			<?php
				echo '
				<a href="?pg=csapatokkosar&liga=nba1" class="btn btn-primary btn-lg" style="margin-right:25px;">Nyugat</a>
				<img src="img/nba.png" style="width:150px; height:150px" class="log">
                <a href="?pg=csapatokkosar&liga=nba2" class="btn btn-danger btn-lg">Kelet</a>
				';
			?>
		<hr>
        </div>
        <br>
        <?php
    //Készítette:Varga Ervin

	//lekérdezzük a hivatkozás által az urlbe generált liga értékét
	$liga = @$_GET['liga'];
	//ha üres átállítjuk Premier league-ra így azt hozza be alapból
	if (empty($liga))
	{
		$liga='nba1';
	}
		//ugyanaz az egész csak a liga változó a Premier league-t vette fel tehát azt listázzuk
	if ($liga=='nba1')
	{
        echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba1' ORDER BY gyozelmiarany DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatokkoras_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba1' ORDER BY gyozelmiarany DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba1' ORDER BY gyozelmiarany DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
	//ugyanaz az egész csak a liga változó a laliga-t vette fel tehát azt listázzuk
	if ($liga=='nba2')
	{
		echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba2' ORDER BY gyozelmiarany DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba2' ORDER BY gyozelmiarany DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, vereseg AS Vereségek, gyozelmiarany AS Győzelmiarány FROM csapatokkosar WHERE bajnoksag='nba2' ORDER BY gyozelmiarany DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
    }
?>