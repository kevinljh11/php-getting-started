<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$pid = $_GET["p"];
if ($pid=="")
{
  $pid=1;
}
$url1="http://www.thisav.com/videos?o=mr&type=&c=0&t=a&page=".$pid;

$data1=file_get_contents($url1);
$data2=explode("http://www.thisav.com/video/",$data1);
//echo $data2[1];

echo "<html><body>";
$pp=$pid+1;
echo "<a href=\"ta.php?p=".$pp."\">"."Next Page</a><br><br>";
FOR ($i = 1; $i <=12; $i++) 
{
$surl1=explode(".html",$data2[$i]);  
$surl="ta2.php?p=".$surl1[0];

$surl2=explode("http://images.thisav.com/images/videothumbs/",$surl1[1]);
$surl3=explode(".jpg",$surl2[1]);
$jpgurl="<img src=\"http://images.thisav.com/images/videothumbs/".$surl3[0].".jpg\" />";
echo "<a target=\"_blank\" href=\"".$surl."\">";
echo $jpgurl."</a>";
} 

echo "<a href=\"ta.php?p=".$pp."\">"."Next Page</a>";
echo "</body></html>";  
?>?