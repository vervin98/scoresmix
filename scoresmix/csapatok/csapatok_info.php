<img src="img/asd.jpg" style="width:100%; height:100%; z-index:-5; position:absolute;">
<h1 style="text-align:center;">Az adott csapat információi</h1>
<hr>
<?php
	$id = @$_GET['id'];
	$db->query("SELECT ID AS 'Csapatazonosító', nev AS 'Csapatneve:', bajnoksag AS 'Bajnokság:', pont AS 'Pontja:', helyezes AS 'Helyezés:', lottgol AS 'Lőtt gólok:', kapottgol AS 'Kapott gólok:', gyozelem AS 'Győzelmek:', dontetlen AS 'Döntetlenek:', vereseg AS 'Vereségek:'  FROM csapatok WHERE ID=$id");
	$db->showRekord();
	if (isset($_POST['vissza']))
	{
		header("location: index.php?pg=".$dir);
    }
    

    echo'<h1 style="text-align:center;">Az adott csapat előző 3 eredménye:</h1><hr>';
    $db->query("SELECT focielozok.ID AS 'Meccsazonosító', 
                (SELECT csapatok.nev FROM csapatok WHERE csapatok.ID = focielozok.hazai) AS 'Hazai csapat', 
                (SELECT csapatok.nev FROM csapatok WHERE csapatok.ID = focielozok.vendeg) AS 'Vendég csapat', 
                focielozok.eredmeny AS 'Eredmény' 
                FROM focielozok 
                WHERE focielozok.hazai = $id OR focielozok.vendeg = $id");
    echo'<div style="text-align:center;">';
    $db->toTable('');
    echo '</div>
    <br>
	<form method="POST" action="index.php?pg='.$dir.'_info&id='.$id.'">
		<input type="submit" name="vissza" value="Vissza a csapatokhoz" class="btn btn-dark" style="width:20%;">	
	</form>
	<br>'
?>