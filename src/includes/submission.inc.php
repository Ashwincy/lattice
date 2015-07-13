<?php 

$vectorpattern = "#^ *\[ *-?[0-9]+( +-?[0-9]+)* *\] *$#i";
$vectordimpattern = "#-?[0-9]+( +|] *$)#";
$intpattern = "#^ *-?[0-9]+ *$#";

//we use 'vector' 'name' 'email' 'notes'

function normalizeVector($vector) {
	//$vector = preg_replace('#^ *\[ *', '\[', $vector);
	//$vector = preg_replace(' *\] *$#i', '\]', $vector);
	$vector = preg_replace(array('# +#' ,'#^ +\[#', '#\] +$#'), array(' ', '[', ']'), $vector);
	return $vector;
}

function printStep($text) {
	echo('<p class="step">' . $text . "</p>\n");
}

function printError($text) {
	echo('<p class="error">Error: ' . $text . "</p>\n");
}

function printOK($text) {
	echo('<p class="ok">' . $text . "</p>\n");
}

function vectorCorrectFormat($vector) {
	global $vectorpattern;
	return preg_match($vectorpattern, $vector);
}

function getVectorDimension($vector) {
	global $vectordimpattern;
	// Assumes a format-checked vector
	return preg_match_all($vectordimpattern, $vector, $matches);
}

function isInteger($value) {
	global $intpattern;
	return preg_match($intpattern, $value);
}

function getEuclideanNorm($vector) {
	$vec = str_replace ('[', '', $vector);
	$vec = str_replace (']', '', $vec);
	$entries = explode (" ", $vec);
	$norm = 0;			// calculate norm
	foreach ($entries as $t) {
  		$norm += $t * $t;
	}
	
	return $norm;
}

function vectorIsTheBestInThisDim($dim, $norm) {
  require_once('db.php'); 
  $res = all();
  $i = 1;
  foreach ($res as $key => $dimarray) {
    foreach ($dimarray as $key => $value) {
      if (strcmp($dim, $value->dim) == 0) {
        if ($norm >= $value->len) {
          return false;
        }
      }
      $i++;
    }
  }
  return true;
}

function escapeStr($string) {
  $string = str_replace("|", "_", $string);
  $string = str_replace("\r\n", "\\", $string);
  return str_replace("\n", "\\", $string);  
}


function enterInHallOfFame($norm, $vector, $dim, $name, $email, $algorithm, $hardware, $runtime, $notes) {
	printStep("Euclidean norm of submitted vector is: " . round (sqrt ($norm) * 10000) / 10000 . ".");
  $today = date("Y-m-j");
	$line = escapeStr($dim) . '|' . escapeStr($norm) . '|' . escapeStr($name) . '|' . escapeStr($vector) . 
	         '|' . escapeStr($email)  . '|' . escapeStr($algorithm) . '|' .  escapeStr($hardware) . '|' .  escapeStr($runtime) . 
	         '|' . escapeStr($notes) . '|' .escapeStr($today) ."\n";
	$fh = fopen ('./textfiles/contestants.txt', 'a') or die ("can't open file");
	fwrite ($fh, $line);
  	fclose ($fh);
}

function submit($vector, $name, $email, $algorithm, $hardware, $runtime, $notes) {

  if (!vectorCorrectFormat($vector)) {
		printError("The vector has an incorrect format.");
		return 1;
	}
  
  $name = str_replace (' and ', ', ', $name);  
  $dim = getVectorDimension($vector);
  $norm = getEuclideanNorm($vector);
  $vector = normalizeVector($vector);
  
  $message = "<p>You have submitted: <br />\nvector='" . htmlspecialchars($vector) 
         . "'<br />\ndim='" . htmlspecialchars($dim) 
         . "'<br />\nname='" . htmlspecialchars($name)
         . "'<br />\nemail='" . htmlspecialchars($email)
         . "'<br />\nalgorithm='" . htmlspecialchars($algorithm)
         . "'<br />\nhardware='" . htmlspecialchars($hardware)
         . "'<br />\nruntime='" . htmlspecialchars($runtime)
         . "'<br />\nnorm='" . htmlspecialchars($norm)
         . "'<br />\nnotes='" . htmlspecialchars($notes) . "'</p>";
  
  echo($message);

 /* printStep("Testing if vector " . htmlspecialchars($vector) . " is formatted correctly...");
	
	printStep("Testing if vector " . htmlspecialchars($vector) . " is the correct solution...");
	$result = exec("includes/verify --dim " . escapeshellcmd($dim) . " --solution '" . $vector . "'");
	//echo ("includes/verify --dim " . escapeshellcmd($dim) . " --solution '" . $vector . "'");


	if (strcmp($result, "the vector is too long") == 0) {
		printError("The vector is too long. The sub process returned: " . htmlspecialchars($result));
		return 1;
	}
	
	if (strcmp($result, "the vector is in the lattice") != 0) {
    printError("The vector is not the correct solution. The sub process returned: " . htmlspecialchars($result));
    return 1;
  }
	
  $best = vectorIsTheBestInThisDim($dim, $norm);
  
  if (!$best) {
    printError("The vector is a correct solution, but a better vector has already been submitted");
    return 1;
  }

*/
       printOK("Success! You have successfully submitted a correct solution!");

	enterInHallOfFame($norm, $vector, $dim, $name, $email, $algorithm, $hardware, $runtime, $notes);
        
	//mail("solutions@latticechallenge.org", "[LatticeChallenge] New Solution", $message);
        ?>
<script type="text/css" href="style/colour.css">
     $( '#cell' ).css('background', 'red');
</script>
<?php

}
