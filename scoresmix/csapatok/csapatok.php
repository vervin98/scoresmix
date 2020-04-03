<div class="kozep1">	
		<hr>
			<?php
				echo '
				<a href="index.php?pg=csapatok&liga=Premier"><img src="img/premier.png" style="width:90px; height:120px;" class="log"></a>
				<a href="index.php?pg=csapatok&liga=Bundesliga"><img src="img/bundes.png" style="width:150px; height:120px" class="log"></a>
				<a href="index.php?pg=csapatok&liga=seria"><img src="img/seria.png" style="width:150px; height:120px" class="log"></a>
				<a href="index.php?pg=csapatok&liga=ligue"><img src="img/ligue.png" style="width:150px; height:120px" class="log"></a>
				<a href="index.php?pg=csapatok&liga=laliga"><img src="img/laliga.png" style="width:150px; height:120px; margin-left:-20px;" class="log"></a>
				';
			?>
		<hr>
        </div>
        <?php
    //Készítette:Varga Ervin

	//lekérdezzük a hivatkozás által az urlbe generált liga értékét
	$liga = @$_GET['liga'];
	//ha üres átállítjuk Premier league-ra így azt hozza be alapból
	if (empty($liga))
	{
		$liga='Premier';
	}
		//ugyanaz az egész csak a liga változó a Premier league-t vette fel tehát azt listázzuk
	if ($liga=='Premier')
	{
        echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='angol' ORDER BY pont DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='angol' ORDER BY pont DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='angol' ORDER BY pont DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
	//ugyanaz az egész csak a liga változó a laliga-t vette fel tehát azt listázzuk
	if ($liga=='laliga')
	{
		echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='spanyol' ORDER BY pont DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='spanyol' ORDER BY pont DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='spanyol' ORDER BY pont DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
	//ugyanaz az egész csak a liga változó a Bundesliga-t vette fel tehát azt listázzuk
	if ($liga=='Bundesliga')
	{
		echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='nemet' ORDER BY pont DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='nemet' ORDER BY pont DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='nemet' ORDER BY pont DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
	//ugyanaz az egész csak a liga változó a ligue-t vette fel tehát azt listázzuk
	if ($liga=='ligue')
	{
		echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='francia' ORDER BY pont DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='francia' ORDER BY pont DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='francia' ORDER BY pont DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
	//ugyanaz az egész csak a liga változó a seria-t vette fel tehát azt listázzuk
	if ($liga=='seria')
	{
		echo'
        <div class="canvas_div_pdf" id="tabella">
	    ';
        if(isset($_SESSION['uid'])){
            $db->query("SELECT admin FROM felhasznalok WHERE ID=".$_SESSION['uid']);
            $res=$db->fetchAll();
            if($res[0]['admin']==1){
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='olasz' ORDER BY pont DESC");
                $db->toTable('i|u|d');
    
                echo '<a href="?pg=csapatok_uj"><input type="submit" name="csapathozzaad" value="Csapat hozzáadás" class="btn btn-dark"></a>';
            }
            else{
                $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='olasz' ORDER BY pont DESC");
            $db->toTable('i');
            }
        }
        else{
            $res= $db->query("SELECT ID AS Csapatazonosító, nev AS Csapatnév, gyozelem AS Győzelmek, dontetlen AS Döntetlenek, vereseg AS Vereségek, pont AS Pont FROM csapatok WHERE bajnoksag='olasz' ORDER BY pont DESC");
            $db->toTable('i');
        }
    echo'
</div>
<br>
<button onclick="getPDF()" id="downloadbtn" class="btn btn-dark"><b>Letöltés PDF-ben</b></button>
        <span id="genmsg" style="display:none;">PDF fájl generálása...</span>';
	}
?>
