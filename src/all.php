 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>TU Darmstadt Lattice Challenge</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

  <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />

  <!-- **** colour scheme stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/colour.css" />

</head>

<body class="plain">

<div id="column2">
<h1>List of achievements</h1>


<?php

include_once('db.php');

$res = all();


print "</tbody></table>";


	print "<table style=\"text-align: center;\" width=\"100%\">";
	print "<thead>";
	print "<tr>";
	print "<th>Dimension</th>";
	print "<th>Euclidean norm</th>";
	print "<th>Contestant</th>";
	print "<th>Solution</th>";
	print "</tr>";
	print "</thead>";
	print "<tbody>";



foreach($res as $key => $value)
{
	$rec = $value;
	
	foreach ($rec as $len => $entry)
	{
		print "<tr>";
		print "<td>" . $entry->dim . "</td>";
		print "<td>" . $entry->len . "</td>";
		print "<td>" . $entry->name . "</td>";
		print "<td><a href=\"" . $entry->fname . "\">vec</a></td>";
		print "</tr>";
	}

}

print "</tbody></table>";
?>
</div>

<span style="text-align:center;"><a href="javascript:window.close()">Close</a></span>
</body>
</html>