<?php

function convertEmailToString($email) {
  $emailString = str_replace("@", " at ", $email);
  return $emailString;
}

$id=$_GET['id'];

if (!is_numeric($id)) {
  echo("Parameter id is non-numeric");
  exit();
}

require_once('db.php');


 $res = all(false);


$i = 1;
foreach ($res as $key => $value) {
  foreach ($value as $key => $value) {
    if ($id == $value->id)  {
      ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
      <head>
        <title>Submission Details</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
      
        <!-- **** layout stylesheet **** -->
        <link rel="stylesheet" type="text/css" href="style/style.css" />
      
        <!-- **** colour scheme stylesheet **** -->
        <link rel="stylesheet" type="text/css" href="style/colour.css" />
      
      </head>

      <body>
        <div id="main_halloffame">
           <div id="links"></div>
           <div id="logo"><h1>TU DARMSTADT<br />LATTICE<br />CHALLENGE</h1></div>
	   <div id="content"> 
	    <div id="menu"></div>
            <div id="column3">
      
              <h1>Submission Details</h1>
              <div class="center">
              
              <?php if (strstr($value->date, '-')) { ?>
              <div class="rowdetails">
                <span class="formlabel">Date</span>
                <span class="textfielddetails"><?php echo($value->date); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->dim != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Dimension</span>
                <span class="textfielddetails"><?php echo($value->dim); ?>&nbsp;</span>
              </div>
              
              
              <?php } if ($value->len != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Euclidean norm</span>
                <span class="textfielddetails"><?php echo(round (sqrt ($value->len) * 10000) / 10000); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->name != '') { ?>
              <div class="rowdetails">
               <span class="formlabel">Name(s) of Participant(s)</span>
               <span class="textfielddetails"><?php echo(buildNameString($value->name)); ?>&nbsp;</span>
              </div>
               
               <?php } if ($value->email != '') { ?>
              <div class="rowdetails">
               <span class="formlabel">E-Mail Address</span>
               <span class="textfielddetails"><a href="<?php echo("mailto:" . convertEmailToString($value->email)) ?>"><?php echo(convertEmailToString($value->email)) ?></a>&nbsp;</span>
               </div>
              
              <?php } if ($value->algorithm != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Algorithm</span>
                <span class="textfielddetails"><?php echo($value->algorithm); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->harware != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Hardware</span>
                <span class="textfielddetails"><?php echo($value->harware); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->runtime != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Runtime</span>
                <span class="textfielddetails"><?php echo($value->runtime); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->notes != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Notes</span>
                <span class="textfielddetails"><?php echo($value->notes); ?>&nbsp;</span>
              </div>
              
              <?php } if ($value->sol != '') { ?>
              <div class="rowdetails">
                <span class="formlabel">Solution</span>
                <span class="textfielddetails"><?php echo($value->sol); ?></span>
              </div>
              <?php } ?>
              </div>
            </div>
          </div>
          <div class="center">
            <a href="./">Back</a>
          </div><br/>
         <div id="footer">
           copyright &copy; 2010 R. Lindner, M. Rueckert, P. Baumann, L. Nobach | <a href="http://validator.w3.org/check?uri=referer">XHTML 1.1</a> | <a 
href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a>
         </div>
       </div>
      </body>
</html>
      <?php
      exit();
    }
    $i++;
  }
}
echo("Could not find details with rank " . $id);

?>
        
        


