<?php
$date_time_array = getdate (time());
$min = $date_time_array[ "minutes"]-3;
if($min<0)
{
    $min = 60 + $min;
}
$tail = strval($min);
if($min <10)
{
    $tail = '0'.$tail;

}
$file = file("/home/work/bidmax_monitor/data/wins_status_".$tail);
?>
<title>Win Status</title>

<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<head>

<meta http-equiv="refresh" content="60">

</head>

<div class= 'well well-lg'>
 <div class="status-index">
   <div class="row">
        <div class="col-lg-1" >
        </div>
        <div class="col-lg-10">
            <div class="panel panel-success">
                   <div class="panel-heading">
                          <h2 class="panel-title">Win Status</h2>
                   </div>
                   <div class="panel-body">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>name</th>
                                 <th>bids</th>
                                 <th>events</th>
                                 <th>wins</th>
                                 <th>loss</th>
                                 <th>error</th>
                                 <th>unmatched</th>
                                 <th>unknown</th>
                                 <th>buddget current</th>
                                 <th>buddget all</th>
                              </tr>
                           </thead>
                           <tbody>
                         <?php
                            foreach($file as &$line)
                                {
                                    echo "<tr>";
                                    $cols = explode(",",$line);
                                    foreach($cols as $col)
                                    {
                                        echo "<td>";
                                        echo $col;
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }

                         ?>
                          </tbody>
                     </table>

                </div>
            </div>
        </div>

    <div class="col-lg-1">
    </div>
   </div>
 </div>
</div>
