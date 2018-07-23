<?php
 ob_start();
 session_start();
 require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
 
 // jeżeli sesja nie jest ustanowiona przekieruj do ekranu logowania
 if( !isset($_SESSION['user']) ) {
  $styl = "display:none;";
 }
 else {
 $bez = "display:none;";
  $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
    $mine = $userRow['pracodawca'];
if (strpos($mine, '1') !== false) {
    $linek = 'profile?ran='.$userRow['profilehash'];
}
else {
$linek = 'usprofile?ran='.$userRow['profilehash'];
}
}
  $nazwa = $userRow['userName'];
 $rer1 = mysql_query("SELECT * FROM `mess` WHERE do='$nazwa' and przecz=0 and usunodb=0");
$nieod1 = mysql_num_rows($rer1);
 $rer2 = mysql_query("SELECT * FROM `mess` WHERE od='$nazwa' and przecznad=0 and usunnad=0");
$nieod2 = mysql_num_rows($rer2);
$nieod = $nieod1+$nieod2;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<title>Zasady używania plików cookie</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
 <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script> 

</head>
<body>
<nav style="<?php echo $bez; ?>" class="navbar navbar-default">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" style="margin-left: 20px;" href="/"><img class="ele" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right" >
<li><a href="login"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Zaloguj się</a></li>
      </ul>
    </div>
</nav>
<nav style="<?php echo $styl; ?>" class="navbar navbar-default">
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
    <div class="row">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-8" style=" background: #fff; border-radius: 4px; border: 1px #f0f0f0 solid; "><h3 class="cookie">Pliki cookie</h3>
		<p class="monster">Aby zapewnić sprawne funkcjonowanie tego portalu, czasami umieszczamy na komputerze użytkownika (bądź innym urządzeniu) małe pliki – tzw. cookies („ciasteczka”). Podobnie postępuje większość dużych witryn internetowych.</p>
		<h3 class="cookie">Czym są pliki cookie?</h3>
		<p class="monster">„Cookie” to mały plik tekstowy, który strona internetowa zapisuje na komputerze lub urządzeniu przenośnym internauty w chwili, gdy ten ją przegląda. Strona ta może w ten sposób zapamiętać na dłużej czynności i preferencje internauty (takie jak nazwa użytkownika, język, rozmiar czcionki i inne opcje). Dzięki temu użytkownik nie musi wpisywać tych samych informacji za każdym razem, gdy powróci na tę stronę lub przejdzie z jednej strony na inną.</p>
		<h3 class="cookie">Jak używamy plików cookie?</h3>
		<p class="monster">Nasza strona używa plików cookie, aby:
<ul><li>ułatwiać logowanie ,gdy zaznaczona jest opcja "Zapamiętaj mnie",</li>
<li>aby zapewnić bezpieczeństwo i przyśpieszyć dostęp do <a href="mess">"Wersji roboczych"</a>, są one trzymane w plikach cookies, zapisanych na komputerze,</li>
<li>sprawdzenie, czy użytkownik wyraził zgodę na korzystanie przez stronę z plików cookie.</li></ul>
Aktywowanie plików cookie nie jest konieczne do funkcjonowania strony, a jedynie ułatwia użytkownikom przeglądanie jej zawartości. Cookies można usunąć albo zablokować, ale w takim wypadku niektóre elementy tej strony mogą nie działać prawidłowo.
Informacje związane z plikami cookie nie są wykorzystywane do zidentyfikowania użytkownika, a dane dotyczące preferencji są pod ścisłą kontrolą. Nie używamy plików cookie do żadnych innych celów niż te opisane na tej stronie.</p>
	<h3 class="cookie">Jak kontrolować pliki cookie?</h3>	
	<p class="monster">Pliki cookie można samodzielnie kontrolować i usuwać – szczegóły są dostępne na stronie <a href="http://wszystkoociasteczkach.pl/">wszystkoociasteczkach.pl</a> Można usunąć wszystkie pliki cookie zamieszczone na swoim komputerze, a w większości przeglądarek wybrać ustawienie, które uniemożliwia instalowanie tych plików. W takim przypadku może się okazać konieczne dostosowanie niektórych preferencji przy każdej wizycie na danej stronie, a część opcji i usług może być niedostępna.</p>	
		</div>
        <div class="col-sm-2">&nbsp;</div>
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