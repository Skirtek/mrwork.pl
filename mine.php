<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=mine");
  exit;
 }
 // szczegóły użytkownika
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
 $string = $userRow['pracodawca'];
 $mine = $userRow['pracodawca'];
    $linek = 'profile?ran='.$userRow['profilehash'];

 if (strpos($string, '1') !== false) {
 $kto = $userRow['userName'];
 	if( isset($_POST['edit']) ) { 
	$value = $_POST['edit'];
	$_SESSION["rand"] = $value;
	header("Location: edit");
	}
	else if( isset($_POST['delete']) ) { 
	$ID = $_POST['delete'];
	$sql="DELETE FROM adv WHERE ID='$ID'";
	mysql_query($sql);
	$sq = "SET @count = 0";
	mysql_query($sq);
	$s = "UPDATE `adv` SET `adv`.`ID` = @count:= @count + 1";
	mysql_query($s);
	if($s){
	$errMSG = "Ogłoszenie zostało usunięte!";
	$errStyle = "alert-success";
	}
	else {
	$errMSG = "Coś poszło nie tak,spróbuj jeszcze raz!";
	$errStyle = "alert-danger";
	}
	}
		else if( isset($_POST['wyr']) ) { 
	$random = $_POST['wyr'];
	$wyrozniam = ("UPDATE adv SET wyr=1 WHERE rand='$random'");
	$wyres = mysql_query($wyrozniam);
if($wyres){
	$errMSG = "Ogłoszenie zostało wyróżnione!";
	$errStyle = "alert-success";
	}
	else {
	$errMSG = "Coś poszło nie tak,spróbuj jeszcze raz!";
	$errStyle = "alert-danger";
	}
	}
		else if( isset($_POST['uwyr']) ) { 
	$random = $_POST['uwyr'];
	$wyrozniam = ("UPDATE adv SET wyr=0 WHERE rand='$random'");
	$wyres = mysql_query($wyrozniam);
if($wyres){
	$errMSG = "Wyróżnienie ogłoszenia zostało usunięte!";
	$errStyle = "alert-success";
	}
	else {
	$errMSG = "Coś poszło nie tak,spróbuj jeszcze raz!";
	$errStyle = "alert-danger";
	}
	}
}
else if (strpos($string, '1') == false) {
    header("Location: home");
}
  $nazwa = $userRow['userName'];
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
$pr = "SELECT name from premium where name='$nazwa'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
$premium = "true";
 $prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
$cz = "SELECT wyr from adv where kto='$nazwa' and wyr=1";
$cze = mysql_query($cz);

if(mysql_num_rows($cze) === 0)
{
$can = "true";
}
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
 $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Moje ogłoszenia - <?php echo $userRow['userName']; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>

  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="jquery.dataTables.columnFilter.js"></script>
  
  
  
  
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="home"><img style="max-width:150px; max-height:41px; margin-top: 8px;" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="<?php echo $linek; ?>">Mój profil</a></li>
            <li class="active" style="<?php $string = $userRow['pracodawca']; if (strpos($string, '1') !== false) {
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

<div class="container-fluid"><div class="col-md-6 col-md-offset-3">
  <?php if($end === "true") { ?><div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Uwaga!</strong> Ważność Twojego konta Premium wygasła! Aby wykupić dostęp ponownie kliknij <a style="font-weight:700; color:#BB4D55" href="kup">tutaj</a>.<br><strong>Dziękujemy za wsparcie serwisu mrwork.pl</strong>
</div><?php } ?>
<?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert <?php echo $errStyle; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?></div>
<div class="col-md-10 col-md-offset-1"><input style="margin-bottom:30px;" id="mine" name="search" type="text" placeholder="słowo kluczowe,firma,miasto" autocomplete="off"><input id="submit" ></div>
 <br><div class="row">
 <div class="col-md-10 col-md-offset-1"><div class="table-responsive">
  <table id="example" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ogłoszenia:</th>
            </tr>
        </thead>
        <tbody>
 <?php		
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM adv WHERE kto='$kto' order by ID desc";
            $results = mysql_query($sql);
            while($row = mysql_fetch_array($results)) {
			
            ?>
                <tr>
				<td><p style="float: left"><a href="<?php echo 'http://mrwork.pl/offer?ran='.$row['rand']; ?>"><?php echo $row['title'] ?></a><br><?php echo $row['cat1Option'] ?><br><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['cityOption'] ?></p>
				<p style="margin: 0;"><div style="float: right">Dodano: <?php echo $row['data'] ?></div><br>&nbsp;<br><div style="float: right">
				<form method="POST"><?php if($premium === "true" && $row['wyr'] === "1") {?><button value="<?php echo $row['rand'] ?>" type="submit" name="uwyr" class="btn btn-danger">Usuń wyróżnienie</button>&nbsp;<?php } ?><?php if($premium === "true" && $row['wyr'] === "0" && $can === "true") {?><button value="<?php echo $row['rand'] ?>" type="submit" name="wyr" class="btn btn-success">Wyróżnij</button>&nbsp;<?php } ?><button value="<?php echo $row['rand'] ?>" type="submit" name="edit" class="btn btn-primary">Edytuj</button> <button value="<?php echo $row['ID'] ?>" name="delete" type="submit" class="btn btn-danger">Usuń</button></div></p></td></form>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div></div></div> <script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#example').DataTable( {
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
    "emptyTable":     "Nie masz żadnych ogłoszeń",
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


});</script>
 <div class="row"><footer class="footer-distributed">

			<div class="footer-right">

				<a href="https://www.facebook.com/Woorkerpl"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/woorkerpl"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="hall"><i class="fa fa-university" aria-hidden="true"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="home">Strona główna</a>
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