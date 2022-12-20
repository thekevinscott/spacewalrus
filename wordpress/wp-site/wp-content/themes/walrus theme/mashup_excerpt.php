<?php

//function getRandomImage($dir,$type='random')
{ 
global $errors,$seed; 

  if (is_dir($dir)) {  

  $fd = opendir($dir);  
  $images = array(); 

      while (($part = @readdir($fd)) == true) {  

          if ( eregi("(gif|jpg|png|jpeg)$",$part) ) {
              $images[] = $part; 
          } 
      } 

    // adding this in case you want to return the image array
    if ($type == 'all') return $images;

    if ($seed !== true) {
      mt_srand ((double) microtime() * 1000000);
      $seed = true;
    }
      
      $key = mt_rand (0,sizeof($images)-1); 

    return $dir . $images[$key]; 

  } else { 
      $errors[] = $dir.' is not a directory'; 
      return false; 
  } 
} 

echo "<center>";

	// get the filenames
	$comic1=getRandomImage('comics/');
	$comic2=getRandomImage('comics/');
	$comic3=getRandomImage('comics/');
	$comic4=getRandomImage('comics/');

	echo "<table>";
	
	
	
	

		echo "<tr>";
			
			echo '<td width=419px height=319px style="background: transparent url('.$comic1.') no-repeat;">';
			echo "</td>";
			echo '<td width=419px height=319px style="background: transparent url('.$comic2.') no-repeat -419px 0px;">';
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo '<td width=419px height=319px style="background: transparent url('.$comic3.') no-repeat 0px -319px;">';
			echo "</td>";
			echo '<td width=419px height=319px style="background: transparent url('.$comic4.') no-repeat -419px -319px;">';
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	echo "</center>";

?>
