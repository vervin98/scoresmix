<?php
if(isset($_SESSION['uid'])){
                echo'<!-- The video -->
                <video autoplay muted loop id="myVideo">
                  <source src="./video/video.mp4" type="video/mp4">
                </video>
                
                
                <div class="vidcontent">
                <h1>Üdvözlünk a Scores-on '.$_SESSION['unev'];echo'</h1>
                  <p>Látom egy újabb sport rajongóval van dolgunk. Köszi hogy minket választottál. Remélem tudunk segíteni a tippjeinkkel és sok sikert kívánunk!</p>
                  <button id="myBtn" onclick="myFunction()">Leállít</button>
                </div>
				';
}
else{
echo'<img src="img/header.jpg" style="width:100%; height:90%;">
<h3>Angol, Német vagy akár <br>Spanyol liga?<br></h3>
<h4><br><br>A ScoresMix-en mindent megtalálsz!</h4>';
}


?>