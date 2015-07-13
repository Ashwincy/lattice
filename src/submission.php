<?php 
function
show_header () {
  /* *************************** */
  echo "
    <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
    <html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">
    
    <head>
      <title>Lattice Challenge Submission</title>
      <meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />
    
      <!-- **** layout stylesheet **** -->
      <link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\" />
    
      <!-- **** colour scheme stylesheet **** -->
      <link rel=\"stylesheet\" type=\"text/css\" href=\"style/colour.css\" />
    
    </head>
    
    <body>
      <div id=\"main\">
    
        <div id=\"links\"></div>
        <div id=\"logo\"><h1>TU DARMSTADT<br />LATTICE<br />CHALLENGE</h1></div>
        <div id=\"content\">
        <div id=\"menu\"></div>
          <div id=\"column1\">
            <div class=\"sidebaritem\">
<!--              <div class=\"sbihead\">
                <h1>links</h1>
              </div>
                <div class=\"sbicontent\">
                    <p>
                          <a href=\"#\" onclick=\"javascript:window.open('./textfiles/examplesubmission.txt', 'Format of Submission', 'width=600,height=300,left=100,top=200,scrollbars=yes')\">Format of Submission</a>
                    </p>
            </div> -->
            <div class=\"sbilinks\">
              <ul>
                <li><a href=\"./index.php\">Back</a></li>
                 <li><a href=\"./submission.php\">Reset</a></li>
              </ul>
            </div>

          </div>
        </div>
              <div id=\"column2\">
<!--         <h1>soon to start</h1> -->
        <h1>submit your solution</h1>
    ";
}

/* *************************** */
  function show_footer () {
  /* *************************** */
  echo "
      <br />
      </div>
      </div>
        <div id=\"footer\">
        New Footer text coming soon
        </div>
        
      </div>
    </body>
    </html>
    ";
}

show_header();
$errortext="";

require_once('includes/submission.inc.php');

//we use 'vector' 'name' 'email' 'notes'

$vector="";
$name="";
$email="";
$notes="";
$algorithm="";
$hardware="";
$runtime="";
$valid="";
if($_POST['action'] == "submission") {

	$valid=true;
	if (!isset($_POST['vector']) || $_POST['vector'] == '') {
		$valid=false; $errortext .= "<p class=\"errorstr\">Please submit a solution vector.</p>\n";
	} else {
		$vector=$_POST['vector'];
	}

	if (!isset($_POST['name']) || $_POST['name'] == '') {
		$valid=false; $errortext .= "<p class=\"errorstr\">Please enter your name.</p>\n";
	} else {
		$name=$_POST['name'];
	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {
		$valid=false; $errortext .= "<p class=\"errorstr\">Please enter your e-mail address.</p>\n";
	} else {
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$valid=false; $errortext .= "<p class=\"errorstr\">The e-mail address '" . htmlspecialchars($_POST['email']) . "' is not valid.</p>\n";
		} else {
			$email=$_POST['email'];
		}
	}
  
  if (!isset($_POST['algorithm']) || $_POST['algorithm'] == '') {
    $valid=false; $errortext .= "<p class=\"errorstr\">Please enter the used algorithm.</p>\n";
  } else {
    $algorithm=$_POST['algorithm'];
  }

	if (!isset($_POST['notes'])) {
		$notes='';
	} else {
		$notes=$_POST['notes'];
	}
}

if (!$valid) {

	//if (strcmp($errortext, "") != 0) {
	//	echo("<div class=\"errors\"><span class=\"formlabel\">" . $errortext . "</span></div>");
	//}
	?>

	<form action="submission.php" method="post">
	 <div class="row">
	  <span class="formlabel">Vector *</span>
	  <span class="forminputwomargin"><input type="text" name="vector" value="<?php echo(htmlspecialchars($vector)); ?>" size="50" /></span>
	 </div>
	 <div class="row">
      <span class="textfield">[3 -1 4 -1 5 -9]</span>
     </div>
	 
	 <div class="row">
	  <span class="formlabel">Name(s) of Participant(s) *</span>
	  <span class="forminputwomargin"><input type="text" name="name" value="<?php echo(htmlspecialchars($name)); ?>" size="50" /></span>
	 </div>
	 <div class="row">
      <span class="textfield">Carl Friedrich Gauss, Joseph-Louis Lagrange</span>
     </div>
	 
	 <div class="row">
	  <span class="formlabel">E-Mail Address *</span>
	  <span class="forminput"><input type="text" name="email" value="<?php echo(htmlspecialchars($email)); ?>" size="50" /></span>
	 </div>
	 
	 <div class="row">
    <span class="formlabel">Algorithm *</span>
    <span class="forminput"><input type="text" name="algorithm" value="<?php echo(htmlspecialchars($algorithm)); ?>" size="50" /></span>
   </div>
   <div class="row">
    <span class="formlabel">Hardware</span>
    <span class="forminput"><input type="text" name="hardware" value="<?php echo(htmlspecialchars($hardware)); ?>" size="50" /></span>
   </div>
   <div class="row">
    <span class="formlabel">Runtime</span>
    <span class="forminput"><input type="text" name="runtime" value="<?php echo(htmlspecialchars($runtime)); ?>" size="50" /></span>
   </div>

	 <div class="row">
	  <span class="formlabel">Optional Notes</span>
	  <span class="forminput"><textarea rows="5" cols="18" name="notes" class="textarea"><?php echo(htmlspecialchars($notes)); ?></textarea></span>
	 </div>	
   <div class="row">
    <span class="formlabel">* Required Field</span>
	  <span class="forminput"><input type="submit" value="Submit" class="submit" /></span>
	  <input type="hidden" name="action" value="submission" />
	 </div>
  </form>


	<?php
} else {
	submit($vector, $name, $email, $algorithm, $hardware, $runtime, $notes);
}

show_footer();

