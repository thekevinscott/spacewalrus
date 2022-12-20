<?php





$dbhost = 'localhost';

$dbuser = 'root';

$dbpass = 'xkscottx';



$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      

('Error connecting to mysql');



$dbname = 'actionscript';

mysql_select_db($dbname);



$query = "DROP TABLE NEWS";

$result = mysql_query($query);

$query = "CREATE TABLE news (ID Int AUTO_INCREMENT, content VARCHAR(1500), PRIMARY KEY (ID))";

$result = mysql_query($query);











$rssFeeds = array ('http://rss.cnn.com/rss/money_latest.rss', 'http://rss.cnn.com/rss/cnn_us.rss', 'http://rss.cnn.com/rss/cnn_tech.rss', 'http://rss.cnn.com/rss/cnn_allpolitics.rss');



//Loop through the array, reading the feeds one by one

foreach ($rssFeeds as $feed) {

  readFeeds($feed);

}



function startElement($xp,$name,$attributes) {  

global $item,$currentElement;  $currentElement = $name; 

//the other functions will always know which element we're parsing  

if ($currentElement == 'ITEM') { 

//by default PHP converts everything to uppercase    

$item = true; 

// We're only interested in the contents of the item element. 

////This flag keeps track of where we are  

}}







function endElement($xp,$name) {  

global $item,$currentElement,$title,$description,$link;    

if ($name == 'ITEM') { 

// If we're at the end of the item element, display 

// the data, and reset the globals    

//echo " $title ///";

$query = "INSERT INTO news (content) values ('$title')";

$result = mysql_query($query);





$title = '';    

$description = '';    

$link = '';    

$item = false;  }}





function characterDataHandler($xp,$data) {  

global $item,$currentElement,$title,$description,$link;    

if ($item) { 

//Only add to the globals if we're inside an item element.    

switch($currentElement) {      

case "TITLE":        

$title .= $data; 

// We use .= because this function may be called multiple 

// times for one element.        

break;      

case "DESCRIPTION":        

$description.=$data;        

break;      

case "LINK":        

$link.=$data;        

break;     }  }}



function readFeeds($feed) {

  $fh = fopen($feed,'r'); 

// open file for reading



  $xp = xml_parser_create(); 

// Create an XML parser resource



  xml_set_element_handler($xp, "startElement", "endElement"); 

// defines which functions to call when element started/ended



  xml_set_character_data_handler($xp, "characterDataHandler");



  while ($data = fread($fh, 4096)) {

    if (!xml_parse($xp,$data)) {

      return 'Error in the feed';

    }

  }

}





echo "If you haven't seen any errors, then success!";

?>