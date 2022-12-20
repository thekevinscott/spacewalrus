<?php





$dbhost = 'localhost';

$dbuser = 'root';

$dbpass = 'xkscottx';



$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      

('Error connecting to mysql');



$dbname = 'actionscript';

mysql_select_db($dbname);



$query = "SELECT content from news ORDER BY RAND()";

$result = mysql_query($query);

$num=mysql_numrows($result);



echo "&content=";



$i=0;

while ($i < $num) {



echo("".mysql_result($result,$i,"content")."  ///   ");



$i++;

}



mysql_close();



?>