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
<HTML>
  <HEAD>
<TITLE><?php
if(isset($submit)) {
  if (!$error) {
    echo "Citylights Survey - Submission Completed [Inccessible Survey Page]";
  } else {
    echo "Citylights Survey - Submission Failed [Inccessible Survey Page]";
  }
} else {
  echo "Citylights Survey [Inccessible Survey Page]";
}?></TITLE>    <STYLE>
      body { 
        color: #000; 
      }
      #main p, td, form {
        color: #000000;
        font: normal 15px/17px "Times New Roman", Times, serif;
        text-decoration: none;
      }
      #main .headline {
        margin-top: 0px;
        color: #41545d;
        font: 24px verdana;
        font-family: impact;
        text-decoration: none;
      }
      .comment {
        margin-top: 1em;
      }
      .hundred {
        font-size: 100%;
      }
      .bordotabella {
        background: #ededed;
        border: 2px solid gray;
      }
      .bordotabellacapitolo {
        background: #a9b8bf;
      }
    </STYLE>
    <LINK HREF="../css/meta.css" rel="stylesheet" type="text/css">
    <SCRIPT type="text/javascript">
      function ChangeColor(id, colour){
        document.getElementById(id).style.backgroundColor=colour;
      }
      function switchImage(imgName, imgSrc){
        if (document.images){
          if (imgSrc != "none"){
              document.images[imgName].src = imgSrc;
          }
        }
      }
    </SCRIPT> 
    <NOSCRIPT><B><FONT COLOR=RED>This page uses scripts!!!</FONT></B></NOSCRIPT>
    <script src="../js/onload.js" type="text/javascript"></script>
  </HEAD>
  <BODY TEXT=#000000 BGCOLOR=#D7D7CD LEFTMARGIN=0px TOPMARGIN=0px MARGINWIDTH=0px MARGINHEIGHT=0px LINK=#226C8E VLINK=#226C8E ALINK=#226C8E>
    <div id="meta-header">
      <p id="skipnav"><a href="#page">Skip to inaccessible demo page</a></p>
      <p id="logos"><a href="http://www.w3.org/" title="W3C Home"><img alt="W3C logo" src="../img/w3c.png" height="48" width="72"></a><a href="http://www.w3.org/WAI/" title="WAI Home"><img alt="Web Accessibility Initiative (WAI) logo" src="../img/wai.png" height="48"></a></p>
      <h1><span class="subhead">Inaccessible Survey Page</span><span class="hidden"> -</span> Before and After Demonstration</h1>
      <p class="subline">Improving a Web site using Web Content Accessibility Guidelines (WCAG) 2.0</p>
      <div id="mnav" class="inaccessible">
        <ul>
          <li class="first"><a href="../Overview.html">Overview</a></li>
          <li class="first"><a href="home.html">Home</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="tickets.html">Tickets</a></li>
          <li class="current"><span class="hidden">Current location: </span>Survey
            <div class="subnav"><ul>
              <li class="inaccessible"><strong>Inaccessible:</strong><a class="page current"><span class="hidden">Inaccessible </span>Survey Page</a><a href="./reports/survey.html" class="report"><span class="hidden">Inaccessible Survey Page </span> Report</a></li>
              <li class="accessible"><strong>Accessible:</strong><a href="../after/survey.html" class="page"><span class="hidden">Accessible </span>Survey Page</a><a href="../after/reports/survey.html" class="report"><span class="hidden">Accessible Survey Page </span> Report</a></li>
            </ul><a href="./annotated/survey.html" class="annotoggle">Show <br>Annotations</a></div>
          </li>
          <li><a href="template.html">Template</a></li>
        </ul>
      </div>
    </div>
    <div id="page">
    <p class="skip" id="startcontent">Demo starts here</p>
    <TABLE WIDTH=100% BORDER=0px CELLSPACING=0px CELLPADDING=0px BGCOLOR=#D7D7CD><TR VALIGN=MIDDLE><TD WIDTH=100% ALIGN=CENTER>
    <TABLE WIDTH=800px BORDER=0px CELLSPACING=0px CELLPADDING=0px BGCOLOR=WHITE>
      <TR HEIGHT=10px>
        <TD WIDTH=10px BACKGROUND=./img/border_left_top.gif><IMG SRC=./img/border_left_top.gif WIDTH=10px HEIGHT=10px></TD>
        <TD WIDTH=780px BACKGROUND=./img/border_top.gif><IMG SRC=./img/border_top.gif HEIGHT=10px></TD>
        <TD WIDTH=10px BACKGROUND=./img/border_right_top.gif><IMG SRC=./img/border_right_top.gif WIDTH=10px HEIGHT=10px></TD>
      </TR>
      <TR>
        <TD WIDTH=10px BACKGROUND=./img/border_left.gif><IMG SRC=./img/border_left.gif WIDTH=10px></TD>
        <TD WIDTH=780px ALIGN=CENTER>
    <TABLE WIDTH=780px HEIGHT=144px BORDER=0px CELLSPACING=0px CELLPADDING=0px BGCOLOR=WHITE>
      <TR HEIGHT=86px>
        <TD WIDTH=443px BACKGROUND=./img/top_logo_next.gif VALIGN=MIDDLE><DIV><A HREF=home.html><IMG SRC=./img/top_logo.gif WIDTH=443px HEIGHT=86px ALT="Red dot with a white letter 'C' that symbolizes a moon crescent as well as the sun. This logo is followed by a black banner that says 'CITYLIGHTS' which is the name of this online portal. Finally, the slogan of the portal, 'your access to the city', follows in a turquoise green handwriting style and with a slight slant across the top banner."></A></DIV></TD>
        <TD WIDTH=24px VALIGN=MIDDLE><IMG SRC=./img/top_logo_next_end.gif WIDTH=24px HEIGHT=86px></TD>
        <TD WIDTH=128px VALIGN=MIDDLE><IMG SRC=./img/top_weather.gif WIDTH=128px HEIGHT=86px></TD>
        <TD WIDTH=22px VALIGN=MIDDLE><IMG SRC=./img/top_logo_next_start.gif WIDTH=22px HEIGHT=86px></TD>
        <TD WIDTH=163px BACKGROUND=./img/top_logo_next.gif ALIGN=CENTER VALIGN=MIDDLE>
          <SELECT ONCHANGE="location.href = this.value;">
            <OPTION SELECTED>QUICKMENU ----&gt;
            <OPTION VALUE="../offsite.html">Broadcasting
            <OPTION VALUE="../offsite.html">Education
            <OPTION VALUE="../offsite.html">Electricity
            <OPTION VALUE="../offsite.html">Fire service
            <OPTION VALUE="../offsite.html">Gas service
            <OPTION VALUE="../offsite.html">Health care
            <OPTION VALUE="../offsite.html">Police service
            <OPTION VALUE="../offsite.html">Public Libraries
            <OPTION VALUE="../offsite.html">Social services
            <OPTION VALUE="../offsite.html">Social housing
            <OPTION VALUE="../offsite.html">Telecommunications
            <OPTION VALUE="../offsite.html">Town planning
            <OPTION VALUE="../offsite.html">Transportation
            <OPTION VALUE="../offsite.html">Waste management
            <OPTION VALUE="../offsite.html">Water services
          </SELECT>
        </TD>
      </TR>
      <TR HEIGHT=7px>
        <TD WIDTH=780px BACKGROUND=./img/mark.gif COLSPAN=5><IMG SRC=./img/mark.gif WIDTH=158px HEIGHT=7px></TD>
      </TR>
      <TR HEIGHT=25px>
        <TD COLSPAN=5>
          <TABLE WIDTH=780px BORDER=0px CELLSPACING=0px CELLPADDING=0px>
            <TR HEIGHT=25px>
              <TD BGCOLOR="#EDEDED" WIDTH=380px><FONT COLOR=BLACK FACE=Verdana SIZE=2>&nbsp;&nbsp;<B>Traffic:</B> Construction work on Main Road</FONT></TD>
              <TD BGCOLOR="#FFFFFF" ALIGN=RIGHT ID="WEATHER"><FONT COLOR=BLACK FACE=Verdana SIZE=2><B>Today:</B> 
                <SCRIPT LANGUAGE="JavaScript">
                  var now = new Date();
                  var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                  var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
                  function fourdigits(number)	{
                    return (number < 1000) ? number + 1900 : number;
                  }
                  today =  days[now.getDay()] + " " + date + " " + months[now.getMonth()] + " " + (fourdigits(now.getYear())) + ", Sunny, 23&deg;C&nbsp;&nbsp;</FONT>";
                  document.all.WEATHER.setAttribute("BGCOLOR", "#EDEDED", 0);
                  document.write(today);
                </SCRIPT></TD>
            </TR>
          </TABLE>
        </TD>
      </TR>
      <TR HEIGHT=1px>
        <TD WIDTH=780px BACKGROUND=./img/marker2_w.gif COLSPAN=5><IMG SRC=.img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
      </TR>
      <TR HEIGHT=25px>
        <TD COLSPAN=5>&nbsp;</TD>
      </TR>
    </TABLE>
    <TABLE WIDTH=780px BORDER=0px CELLSPACING=0px CELLPADDING=0px BGCOLOR=WHITE>
      <TR WIDTH=780px>
        <TD WIDTH=155px BGCOLOR=#E4E4E4 VALIGN=TOP>
          <TABLE WIDTH=155px BORDER=0px CELLSPACING=0px CELLPADDING=0px>
            <TR HEIGHT=1px>
              <TD WIDTH=155px BACKGROUND=./img/marker2_w.gif><IMG SRC=./img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
              <TD WIDTH=1px BACKGROUND=./img/marker2_t.gif ROWSPAN=9 VALIGN=TOP><IMG SRC=./img/marker2_t.gif WIDTH=1 HEIGHT=30px></TD>
            </TR>
            <TR HEIGHT=34px>
              <TD WIDTH=154px bgcolor="#EDEDED" id="home" onMouseOver="switchImage('nav_home', './img/nav_home2.gif'); ChangeColor('home','#FFF')" onMouseOut="switchImage('nav_home', './img/nav_home.gif'); ChangeColor('home','#EDEDED')"><A HREF="javascript:location.href='home.html';" onFocus="blur();"><img name="nav_home" src=./img/nav_home.gif width=88 height=27 hspace="15" border=0px></a></TD>
            </TR>
            <TR HEIGHT=1px>
              <TD WIDTH=154px BACKGROUND=./img/marker2_w.gif><IMG SRC=./img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
            </TR>
            <TR HEIGHT=34px>
              <TD WIDTH=154px bgcolor="#EDEDED" id="news" onMouseOver="switchImage('nav_news', './img/nav_news2.gif'); ChangeColor('news','#FFF')" onMouseOut="switchImage('nav_news', './img/nav_news.gif'); ChangeColor('news','#EDEDED')"><A HREF="javascript:location.href='news.html';" ONFOCUS="blur();"><IMG SRC=./img/nav_news.gif name="nav_news" WIDTH=90 HEIGHT=21 hspace="12" BORDER=0px></A></TD>
            </TR>
            <TR HEIGHT=1px>
              <TD WIDTH=154px BACKGROUND=./img/marker2_w.gif><IMG SRC=./img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
            </TR>
            <TR HEIGHT=34px>
              <TD WIDTH=154px bgcolor="#EDEDED" id="tickets" onMouseOver="switchImage('nav_facts', './img/nav_facts2.gif'); ChangeColor('tickets','#FFF')" onMouseOut="switchImage('nav_facts', './img/nav_facts.gif'); ChangeColor('tickets','#EDEDED')"><A HREF="javascript:location.href='tickets.html';" ONFOCUS="blur();"><IMG name="nav_facts" SRC=./img/nav_facts.gif WIDTH=105 HEIGHT=23 hspace="9" BORDER=0px></A></TD>
            </TR>
            <TR HEIGHT=1px>
              <TD WIDTH=154px BACKGROUND=./img/marker2_w.gif><IMG SRC=./img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
            </TR>
            <TR HEIGHT=34px>
              <TD WIDTH=154px bgcolor="#EDEDED" id="survey" onMouseOver="switchImage('nav_survey', './img/nav_survey2.gif'); ChangeColor('survey','#FFF')" onMouseOut="switchImage('nav_survey', './img/nav_survey.gif'); ChangeColor('survey','#EDEDED')"><A HREF="javascript:location.href='survey.html';" ONFOCUS="blur();"><IMG SRC=./img/nav_survey.gif name="nav_survey" WIDTH=107 HEIGHT=32 hspace="8" BORDER=0px></A></TD>
            </TR>
            <TR HEIGHT=1px>
              <TD WIDTH=154px BACKGROUND=./img/marker2_w.gif><IMG SRC=./img/marker2_w.gif WIDTH=78px HEIGHT=1px></TD>
            </TR>
          </TABLE>
        </TD>
        <TD WIDTH=20px><IMG SRC=./img/blank_5x5.gif WIDTH=20px HEIGHT=5px></TD>
        <TD WIDTH=625px HEIGHT="600px" VALIGN=TOP id="main"><DIV>
          <p class="headline">Citylights Survey</p><?php
