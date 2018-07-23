<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login");
  exit;
 }
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 mysql_query("SET NAMES utf8");
			$s = "SELECT * FROM adv order by ID desc";
            $resu = mysql_query($s);
	  $rows = array();
while($row = mysql_fetch_array($resu))
{
    $rows[] = $row['jezyk'];
}
$re = array_unique($rows);
$filter = array("angielski","niemiecki","francuski","hiszpański","rosyjski");
foreach ($re as $key=>$value) {
   if (in_array($value,$filter)){
      unset($re[$key]);
   }
}
sort($re);
$vw = implode(",",$re);
$a = array( ',angielski', ',rosyjski', ',niemiecki', ',francuski', ',hiszpański','angielski', 'rosyjski', 'niemiecki', 'francuski', 'hiszpański' );
$wm = str_replace($a,'',$vw);
$wa = str_replace(",",' ',$wm);
$array = explode(' ', $wa);
$replacements = array(0 => "Wybierz język");
$basket = array_replace($array, $replacements);
 // szczegóły użytkownika
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $string = $userRow['pracodawca'];
  $nazwa = $userRow['userName'];
   $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
}
$findme   = '0';
$pos = strpos($string, $findme);
 if ($pos === false) {
  mysql_query("SET NAMES utf8");
    $pra=mysql_query("SELECT * FROM pradet WHERE name='$nazwa'");
    $praRow=mysql_fetch_array($pra);
	$miej = $praRow['miejscowosc'];
	$tel = $praRow['telefon'];
	$op = $praRow['opis'];
	$ad = $praRow['adres'];
	if (empty($miej) || empty($tel)|| empty($op) || empty($ad)) {
    $errStyle = "alert-info";
	$errMSG = "Aby móc dodawać ogłoszenia, uzupełnij wymagane pola w <a style='font-weight:700;' href='setuser'>ustawieniach konta</a> ";
}
} else {
 mysql_query("SET NAMES utf8");
   $uz=mysql_query("SELECT * FROM userdet WHERE name='$nazwa'");
   $uzRow=mysql_fetch_array($uz);
   $mie = $uzRow['miejscowosc'];
   $im = $uzRow['imie'];
   $op = $uzRow['opis'];
   if (empty($mie) || empty($im) || empty($op)) {
    $errStyle = "alert-info";
	$errMSG = "Uzupełnij wymagane pola w <a style='font-weight:700;' href='setuser'>ustawieniach konta</a> ";
}
}
$bl=mysql_query("SELECT * FROM blocked WHERE kto='$nazwa'");
$blRow=mysql_fetch_array($bl);
if(!empty($blRow['kogo'])) {
$pieces = explode(",",$blRow['kogo']);
$num = count($pieces);
$arr = array();
for($x = "0";$x<$num;$x++) {
$temp = "(?!".$pieces[$x].")";
array_push($arr, $temp);
}
$com = implode("", $arr);
}
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
 $pr = "SELECT name from premium where name='$nazwa'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
  $prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
$premium = "true";
$swoj = 'frltip';
$dzisia = date("Y-m-d");
$wygas = $premRow['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);

if ($dzisiaj >= $wygasa) { 
$prac = $userRow['pracodawca'];
if($prac === "1") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nazwa'");
$io = mysql_query($iop);
$jop = ("UPDATE adv SET wyr=0 WHERE kto='$nazwa'");
$jo = mysql_query($jop);
if($jo) {
$yyy="DELETE FROM premium WHERE name='$nazwa'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
else if($prac === "0") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nazwa'");
$io = mysql_query($iop);
if($io) {
$yyy="DELETE FROM premium WHERE name='$nazwa'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
$_SESSION["end"] = "true";
header("Refresh:0");
}
}
else if(mysql_num_rows($pre) === 0) {
if($string === "1") {
$swoj = 'frltip';
$premium = "true";
} 
else {
$swoj = 'rti';
$premium = "false";
$errStyle2 = "alert-info";
$errMSG2 = "Aby zobaczyć więcej ogłoszeń <a style='font-weight:700;' href='premium'>kup konto Premium</a> ";
}
}
 $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>mrwork.pl - strona główna</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="jquery.dataTables.columnFilter.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="home"><img class="ele" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="<?php echo $linek; ?>">Mój profil</a></li>
            <li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="mine">Moje ogłoszenia</a></li>
<li><a href="mess">Wiadomości&nbsp;<span <?php if($nieod>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $nieod; ?>)</span></a></li>
<li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="<?php echo $linek; ?>">Nowe komentarze&nbsp;<span <?php if($new>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $new; ?>)</span></a></li>
            <li><a href="setuser">Ustawienia konta</a></li>
            <li><a href="logout?logout">Wyloguj</a></li>
          </ul>
        </li>
		<li style="color:#fff; background-color:#31A598;"><a href="pomhome"><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp;Pomoc sąsiedzka</a></li>
        <li style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
    echo "display:block;";
} else if (strpos($string, '1') == false) {  echo "display:none;";} ?>"><a href="add"><span class="glyphicon glyphicon-plus"></span> Dodaj ogłoszenie</a></li>
      </ul>
    </div>
  <script>$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});</script>
