<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$pid = $_GET["p"];

$url1="http://www.thisav.com/video/".$pid.".html";

$data1=file_get_contents($url1);
$data2=explode("file:",$data1);
$data3=explode(".mp4",$data2[1]);
$vurl=substr($data3[0],2).".mp4";

print('<!DOCTYPE HTML>
<html>
<body>
<video controls>
  <source src="');
echo $vurl;
print('" type="video/mp4">
</video>   
</body>
</html>');   
 
?>