if(isset($submit)&&(!$error)) { /* successful submission */ ?>
          <p>&nbsp;</p><?php
} else { /* print submission form */ ?>
          <p class="headline"><font size="4">This Week's Survey: More city parks - a pain or a gain?</font></p>
            <form action="survey.php" method="post">
            <table class="bordotabella" width="90%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td>
                  <table width="122" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                      <td><IMG SRC="./img/gif.gif" alt="" height="25" width="11" border="0"></td>
                      <td>
                        <table width="500" border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td colspan="4"><IMG SRC="./img/gif.gif" alt="" height="10" width="10" border="0"></td>
                          </tr><?php
  if(isset($submit)&&(!$park)) {?>
                          <tr>
                            <th align="left" colspan="3"><span><font color="red">Which is your favorite city park?</font></span></th>
                            <td height="31%"><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                          </tr><?php
  } else {?>
                          <tr>
                            <th align="left" colspan="3"><span>Which is your favorite city park?</span></th>
                            <td height="31%"><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                          </tr><?php
  }?>
                          <tr height="72">
                            <td valign="top" width="35" height="72">
                              <table width="34" border="0" cellspacing="2" cellpadding="0">
                                <tr height="31%">
                                  <td width="24"><input class="align" type="radio" name="res" value="1"></td>
                                  <td height="31%"><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="24"><span><input class="align" type="radio" name="res" value="2"></span></td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="24"><input class="align" type="radio" name="res" value="3"></td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                              </table>
                            </td>
                            <td valign="top" height="72">
                              <table width="200" border="0" cellspacing="2" cellpadding="0">
                                <tr height="35%">
                                  <td width="135" height="35%">None</td>
                                  <td width="191" height="35%"><IMG SRC="./img/gif.gif" alt="" height="25" width="10" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="135">Central Park</td>
                                  <td width="191"><IMG SRC="./img/gif.gif" alt="" height="25" width="17" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="135">Grand Park</td>
                                  <td width="191"><IMG SRC="./img/gif.gif" alt="" height="25" width="17" border="0"></td>
                                </tr>
                              </table>
                            </td>
                            <td valign="top" width="35" height="72">
                              <table width="34" border="0" cellspacing="2" cellpadding="0">
                                <tr height="31%">
                                  <td width="24"><input class="align" type="radio" name="res" value="4"></td>
                                  <td height="31%"><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="24"><input class="align" type="radio" name="res" value="5"></td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="24"><input class="align" type="radio" name="res" value="6"></td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                </tr>
                              </table>
                            </td>
                            <td valign="top" height="72">
                              <table width="200" border="0" cellspacing="2" cellpadding="0">
                                <tr height="35%">
                                  <td width="135" height="35%">Jurassic Park</td>
                                  <td width="191" height="35%"><IMG SRC="./img/gif.gif" alt="" height="25" width="10" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="135">South Park</td>
                                  <td width="191"><IMG SRC="./img/gif.gif" alt="" height="25" width="17" border="0"></td>
                                </tr>
                                <tr>
                                  <td width="135">Other</td>
                                  <td width="191"><IMG SRC="./img/gif.gif" alt="" height="25" width="17" border="0"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <p></p>
            <table class="bordotabella" width="90%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td>
                  <table border="0" cellspacing="2" cellpadding="0">
                    <tr>
                      <td><IMG SRC="./img/gif.gif" alt="" height="25" width="11" border="0"></td>
                      <td>
                        <table border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td colspan="2"><IMG SRC="./img/gif.gif" alt="" height="10" width="10" border="0"></td>
                          </tr><?php
  if(isset($submit)&&(!$city)) {?>
                          <tr>
                            <th align="left" colspan="2"><font color="red">Which city do you find is the greenest?</font><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></th>
                          </tr><?php
  } else {?>
                          <tr>
                            <th align="left" colspan="2">Which city do you find is the greenest?<IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></th>
                          </tr><?php
  }?>
                          <tr>
                            <td valign="middle" colspan="2"><span> 
                                <select name="cc">
                                  <option value="0">select a city -----></option>
                                  <option>Afghanistan, Kabul</option>
                                  <option>Albania, Tirana</option>
                                  <option>Algeria, Algiers</option>
                                  <option>Andorra, Andorra la Vella</option>
                                  <option>Angola, Luanda</option>
                                  <option>Antigua and Barbuda, Saint John's</option>
                                  <option>Argentina, Buenos Aires</option>
                                  <option>Armenia, Yerevan</option>
                                  <option>Australia, Canberra</option>
                                  <option>Austria, Vienna</option>
                                  <option>Azerbaijan, Baku (Baki)</option>
                                  <option>Bahamas, The Nassau</option>
                                  <option>Bahrain, Manama</option>
                                  <option>Bangladesh, Dhaka</option>
                                  <option>Barbados, Bridgetown</option>
                                  <option>Belarus, Minsk</option>
                                  <option>Belgium, Brussels</option>
                                  <option>Belize, Belmopan</option>
                                  <option>Benin, Porto-Novo</option>
                                  <option>Bhutan, Thimphu</option>
                                  <option>Bolivia, Sucre</option>
                                  <option>Bosnia and Herzegovina, Sarajevo</option>
                                  <option>Botswana, Gaborone</option>
                                  <option>Brazil, Brasilia</option>
                                  <option>Brunei, Bandar Seri Begawan</option>
                                  <option>Bulgaria, Sofia</option>
                                  <option>Burkina Faso, Ouagadougou</option>
                                  <option>Burma, Rangoon</option>
                                  <option>Burundi, Bujumbura</option>
                                  <option>Cambodia, Phnom Penh</option>
                                  <option>Cameroon, Yaounde</option>
                                  <option>Canada, Ottawa</option>
                                  <option>Cape Verde, Praia</option>
                                  <option>Central African Republic, Bangui</option>
                                  <option>Chad, N'Djamena</option>
                                  <option>Chile, Santiago</option>
                                  <option>China, Beijing</option>
                                  <option>Colombia, Bogota</option>
                                  <option>Comoros, Moroni</option>
                                  <option>Congo, Democratic Republic of the, Kinshasa</option>
                                  <option>Congo, Republic of the, Brazzaville</option>
                                  <option>Cook Islands, Avarua</option>
                                  <option>Costa Rica, San Jose</option>
                                  <option>Cote d'Ivoire, Yamoussoukro</option>
                                  <option>Croatia, Zagreb</option>
                                  <option>Cuba, Havana</option>
                                  <option>Cyprus, Nicosia</option>
                                  <option>Czech Republic, Prague</option>
                                  <option>Denmark, Copenhagen</option>
                                  <option>Djibouti, Djibouti</option>
                                  <option>Dominica, Roseau</option>
                                  <option>Dominican Republic, Santo Domingo</option>
                                  <option>East Timor, Dili</option>
                                  <option>Ecuador, Quito</option>
                                  <option>Egypt, Cairo</option>
                                  <option>El Salvador, San Salvador</option>
                                  <option>Equatorial Guinea, Malabo</option>
                                  <option>Eritrea, Asmara</option>
                                  <option>Estonia, Tallinn</option>
                                  <option>Ethiopia, Addis Ababa</option>
                                  <option>Fiji, Suva</option>
                                  <option>Finland, Helsinki</option>
                                  <option>France, Paris</option>
                                  <option>French Guiana, Cayenne</option>
                                  <option>Gabon, Libreville</option>
                                  <option>Gambia, The, Banjul</option>
                                  <option>Georgia, T'bilisi</option>
                                  <option>Germany, Berlin</option>
                                  <option>Ghana, Accra</option>
                                  <option>Greece, Athens</option>
                                  <option>Grenada, Saint George's</option>
                                  <option>Guatemala, Guatemala</option>
                                  <option>Guinea, Conakry</option>
                                  <option>Guinea-Bissau, Bissau</option>
                                  <option>Guyana, Georgetown</option>
                                  <option>Haiti, Port-au-Prince</option>
                                  <option>Holy See (Vatican City), Vatican City</option>
                                  <option>Honduras, Tegucigalpa</option>
                                  <option>Hong Kong, Hong Kong</option>
                                  <option>Hungary, Budapest</option>
                                  <option>Iceland, Reykjavik</option>
                                  <option>India, New Delhi</option>
                                  <option>Indonesia, Jakarta</option>
                                  <option>Iran, Tehran</option>
                                  <option>Iraq, Baghdad</option>
                                  <option>Ireland, Dublin</option>
                                  <option>Israel, Jerusalem</option>
                                  <option>Italy, Rome</option>
                                  <option>Jamaica, Kingston</option>
                                  <option>Japan, Tokyo</option>
                                  <option>Jordan, Amman</option>
                                  <option>Kazakhstan, Astana</option>
                                  <option>Kenya, Nairobi</option>
                                  <option>Kiribati, Tarawa</option>
                                  <option>Korea, North, P'yongyang</option>
                                  <option>Korea, South, Seoul</option>
                                  <option>Kuwait, Kuwait</option>
                                  <option>Kyrgyzstan, Bishkek</option>
                                  <option>Laos, Vientiane</option>
                                  <option>Latvia, Riga</option>
                                  <option>Lebanon, Beirut</option>
                                  <option>Lesotho, Maseru</option>
                                  <option>Liberia, Monrovia</option>
                                  <option>Libya, Tripoli</option>
                                  <option>Liechtenstein, Vaduz</option>
                                  <option>Lithuania, Vilnius</option>
                                  <option>Luxembourg, Luxembourg</option>
                                  <option>Macau, Macau</option>
                                  <option>Macedonia, The Former Yugoslav Republic of, Skopje</option>
                                  <option>Madagascar, Antananarivo</option>
                                  <option>Malawi, Lilongwe</option>
                                  <option>Malaysia, Kuala Lumpur</option>
                                  <option>Maldives, Male</option>
                                  <option>Mali, Bamako</option>
                                  <option>Malta, Valletta</option>
                                  <option>Marshall Islands, Majuro</option>
                                  <option>Mauritania, Nouakchott</option>
                                  <option>Mauritius, Port Louis</option>
                                  <option>Mexico, Mexico (Distrito Federal)</option>
                                  <option>Micronesia, Federated States of, Palikir</option>
                                  <option>Moldova, Chisinau</option>
                                  <option>Monaco, Monaco</option>
                                  <option>Mongolia, Ulaanbaatar</option>
                                  <option>Morocco, Rabat</option>
                                  <option>Mozambique, Maputo</option>
                                  <option>Namibia, Windhoek</option>
                                  <option>Nauru, Yaren District</option>
                                  <option>Nepal, Kathmandu</option>
                                  <option>Netherlands, Amsterdam</option>
                                  <option>New Zealand, Wellington</option>
                                  <option>Nicaragua, Managua</option>
                                  <option>Niger, Niamey</option>
                                  <option>Nigeria, Abuja</option>
                                  <option>Niue, Alofi</option>
                                  <option>Norway, Oslo</option>
                                  <option>Oman, Muscat</option>
                                  <option>Pakistan, Islamabad</option>
                                  <option>Palau, Koror</option>
                                  <option>Papua New Guinea, Port Moresby</option>
                                  <option>Paraguay, Asuncion</option>
                                  <option>Peru, Lima</option>
                                  <option>Philippines, Manila</option>
                                  <option>Poland, Warsaw</option>
                                  <option>Romania, Bucharest</option>
                                  <option>Russia, Moscow</option>
                                  <option>Rwanda, Kigali</option>
                                  <option>Saint Kitts and Nevis, Basseterre</option>
                                  <option>Saint Lucia, Castries</option>
                                  <option>Saint Vincent and the Grenadines, Kingstown</option>
                                  <option>Samoa, Apia</option>
                                  <option>San Marino, San Marino</option>
                                  <option>Sao Tome and Principe, Sao Tome</option>
                                  <option>Saudi Arabia, Riyadh</option>
                                  <option>Senegal, Dakar</option>
                                  <option>Serbia and Montenegro, Belgrade</option>
                                  <option>Seychelles, Victoria</option>
                                  <option>Sierra Leone, Freetown</option>
                                  <option>Singapore, Singapore</option>
                                  <option>Slovakia, Bratislava</option>
                                  <option>Slovenia, Ljubljana</option>
                                  <option>Solomon Islands, Honiara</option>
                                  <option>Somalia, Mogadishu</option>
                                  <option>South Africa, Pretoria, Cape Town</option>
                                  <option>Spain, Madrid</option>
                                  <option>Sri Lanka, Colombo</option>
                                  <option>Sudan, Khartoum</option>
                                  <option>Suriname, Paramaribo</option>
                                  <option>Swaziland, Mbabane, Lobamba</option>
                                  <option>Sweden, Stockholm</option>
                                  <option>Switzerland, Bern</option>
                                  <option>Syria, Damascus</option>
                                  <option>Taiwan, Taipei</option>
                                  <option>Tajikistan, Dushanbe</option>
                                  <option>Tanzania, Dar es Salaam</option>
                                  <option>Thailand, Bangkok</option>
                                  <option>Togo, Lome</option>
                                  <option>Tonga, Nuku'alofa</option>
                                  <option>Trinidad and Tobago, Port-of-Spain</option>
                                  <option>Tunisia, Tunis</option>
                                  <option>Turkey, Ankara</option>
                                  <option>Turkmenistan, Ashgabat</option>
                                  <option>Tuvalu, Fongafale</option>
                                  <option>Uganda, Kampala</option>
                                  <option>Ukraine, Kiev</option>
                                  <option>United Arab Emirates, Abu Dhabi</option>
                                  <option>United Kingdom, London</option>
                                  <option>United States of America, Washington, D.C.</option>
                                  <option>Uruguay, Montevideo</option>
                                  <option>Uzbekistan, Tashkent</option>
                                  <option>Vanuatu, Port-Vila</option>
                                  <option>Venezuela, Caracas</option>
                                  <option>Vietnam, Hanoi</option>
                                  <option>Yemen, Sanaa</option>
                                  <option>Zambia, Lusaka</option>
                                  <option>Zimbabwe, Harare</option>
                                </select></span><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0">
                                <p></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <p></p>
            <table class="bordotabella" width="90%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td>
                  <table border="0" cellspacing="2" cellpadding="0">
                    <tr>
                      <td><IMG SRC="./img/gif.gif" alt="" height="25" width="11" border="0"></td>
                      <td>
                        <table border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td colspan="2"><IMG SRC="./img/gif.gif" alt="" height="10" width="10" border="0"></td>
                          </tr>
                          <tr>
                            <th align="left" colspan="2"><span>Do you want to receive a free newsletter?<IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></span></th>
                          </tr><?php
if(isset($submit)) { 
  if(!$name) {?>
                          <tr>
                            <td><font color="red">No name provided for the newsletter.</font></td>
                          </tr><?php
  } elseif(!$title) {?>
                          <tr>
                            <td><font color="red">No title provided for your name.</font></td>
                          </tr><?php
  } elseif(!$mail) {?>
                          <tr>
                            <td><font color="red">Incorrect eMail address provided.</font></td>
                          </tr><?php
  } elseif(!$match) { ?>
                          <tr>
                            <td><font color="red">eMail address does not match verification.</font></td>
                          </tr><?php
  }
}?>
                          <tr>
                            <td>
                              <table border="0" cellspacing="2" cellpadding="0">
                                <tr>
                                  <td valign="bottom"><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"><nobr>Name: <input type="radio" name="t" value="mr"> Mr. <input type="radio" name="t" value="mrs"> Mrs.</nobr><br /><br /><input type="text" name="em" id="em" size="20" /></td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                  <td valign="bottom"><input type="text" name="n" id="n" size="30" /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ev" id="ev" size="20" /></td>
                                </tr>
                                <tr>
                                  <td valign="top">eMail Address</td>
                                  <td><IMG SRC="./img/gif.gif" alt="" height="25" width="5" border="0"></td>
                                  <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retype eMail</td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <p></p>
            <table width="90%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td><input type="submit" id="submit" value="submit" alt="submit" name="submit"></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <hr  />
          </form><?php
}?>
          <div style="clear:both;width:100%;padding:0px;margin:0px;">
            <div id="data"style="float:left">
              <p style="padding-bottom:0px; margin-bottom:0px; width:300px; height:40px; overflow: hidden;" class=headline><font size="3">Last Weeks's Survey Results</font></p><b>What is your favorite and least favorite organ?</b>
              <table width="560px" border="1" style="float:left; border: 1px dashed silver;">
                <tr bgcolor="#DBDBDB">
                  <td rowspan="4" bgcolor="#ffffff" style="border-right: 1px dashed silver;"><p style="background:#DBDBDB;padding-top:3px;padding-bottom:2px;"><br></p><p style="margin-bottom:0px;padding-top:3px; padding-bottom:5px" align="right"><strong>love it</strong></p><p style="margin-top:5px;background:#DBDBDB;padding-top:3px; padding-bottom:4px" align="right"><strong>hate it</strong></p></td>
                  <td title="question" width=70><b>Lung</b></td>
                  <td title="question" width=70><b>Pancreas</b></td>
                  <td title="question" width=70><b>Spleen</b></td>
                  <td title="question" width=70><b>Liver</b></td>
                  <td title="question" width=70><b>Skin</b></td>
                  <td title="question" width=70><b>Brain</b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>4</td>
                  <td>10</td>
                  <td>4</td>
                  <td></td>
                  <td>1</td>
                </tr>
                <tr>  
                </tr>
                <tr bgcolor="#DBDBDB">
                  <td>5</td>
                  <td>6</td>
                  <td></td>
                  <td>14</td>
                  <td>1</td>
                  <td></td>
                </tr>
              </table>
                          </div>
          </div>
          <p>&nbsp;</p></DIV>
        </TD>
      </TR>
    </TABLE>
    <TABLE WIDTH=780px HEIGHT=17px BORDER=0px CELLSPACING=0px CELLPADDING=0px BGCOLOR=#EDEDED>
      <TR HEIGHT=17px>
        <TD ALIGN=RIGHT><FONT COLOR=BLACK FACE=Verdana SIZE=1><a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/"><acronym title="World Wide Web Consortium">W3C</acronym></a><sup>&reg;</sup> (<a href="http://www.csail.mit.edu/"><acronym title="Massachusetts Institute of Technology">MIT</acronym></a>, <a href="http://www.ercim.org/"><acronym title="European Research Consortium for Informatics and Mathematics">ERCIM</acronym></a>, <a href="http://www.keio.ac.jp/">Keio</a>)</FONT></TD>
      </TR>
    </TABLE>
        <TD WIDTH=10px BACKGROUND=./img/border_right.gif><IMG SRC=./img/border_right.gif WIDTH=10px></TD>
      </TR>
      <TR HEIGHT=10px>
        <TD WIDTH=10px HEIGHT=10px BACKGROUND=./img/border_bottom_left.gif><IMG SRC=./img/border_bottom_left.gif WIDTH=10px HEIGHT=10px></TD>
        <TD WIDTH=780px HEIGHT=10px BACKGROUND=./img/border_bottom.gif><IMG SRC=./img/border_bottom.gif HEIGHT=10px></TD>
        <TD WIDTH=10px HEIGHT=10px BACKGROUND=./img/border_bottom_right.gif><IMG SRC=./img/border_bottom_right.gif WIDTH=10px HEIGHT=10px></TD>
      </TR>
    </TABLE>
    </TD></TR></TR></TABLE>
    </div>
    <div id="meta-footer" class="meta">
      <hr>
      <p><strong>Status:</strong> 20 February 2012 (see <a href="../changelog.html">changelog</a>) <br>Editors: <a href="http://www.w3.org/People/shadi/">Shadi Abou-Zahra</a> and the <a href="http://www.w3.org/WAI/EO/">Education and Outreach Working Group (EOWG)</a>. <br>Developed with support from <a href="http://www.w3.org/WAI/TIES/"><acronym title="Web Accessibility Initiative: Training, Implementation, Education, Support">WAI-TIES</acronym></a> and <a href="http://www.w3.org/WAI/WAI-AGE/"><acronym title="Web Accessibility Initiative: Ageing Education and Harmonisation">WAI-AGE</acronym></a> projects, co-funded by the European Commission <acronym title="Information Society Technologies">IST</acronym> Programme. [see <a href="../acks.html">Acknowledgements</a>]</p>
      <p>[<a href="http://www.w3.org/WAI/sitemap.html" shape="rect">WAI Site Map</a>] [<a href="http://www.w3.org/WAI/sitehelp.html" shape="rect">Help with WAI Website</a>] [<a href="http://www.w3.org/WAI/search.php" shape="rect">Search</a>] [<a href="http://www.w3.org/WAI/contacts" shape="rect">Contacting WAI</a>] <br><strong>Feedback welcome to <a href="mailto:wai-eo-editors@w3.org" shape="rect">wai-eo-editors@w3.org</a></strong> (a publicly archived list) or <a href="mailto:wai@w3.org" shape="rect">wai@w3.org</a> (a WAI staff-only list).</p>
      <div class="copyright"><p><a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/"><acronym title="World Wide Web Consortium">W3C</acronym></a><sup>&reg;</sup> (<a href="http://www.csail.mit.edu/"><acronym title="Massachusetts Institute of Technology">MIT</acronym></a>, <a href="http://www.ercim.org/"><acronym title="European Research Consortium for Informatics and Mathematics">ERCIM</acronym></a>, <a href="http://www.keio.ac.jp/">Keio</a>), All Rights Reserved. W3C <a href="http://www.w3.org/Consortium/Legal/ipr-notice#Legal_Disclaimer">liability</a>, <a href="http://www.w3.org/Consortium/Legal/ipr-notice#W3C_Trademarks">trademark</a>, <a rel="Copyright" href="http://www.w3.org/Consortium/Legal/copyright-documents">document use</a> and <a rel="Copyright" href="http://www.w3.org/Consortium/Legal/copyright-software">software licensing</a> rules apply. Your interactions with this site are in accordance with our <a href="http://www.w3.org/Consortium/Legal/privacy-statement#Public">public</a> and <a href="http://www.w3.org/Consortium/Legal/privacy-statement#Members">Member</a> privacy statements.</p></div>
    </div>
  </body>
</html>