<?php
    class db{
        public $version='v1.99';
       
        //attributes
        protected $dbhost;
        protected $dbuser;
        protected $dbpass;
        protected $dbname;
        protected $connection;
        public $queryresult;

        public $querycount = 0;
        
        //methods
        public function __construct($dbhost, $dbuser, $dbpass, $dbname) {
            /*$this->dbhost = $dbhost;
            $this->dbuser = $dbuser;
            $this->dbpass = $dbpass;
            $this->dbname = $dbname;*/
            
            $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if($this->connection->connect_error){
                die('<div class="alert alert-danger">
                    Hiba történt az adatbázis kapcsolatkor - ' . $this->connection->connect_error.'</div>');
            }

            $this->connection->set_charset('utf8');
            $this->version = 'v1.99';
        }

        public function __destruct() 
        {
            
        }

        public function query($sql){
            if($this->queryresult = $this->connection->query($sql))
            {
                $this->querycount++;
            } else 
            {
                die('<div class="alert alert-danger">
                    Hiba az adatbázis lekérdezés során!' . $this->connection->error.'</div>
                    <div class="alert alert-warning">'.$sql.'</div>');
            }
            return $this->queryresult;
        }

        public function fetchAll(){
            $r = array();

            while($row = $this->queryresult->fetch_assoc())
            {
                $r[] = $row;
            }

            //$this->queryresult->close();
            return $r;
        }

        public function numRows(){
            return $this->queryresult->num_rows;
        }

        public function LastID(){
            return $this->connection->insert_id;
        }

        public function nextID(){
            return $this->connection->insert_id+1;
        }
        
        public function toTable($param){
            if(!empty($param))
            {
                $actions=explode('|', $param);
            }
            $fields = array();
            $fields = $this->queryresult->fetch_fields();
            $fieldcount = $this->queryresult->field_count;
            $tablename = $fields[0]->table;

			$primary_key = '';
			foreach($fields as $field) 
			{
			    if (($field->flags & MYSQLI_PRI_KEY_FLAG) || ($field->flags == 32769)) 
			    { 
			        $primary_key = $field->name; 
                    break;
			    }
			}
            $result = $this->fetchAll();
            $rekordcount = sizeof($result);
            echo '

    <script type="text/javascript">
        $(window).on(\'load\',function(){
            setActive(0);
            lapozas(0, 9);
            });

        function setActive(sorszam)
        {
            var item = document.getElementsByClassName("active");
            if (item.length>0)
            {
                item[0].classList.remove("active");
            } 
            
            item = document.getElementById("no"+sorszam);
            item.classList.add("active");
        }

        function lapozas(tol, ig)
        {
            console.log(tol + \'->\'+ig);
            var rows = document.querySelectorAll(\'table tbody tr\'); 
            for(var r = 0; r < rows.length; r++)
            {
                if ((r<tol) || (r>ig))
                {
                    rows[r].style.display = \'none\';
                }
                else
                {
                    rows[r].style.display = \'table-row\';
                }
                
            }
        }
    </script>


            <nav aria-label="Page navigation example">
              <ul class="pagination">';
                    for ($i=0; $i < ($rekordcount/10); $i++) 
                    { 
                        echo '<li class="page-item" id="no'.$i.'"><a class="page-link" href="#" onClick="lapozas('.($i*10).','.(($i+1)*10-1).');setActive('.$i.');">'.($i+1).'</a></li>';
                    }
              
                echo'
              </ul>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>';
                            foreach($fields as $field)
                            {                    
                                if ($field->name[0] == '@')
                                {
                                  
                                    $hide = 'class="hide"';
                                }
                                else
                                {
                                    $hide = '';
                                }
                                echo '<th '.$hide.'>' . $field->name . '</th>';
                            }
                            if(!empty($param))
                            {
                                echo '
                                <th  class="r">Műveletek</th>';
                            }
                        echo '</tr>
                    </thead>
                <tbody>';

           

            foreach($result as $rekord)
            {
                if (isset($rekord['@Státusz']))
                {
                    if ($rekord['@Státusz'] == 0)
                    {
                        $inakt = 'class="inaktiv"';
                    }
                    else
                    {
                        $inakt = '';
                    }
                }
                else
                {
                    $inakt = '';
                }
                echo '<tr '.$inakt.'>';

                foreach($fields as $field)
                {
                    if ($field->orgname == 'status')
                    {
                        $statusz = $rekord[$field->name];
                        if ($statusz == 1)
                        {
                            $inakt = 'disabled';
                        }
                        else
                        {
                            $inakt = '';
                        }
                    }
                    else
                    {
                        $inakt = '';
                    }

                    if ($field->name[0] == '@')
                    {
                        $hide = 'hide';
                    }
                    else
                    {
                        $hide = '';
                    }
                    if(is_numeric($rekord[$field->name]))
                    {
                        $numeric = 'r';
                    }
                    else
                    {
                        $numeric = '';
                    }

                    $cl = 'class="'.$hide.' '.$numeric.' '.$inakt.'"';

                    if(is_numeric($rekord[$field->name]))
                    {
                        echo '<td '.$cl.'>' .$rekord[$field->name]. '</td>';
                    }
                    else 
                    {
                        echo '<td '.$cl.'>' .$rekord[$field->name]. '</td>';
                    }

                }
                if(!empty($param))
                {
                    echo '<td class="r">';
                    if(in_array('s', $actions))
                    {
                        if ($statusz == 1)
                        {
                            $eye = 'open';
                        }
                        else
                        {
                            $eye = 'close';
                        }
                  
                        echo '&nbsp;<span class="glyphicon glyphicon-eye-'.$eye.'" onclick="location.href = \'?pg='.$tablename.'_stch&id='.$rekord[$primary_key].'\';" title="Státusz változtatás"></span>';
                    }
                    if(in_array('p', $actions))
                    {
                        echo '&nbsp;<span class="glyphicon glyphicon-upload" onclick="location.href = \'?pg='.$tablename.'_upload&id='.$rekord[$primary_key].'\';" title="Fájl feltöltés"></span>';
                    }
                    if(in_array('i', $actions))
                    {
                        echo '&nbsp;<span class="glyphicon glyphicon-info-sign" onclick="location.href = \'?pg='.$tablename.'_info&id='.$rekord[$primary_key].'\';" title="Rekord információ"></span>';
                    }
                    if(in_array('u', $actions))
                    {
                        echo '&nbsp;<span class="glyphicon glyphicon-pencil" onclick="location.href = \'?pg='.$tablename.'_mod&id='.$rekord[$primary_key].'\';" title="Rekord módosítása"></span>';
                    }
                    if(in_array('d', $actions))
                    {
                        echo '&nbsp;<span class="glyphicon glyphicon-remove" onclick="location.href = \'?pg='.$tablename.'_del&id='.$rekord[$primary_key].'\';" title="Rekord törlése"></span>';
                    }
                    if(in_array('k', $actions))
                    {
                        echo '<form method="POST" action="#">
                                <input type="hidden" name="id" value="'.$rekord[$primary_key].'" style="width:80px">
                                <input type="number" name="darab" value="0" style="width:80px">
                                <input type="submit" name="kosarba" value="Kosárba" class="btn btn-primary">
                            </form>';
                    }
                echo '</td>';
                }
                echo '</tr>';
                
            }
            if(!empty($param))
            {
                $fieldcount++;
            }

            echo '
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="'. ($fieldcount+1) .'" class="c">Összesen: <b>'. $this->numRows() .'</b> rekord</td>
                    </tr>
                </tfoot>
                </table>';
        }

        public function toSelect($value, $fieldname, $param){

            $fields = array();
            $fields = $this->queryresult->fetch_fields();
            $tablename = $fields[0]->table;
            $event = '';
            if(!empty($param))
            {
                $parameters=explode('|', $param);
                foreach($parameters as $parameter)
                {
                    $values = explode(':', $parameter);

                    switch($values[0])
                    {
                        case 'nev':
                            $tablename = $values[1];
                            break;
                        case 'onchange':
                            $event = ' onChange="javascript:'.$values[1].'();"';
                            break;
                    }
                }
            }
            echo'
                <select name="'. $tablename .'" class="form-control" '.$event.'>
                    <option value=""';
                    if (@$_POST[$tablename] == "") echo ' selected';
                    echo '>Válasszon...</option>';

            $result = $this->fetchAll();

            foreach($result as $rekord){
                echo '<option value="'. $rekord[$value] .'"';
                    if (@$_POST[$tablename] == $rekord[$value]) echo ' selected';
                    echo '>'. $rekord[$fieldname] .'</option>';
            }

            echo '</select>';
        }

        public function showrekord(){
            $fields = array();
            $fields = $this->queryresult->fetch_fields();

            echo '<table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Tulajdonság</th>
                    <th>Érték</th>
                </tr>
            </thead>
            <tbody>';
            $result = $this->fetchAll();
            $i = 0;
            foreach($fields as $rekord){
                $value = $fields[$i]->name;
                echo '<tr>
                <td>' . $value . '</td>
                <td>' . $result[0][$value] . '</td>
                </tr>';
                $i++;
            }
            echo'
            </tbody>
            </table>';
        }
 
        // lekérdezés eredményeinek megjelenítése különböző, paraméterezhető grafikonokkal
        public function toChart($type, $title, $x, $y, $div, $theme, $animated)
        {
            $dataPoints = '';
            foreach ($this->queryresult as $value) 
            {
                $dataPoints .= '{ label: "'.$value[$x].'",  y: '.$value[$y].'  },';
            }
            $dataPoints = rtrim($dataPoints, ',');  

            echo '
            <script type="text/javascript">
            window.onload = function() {

            var chart = new CanvasJS.Chart("'.$div.'", {
                theme: "'.$theme.'", // "light1", "light2", "dark1", "dark2"
                animationEnabled: '.$animated.', // change to true      
                title:{
                    text: "'.$title.'"
                },
                data: [
                {
                    // Change type to "line", bar", "area", "spline", "pie", "area", "linearea", "splineArea"
                    type: "'.$type.'",
                    dataPoints: [
                        '.$dataPoints.'
                    ]
                }
                ]
            });
            chart.render();
            }

            </script>';
        }


        public function toCalendar($title, $startdate, $enddate, $div, $view, $editable)
        {                  
            
            $eventList = "";
            foreach ($this->queryresult as $data) 
            {
                if (empty($enddate))
                {
                    $eventList .= "{title: '".$data[$title]."',start: '".$data[$startdate]."'},";
                }
                else
                {
                   $eventList .= "{title: '".$data[$title]."',start: '".$data[$startdate]."',end: '".$data[$startdate]."'},"; 
                }
               
            }
            $eventList = rtrim($eventList, ',');
                    
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('".$div."');

                var calendar = new FullCalendar.Calendar(calendarEl, {

                  plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                  height: 'parent',
                  header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                  },
                  defaultView: '".$view."',
                  defaultDate: '".date('Y-m-d')."',
                  navLinks: true, // can click day/week names to navigate views
                  editable: ".$editable.",
                  eventLimit: true, // allow more link when too many events
                  events: [
                    ".$eventList."
                  ]
                });
                calendar.setOption('locale', 'hu');
                calendar.render();
              });
              </script>";
 
        }

        public function toGrid($head, $body, $foot, $style)
        {
            $fields = array();
            $fields = $this->queryresult->fetch_fields();
            $fieldcount = $this->queryresult->field_count;
            $tablename = $fields[0]->table;

            $primary_key = '';
            foreach($fields as $field) 
            {
                if (($field->flags & MYSQLI_PRI_KEY_FLAG) || ($field->flags == 32769)) 
                { 
                    $primary_key = $field->name; 
                    break;
                }
            }
            foreach ($this->queryresult as $value) 
            {
                 echo '
                 <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
                 <div class="box panel panel-'.$style.' ">
                    <div class="panel-heading"><b><a href="index.php?pg='.$tablename.'_info&id='.$value[$primary_key].'">'.$value[$head].'</a></b></div>
                    <div class="panel-body">';
                    $list = explode('|', $body);
                    foreach ($list as $item) 
                    {
                        if (is_numeric($value[$item]))
                        {
                             echo '<h5>'.szamkiir($value[$item]).'</h5>';
                        }
                        else
                        {
                            echo '<h5>'.$value[$item].'</h5>';
                        }
                        
                    }
                    echo '</div>
                    <div class="panel-footer">'.szamkiir($value[$foot]).'</div>
                 </div>
                </div>';
            }
           /* $list = explode('|', $fieldlist);
            foreach ($this->queryresult as $value) 
            {
                echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="box">';
                foreach ($list as $item) 
                {
                    echo '<h3>'.$value[$item].'</h3>';
                }
                echo '</div><br>
                </div>';
            }*/
        }

        public function toPdf()
        {
            echo "<script>
                  $( document ).ready(function() {
                    var doc = new jsPDF('p', 'in', 'landscape');
                    doc.setFont('tahoma');
                    doc.setFontStyle('normal');
                    doc.autoTable({html: '.table'});
                    doc.save('sample-file.pdf');
                });
                </script>
            ";
        }  

        public function toXls()
        {

        }
    }
?>