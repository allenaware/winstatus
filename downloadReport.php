<?php
$fileDir = "/home/work/bidmax_monitor/report/";
$fileName = $_GET['name'];
if(strpos($fileName,'/')!==false)
{
    echo "非法访问";
    exit;
}
function download($fileDir,$fileName)
{
ob_clean();
if (!file_exists($fileDir . $fileName)) { //判断文件是否存在
    echo "对不起，你要下载的文件不存在！";
    exit;
} else {
    $file = fopen($fileDir . $fileName,"r"); //打开文件
    Header("Content-type: application/octet-stream");
    Header("Accept-Ranges: bytes");
    Header("Accept-Length: ".filesize($fileDir . $fileName));
    Header("Content-Disposition: attachment; filename=" . $fileName);
    echo fread($file,filesize($fileDir . $fileName));
    fclose($file);
    exit;}
}
download($fileDir,$fileName);
?>
