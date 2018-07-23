<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  header("Location: login?continue=mess");
  exit;
 }
        $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    }
   mysql_query("SET NAMES utf8");
   $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  $end = $_SESSION["end"];
 unset($_SESSION['end']);
  $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
	$sta = "false";
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
$sta = "true";
}
  $nazwa = $userRow['userName'];
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
$odeby = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and usunodb=0");
$odeb = mysql_num_rows($odeby);
$wysy = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and usunnad=0");
$wysyly = mysql_num_rows($wysy);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
 $pr = "SELECT name from premium where name='$nazwa'";
$pre = mysql_query($pr);

if(mysql_num_rows($pre) > 0)
{
  $prem=mysql_query("SELECT * FROM premium WHERE name='$nazwa'");
$premRow=mysql_fetch_array($prem);
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
$arr = array();	
$sql = "SELECT * FROM mess WHERE usunodb=1";
$results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$temp = "(?!".$row['rand'].")";
			array_push($arr, $temp);
			}
$odebrane = implode("", $arr);

$arra = array();	
$sql = "SELECT * FROM mess WHERE usunnad=1";
$results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
			$temp = "(?!".$row['rand'].")";
			array_push($arra, $temp);
			}
$nadane = implode("", $arra);

$ulubione = $nadane.$odebrane;
 $old = mysql_query("SELECT * FROM `comment` WHERE komu='$nazwa' and nowy=1");
