<?php
$park = true;
$city = true;
$name = true;
$mail = true;
$title = true;
$match = true;
$error = false;
$pass  = false;
if(isset($_POST['submit'])) {
  $submit = true;
  /* check submission values */
  if(!isset($_POST['res'])) {
    $res = 0;
    $error = true;
    $park = false; /* favorite park not selected */
  } else {
    $res = $_POST['res'];
  }
  if(!isset($_POST['cc'])) {
    $cc = 0;
    $error = true;
    $city = false; /* greenest city not selected */
  } else {
    $cc = $_POST['cc'];
    if($cc === "0") {
      $error = true;
      $city = false; /* greenest city not selected */
    }
  }
  if(isset($_POST['n'])||isset($_POST['em'])||isset($_POST['ev'])) {
    if(isset($_POST['t'])) { $t = $_POST['t']; } else { $t = ""; }
    if(isset($_POST['n'])) { $n = $_POST['n']; } else { $n = ""; }
    if(isset($_POST['em'])) { $em = $_POST['em']; } else { $em = ""; }
    if(isset($_POST['ev'])) { $ev = $_POST['ev']; } else { $ev = ""; }
    if((strlen($n)>0)||(strlen($em)>0)||(strlen($ev)>0)) {
      /* some values provided -> check details */
      if(strlen($n)<1) {
        $error = true;
        $name = false; /* no name provided */
      }
      if(!isset($_POST['t'])) {
        $error = true;
        $title = false; /* no title set */
      }
      if((strlen($em)<6)||(preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $em)==0)) {
        $error = true;
        $mail = false; /* invalid e-mail */
      }
      if((strlen($ev)<6)||($em!=$ev)) {
        $error = true;
        $match = false; /* e-mail mismatch */
      }
    }
  }
  if (!$error) {
    $pass = true;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <title><?php
if(isset($submit)) {
  if (!$error) {
    echo "Citylights Survey - Submission Completed [Annotated Accessible Survey Page]";
  } else {
    echo "Citylights Survey - Submission Failed [Annotated Accessible Survey Page]";
  }
} else {
  echo "Citylights Survey [Annotated Accessible Survey Page]";
}
    ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link href="../../css/main.css" rel="stylesheet" type="text/css">
    <link href="../../css/inbetween.css" rel="stylesheet" type="text/css">
    <script src="../../js/onload.js" type="text/javascript"></script>
    <script src="../../js/annotations.js" type="text/javascript"></script>
    <script src="../../js/localdate.js" type="text/javascript"></script>
  </head>
  <body>
    <div id="meta-header">
      <p id="skipnav"></p><ul class="skip"><li><a href="#page">Skip to accessible demo page</a></li><li><a href="#annotations">Skip to annotations for demo page</a></li></ul>
      <p id="logos"><a href="http://www.w3.org/" title="W3C Home"><img alt="W3C logo" src="../../img/w3c.png" height="48" width="72"></a><a href="http://www.w3.org/WAI/" title="WAI Home"><img alt="Web Accessibility Initiative (WAI) logo" src="../../img/wai.png" height="48"></a></p>
      <h1><span class="subhead">Annotated Accessible Survey Page</span><span class="hidden"> -</span> Before and After Demonstration</h1>
      <p class="subline">Improving a Web site using Web Content Accessibility Guidelines (WCAG) 2.0</p>
      <div id="mnav" class="accessible">
        <ul>
          <li class="first"><a href="../../Overview.html">Overview</a></li>
          <li class="first"><a href="home.html">Home</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="tickets.html">Tickets</a></li>
          <li class="current"><span class="hidden">Current location: </span>Survey
            <div class="subnav"><ul>
              <li class="inaccessible"><strong>Inaccessible:</strong><a href="../../before/annotated/survey.html" class="page"><span class="hidden">Inaccessible </span>Survey Page</a><a href="../../before/reports/survey.html" class="report"><span class="hidden">Inaccessible Survey Page </span> Report</a></li>
              <li class="accessible"><strong>Accessible:</strong><a class="page current"><span class="hidden">Accessible </span>Survey Page</a><a href="../reports/survey.html" class="report"><span class="hidden">Accessible Survey Page </span> Report</a></li>
            </ul><a href="../survey.html" class="annotoggle">Hide <br>Annotations</a></div>
          </li>
          <li><a href="template.html">Template</a></li>
        </ul>
      </div>
    </div>
    <div id="page">
      <div id="border_t"></div>
      <div id="border_l">
        <div id="border_r">
          <p class="skip" id="startcontent">Demo starts here</p>
          <ul class="skip">
            <li><a href="#content">Skip to content (within demo page)</a></li>
            <li><a href="#navtarget">Skip to navigation (within demo page)</a></li>
          </ul>
          <div id="header">
            <a href="home.html"><img src="../img/toplogo.png" alt="Citylights: your access to the city."></a><img src="../img/weather.png" alt="Sunny Spells">
            <form action="../../offsite.html" method="post" onsubmit="if(qkmenu.value=='0'){return false;}">
              <div>
                <label for="qkmenu" id="qklabel">Explore Site by Topic:</label> <select name="qkemnu" id="qkmenu">
                  <option value="0">Quick Menu</option>
                  <option>Broadcasting</option>
                  <option>Education</option>
                  <option>Electricity</option>
                  <option>Fire service</option>
                  <option>Gas service</option>
                  <option>Health care</option>
                  <option>Police service</option>
                  <option>Public Libraries</option>
                  <option>Social services</option>
                  <option>Social housing</option>
                  <option>Telecommunications</option>
                  <option>Town planning</option>
                  <option>Transportation</option>
                  <option>Waste management</option>
                  <option>Water services</option>
                </select> <input type="submit" value="Go">
              </div>
            </form>
          </div>
          <div id="info">
            <p class="left"><strong>Traffic:</strong> Construction work on Main Road</p>
            <p class="right" id="weather"><strong>Today:</strong> Wednesday 25 January 2012, Sunny Spells, 23&deg;C</p>
          </div>
          <div id="main">
            <h2 id="navtarget" class="skip">Navigation menu:</h2>
            <div id="nav">
              <ul>
                <li class="home"><a href="home.html">Home</a></li>
                <li class="news"><a href="news.html">News</a></li>
                <li class="facts"><a href="tickets.html">Tickets</a></li>
                <li class="survey_set"><a>Survey</a></li>
              </ul>
            </div>
            <div id="content">
              <div id="contentmain" class="wide annot_link_parent">
                <h1><?php
if (isset($submit)&&(!$error)) {
  echo "Citylights Survey - Submission Completed";
} else if($error) {
  echo "Citylights Survey - Submission Failed";
} else {
  echo "Citylights Survey";
}
                ?></h1>
                <h2 class="header">This Week's Survey: More city parks - a pain or a gain?</h2><?php
if(isset($submit)&&(!$error)) { /* successful submission */ ?>
                <p id="submissionsuccess">Thank you for submitting your vote, it has been successfully recorded.</p><span id="annot_link_12" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:8em;"><a href="#annot_12" title="12: Indication of successful form completion">12</a></span>
                <p><strong>Note:</strong> this submission is part of the Demo; none of this data is stored and there is no newsletter subscription.</p><?php
} else { /* print submission form */ ?>
                <form action="survey.php" method="post"><?php
  if($error) {?>
                <div><span id="annot_link_08" class="annot_link next_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:6.3em;"><a href="#annot_08" title="08: Informative error message">08</a></span></div>
                <div id="submissionerrors" class="annot_link_parent"><?php
    /* construct error messages */
    $inol = "                  <ol>";
    $olcnt = 0;
    if(!$park) { 
      $inol .= "\n                    <li>You have not selected a <a href='#park'>favorite park</a></li>";
      $olcnt++;
    } if(!$city) {
      $inol .= "\n                    <li><label for='cc'>You have not selected a <a href='#city'>greenest city</a></label></li>";
      $olcnt++;
    } if(!$name) {
      $inol .= "\n                    <li><label for='name'>You have not provided a <a href='#namenewsletter'>name for the optional newsletter</a></label></li>";
      $olcnt++;
    } if(!$title) {
      $inol .= "\n                    <li><label for='t'>You have not selected a <a href='#namenewsletter'>title for the optional newsletter</a></label></li>";
      $olcnt++;
    } if(!$mail) {
      $inol .= "\n                    <li><label for='em'>You have not provided a <a href='#emailinput'>valid eMail for the optional newsletter</a></label></li>";
      $olcnt++;
    } if(!$match) {
      $inol .= "\n                    <li><label for='ev'>You have not provided a <a href='#emailvalid'>matching eMail-retype for the optional newsletter</a></label></li>";
      $olcnt++;
    }
    $inol .= "\n                  </ol>\n";
?>
                  <p><strong>Error</strong> - the submission failed due to the following <?php echo $olcnt ?> problem<?php echo ($olcnt > 1) ? "s" : ""; ?>:</p>
<?php
    echo $inol;
?>
                  <span id="annot_link_09" class="annot_link prev_sib" style="margin-left: -11.4em !important;padding-right: 11em;margin-top:2em;"><a href="#annot_09" title="09: Errors described and link provided">09</a></span>                  <p>The respective field<?php echo ($olcnt > 1) ? "s have" : " has"; ?> been marked with an asterisk (<abbr title="Required">*</abbr>) in the form below.</p><span id="annot_link_11" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:10em;"><a href="#annot_11" title="11: Errors clearly identified and with intructions">11</a></span>
                </div><?php
  }?>

                <p class="annot_link_parent">Fields are required if not otherwise noted.</p><?php
  if (!isset($submit)) {?>
                <div><span id="annot_link_01" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em; margin-top: 6em;"><a href="#annot_01" title="01: Form instructions provided">01</a></span></div><?php
  } elseif($error) {?>
                <div><span id="annot_link_10" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:13em;"><a href="#annot_10" title="10: Form instructions provided">10</a></span></div><?php
  }?>
                <fieldset id="park">
                  <legend>Favorite Park</legend>
                  <p<?php if(!$park) { echo " class=\"highlight\""; } ?>><?php if(!$park) { echo '<strong><abbr title="Required">*</abbr></strong> '; } ?>Which is your favorite city park?<?php if(!$park) { echo " <br /><strong>Select one of the following:</strong>"; } ?></p>
                  <div style="float:left; width:40%;" class="annot_link_parent">
                    <p class="input"><input type="radio" name="res" id="nn" value="1"<?php if($res=="1") { echo " checked=\"yes\""; } ?>> <label for="nn">None</label></p><?php if(!isset($submit)) {?>
                    <span id="annot_link_03" class="annot_link prev_sib" style="margin-left: -11.95em !important;padding-right: 11em;"><a href="#annot_03" title="03: Radio button is associated with its label">03</a></span><?php }?>
                    <p class="input"><input type="radio" name="res" id="cp" value="2"<?php if($res=="2") { echo " checked=\"yes\""; } ?>> <label for="cp">Central Park</label></p>
                    <p class="input"><input type="radio" name="res" id="gp" value="3"<?php if($res=="3") { echo " checked=\"yes\""; } ?>> <label for="gp">Grand Park</label></p>
                  </div>
                  <div style="float:left; width:40%;">
                    <p class="input"><input type="radio" name="res" id="jp" value="4"<?php if($res=="4") { echo " checked=\"yes\""; } ?>> <label for="jp">Jurassic Park</label></p>
                    <p class="input"><input type="radio" name="res" id="sp" value="5"<?php if($res=="5") { echo " checked=\"yes\""; } ?>> <label for="sp">South Park</label></p>
                    <p class="input"><input type="radio" name="res" id="ot" value="6"<?php if($res=="6") { echo " checked=\"yes\""; } ?>> <label for="ot">Other</label></p>
                  </div>
                </fieldset><?php if(!isset($submit)) {?>
                <div><span id="annot_link_02" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:8em;"><a href="#annot_02" title="02: Radio buttons are grouped within the code">02</a></span></div><?php }?>
                <fieldset id="city" class="annot_link_parent">
                  <legend>Greenest City</legend>
                  <p<?php if(!$city) { echo " class=\"highlight\""; } ?>><?php if(!$city) { echo '<strong><abbr title="Required">*</abbr></strong> '; } ?>Which city do you find is the greenest?<?php if(!$city) { echo " <br /><strong>Select one of the following:</strong>"; } ?></p><?php if(!isset($submit)) {?>
                  <span id="annot_link_04" class="annot_link prev_sib" style="margin-left: -11.95em !important;padding-right: 12em;margin-top:-0.5em;border-right: dashed blue 1px !important;height:1.5em;"><a href="#annot_04" title="04: Select box has title">04</a></span><?php }?>
                  <p class="input"><select name="cc" id="cc" title="cities of the world">
                    <option value="0">select a city from this list</option>
                    <optgroup label="A">
                      <option <?php $x=1; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Abu Dhabi, United Arab Emirates</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Abuja, Nigeria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Accra, Ghana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Addis Ababa, Ethiopia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Algiers, Algeria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Amman, Jordan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Amsterdam, The Netherlands</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Andorra la Vella, Andorra</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ankara, Turkey</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Antananarivo, Madagascar</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Apia, Samoa</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ashgabat, Turkmenistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Asmara, Eritrea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Astana, Kazakhstan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Asuncion, Paraguay</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Athens, Greece</option>
                    </optgroup>
                    <optgroup label="B">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Baghdad, Iraq</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Baku, Azerbaijan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bamako, Mali</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bandar Seri Begawan, Brunei</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bangkok, Thailand</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bangu, Central African Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Banjul, Gambia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Basseterre, St. Kitts and Nevis</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Beijing, China</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Beirut, Lebanon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Belmopan, Belize</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Berlin, Germany</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bern, Switzerland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bishkek, Kyrgyzstan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bissau, Guinea-Bissau</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bogota, Colombia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brasilia, Brazil</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bratislava, Slovakia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brazzaville, Congo, Republic of</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bridgetown, Barbados</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brussels, Belgium</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bucharest, Romania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Budapest, Hungary</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Buenos Aires, Argentina</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bujumbura, Burundi</option>
                    </optgroup>
                    <optgroup label="C">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Cairo, Egypt</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Canberra, Australia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Caracas, Venezuela</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Castries, St. Lucia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Chisinau, Moldova</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Colombo, Sri Lanka</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Conakry, Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Copenhagen, Denmark</option>
                    </optgroup>
                    <optgroup label="D">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dakar, Senegal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Damascus, Syria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dar es Salaam, Tanzania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dhaka, Bangladesh</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dili, East Timor</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Djibouti, Djibouti</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Doha, Qatar</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dublin, Ireland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dushanbe, Tajikistan</option>
                    </optgroup>
                    <optgroup label="E">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>El Aaiun, Western Sahara</option>
                    </optgroup>
                    <optgroup label="F">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Freetown, Sierra Leone</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Funafuti, Tuvalu</option>
                    </optgroup>
                    <optgroup label="G">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Gaborone, Botswana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Georgetown, Guyana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Guatemala City, Guatemala</option>
                    </optgroup>
                    <optgroup label="H">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Hanoi, Vietnam</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Harare, Zimbabwe</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Havana, Cuba</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Helsinki, Finland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Honiara, Solomon Islands</option>
                    </optgroup>
                    <optgroup label="I">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Islamabad, Pakistan</option>
                    </optgroup>
                    <optgroup label="J">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Jakarta, Indonesia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Jerusalem, Israel</option>
                    </optgroup>
                    <optgroup label="K">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kabul, Afghanistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kampala, Uganda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kathmandu, Nepal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Khartoum, Sudan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kiev, Ukraine</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kigali, Rwanda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kingston, Jamaica</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kingstown, St. Vincent and The Grenadines</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kinshasa, Congo, Democratic Republic of the</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Koror, Palau</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kuala Lumpur, Malaysia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kuwait City, Kuwait</option>
                    </optgroup>
                    <optgroup label="L">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Libreville, Gabon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lilongwe, Malawi</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lima, Peru</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lisbon, Portugal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ljubljana, Slovenia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lome, Togo</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>London, United Kingdom</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Luanda, Angola</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lusaka, Zambia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Luxembourg, Luxembourg</option>
                    </optgroup>
                    <optgroup label="M">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Madrid, Spain</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Majuro, Marshall Islands</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Malabo, Equatorial Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Male, Maldives</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Managua, Nicaragua</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Manama, Bahrain</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Manila, Philippines</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Maputo, Mozambique</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Maseru, Lesotho</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mbabane, Swaziland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mexico City, Mexico</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Minsk, Belarus</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mogadishu, Somalia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Monaco, Monaco</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Monrovia, Liberia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Montevideo, Uruguay</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Moroni, Comoros</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Moscow, Russian Federation</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Muscat, Oman</option>
                    </optgroup>
                    <optgroup label="N">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>N'Djamena, Chad</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nairobi, Kenya</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nassau, Bahamas</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>New Delhi, India</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Niamey, Niger</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nicosia, Cyprus</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nouakchott, Mauritania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nuku'alofa, Tonga</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nuuk, Greenland</option>
                    </optgroup>
                    <optgroup label="O">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Oslo, Norway</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ottawa - Ontario, Canada</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ouagadougou, Burkina Faso</option>
                    </optgroup>
                    <optgroup label="P">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Paris, France</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Palikir, Micronesia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Panama City, Panama</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Paramaribo, Suriname</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Phnom Penh, Cambodia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Podgorica, Montenegro</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Louis, Mauritius</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Moresby, Papua New Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Vila, Vanuatu</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port-au-Prince, Haiti</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port-of-Spain, Trinidad and Tobago</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Porto-Novo, Benin</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Prague, Czech Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Praia, Cape Verde</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Pretoria, South Africa</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Pyongyang, Korea, North</option>
                    </optgroup>
                    <optgroup label="Q">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Quito, Ecuador</option>
                    </optgroup>
                    <optgroup label="R">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rabat, Morocco</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rangoon, Burma</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Reykjavik, Iceland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Riga, Latvia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Riyadh, Saudi Arabia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rome, Italy</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Roseau, Dominica</option>
                    </optgroup>
                    <optgroup label="S">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Jose, Costa Rica</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Marino, San Marino</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Salvador, El Salvador</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sana, Yemen</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Santiago, Chile</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Santo Domingo, Dominican Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sao Tome, Sao Tome and Principe</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sarajevo, Bosnia and Herzegovina</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Seoul, Korea, South</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Singapore, Singapore</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Skopje, Macedonia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sofia, Bulgaria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>St. George's, Grenada</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>St. John's, Antigua and Barbuda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Stockholm, Sweden</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Suva, Fiji</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sucre, Bolivia</option>
                    </optgroup>
                    <optgroup label="T">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Taipei, Taiwan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tallinn, Estonia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tarawa, Kiribati</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tashkent, Uzbekistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tbilisi, Georgia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tegucigalpa, Honduras</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Teheran, Iran</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Thimphu, Bhutan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tirana, Albania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tokyo, Japan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tripoli, Libya</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tunis, Tunisia</option>
                    </optgroup>
                    <optgroup label="U">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ulan Bator, Mongolia</option>
                    </optgroup>
                    <optgroup label="V">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vaduz, Liechtenstein</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Valletta, Malta</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Victoria, Seychelles</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vienna, Austria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vientiane, Laos</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vilnius, Lithuania</option>
                    </optgroup>
                    <optgroup label="W">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Warsaw, Poland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Washington D.C., United States</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Wellington, New Zealand</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Windhoek, Namibia</option>
                    </optgroup>
                    <optgroup label="X">
                      <option disabled="disabled">-- none --</option>
                    </optgroup>
                    <optgroup label="Y">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yamoussoukro, Cote d'Ivoire</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yaounde, Cameroon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yaren, Nauru</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yerevan, Armenia</option>
                    </optgroup>
                    <optgroup label="Z">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Zagreb, Croatia</option>
                    </optgroup>
                  </select></p><?php if (!isset($submit)) {?>
                  <span id="annot_link_05" class="annot_link next_sib" style="margin-left: -11.95em !important;padding-right: 11em;margin-top:1.5em;"><a href="#annot_05" title="05: Select box with improved keyboard usability">05</a></span><?php }?>
                </fieldset>
                <fieldset class="annot_link_parent">
                  <legend>Free Newsletter (optional)</legend>
                  <p>To receive our free newsletter fill in the following details:</p>
                  <div style="width: 32em">
                    <p id="namenewsletter" class="input<?php if((!$name)||(!$title)) { echo " highlight"; } ?>"><?php if(!$name) { echo '<strong><abbr title="Required">*</abbr> Type your name'; if(!$title) { echo ' and select your title'; } echo '</strong><br> '; } elseif(!$title) { echo '<strong><abbr title="Required">*</abbr> Select your title</strong><br> '; } ?><label for="mr">Mr. <input type="radio" name="t" id="mr" value="mr" title="title"<?php if($t=="mr") { echo " checked=\"yes\""; } ?>></label> <label for="mrs">Mrs. <input type="radio" name="t" id="mrs" value="mrs" title="title"<?php if($t=="mrs") { echo " checked=\"yes\""; } ?>></label> <label for="n">Name: <input type="text" name="n" id="n" size="30" style="margin-left: 0.5em;"<?php if(strlen($n)>0) { echo " value=\"".$n."\""; } ?>></label></p>
                    <p id="emailinput" class="input<?php if(!$mail) { echo " highlight"; } ?>" style="width: 16em; float: left; margin-top: 0.5em;"><label for="em"><?php if(!$mail) { echo '<strong><abbr title="Required">*</abbr> Invalid '; } ?>eMail Address:<?php if(!$mail) { echo '</strong>'; } ?> <br><input type="text" name="em" id="em" size="20"<?php if(strlen($em)>0) { echo " value=\"".$em."\""; } ?>></label></p>
                    <p id="emailvalid" class="input<?php if(!$match) { echo " highlight"; } ?>" style="width: 16em; float: left; margin-top: 0.5em;"><label for="ev"><?php if(!$match) { echo '<strong><abbr title="Required">*</abbr> '; } ?>Retype eMail:<?php if(!$match) { echo '</strong>'; } ?> <br><input type="text" name="ev" id="ev" size="20"<?php if(strlen($ev)>0) { echo " value=\"".$ev."\""; } ?>></label></p>
                  </div><?php if (!isset($submit)) {?>
                  <span id="annot_link_06" class="annot_link parent_node" style="margin-left: -11.95em !important;padding-right: 11em;margin-top:1.5em;"><a href="#annot_06" title="06: Meaningful reading sequence">06</a></span><?php }?>
                </fieldset>
                <p class="input"><input type="submit" id="submit" value="submit" alt="submit" name="submit"></p>
                </form><?php
}?>
                <hr>
                <h2 id="surveyresults">Last Weeks's Survey Results</h2>
                <table class="qtable">
                  <caption>What is your favorite and least favorite organ?</caption>
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col">Lung</th>
                      <th scope="col">Pancreas</th>
                      <th scope="col">Spleen</th>
                      <th scope="col">Liver</th>
                      <th scope="col">Skin</th>
                      <th scope="col">Brain</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">hate it</th>
                      <td>4</td>
                      <td>10</td>
                      <td>4</td>
                      <td>0</td>
                      <td>1</td>
                      <td>0</td>
                    </tr>
                    <tr class="alt">
                      <th scope="row">love it</th>
                      <td>5</td>
                      <td>6</td>
                      <td>0</td>
                      <td>14</td>
                      <td>1</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table><?php if (!isset($submit)) {?>
                <span id="annot_link_07" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;top: auto !important;bottom:7em;"><a href="#annot_07" title="07: Table data has been properly structured">07</a></span><?php }?>
              </div>
            </div>
          </div>
          <div id="footer">
            <p><a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/"><acronym title="World Wide Web Consortium">W3C</acronym></a><sup>&reg;</sup> (<a href="http://www.csail.mit.edu/"><acronym title="Massachusetts Institute of Technology">MIT</acronym></a>, <a href="http://www.ercim.org/"><acronym title="European Research Consortium for Informatics and Mathematics">ERCIM</acronym></a>, <a href="http://www.keio.ac.jp/">Keio</a>)</p>
          </div>
        </div>
      </div>
      <div id="border_b"></div>
    <div id="annotations">
      <hr>
      <h2>Annotations</h2><?php
if (!isset($submit)) {?>
      <div id="annot_01">
        <h3>Note 01: Form instructions provided</h3>
<p>Form instructions are provided, especially with respect to required fields.</p><p class="code"><code>&lt;form action=&quot;&quot; method=&quot;post&quot;&gt; &lt;p&gt;Fields are required if not otherwise noted.&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G184">General 184</a>: Providing text instructions at the beginning of a form or set of fields that describes the necessary input</dd>
        </dl>
        <p><a href="#annot_link_01">Back to demo</a></p>
      </div>
      <div id="annot_02">
        <h3>Note 02: Radio buttons are grouped within the code</h3>
<p>Radio buttons grouped with <code>fieldset</code> element, and are described using the <code>legend</code> element.</p><p class="code"><code>&lt;fieldset id=&quot;park&quot;&gt; &lt;legend&gt;Favorite Park&lt;/legend&gt; ... &lt;/fieldset&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/H71">HTML 71</a>: Providing a description for groups of form controls using fieldset and legend elements</dd>
        </dl>
        <p><a href="#annot_link_02">Back to demo</a></p>
      </div>
      <div id="annot_03">
        <h3>Note 03: Radio button is associated with its label</h3>
<p>Radio button is associated with its label &quot;none&quot; using the <code>label</code> element.</p><p class="code"><code>&lt;input type=&quot;radio&quot; name=&quot;res&quot; id=&quot;nn&quot; value=&quot;1&quot;&gt; &lt;label for="nn"&gt;None&lt;/label&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><ul><li><a href="http://www.w3.org/TR/WCAG20-TECHS/G162">General 162</a>: Positioning labels to maximize predictability of relationships</li><li><a href="http://www.w3.org/TR/WCAG20-TECHS/H44">HTML 44</a>: Using label elements to associate text labels with form controls</li></ul></dd>
        </dl>
        <p><a href="#annot_link_03">Back to demo</a></p>
      </div>
      <div id="annot_04">
        <h3>Note 04: Select box has title</h3>
<p>Select box is captioned using the <code>title</code> element.</p><p class="code"><code>&lt;select name=&quot;cc&quot; id=&quot;cc&quot; title=&quot;cities of the world&quot;&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/H65">HTML 65</a>: Using the title attribute to identify form controls when the label element cannot be used</dd>
        </dl>
        <p><a href="#annot_link_04">Back to demo</a></p>
      </div>
      <div id="annot_05">
        <h3>Note 05: Select box with improved keyboard usability</h3>
<p>The items in this long list are grouped and sorted by city rather than by country to facilitate effective use by keyboard.</p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#keyboard-operation-keyboard-operable">Success Criterion 2.1.1 - Keyboard</a></dt>
          <dd><ul><li><a href="http://www.w3.org/TR/WCAG20-TECHS/G202">General 202</a>: Ensuring keyboard control for all functionality</li><li><a href="http://www.w3.org/TR/WCAG20-TECHS/H91">HTML 91</a>: Using HTML form controls and links</li><li>Using unique letter combinations to begin each item of a list (future link)</li></ul></dd>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#navigation-mechanisms-skip">Success Criterion 2.4.1 - Bypass Blocks</a></dt>
          <dd><ul><li><a href="http://www.w3.org/TR/WCAG20-TECHS/H69">HTML 69</a>: Providing heading elements at the beginning of each section of content</li><li>Providing keyboard access to important links and form controls (future link)</li></ul></dd>
        </dl>
        <p><a href="#annot_link_05">Back to demo</a></p>
      </div>
      <div id="annot_06">
        <h3>Note 06: Meaningful reading sequence</h3>
<p>The sequence of labels and input fields are organized to make sense when they are read in the order they appear in the code. The input fields are associated with their labels using the <code>label</code> element.</p><p class="code"><code>&lt;p id=&quot;namenewsletter&quot; class=&quot;input&quot;&gt;<br>&lt;label for=&quot;n&quot;&gt;Name:&lt;/label&gt;<br>&lt;input type=&quot;radio&quot; name=&quot;t&quot; id=&quot;mr&quot; value&quot;mr&quot; title=&quot;title&quot;&gt;&lt;label for=&quot;mr&quot;&gt;Mr.&lt;/label&gt;<br>&lt;input type&quot;radio&quot; name=&quot;t&quot; id=&quot;mrs&quot; value=&quot;mrs&quot; title=&quot;title&quot;&gt;&lt;label for=&quot;mrs&quot;&gt;Mrs.&lt;/label&gt;<br>&lt;input type=&quot;text&quot; name=&quot;n&quot; id=&quot;n&quot; size=&quot;30&quot; style=&quot;margin-left: 0.5em;&quot;&gt;&lt;/p&gt;<br>&lt;p id=&quot;emailinput&quot; class=&quot;input&quot; style=&quot;width: 16em; float: left; margin-top: 0.5em;&quot;&gt;<br>&lt;input type=&quot;text&quot; name=&quot;em&quot; id=&quot;em&quot; size=&quot;20&quot;&gt;&lt;br&gt;&lt;label for=&quot;em&quot;&gt;eMail Address&lt;/label&gt;&lt;/p&gt;<br>&lt;p id=&quot;emailvalid&quot; class=&quot;input&quot; style=&quot;width: 16em; float: left; margin-top: 0.5em;&quot;&gt;<br>&lt;input type=&quot;text&quot; name=&quot;ev&quot; id=&quot;ev&quot; size=&quot;20&quot;&gt;&lt;br&gt;&lt;label for=&quot;ev&quot;&gt;Retype eMail&lt;/label&gt;&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#content-structure-separation-sequence">Success Criterion 1.3.2 - Meaningful Sequence</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G57">General 57</a>: Ordering the content in a meaningful sequence</dd>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#navigation-mechanisms-focus-order">Success Criterion 2.4.3 - Focus Order</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G59">General 59</a>: Placing the interactive elements in an order that follows sequences and relationships within the content</dd>
        </dl>
        <p><a href="#annot_link_06">Back to demo</a></p>
      </div>
      <div id="annot_07">
        <h3>Note 07: Table data has been properly structured</h3>
<p>Data in this table is organized using corresponding table structures such as the <code>th</code> and <code>td</code> elements.</p><p class="code"><code>&lt;th scope=&quot;row&quot;&gt;hate it&lt;th&gt;<br>...<br>&lt;th scope=&quot;row&quot;&gt;hate it&lt;th&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#content-structure-separation-programmatic">Success Criterion 1.3.1 - Info and Relationships</a></dt>
          <dd><ul><li><a href="http://www.w3.org/TR/WCAG20-TECHS/G140">General 140</a>: Separating information and structure from presentation to enable different presentations</li><li><a href="http://www.w3.org/TR/WCAG20-TECHS/H51">HTML 51</a>: Using table markup to present tabular information</li><li><a href="http://www.w3.org/TR/WCAG20-TECHS/H63">HTML 63</a>: Using the scope attribute to associate header cells and data cells in data tables</li></ul></dd>
        </dl>
        <p><a href="#annot_link_07">Back to demo</a></p>
      </div><?php
} else {
  if ($error) {?>
      <div id="annot_08">
        <h3>Note 08: Informative error message</h3>
<p>Clear error message that clarifies why focus was reset to top of form after submission.</p><p class="code"><code>&lt;p&gt;&lt;strong&gt;Error&lt;strong&gt; - the submission failed due to the following 2 problems:&lt;/p&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Success Criterion 3.3.1 - Error Identification</a></dt>
          <dd>Advisory Technique: Re-displaying a form with a summary of errors (future link)</dd>
        </dl>
        <p><a href="#annot_link_08">Back to demo</a></p>
      </div>
      <div id="annot_09">
        <h3>Note 09: Errors described and link provided</h3>
<p>Individual errors are described and linked to the appropiate part of form for correction.</p><p class="code"><code>&lt;li&gt;You have not selected a &lt;a href=&quot;#park&quot;&gt;favorite park&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;label for=&quot;cc&quot;&gt;You have not selected a &lt;a href=&quot;#city&quot;&gt;greenest city&lt;/a&gt;&lt;/legend&gt;&lt;/li&gt;</code></p><p>Note: The <code>legend</code> element can be used more than once to caption a form input.</p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Success Criterion 3.3.1 - Error Identification </a></dt>
          <dd><ul><li><a href="http://www.w3.org/TR/WCAG20-TECHS/G83">General 83</a>: Providing text descriptions to identify required fields that were not completed</li><li><a href="http://www.w3.org/TR/WCAG20-TECHS/G139">General 139:</a> Creating a mechanism that allows users to jump to errors</li></ul></dd>
        </dl>
        <p><a href="#annot_link_09">Back to demo</a></p>
      </div>
      <div id="annot_10">
        <h3>Note 10: Form instructions provided</h3>
<p>Form instructuions are provided (again), especially with respect to required fields.</p><p class="code"><code>&lt;form action=&quot;&quot; method=&quot;post&quot;&gt; &lt;p&gt;Fields are required if not otherwise noted.&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G184">General 184</a>: Providing text instructions at the beginning of a form or set of fields that describes the necessary input</dd>
        </dl>
        <p><a href="#annot_link_10">Back to demo</a></p>
      </div>
      <div id="annot_11">
        <h3>Note 11: Errors clearly identified and with intructions</h3>
<p>Errors are clearly identified using color coding, underline, and asterisk, and instructions are provided to guide the user to fill out the form fields correctly.</p><p class="code"><code>&lt;abbr title=&quot;Required&quot;&gt;*&lt;/abbr&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Success Criterion 3.3.1 - Error Identification</a></dt>
          <dd><ul><li>Advisory Technique: Highlighting or visually emphasizing errors where they occur (future link)</li><li>Advisory Technique: Supplementing text with non-text content when reporting errors (future link)</li></ul></dd>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.2 - Labels or Instructions</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G83">General 83</a>: Providing text descriptions to identify required fields that were not completed</dd>
        </dl>
        <p><a href="#annot_link_11">Back to demo</a></p>
      </div><?php
  } else {?>
      <div id="annot_12">
        <h3>Note 12: Indication of successful form completion</h3>
<p>Confirmation of successful form completion is clearly indicated.</p><p class="code"><code>&lt;p id=&quot;submissionsuccess&quot;&gt;Thank you for submitting your vote, it has been successfully recorded.&lt;/p&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Success Criterion 3.3.1 - Error Identification</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G199">General 199</a>: Providing success feedback when data is submitted successfully</dd>
        </dl>
        <p><a href="#annot_link_12">Back to demo</a></p>
      </div><?php
  }
}?>
    </div>
  </div>
    <div id="meta-footer" class="meta">
      <hr>
      <p><strong>Status:</strong> 20 February 2012 (see <a href="../../changelog.html">changelog</a>) <br>Editors: <a href="http://www.w3.org/People/shadi/">Shadi Abou-Zahra</a> and the <a href="http://www.w3.org/WAI/EO/">Education and Outreach Working Group (EOWG)</a>. <br>Developed with support from <a href="http://www.w3.org/WAI/TIES/"><acronym title="Web Accessibility Initiative: Training, Implementation, Education, Support">WAI-TIES</acronym></a> and <a href="http://www.w3.org/WAI/WAI-AGE/"><acronym title="Web Accessibility Initiative: Ageing Education and Harmonisation">WAI-AGE</acronym></a> projects, co-funded by the European Commission <acronym title="Information Society Technologies">IST</acronym> Programme. [see <a href="../../acks.html">Acknowledgements</a>]</p>
      <p>[<a href="http://www.w3.org/WAI/sitemap.html" shape="rect">WAI Site Map</a>] [<a href="http://www.w3.org/WAI/sitehelp.html" shape="rect">Help with WAI Website</a>] [<a href="http://www.w3.org/WAI/search.php" shape="rect">Search</a>] [<a href="http://www.w3.org/WAI/contacts" shape="rect">Contacting WAI</a>] <br><strong>Feedback welcome to <a href="mailto:wai-eo-editors@w3.org" shape="rect">wai-eo-editors@w3.org</a></strong> (a publicly archived list) or <a href="mailto:wai@w3.org" shape="rect">wai@w3.org</a> (a WAI staff-only list).</p>
      <div class="copyright"><p><a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/"><acronym title="World Wide Web Consortium">W3C</acronym></a><sup>&reg;</sup> (<a href="http://www.csail.mit.edu/"><acronym title="Massachusetts Institute of Technology">MIT</acronym></a>, <a href="http://www.ercim.org/"><acronym title="European Research Consortium for Informatics and Mathematics">ERCIM</acronym></a>, <a href="http://www.keio.ac.jp/">Keio</a>), All Rights Reserved. W3C <a href="http://www.w3.org/Consortium/Legal/ipr-notice#Legal_Disclaimer">liability</a>, <a href="http://www.w3.org/Consortium/Legal/ipr-notice#W3C_Trademarks">trademark</a>, <a rel="Copyright" href="http://www.w3.org/Consortium/Legal/copyright-documents">document use</a> and <a rel="Copyright" href="http://www.w3.org/Consortium/Legal/copyright-software">software licensing</a> rules apply. Your interactions with this site are in accordance with our <a href="http://www.w3.org/Consortium/Legal/privacy-statement#Public">public</a> and <a href="http://www.w3.org/Consortium/Legal/privacy-statement#Members">Member</a> privacy statements.</p></div>
    </div>
    <div id="lightbox_background"><div id="lightbox_container"></div></div>
  </body>
</html>