<img src="img/foci.jpg" style="width:100%; height:100%; z-index:-5; position:absolute;">
<h1 style="text-align:center;">Csapat hozzáadása:</h1>
<hr>
<?php
	if (isset($_POST['vissza']))
	{
		header("location: index.php?pg=".$dir);
	}

	if (isset($_POST['felvesz']))
	{
		$name = escapeshellcmd($_POST['name']);
		$bajnoksag = escapeshellcmd($_POST['bajnoksag']);
        $pont = escapeshellcmd($_POST['pont']);
        $hely = escapeshellcmd($_POST['hely']);
		$lg = escapeshellcmd($_POST['lgol']);
        $kg = escapeshellcmd($_POST['kgol']);
        $gy = escapeshellcmd($_POST['gy']);
		$d = escapeshellcmd($_POST['d']);
		$v = escapeshellcmd($_POST['v']);
        if (empty($name) || empty($bajnoksag) || empty($pont) || empty($hely) || empty($lg) || empty($kg) || empty($gy) || empty($d) || empty($v))
		{
			showError("Nem adtál meg minden adatot!");
		}
		else
		{
			$db->query("SELECT ID FROM csapatok WHERE nev='$name'");
			if ($db->numRows() != 0)
			{
				showError("Van már ilyen nevű csapat már felvéve!");
			}
			else
			{
                $db->query("INSERT INTO csapatok VALUES(null, '$name', '$bajnoksag', $pont, $hely, $lg, $kg, $gy, $d, $v)");
                showSuccess("Sikeresen hozzáadtad a Csapatot.");
			}
		}
	}
    echo '
        
        <form method="POST" action="index.php?pg='.$dir.'_uj">
        <div class="bal">
        <div class="informa">
        <div class="form-group">
			<label>Csapat neve:</label><br>
			<input type="text" name="name" class="form-control"><br>		
        </div>
        <div class="form-group">
			<label>Bajnokság:</label><br>
			<select name="bajnoksag" class="form-control">           
                <option value="angol">angol</option>
                <option value="spanyol">spanyol</option>
                <option value="nemet">nemet</option>
                <option value="olasz">olasz</option>
                <option value="francia">francia</option>
            </select>			
		</div>
		<div class="form-group">
			<label>Pontjai:</label><br>
			<input type="number" name="pont" class="form-control"><br>
        </div>
        <div class="form-group">
			<label>Helyezés:</label><br>
			<input type="number" name="hely" class="form-control"><br>	
        </div>
        <div class="form-group">
            <label>Lőtt gól:</label><br>
            <input type="number" name="lgol" class="form-control"><br>
        </div>
        </div>
        </div>
        <div class="jobb">
        <div class="informa">
        <div class="form-group">
			<label>Kapott gól:</label><br>
			<input type="number" name="kgol" class="form-control"><br>
        </div>
        <div class="form-group">
			<label>Győzelmek:</label><br>
			<input type="number" name="gy" class="form-control"><br>	
        </div>
        <div class="form-group">
			<label>Döntetlenek:</label><br>
			<input type="number" name="d" class="form-control"><br>
        </div>
        <div class="form-group">
			<label>Vereségek:</label><br>
			<input type="number" name="v" class="form-control"><br><br><br>
		</div>
        </div>
        <div class="form-group">
			<input type="submit" name="felvesz" value="Csapat felvétele" class="btn btn-dark"><br><br>	
			<input type="submit" name="vissza" value="Vissza a csapatokhoz" class="btn btn-dark">	
        </div>
        </div>
    </form>
    
	';
?>