$new = mysql_num_rows($old);
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Odebrane&nbsp;(<?php echo $nieod; ?>) - <?php echo $nazwa; ?></title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href=" http://antenna.io/demo/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	  <style>
.dataTables_filter { display: initial !important; float:right; }
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {color: #D2201D !important; background-color: #fff !important;  border-left: 4px solid #dd4b39 !important;}
</style> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
</head>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});</script>
<div class="se-pre-con"></div>
<body style="background-color:#F1F3FA;">
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
<li class="active"><a href="mess">Wiadomości&nbsp;<span <?php if($nieod>0) {?>style="font-weight:bold; color:#d2201d;"<?php } ?>>(<?php echo $nieod; ?>)</span></a></li>
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
   	      <div class="form-group">
             <div id="wiadpo" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość została wysłana!
                </div>
             </div>
			   <script>
   if(window.location.hash) {
  $("#wiadpo").show();
} 
   </script>
     <div class="row"><div class="col-sm-1">&nbsp;</div>
        <div style="background-color:#fff; border-top-left-radius: 5px; border-bottom-left-radius: 5px;" class="col-sm-2">
		<center><button  data-toggle="modal" data-target="#mess"  type="button" class="btn btn-danger btn-block"><b>Utwórz</b></button></center>
		<ul class="nav nav-pills nav-stacked nav-tabs" style=" padding-top: 10px; padding-bottom: 10px; ">
    <li class="active"><a data-toggle="tab" href="#home" style=" color: black; ">Odebrane&nbsp;(<?php echo $odeb; ?>)</a></li>
    <li><a data-toggle="tab" href="#menu1" style=" color: black; ">Wysłane&nbsp;(<?php echo $wysyly; ?>)</a></li>
    <li><a data-toggle="tab" href="#menu2" style=" color: black; ">Ulubione</a></li>
	<li><a data-toggle="tab" href="#menu3" style=" color: black; ">Wersje robocze</a></li>
  </ul></div>
        <div class="col-sm-8" style="min-height:400px; border-bottom-left-radius:5px; background: white; border-top-right-radius: 5px; border-bottom-right-radius: 5px; "> <div class="tab-content">
    <div id="home" class="tab-pane fade in active"><div>
	<button id="zaznacz" class="barek" style="margin-top: 10px;" data-toggle="tooltip" data-placement="bottom" title="Zaznacz wszystkie"><i class="fa fa-square-o" aria-hidden="true"></i></i></button>
	<button id="odznacz" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Odznacz"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
	<button id="refresh" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-toggle="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	<button id="thresh" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>
	<button id="ulubbutton" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Dodaj do ulubionych"><i class="fa fa-star-o" aria-hidden="true"></i></button>
	<button id="read" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Oznacz jako przeczytane"><i class="fa fa-check" aria-hidden="true"></i></button>
	</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
      <div style="cursor:pointer; margin-top:5px;" class="table-responsive">
  <table id="example" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Odebrane</th>
            </tr> 
        </thead>
        <tbody>
 <?php		mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM mess WHERE do='$nazwa' order by ID desc";
            $results = mysql_query($sql);
			
            while($row = mysql_fetch_array($results)) {
$pieces = explode(",", $row['wyslano']);
			
            ?>
                <tr>
				<td style="border-bottom: 1px solid #E5E5E5; <?php if($row['przecz'] === "1"){ ?> background-color:#f0f0f0; <?php } else { ?>background-color:#ffffff;<?php } ?>"><a style="text-decoration:none; color:#000; display:block;" href="detail?<?php echo $row['rand']; ?>"><div class="checkbox">
                                                <label>
                                                    <input class="czeki" value="<?php echo $row['rand']; ?>" type="checkbox">
                                                </label>
                                            </div>
                                            &nbsp;<span onclick="someFunction(this.className)" class="glyphicon <?php if($row['ulubodb'] === "1"){ ?>glyphicon-star ulub<?php } else if($row['ulubodb'] === "0") { ?> glyphicon-star-empty <?php } ?> starr <?php echo $row['rand'];?>"></span>&nbsp;<span class="name" style="<?php if($row['przecz'] === "0"){ ?> font-weight:700; <?php } ?> font-family: Raleway; min-width: 120px;
                                                display: inline-block;"><?php echo $row['od']; ?></span> <span style="<?php if($row['przecz'] === "0"){ ?> font-weight:700; <?php } ?> font-family:Raleway;">&nbsp;<?php echo $row['temat']; ?></span>
                                            <div style="float:right;"><span style="font-family:Raleway;"><?php echo $pieces[0]; ?></span><span style="display:none;"><?php echo $row['rand']; ?></span></div></a>
                           
						   </td>                     
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>$("#zaznacz").click(function () {
$(".czeki").addClass("noname");
    $('.czeki').prop('checked', true);
	$("#zaznacz").hide();
	$("#odznacz").show();
	$("#refresh").hide();
	$("#thresh").show();
	$("#read").show();
	$("#ulubbutton").show();
});
$("#odznacz").click(function () {
$(".czeki").removeClass("noname");
    $( ".czeki" ).prop( "checked", false );
	$("#zaznacz").show();
$("#odznacz").hide();
$("#refresh").show();
$("#thresh").hide();
$("#read").hide();
$("#ulubbutton").hide();
});
</script>
<script>
    $(".czeki").change(function () {
	if ($(this).hasClass("noname")) {
  	$(this).removeClass("noname");
}
else {
	$(this).addClass("noname");
}
    if ($('.czeki:checked').length > 0) {

	$("#zaznacz").hide();
	$("#odznacz").show();
	$("#refresh").hide();
	$("#thresh").show();
	$("#read").show();
	$("#ulubbutton").show();
$("#thresh").click(function () {
var checkedValues = $('.noname').map(function() {
    return this.value;
}).get();
 var alerted = localStorage.getItem('alerted') || '';
 if (alerted != 'yes') {
var r = confirm("Czy na pewno chcesz usunąć zaznaczone wątki?");
localStorage.setItem('alerted','yes');
}
localStorage.setItem('alerted','');
if (r == true) {
var usun = checkedValues.toString();
var miej = "odb";
$.ajax({
     url: 'usun.php', 
     type: "POST",
     dataType:'json', 
     data: ({usun: usun, miej:miej}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
}); 
}
});
$("#ulubbutton").click(function () {
var checkedValues = $('.noname').map(function() {
    return this.value;
}).get();
var ulub = checkedValues.toString();
var miej = "odb";
$.ajax({
     url: 'favo.php', 
     type: "POST",
     dataType:'json', 
     data: ({ulub: ulub, miej:miej}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
});
});
$("#read").click(function () {
var checkedValues = $('.noname').map(function() {
    return this.value;
}).get();
var send = checkedValues.toString();
$.ajax({
     url: 'read.php', 
     type: "POST",
     dataType:'json', 
     data: ({send: send}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
});
});
    } else {
$("#zaznacz").show();
$("#odznacz").hide();
$("#refresh").show();
$("#thresh").hide();
$("#read").hide();
$("#ulubbutton").hide();
    }
});

</script>
<script>
$(".starr").click(function(event) {
event.preventDefault();
var str = ($(event.target).attr('class'));
var raz = str.replace("glyphicon", "");
var dwa = raz.replace("glyphicon-star", "");
var trzy = dwa.replace("starr", "");
var cztery = trzy.replace("-empty", "");
var miejsce = "odb";
var n = cztery.includes("ulub");
if ( n === true ) {
var pinc = cztery.replace("ulub", "");
var x = "1";
}
else { var x = "0";
var pinc = cztery.replace(" ", "");
}
$.ajax({
     url: 'fav.php',
     type: "POST",
     dataType:'json',
     data: ({pinc: pinc, miejsce: miejsce, x: x}),
     success: function(data){
     if (data == 'dodano') {
$(event.target).addClass("ulub");
$(event.target).removeClass("glyphicon-star-empty");
$(event.target).addClass("glyphicon-star");
location.reload();
}
if (data == 'usun') {
$(event.target).removeClass("ulub");
$(event.target).addClass("glyphicon-star-empty");
$(event.target).removeClass("glyphicon-star");
location.reload();
}
if (data == 'false') { alert("Coś poszło nie tak,spróbuj jeszcze raz!"); }
     },
     error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!");
      }
});
});
</script>
<script>$(".starr").hover(function(event) {
	if($(event.target).hasClass('ulub')) { 
	$(event.target).removeClass("glyphicon-star");
	$(event.target).addClass("glyphicon-star-empty");
	}
	else { 
	 $(event.target).removeClass("glyphicon-star-empty");
$(event.target).addClass("glyphicon-star");
	}

}, function(event) {
    if($(event.target).hasClass('ulub')) { 
	$(event.target).removeClass("glyphicon-star-empty");
	$(event.target).addClass("glyphicon-star");
	}
	else { 
	$(event.target).removeClass("glyphicon-star");
	 $(event.target).addClass("glyphicon-star-empty");
	}
});</script>
<script>
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
    "lengthMenu":     "Pokaż _MENU_ wiadomości",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych wiadomości",
    "emptyTable":     "Nie masz żadnych wiadomości",
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

    } );

oTable .columns(0) .search('^(?:<?php echo $odebrane; ?>.)*$\r?\n?', true, false) .draw();

});</script>
    </div>
    <div id="menu1" class="tab-pane fade">
	<div>
	<button id="zaznacz2" class="barek" style="margin-top: 10px;" data-toggle="tooltip" data-placement="bottom" title="Zaznacz wszystkie"><i class="fa fa-square-o" aria-hidden="true"></i></i></button>
	<button id="odznacz2" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Odznacz"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
	<button id="refresh2" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-toggle="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	<button id="thresh2" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>
	<button id="ulubbutton2" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Dodaj do ulubionych"><i class="fa fa-star-o" aria-hidden="true"></i></button>
	</div>
            <div style="cursor:pointer; margin-top:5px;" class="table-responsive">
  <table id="wyslano" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Wysłane</th>
            </tr> 
        </thead>
        <tbody>
 <?php		mysql_query("SET NAMES utf8");
			$s = "SELECT * FROM mess WHERE od='$nazwa' order by ID desc";
            $res = mysql_query($s);
			
            while($raw = mysql_fetch_array($res)) {
$piec = explode(",", $raw['wyslano']);
			
            ?>
                <tr>
				<td style="border-bottom: 1px solid #E5E5E5; <?php if($raw['przecznad'] === "0") { ?>background-color:#fff;<?php } else { ?> background-color:#f0f0f0;<?php }?>"><a style="text-decoration:none; display:block; color:#000;" href="detail?<?php echo $raw['rand']; ?>"><div class="checkbox">
                                                <label>
                                                    <input class="cze" value="<?php echo $raw['rand']; ?>" type="checkbox">
                                                </label>
                                            </div>
                                            &nbsp;<span class="glyphicon <?php if($raw['ulubnad'] === "1"){ ?>glyphicon-star ulubione<?php } else if($raw['ulubnad'] === "0") { ?> glyphicon-star-empty <?php } ?> wysl <?php echo $raw['rand'];?>"></span>&nbsp;<span class="name" style="font-family: Raleway; min-width: 120px;
                                                display: inline-block;">Do:&nbsp;<?php echo $raw['do']; ?></span>&nbsp;<span style=" font-family:Raleway;"><?php echo $raw['temat']; ?></span>
                                            <div style="float:right;"><span style="font-family:Raleway;"><?php echo $piec[0]; ?></span><span style="display:none;"><?php echo $raw['rand']; ?></span></div></a>
                           
						   </td>                     
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
$(".wysl").click(function(event) {
event.preventDefault();
var str = ($(event.target).attr('class'));
var raz = str.replace("glyphicon", "");
var dwa = raz.replace("glyphicon-star", "");
var trzy = dwa.replace("wysl", "");
var cztery = trzy.replace("-empty", "");
var miejsce = "nad";
var a = cztery.includes("ulubione");
if ( a === true ) {
var pinc = cztery.replace("ulubione", "");
var x = "1";
}
else { var x = "0";
var pinc = cztery.replace(" ", "");
}
$.ajax({
     url: 'fav.php',
     type: "POST",
     dataType:'json',
     data: ({pinc: pinc, miejsce: miejsce, x: x}),
     success: function(data){
     if (data == 'dodano') {
$(event.target).addClass("ulubione");
$(event.target).removeClass("glyphicon-star-empty");
$(event.target).addClass("glyphicon-star");
location.reload();
}
if (data == 'usun') {
$(event.target).removeClass("ulubione");
$(event.target).addClass("glyphicon-star-empty");
$(event.target).removeClass("glyphicon-star");
location.reload();
}
if (data == 'false') { alert("Coś poszło nie tak,spróbuj jeszcze raz!"); }
     },
     error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!");
      }
});
});
</script>
<script>$(".wysl").hover(function(event) {
	if($(event.target).hasClass('ulubione')) { 
	$(event.target).removeClass("glyphicon-star");
	$(event.target).addClass("glyphicon-star-empty");
	}
	else { 
	 $(event.target).removeClass("glyphicon-star-empty");
$(event.target).addClass("glyphicon-star");
	}

}, function(event) {
    if($(event.target).hasClass('ulubione')) { 
	$(event.target).removeClass("glyphicon-star-empty");
	$(event.target).addClass("glyphicon-star");
	}
	else { 
	$(event.target).removeClass("glyphicon-star");
	 $(event.target).addClass("glyphicon-star-empty");
	}
});</script>
<script>$("#zaznacz2").click(function () {
$(".cze").addClass("non");
    $('.cze').prop('checked', true);
	$("#zaznacz2").hide();
	$("#odznacz2").show();
	$("#refresh2").hide();
	$("#thresh2").show();
	$("#ulubbutton2").show();
});
$("#odznacz2").click(function () {
$(".cze").removeClass("non");
    $( ".cze" ).prop( "checked", false );
	$("#zaznacz2").show();
$("#odznacz2").hide();
$("#refresh2").show();
$("#thresh2").hide();
$("#ulubbutton2").hide();
});
</script>
<script>
    $(".cze").change(function () {
	if ($(this).hasClass("non")) {
  	$(this).removeClass("non");
}
else {
	$(this).addClass("non");
}
    if ($('.cze:checked').length > 0) {

	$("#zaznacz2").hide();
	$("#odznacz2").show();
	$("#refresh2").hide();
	$("#thresh2").show();
	$("#ulubbutton2").show();
$("#thresh2").click(function () {
var checkedValues = $('.non').map(function() {
    return this.value;
}).get();
var wyslane = localStorage.getItem('wyslane') || '';
if (wyslane!= 'yes') {
localStorage.setItem('wyslane','yes');
}
localStorage.setItem('wyslane','');
if (confirm("Czy na pewno chcesz usunąć zaznaczone wątki?")) {
var usun = checkedValues.toString();
var miej = "nad";
$.ajax({
     url: 'usun.php', 
     type: "POST",
     dataType:'json', 
     data: ({usun: usun, miej:miej}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
}); 
}
});
$("#ulubbutton2").click(function () {
var checkedValues = $('.non').map(function() {
    return this.value;
}).get();
var ulub = checkedValues.toString();
var miej = "nad";
$.ajax({
     url: 'favo.php', 
     type: "POST",
     dataType:'json', 
     data: ({ulub: ulub, miej:miej}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
});
});
    } else {
$("#zaznacz2").show();
$("#odznacz2").hide();
$("#refresh2").show();
$("#thresh2").hide();
$("#ulubbutton2").hide();
    }
});

</script>
<script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#wyslano').DataTable( {
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Szukaj:",
    "lengthMenu":     "Pokaż _MENU_ wiadomości",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych wiadomości",
    "emptyTable":     "Nie masz żadnych wysłanych wiadomości",
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

    } );

