<?php
$date_time_array = getdate(time());
$min = $date_time_array["minutes"] - 3;
if ($min < 0) {
    $min = 60 + $min;
}
$tail = strval($min);
if ($min < 10) {
    $tail = '0' . $tail;

}
$file = file("/home/work/bidmax_monitor/data/wins_status_" . $tail);
$fileUnknown = file("/home/work/bidmax_monitor/data/unknown_status");
$fileLogMonitor = [];
if (file_exists("/home/work/bidmax_monitor/log_monitor.out.ok")) {
    $fileLogMonitor = file("/home/work/bidmax_monitor/log_monitor.out");
}
$statMonitor = [];
if (file_exists('/home/work/bidmax_monitor/mon_stat.log')) {
    $statString = file_get_contents("/home/work/bidmax_monitor/mon_stat.log");
    $statMonitor = json_decode($statString, true);
}

?>
<title>Win Status</title>

<link href="http://bootswatch.com/darkly/bootstrap.min.css" rel="stylesheet">

<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<head>

    <meta http-equiv="refresh" content="60">

</head>
<div class='well'>
    <div class="row">
        <div class="col-lg-1">
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($file as &$line) {
                            echo "<tr>";
                            $cols = explode(",", $line);
                            foreach ($cols as $col) {
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
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Unknown Status</h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>unknown bundle</th>
                            <th>unknown model</th>
                            <th>unknown make</th>
                            <th>unknown osv</th>
                            <th>unknown carrier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($fileUnknown as $lineIndex => $line) {

                            echo "<tr>";
                            $cols = explode(",", $line);
                            foreach ($cols as $colIndex => $col) {
                                echo "<td>";
                                echo $col;
                                echo "</td>";
                                // echoDownloadLink($lineIndex,$colIndex);
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
    <div class="row">
        <div class="col-lg-1 col-sm-1"></div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bridge_cat_result.csv">bridge_cat_result.csv</a>
            </h5>
            <h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bridge_model_result.csv">bridge_model_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bridge_make_result.csv">bridge_make_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bridge_osv_result.csv">bridge_osv_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bridge_carrier_result.csv">bridge_carrier_result.csv</a>
            </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-1">
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bes_model_result.csv">bes_model_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bes_make_result.csv">bes_make_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bes_osv_result.csv">bes_osv_result.csv</a>
            </h5>
        </div>
        <div class="col-lg-2 col-sm-2">
            <h5>
                <a href="downloadReport.php?name=bes_carrier_result.csv">bes_carrier_result.csv</a>
            </h5>
        </div>

        <div class="col-lg-3 col-sm-3">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Log Status</h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>IP</th>
                            <th>Log Path</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($fileLogMonitor as $lineIndex => $line) {

                            echo "<tr>";
                            $cols = explode("\t", $line);
                            foreach ($cols as $colIndex => $col) {
                                echo "<td>";
                                echo $col;
                                echo "</td>";
                                // echoDownloadLink($lineIndex,$colIndex);
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
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Monitor Status 1 Hour</h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fail Rate</th>
                            <th>Reasons</th>
                            <th>Total Errors</th>
                            <th>Total Pings</th>
                            <th>Total Successes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        echo "<tr>";
                        echo "<td>";
                        echo $statMonitor['1h_stat']['Fail rate'];
                        echo "</td>";
                        echo "<td>";
                        // echo $statMonitor['1h_stat']['Reasons'];
                        echo "test";
                        echo "</td>";
                        echo "<td>";
                        echo $statMonitor['1h_stat']['Total errors'];
                        echo "</td>";

                        echo "<td>";
                        echo $statMonitor['1h_stat']['Total pings'];
                        echo "</td>";

                        echo "<td>";
                        echo $statMonitor['1h_stat']['Total successes'];
                        echo "</td>";
                        echo "</tr>";


                        ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Monitor Status 24 Hour</h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fail Rate</th>
                            <th>Reasons</th>
                            <th>Total Errors</th>
                            <th>Total Pings</th>
                            <th>Total Successes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        echo "<tr>";
                        echo "<td>";
                        echo $statMonitor['24h_stat']['Fail rate'];
                        echo "</td>";
                        echo "<td>";
                        // echo $statMonitor['1h_stat']['Reasons'];
                        echo "test";
                        echo "</td>";
                        echo "<td>";
                        echo $statMonitor['24h_stat']['Total errors'];
                        echo "</td>";

                        echo "<td>";
                        echo $statMonitor['24h_stat']['Total pings'];
                        echo "</td>";

                        echo "<td>";
                        echo $statMonitor['24h_stat']['Total successes'];
                        echo "</td>";
                        echo "</tr>";


                        ?>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
    </div>
    <div class="row">
                <a href="./debug.php" class="btn btn-primary btn-lg" role="button">BidMax Debug</a>
                <div class="col-lg-1">
                </div>

            </div>
</div>