</nav>
<div class="container-fluid">
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
<?php
   if ( isset($errMSG2) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle2; ?>">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG2; ?>
                </div>
             </div>
                <?php
   }
   ?>
<?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle; ?>">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
<?php if($premium === "true") {?><div class="col-md-12"><input style="margin-bottom:50px;" id="mine" name="search" type="text" placeholder="stanowisko,nazwa,miasto" autocomplete="off"><input id="submit" ></div>
 <br><div class="row rowka"> <div class="col-md-2"><h4>Wymiar zatrudnienia</h4>
  <input onchange="filterme()" type="radio" id="type" name="k" value="Pełen etat">&nbsp;Pełen etat<br>
  <input onchange="filterme()" type="radio" id="type" name="k" value="Praca czasowa">&nbsp;Praca czasowa<br>
  <input onchange="filterme()" type="radio" id="type" name="k" value="Praktyka/staż">&nbsp;Praktyka/staż<br>
  <input onchange="filterme()" type="radio" id="type" name="k" value="Nie dotyczy">&nbsp;Nie dotyczy<br>
  <h4>Wymagany język</h4>
	<input onchange="filterme()" type="radio" id="type" name="j" value="angielski" />&nbsp;angielski<br>
	<input onchange="filterme()" type="radio" id="type" name="j" value="niemiecki" />&nbsp;niemiecki<br>
	<input onchange="filterme()" type="radio" id="type" name="j" value="francuski" />&nbsp;francuski<br>
	<input onchange="filterme()" type="radio" id="type" name="j" value="hiszpański" />&nbsp;hiszpański<br>
	<input onchange="filterme()" type="radio" id="type" name="j" value="rosyjski" />&nbsp;rosyjski<br>
<input type="checkbox" name="other" id="other">&nbsp;Inny</label>
<div style="width:71%; display:none;" id="oder" ><div class="form-group" style="margin-top:5px;">
				<select data-style="btn-success" name="target" id="target" class="form-control selectpicker" >
				<option value="" >Wybierz język</option>
	  <?php 
	 for($x=1; $x<sizeof($basket); $x++){
            ?>
	  <option value="<?php echo $basket[$x]; ?>" ><?php echo $basket[$x] ?></option><?php
            }
            ?></select>
            </div></div>
			 <h4>Forma zatrudnienia</h4>
			 <input onchange="filterme()" type="radio" id="type" name="u" value="Umowa o pracę" />&nbsp;Umowa o pracę<br>
			 <input onchange="filterme()" type="radio" id="type" name="u" value="Umowa zlecenie" />&nbsp;Umowa zlecenie<br>
			 <input onchange="filterme()" type="radio" id="type" name="u" value="Umowa o dzieło" />&nbsp;Umowa o dzieło<br>
			 <input onchange="filterme()" type="radio" id="type" name="u" value="Nie dotyczy" />&nbsp;Nie dotyczy<br>
	<button style="margin-top:10px; margin-bottom:10px;" class="btn-block btn btn-primary" id="cle">Czyść</button>
	<script>$('#cle').on('click', function (e) {
   $('input[name="k"]').attr('checked',false); 
   $('input[name="j"]').attr('checked',false); 
   $('input[name="u"]').attr('checked',false); 
   $('#other').attr('checked',false); 
var z = $('#target').val();
if (z !== '') {
location.reload();
}
$('.selectpicker').selectpicker('refresh');
$('#oder').hide(); 
   filterme();
})</script>
</div><?php } else if($premium === "false") {?><div class="row"> <div class="col-md-1">&nbsp;</div><?php } ?><div class="col-md-10"><div class="table-responsive">
  <table id="example" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ogłoszenia:</th>
            </tr> 
        </thead>
        <tbody>
		<?php	
 	
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM adv WHERE wyr=1 order by ID desc";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
						$nam = $row['kto'];
						$linka=mysql_query("SELECT * FROM users WHERE userName='$nam'");
   $linkaRow=mysql_fetch_array($linka);
 $prka = "SELECT name from premium where name='$nam'";
$preka = mysql_query($prka);