oTable .columns(0) .search('^(?:<?php echo $nadane; ?>.)*$\r?\n?', true, false) .draw();
});</script>
    </div>
    <div id="menu2" class="tab-pane fade">
	<div>
		<button id="zaznacz4" class="barek" style="margin-top: 10px;" data-toggle="tooltip" data-placement="bottom" title="Zaznacz wszystkie"><i class="fa fa-square-o" aria-hidden="true"></i></i></button>
	<button id="odznacz4" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Odznacz"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
		<button id="refresh4" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-toggle="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
		<button id="thresh4" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>
	</div>
       <div style="cursor:pointer; margin-top:5px;" class="table-responsive">
  <table id="wymarzona" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ulubione</th>
            </tr> 
        </thead>
        <tbody>
 <?php		mysql_query("SET NAMES utf8");
			$y  = "SELECT * FROM `mess` WHERE (od = '$nazwa' and ulubnad = '1') OR (do = '$nazwa' and ulubodb = '1') ORDER BY ID desc";
            $rys = mysql_query($y);
			
            while($ryw = mysql_fetch_array($rys)) {
$piec = explode(",", $ryw['wyslano']);
			
            ?>
                <tr>
				<td style="border-bottom: 1px solid #E5E5E5; <?php if($ryw['przecz'] === "1" || $ryw['od'] === $nazwa) { ?> background-color:#f0f0f0; <?php } else { ?>background-color:#ffffff;<?php } ?>"><a style="text-decoration:none; display:block; color:#000;" href="detail?<?php echo $ryw['rand']; ?>"><div class="checkbox">
                                                <label>
                                                    <input value="<?php echo $ryw['rand']; echo " "; if($ryw['od'] === $nazwa) { echo "nad"; } else { echo "odb"; }  ?>" class="ulubieniec" type="checkbox">
                                                </label>
                                            </div>
                                            &nbsp;<span class="glyphicon glyphicon-star ulubione <?php echo $ryw['rand'];?>"></span>&nbsp;<span class="name" style="font-family: Raleway; min-width: 120px;
                                                display: inline-block;">Do:&nbsp;<?php if($ryw['do'] === $nazwa) { echo "ja"; } else { echo $ryw['do']; } ?></span>&nbsp;<span style=" font-family:Raleway;"><?php echo $ryw['temat']; ?></span>
                                            <div style="float:right;"><span style="font-family:Raleway;"><?php echo $piec[0]; ?></span><span style="display:none;"><?php echo $ryw['rand']; ?></span></div>
                           </a>
						   </td>                     
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>$("#zaznacz4").click(function () {
$(".ulubieniec").addClass("uu");
    $('.ulubieniec').prop('checked', true);
	$("#zaznacz4").hide();
	$("#odznacz4").show();
	$("#refresh4").hide();
	$("#thresh4").show();
});
$("#odznacz4").click(function () {
$(".ulubieniec").removeClass("uu");
    $( ".ulubieniec" ).prop( "checked", false );
	$("#zaznacz4").show();
$("#odznacz4").hide();
$("#refresh4").show();
$("#thresh4").hide();
});

  $(".ulubieniec").change(function () {
	if ($(this).hasClass("uu")) {
  	$(this).removeClass("uu");
}
else {
	$(this).addClass("uu");
}
    if ($('.ulubieniec:checked').length > 0) {
	$("#zaznacz4").hide();
	$("#odznacz4").show();
	$("#refresh4").hide();
	$("#thresh4").show();
	$("#thresh4").click(function () {
var checkedValues = $('.uu').map(function() {
    return this.value;
}).get();
var array = checkedValues;
var wyslane = localStorage.getItem('wyslane4') || '';
if (wyslane!= 'yes') {
var r = confirm("Czy na pewno chcesz usunąć zaznaczone wątki?");
localStorage.setItem('wyslane4','yes');
}
if (r == true) {
$.ajax({
     url: 'usunulub.php', 
     type: "POST",
     dataType:'json', 
     data: ({array: array}),
     success: function(data){
	 if(data === 'true'){
	 location.reload();
	 }
	 else if(data === 'false') {
	 alert("Coś poszło nie tak, spróbuj jeszcze raz!");
	 }
	
	 },
	 error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Żądana strona nie została znaleziona. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Wewnętrzny błąd serwera. [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Przekroczono czas odpowiedzi.';
        } else if (exception === 'abort') {
            msg = 'Żądanie zostało anulowane.';
        } else {
            msg = 'Nieznany błąd.\n' + jqXHR.responseText;
        }
        alert(msg);
    }
}); 
}
localStorage.setItem('wyslane4','');
});
    } else {
$("#zaznacz4").show();
$("#odznacz4").hide();
$("#refresh4").show();
$("#thresh4").hide();
    }
});
</script>
<script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#wymarzona').DataTable( {
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Szukaj:",
    "lengthMenu":     "Pokaż _MENU_ wiadomości",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych wiadomości",
    "emptyTable":     "Nie masz żadnych ulubionych wiadomości",
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

    } );

