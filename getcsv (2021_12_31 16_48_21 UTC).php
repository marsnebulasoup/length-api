<?php
$THAT_KEY = '{applesoup}';

function checkKey($key) {
	$file = fopen('he04dboq727ttkz32vh1dtpp0vb4zpl4hp863rr09v5nxdepnem.csv','r');
	$din = array();

			
	while(! feof($file))
	  {
	  array_push($din,fgetcsv($file));
	  }

	fclose($file);
	
	function searchForKey($id, $array) {
		$GLOBALS['zbun'] = 'nothing';
	   foreach ($array as $key => $val) {
		   if ($val[2] === $id) {
				$GLOBALS['zbun'] = 'true';
		   }
		   
		   
	   }
	   if ($GLOBALS['zbun']=='true'){
		   $GLOBALS['zbun'] = $key;
	   }
	}

	searchForKey($key,$din);
}

$doesit = checkKey($THAT_KEY);
$it = $GLOBALS['zbun'];
if($it != 'nothing'){
	echo 'good';
}
else{
	echo 'bad';
}

?>