if(mysql_num_rows($preka) > 0)
{
$premka=mysql_query("SELECT * FROM premium WHERE name='$nam'");
$premkaRow=mysql_fetch_array($premka);
$dzisia = date("Y-m-d");
$wygas = $premkaRow['do'];

$dzisiaj = strtotime($dzisia);
$wygasa = strtotime($wygas);
if ($dzisiaj >= $wygasa) { 
$us=mysql_query("SELECT * FROM users WHERE userName='$nam'");
$usRow=mysql_fetch_array($us);
$prac = $usRow['pracodawca'];
if($prac === "1") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nam'");
$io = mysql_query($iop);
$jop = ("UPDATE adv SET wyr=0 WHERE kto='$nam'");
$jo = mysql_query($jop);
if($jo) {
$yyy="DELETE FROM premium WHERE name='$nam'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
else if($prac === "0") {
$iop = ("UPDATE pomoc SET wyr=0 WHERE kto='$nam'");
$io = mysql_query($iop);
if($io) {
$yyy="DELETE FROM premium WHERE name='$nam'";
mysql_query($yyy);
$yy = "SET @count = 0";
mysql_query($yy);
$y = "UPDATE `premium` SET `premium`.`ID` = @count:= @count + 1";
mysql_query($y);
}
}
header("Refresh:0");
}
}
            ?>
                <tr>
				<td style=" background-color: #f4f495; border-bottom: 1px solid #FBFAFA;"><p style="float: left"><span style=" color: #058547; font-family: Raleway; font-weight: 700; "><i class="fa fa-star" aria-hidden="true"></i>&nbsp;Ogłoszenie wyróżnione</span><br><a href="<?php echo 'http://mrwork.pl/offer?ran='.$row['rand']; ?>"><?php echo $row['title'] ?></a><br><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a style="color:#000;" href="profile?ran=<?php echo $linkaRow['profilehash'];?>"><?php echo $row['kto'] ?></a><br><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['cityOption'] ?></p><p style="margin: 0;"><div style="float: right"><?php echo $row['cat1Option'] ?></div><br>&nbsp;<span style="display:none;"><?php echo $row['jezyk']; echo "<br>"; echo $row['typ']; echo "<br>"; echo $row['catOption']; ?></span><br><br><div style="float: right">Dodano: <?php echo $row['data'] ?></div></p></td>
                </tr>

            <?php
            }
            ?>
 <?php	
 	
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM adv WHERE wyr=0 order by ID desc";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$nam = $row['kto'];
			$linka=mysql_query("SELECT * FROM users WHERE userName='$nam'");
   $linkaRow=mysql_fetch_array($linka);
            ?>
                <tr>
				<td><p style="float: left"><a href="<?php echo 'http://mrwork.pl/offer?ran='.$row['rand']; ?>"><?php echo $row['title'] ?></a><br><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a style="color:#000;" href="profile?ran=<?php echo $linkaRow['profilehash'];?>"><?php echo $row['kto'] ?></a><br><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['cityOption'] ?></p><p style="margin: 0;"><div style="float: right"><?php echo $row['cat1Option'] ?></div><br>&nbsp;<span style="display:none;"><?php echo $row['jezyk']; echo "<br>"; echo $row['typ']; echo "<br>"; echo $row['catOption'];?></span><br><div style="float: right">Dodano: <?php echo $row['data'] ?></div></p></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div></div> <?php if($premium === "false") { ?><div class="col-md-1">&nbsp;</div><?php } ?></div> <script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#example').DataTable( {
	"dom": '<?php echo $swoj;?>',
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Szukaj:",
    "lengthMenu":     "Pokaż _MENU_ ogłoszeń",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych ogłoszeń!",
    "emptyTable":     "Brak ogłoszeń",
    "paginate": {
        "first":      "Pierwsza",
        "previous":   "Poprzednia",
        "next":       "Następna",
        "last":       "Ostatnia"
    },
    "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
    }
}

    } ); $('#mine').on( 'keyup', function () {
    oTable.search( this.value ).draw();
});
$( "#target" ).change(function() {
  oTable.search( this.value ).draw();
});
$('#addlg').on( 'keyup', function () {
    oTable.search( this.value ).draw();
} );
oTable .columns(0) .search('^(?:<?php echo $com; ?>.)*$\r?\n?', true, false) .draw();
});</script><script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>$(function(){
   
    $('#other').click(function(){
	if (this.checked){
 $("#oder").show();
}
else {
$("#oder").hide();
}
    }); 
    
});</script>
<script>
$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
var col = $(".rowka").height();
}
else {
var col = $(".rowka").height();
if(col < 350) {
var ile = 350 - col;
$(".stopka").css("marginTop", ile);
}
}
});
$('#mine').on('input', function() {
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
var col = $(".rowka").height();
}
else {
var col = $(".rowka").height();
if(col < 350) {
var ile = 350 - col;
$(".stopka").css("marginTop", ile);
}
}
});
 </script>
 <div class="row stopka"><footer class="footer-distributed">

			<div class="footer-right">

				<a href="https://www.facebook.com/Woorkerpl"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/woorkerpl"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="hall"><i class="fa fa-university" aria-hidden="true"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="home" class="active">Strona główna</a>
					·
					<a href="regulamin">Regulamin</a>
					·
					<a href="faq">FAQ</a>
					·
					<a href="bad">Zgłoś błąd</a>
					·
					<a href="premium">Premium</a>
					·
					<a href="contact">Kontakt</a>
				</p>

				<p>&copy; mrwork.pl - Wszelkie prawa zastrzeżone.</p>
			</div>

		</footer></div></div>
   
</body>
</html>
<?php ob_end_flush(); ?>