oTable .columns(0) .search('^(?:<?php echo $ulubione; ?>.)*$\r?\n?', true, false) .draw();
});</script>
    </div>
	<div id="menu3" class="tab-pane fade">
	<div>
	<button id="zaznacz3" class="barek" style="margin-top: 10px;" data-toggle="tooltip" data-placement="bottom" title="Zaznacz wszystkie"><i class="fa fa-square-o" aria-hidden="true"></i></i></button>
	<button id="odznacz3" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Odznacz"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
	<button id="refresh3" class="barek" style="margin-top: 10px;" onclick="location.reload();" data-toggle="tooltip" data-placement="bottom" title="Odśwież"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	<button id="thresh3" class="barek" style="margin-top: 10px; display:none;" data-toggle="tooltip" data-placement="bottom" title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>	</div>
            <div style="cursor:pointer; margin-top:5px;" class="table-responsive">
  <table id="drafts" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Wersje robocze</th>
            </tr> 
        </thead>
        <tbody>
     <?php 
	  
	  $array = $_COOKIE;
	  $arr = array_keys($array);
	  $wynik = count($arr);
	  for($x = $wynik;$x >= 1;$x--) {
	  if (strpos($arr[$x], 'draft') !== false) {	
	  $string = ($array[$arr[$x]]);
	  $czesci = explode(",", $string);
?>
                <tr>
				<td style="border-bottom: 1px solid #E5E5E5; background-color:#f0f0f0;"><a style="text-decoration:none; display:block; color:#000;" href="draft?<?php echo $arr[$x]; ?>"><div class="checkbox">
                                                <label>
                                                    <input class="drafty" value="<?php echo $arr[$x]; ?>" type="checkbox">
                                                </label>
                                            </div>
                                            &nbsp;<span class="name" style="font-family: Raleway; min-width: 120px; display: inline-block;">Do:&nbsp;<?php echo $czesci[0]; ?></span>&nbsp;<span style=" font-family:Raleway;"><?php echo $czesci[1]; ?></span>
                                      </a>
                           
						   </td>                     
                </tr>

            <?php
				}
		   }
            ?>
        </tbody>
    </table>
