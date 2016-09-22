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

?>
<title>Win Status</title>

<link href="http://bootswatch.com/darkly/bootstrap.min.css" rel="stylesheet">

<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<head>


</head>

<div class='well well-lg'>
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">BidMax Debug</h2>
                    </div>
                    <div class="panel-body">
                        <form action="debug_process.php" method="post">
                        <br>
                            Request Json:
                            <br>
                            <textarea  name='request' rows="20" cols="120">
{
    "ext": {"provider": "cooee"},
    "id":"'$SECONDS'",
    "imp":[
        {
            "id":"91b5e18c-014c-1000-e71a-3e9942b60043",
            "banner":
            {
                "w":640,
                "h":100,
                "id":"10000029",
                "battr":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16],
                "mimes":["image/jpeg","image/gif","image/png"]
            },
            "instl":0,
            "bidfloor":0.0,
            "bidfloorcur":"CNY",
            "iframebuster":["None"]
        }
    ],

    "app":
    {
        "id":"00000000-0010-cebb-0004-e50b9ecf5fbd",
        "bundle":"com.voolean.oceansound",
        "name":"Book",
        "cat":["IAB1-1","IAB5"],
        "ext":{"fs":"0","store":{"rating":"17+","cat":"Book","seccat":["Books","Education"]}}
    },

    "device":
    {
        "dnt":0,
        "model":"iPhone 6S Plus",
        "ua":"Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Mobile/11D257",
        "ip":"58.53.67.42",
        "geo":{"lat":31.167,"lon":112.582,"country":"CHN","type":1},
        "didmd5":"d625c3e923fc057afbfa942e90b7212",
        "dpidmd5":"d625c3e923fc057afbfa942e90b77511",
        "os":"Android",
        "osv":"5.1",
        "connectiontype":2,
        "devicetype":1,
        "ext":{"idfamd5":"1a5390ee78aaec1cc8f14ee87ad4be1f","idfasha1":"1eda59d1e02c0d1fbc07e59f154b423a0d740d4d","idfa":"8F41EBBF-3773-4E31-9236-BD6137954D3D"}
    },

    "user":{"yob":-1},
    "at":2,
    "tmax":500,
    "wseat":["768b588e30b44843a06168221f772c4b"],
    "cur":[],
    "bcat":["IAB7-28","IAB25-5","IAB7-29","IAB25-4","IAB7-27","IAB7-24","IAB7-25","IAB7-22","IAB25-3","IAB25-2","IAB7-9","IAB7-8","IAB19-3","IAB14-3","IAB5-2","IAB7-45","IAB7-44","IAB7-31","IAB26","IAB8-5","IAB7-30","IAB7-3","IAB7-2","IAB7-5","IAB23-2","IAB7-10","IAB7-37","IAB11-1","IAB7-11","IAB7-38","IAB11-2","IAB7-12","IAB7-39","IAB6-7","IAB7-13","IAB7-14","IAB7-34","IAB7-16","IAB7-36","IAB7-18","IAB7-19","IAB26-3","IAB26-4","IAB26-1","IAB26-2","IAB7-40","IAB7-21","IAB7-20"],
    "badv":["king.com","supercell.net","paps.com","fhs.com","china.supercell.com","supercell.com"],
    "debug": true
    }
                             </textarea> 
                            <br>
                            <br>
                            <input type="submit" class="btn btn-lg btn-primary">
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-1">

            </div>
        </div>
</div>

