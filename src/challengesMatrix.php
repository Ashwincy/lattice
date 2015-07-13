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
       <h1>soon to start</h1>
       <p>Challenges with green mark have been solved, you can click on them to get details about the
          submissions, Challenges with yello mark are the challenges which havent been solved yet</p>
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
          copyright &copy; 2010 R. Lindner, M. Rueckert, P. Baumann, L. Nobach | <a href=\"http://validator.w3.org/check?uri=referer\">XHTML 1.1</a> | <a href=\"http://jigsaw.w3.org/css-validator/check/referer\">CSS</a> | <a href=\"http://www.dcarter.co.uk\">design by dcarter</a>
        </div>
        
      </div>
    </body>
    </html>
    ";
}

show_header();