</div>
<script>$("#zaznacz3").click(function () {
$(".drafty").addClass("dr");
    $('.drafty').prop('checked', true);
	$("#zaznacz3").hide();
	$("#odznacz3").show();
	$("#refresh3").hide();
	$("#thresh3").show();
});
$("#odznacz3").click(function () {
$(".drafty").removeClass("dr");
    $( ".drafty" ).prop( "checked", false );
	$("#zaznacz3").show();
$("#odznacz3").hide();
$("#refresh3").show();
$("#thresh3").hide();
});
</script>
<script>
    $(".drafty").change(function () {
	if ($(this).hasClass("dr")) {
  	$(this).removeClass("dr");
}
else {
	$(this).addClass("dr");
}
    if ($('.drafty:checked').length > 0) {

	$("#zaznacz3").hide();
	$("#odznacz3").show();
	$("#refresh3").hide();
	$("#thresh3").show();
$("#thresh3").click(function () {
var Values = $('.dr').map(function() {
    return this.value;
}).get();
var wersje = localStorage.getItem('wersje') || '';
if (wersje != 'yes') {
var q = confirm("Czy na pewno chcesz usunąć zaznaczone wersje robocze?");
localStorage.setItem('wersje','yes');
}
localStorage.setItem('wersje','');
if (q == true) {
var len = Values.length;
for(x=0;x<len;x++){
var nam = Values[x];
eraseCookie(nam);
}
alert("Zaznaczone wersje robocze zostały usunięte");
location.reload();
}
});
    } else {
$("#zaznacz3").show();
$("#odznacz3").hide();
$("#refresh3").show();
$("#thresh3").hide();
    }
});
function eraseCookie(name) {
    createCookie(name,"",-1);
}
</script>
<script>
$(document).ready(function() {
var myCallback = function () { 
 };
    var oTable = $('#drafts').DataTable( {
	"pagingType": "full_numbers",
	"bSort" : false,
	"lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20,30,'Wszystko']],
	"order": [[ 0, "desc" ]],
		"language": {
    "processing":     "Przetwarzanie...",
    "search":         "Szukaj:",
    "lengthMenu":     "Pokaż _MENU_ wiadomości",
    "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "infoEmpty":      "Pozycji 0 z 0 dostępnych",
    "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "infoPostFix":    "",
    "loadingRecords": "Wczytywanie...",
    "zeroRecords":    "Nie znaleziono żadnych wersji roboczych",
    "emptyTable":     "Nie masz żadnych wersji roboczych ",
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

    } );

});</script>	
    </div>
  </div></div>
        <div class="col-sm-3">&nbsp;</div>
    </div>




</div>
<div id="mess" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wyślij nową wiadomość</h4>
      </div>
      <div class="modal-body"> 
	      <div class="form-group">
             <div id="wiadpo" style="display:none;" class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość została wysłana!
                </div>
             </div>
			  <div class="form-group">
             <div id="mnie" style="display:none;" class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span class="glyphicon glyphicon-info-sign"></span> Wiadomość nie została wysłana - użytkownik ,do którego chcesz wysłać wiadomość,zablokował Cię!
                </div>
</div>
 <div class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="do">Do:</label>
      <div class="col-sm-8">
     <select id="doo" style="width:100%; border:1px solid #CCCCCC; border-radius:5px; padding: 5px 3px;">
  <option disabled style="color:#000; font-weight:600;">Pracodawcy</option>
 <?php  mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM pradet WHERE name NOT IN('$nazwa') order by name";
            $results = mysql_query($sql);	
            while($rew = mysql_fetch_array($results)) { ?>
			<option value = "<?php echo $rew['name']; ?>"><?php echo $rew['name']; ?></option>
			<?php } ?>
  <option disabled style="color:#000; font-weight:600;">Użytkownicy</option>
  <?php  mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM userdet WHERE name NOT IN('$nazwa') order by name";
            $results = mysql_query($sql);
			
            while($ruw = mysql_fetch_array($results)) { ?>
			<option value = "<?php echo $ruw['name']; ?>"><?php echo $ruw['name']; ?></option>
			<?php } ?>
</select>
      </div>
    </div>
    <div id="th" class="form-group">
      <label class="control-label col-sm-2" for="thema">Temat:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="thema" placeholder="Temat wiadomości">
		<p id="temacik" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz temat wiadomości</p>
      </div>
    </div>
	<div id="wia" class="form-group">
      <label class="control-label col-sm-2" for="wiad">Wiadomość:</label>
	  <div class="col-sm-8">     
<textarea  class="form-control"  rows="6"  id="wiad" placeholder="Twoja wiadomość"></textarea>
<p id="tre" style="display:none; color: #a94442; font-size: 14px; margin-top: 5px; font-family: Muli; ">Wpisz treść wiadomości</p></div>
    </div>	
	<div id="an" class="form-group">
      <label class="control-label col-sm-2" for="wiad"><?php echo $math; ?>=</label>
	  <div class="col-sm-2">     
<input name="answer" id="answer" class="form-control" type="text" />
    </div></div>
    </div>
      </div>
      <div class="modal-footer">
        <button id="sendd" name="sendd" type="button"  class="btn btn-primary" disabled>Wyślij</button>
      </div>
    </div>
<script>		
var typingTimer;                
var doneTypingInterval = 500; 
 
$('#answer').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#answer').val) {
        typingTimer = setTimeout(function(){
		var cap = $('#answer').val();
			 
$.ajax({
     url: 'cap.php', 
     type: "POST",
     dataType:'json', 
     data: ({cap: cap}),
     success: function(data){
	 if (data == 'true') {
$("#an").addClass("has-success");
$("#an").removeClass("has-error");
$('#sendd').prop('disabled', false);
}
else if(data == 'false') {
$("#an").removeClass("has-success");
$("#an").addClass("has-error");
$("#sendd").prop("disabled", true );
}
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
        }, doneTypingInterval);
    }
});
   
</script>
<script>
function listCookies() {
    var theCookies = document.cookie.split(';');
    var aString = '';
    for (var i = 1 ; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i-1] + "\n";
    }
    return aString;
}
var q = listCookies();
var res = q.split("\n");
var len = res.length;
var temp = "0";
for(x=0;x<len;x++) {
var string = res[x],
    substring = "draft";
if(string.indexOf(substring) !== -1) {
var rest = string.split("=");
var piersz = rest[0];
var dalej = piersz.split("  ");
var porzadkowa = dalej[0];
var draft = dalej[1];
draft = draft.replace("draft", "");
console.log(draft);
var temp = 0;
if(draft > temp){
temp = draft;
}
}
}
temp = parseInt(temp,10);
temp = temp + 1;
temp = temp.toString(); 
var cookie = "draft";
var nazwa = cookie+temp;

