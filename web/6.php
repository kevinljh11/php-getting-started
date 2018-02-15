<?php
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$abc=array("猪","狗","鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠");
$abcd=array("平","特");
$url1="http://bet.hkjc.com/marksix/index.aspx?lang=ch";

    function http_get_data($url) {  
          
        $ch = curl_init ();  
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );  
        curl_setopt ( $ch, CURLOPT_URL, $url );  
        ob_start ();  
        curl_exec ( $ch );  
        $return_content = ob_get_contents ();  
        ob_end_clean ();  
          
        $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );  
        return $return_content;  
    } 

print('<!DOCTYPE HTML>
<html>
<head>
    <title>hk6_heroku</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta name="viewport" content="width=300px, user-scalable=no" />
<!--</head><body>-->');
echo "</head><body>";

$html=file_get_contents($url1);
$dom=new DOMDocument;
$dom->loadHTML($html);
$xml=simplexml_import_dom($dom);
$item=$xml->xpath('//td[@class="content"]');
echo "上期".(string)$item[11]."期<br>";
echo "上期".(string)$item[12]."<br>";

$item2=$xml->xpath('//td[@style="padding:15px 8px 0px 0px;"]');
$item3=$item2[0]->table->tr->td;

$index=0;
foreach($item3 as $value)
{
$nowno1=(string)$value->img->attributes()[0];
$nowno2=explode("/marksix/info/images/icon/no_",$nowno1);
$nowno3=explode(".",$nowno2[1])[0];
if (strlen($nowno3)==2)
{
echo $nowno3.$abc[$nowno3 % 12].",";
}else
{
echo "<br>".$abcd[$index]."码：";	
$index++;
}
}
echo "</body></html>";  
?>
