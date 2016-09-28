<?php
$result ="";
$request = file_get_contents('./request.json');
if(array_key_exists('request',$_POST))
{
    $request =$_POST['request'];
    $requestArray = json_decode($request,true);
    $requestArray['id']=time();
    $requestJson = json_encode($requestArray);
    $ch = curl_init('180.76.156.204:12339/auctions');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$requestJson);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'content-type: application/json',
        'x-openrtb-version: ' ."2.0"
    )
    );
    $result = curl_exec($ch);
    curl_close($ch);
};
if(array_key_exists('adspot',$_POST))
{
    $adspot = $_POST['adspot'];
    $url="http://180.76.148.249:5000/adspot_id/";
    $requestUrl = $url.$adspot;
    $ch = curl_init();
    $timeout = 5;
    curl_setopt ($ch, CURLOPT_URL,$requestUrl);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $result = curl_exec($ch);
    curl_close($ch);
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
                        <h2 class="panel-title">BidMax Debug Request</h2>
                    </div>
                    <div class="panel-body">
                        <form action="./debug_test.php" method="post">
                        <br>
                            Request Json:
                            <br>
                            <textarea  name='request' rows="20" cols="120">
                                <?php
                                    echo $request;
                                ?>
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
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">Simple BidMax Debug Request</h2>
                    </div>
                    <div class="panel-body">
                        <form action="./debug_test.php" method="post">
                        <br>
                           Request Adspot ID:
                            <br>
                            <input  name='adspot'>
                             </input>
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
<div class='well well-lg'>
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">BidMax Debug Result</h2>
                   </div>
                    <div class="panel-body">
                        <pre id='result'>
                        <?php
                            echo $result;
                        ?>
                        </pre>
                    </div>

                </div>
            </div>

            <div class="col-lg-1">

            </div>
        </div>
</div>
<script>
function syntaxHighlight(json) {
    if (typeof json != 'string') {
        json = JSON.stringify(json, undefined, 5);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}
var raw = $('#result').text();
var obj = JSON.parse(raw);
$('#result').html(syntaxHighlight(obj));
$('.btn').on("click",function(){
      localStorage.reload=1;
})
if(localStorage.reload ==1)
{
    $('.btn').attr('disabled',true);
}

</script>
<style>
    pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
    .string { color: green; }
    .number { color: darkorange; }
    .boolean { color: blue; }
    .null { color: magenta; }
    .key { color: red; }
</style>
