<?php
$url="http://env-2612354.whelastic.net:11012";
echo $_SERVER["QUERY_STRING"]."<br>";
echo $url;
echo "<html>";
print('<meta http-equiv="refresh" content="1;url=\'');
echo $url;
print('\'">');
echo "</html>";
?>