function functionToRun(e){
        var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; 
    return confirmationMessage; 
}
$("#wiad").keyup(function(){
var x = $("#wiad").val().length;
var odb = $("#doo").val();
var temat = $("#thema").val();
var tresc = $("#wiad").val();
var value = odb+","+temat+","+tresc;
if(x > 0) {
createCookie(nazwa,value,7);
window.addEventListener("beforeunload", functionToRun);
}
else if(x === 0) {
window.removeEventListener("beforeunload",functionToRun);
eraseCookie(nazwa);
}

});
function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
function eraseCookie(name) {
    createCookie(name,"",-1);
}

$('#sendd').on('click', function(event) { 
event.preventDefault(); 
window.removeEventListener("beforeunload",functionToRun);
var doo = $('#doo').val();
var thema = $('#thema').val();
var wiad = $('#wiad').val();
var nadawca = <?php echo json_encode($userRow['userName']); ?>;
if(thema === "") {
$("#th").addClass("has-error");
$("#temacik").show();
}
else {
$("#th").removeClass("has-error");
$("#th").addClass("has-success");
$("#temacik").hide();
}
if(wiad === "") {
$("#wia").addClass("has-error");
$("#tre").show();
}
else {
$("#wia").removeClass("has-error");
$("#wia").addClass("has-success");
$("#tre").hide();
}
 if(doo && thema && wiad) {
$("#tre").hide();
$("#temacik").hide();
$("#th").removeClass("has-error");
$("#wia").removeClass("has-error");
$.ajax({
     url: 'send.php', 
     type: "POST",
     dataType:'json', 
     data: ({doo: doo,thema: thema, wiad: wiad,nadawca: nadawca}),
     success: function(data){
	 if (data == 'true') {
	 eraseCookie(nazwa);
	    if(window.location.hash) {
  location.reload();
} 
else {
window.location.href += "#good";
location.reload();
}
}
else if(data == 'mnie') {
$("#mnie").show();
}
else if(data == 'ja') {
alert("Nie można wysłać wiadomości do użytkownika, który jest na czarnej liście!");
}
	 },
	 error: function () {
       alert("Coś poszło nie tak, spróbuj jeszcze raz!");
      }
});
}
});

</script>
  </div>
</div>
   <div class="row"><footer class="footer-distributed">

			<div class="footer-right">

				<a href="https://www.facebook.com/Woorkerpl"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/woorkerpl"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="hall"><i class="fa fa-university" aria-hidden="true"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="home" >Strona główna</a>
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