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
<title>FAQ</title>
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
        <div class="col-sm-8" style="min-height:450px; background: #fff; border-radius: 4px; border: 1px #f0f0f0 solid; "><h3 style=" font-family:Muli; text-align: center;" class="cookie">Najczęściej zadawane pytania (FAQ)</h3>
		   <h3 style="text-align:center; margin-top:15px; font-size:25px; font-family:Muli;" class="cookie">Ogólne</h3>
		  
		  <div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse1">Czym jest mrwork.pl</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">mrwork.pl to serwis umożliwiający znalezienie pracy przez młodzież w wieku od 13 do 19 lat oraz pracodawcom na znalezienie takich pracowników. Co więcej, dzięki opcji pomoc sąsiedzka ,pozwalamy na łączenie osób, które szukają małych zleceń tj. wyprowadzenie psa czy przyniesienie zakupów.</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse2">Pierwsze kroki</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><b>Witamy w serwisie mrwork.pl!</b>Aby rozpocząć użytkowanie serwisu:
		<br><b>1.</b> Zarejestruj się poprzez <a href="register">formularz rejestracji</a>
		<br><b>2.</b> Aktywuj swoje konto klikając w link wysłany na podany przy rejestracji adres email.
		<br><b>3.</b> Zaloguj się i uzupełnij wymagane informacje w ustawieniach konta
		<br><b>4.</b> Twoje konto jest gotowe!
		
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse55">Skąd pochodzą zdjęcia, które są na tłach?</a>
        </h4>
      </div>
      <div id="collapse55" class="panel-collapse collapse">
        <div class="panel-body">Wszystkie te <b>niesamowite</b> tła pochodzą z serwisu <a href="https://unsplash.com/">unsplash.com</a> i są na licencji CC0.
		
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse54">Czym jest konkurs na Miniprzedsiębiorstwo?</a>
        </h4>
      </div>
      <div id="collapse54" class="panel-collapse collapse">
        <div class="panel-body">To konkurs organizowany przez Fundację Młodzieżowej Przedsiębiorczości, który polega na założeniu przez uczniów realnie działającej firmy. Firma ta sprzedaje produkty bądź usługi.
		Po więcej informacji zapraszamy na <a href="http://www.miniprzedsiebiorstwo.junior.org.pl/pl">stronę konkursu</a>.
		
		</div>
      </div>
    </div>
	
<h3 style="text-align:center; margin-top:15px; font-size:25px; font-family:Muli;" class="cookie">Dla użytkowników</h3>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse96">Nie dostałem linku aktywacyjnego </a>
        </h4>
      </div>
      <div id="collapse96" class="panel-collapse collapse">
        <div class="panel-body">Jeżeli nie dostałeś linku aktywacyjnego w ciągu 5 minut ,sprawdź czy nie ma go w folderze SPAM-u. Niektórzy dostawcy tj. Gmail uznają nasze wiadomości jaki SPAM.
		<br>Jeżeli i tam nie ma maila ,prosimy o kontakt na adres <a href="mailto:kontakt@mrwork.pl">kontakt@mrwork.pl</a>.
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse95">Błąd "Coś poszło nie tak" </a>
        </h4>
      </div>
      <div id="collapse95" class="panel-collapse collapse">
        <div class="panel-body">Wyświetlenie się tego błędu spowodowane jest błędem wewnętrznym działania strony. W przypadku kiedy się pojawi:
		<br><b>a.</b> Odśwież stronę i wykonaj czynność jeszcze raz
		<br><b>b.</b> Wyłącz stronę i wyczyść pliki cookie
		<br><b>c.</b> Skontaktuj się z nami przez <a href="bad">formularz zgłoszenia błędu</a>. Prosimy o dokładny opis ,jeżeli to możliwe, razem z zrzutami ekranu.
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse94">Jak zmienić adres email/hasło? </a>
        </h4>
      </div>
      <div id="collapse94" class="panel-collapse collapse">
        <div class="panel-body">Hasło możesz zmienić w zakładce Ustawienia konta -> Zmień email/hasło.
		<br><b>Pamiętaj!</b> Przy zmianie adresu email potrzebne jest potwierdzenie poprzez kliknięcie linku przysłanego na nowy adres email!
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse93">Zapomniałem hasła</a>
        </h4>
      </div>
      <div id="collapse93" class="panel-collapse collapse">
        <div class="panel-body">Aby zmienić zapomniane hasło użyj <a href="reset">formularza przywracania hasła</a>.
		
		</div>
      </div>
    </div>
	
<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse99">Dlaczego widzę tylko 5 ogłoszeń?</a>
        </h4>
      </div>
      <div id="collapse99" class="panel-collapse collapse">
        <div class="panel-body">Jeżeli Twoje konto nie jest premium ,widzisz tylko 5 najnowszych ogłoszeń pracodawców oraz 5 w pomocy sąsiedzkiej. 
		<br>Aby móc zobaczyć wszystkie ogłoszenia ,<a href="premium">kup konto Premium</a>!
		</div>
      </div>
    </div>
		
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse97">Jak dodać ogłoszenie do pomocy sąsiedzkiej? </a>
        </h4>
      </div>
      <div id="collapse97" class="panel-collapse collapse">
        <div class="panel-body">Aby dodać ogłoszenie do pomocy sąsiedzkiej:
		<br><b>1.</b> Zaloguj się na swoje konto
		<br><b>2.</b> Przejdź do formularza <a href="pomadd">dodawawania ogłoszenia</a>
		<br><b>3.</b> Wypełnij wymagane dane
		<br><b>4.</b> Naciśnij "Dodaj"
		<br><b>5.</b> Twoje ogłoszenie zostało dodane!
		<br><b>Dodatkowe informacje:</b> W każdej chwili możesz zobaczyć jak będzie wyglądać Twoje ogłoszenie poprzez kliknięcie "Zobacz podgląd"
		<br><b>Pamiętaj!</b> Jeżeli nie posiadasz konta Premium, możesz dodać tylko 2 ogłoszenia na raz!
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse98">Co daje konto Premium?</a>
        </h4>
      </div>
      <div id="collapse98" class="panel-collapse collapse">
        <div class="panel-body">Konto Premium pozwala m.in. przeglądać wszystkie ogłoszenia dostępne w serwisie, nieograniczoną ilość dodawanych ogłoszeń w pomocy sąsiedzkiej czy możliwość wyróżnienia jednego ogłoszenia.
		<br>Po więcej informacji zapraszamy na <a href="premium">stronę informującą o koncie Premium</a>.
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse92">Czy mogę przedłużyć okres obowiązywania konta Premium?</a>
        </h4>
      </div>
      <div id="collapse92" class="panel-collapse collapse">
        <div class="panel-body">Tak! Jeżeli podczas obowiązywania wprowadzisz kolejny kod na <a href="kup">stronie kupna</a>, okres obowiązywania konta Premium zostanie wydłużony o 30 dni.
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse91">Wchodząc w ofertę/profil widzę stronę 404.</a>
        </h4>
      </div>
      <div id="collapse91" class="panel-collapse collapse">
        <div class="panel-body">Prawdopodobnie profil użytkownika lub oferta została usunięta.
		</div>
      </div>
    </div>
		
		<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse90">Jak usunąć konto?</a>
        </h4>
      </div>
      <div id="collapse90" class="panel-collapse collapse">
        <div class="panel-body">Aby usunąć konto wejdź w Ustawienia konta -> Usunięcie konta.
		<br><b>Pamiętaj!</b> Stracisz dostęp do wszytkich informacji zgromadzonych na koncie 
		<br>Wszystkie wiadomości zostaną usunięte 
		<br>Ta operacja jest nieodwracalna!
		</div>
      </div>
    </div>
	
<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse89">Pomimo weryfikacji ,widzę że moje konto jest niezweryfikowane</a>
        </h4>
      </div>
      <div id="collapse89" class="panel-collapse collapse">
        <div class="panel-body">W przypadku uzasadnionego zgłoszenia użytkownika, zawieszamy konto poprzez cofnięcie weryfikacji konta do czasu wyjaśnienia sprawy.
		W momencie drugiego zgłoszenia konto jest usuwane permanetnie.
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse88">Nie otrzymałem kodu Premium.</a>
        </h4>
      </div>
      <div id="collapse88" class="panel-collapse collapse">
        <div class="panel-body">W razie jakichkolwiek nieprawidłowości, prosimy o <a href="https://simpay.pl/reklamacje">reklamację</a> u dostawcy usługi oraz kontakt z <a href="contact">administracją serwisu</a>
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse87">Nie mogę usunąć wiadomości.</a>
        </h4>
      </div>
      <div id="collapse87" class="panel-collapse collapse">
        <div class="panel-body">Jeżeli na stronie mrwork.pl/mess nie pojawia się alert po kliknięciu odpowiedniego przycisku, należy odznaczyć kilka checkboxów i zaznaczyć na nowo. 
		<br>Jeżeli problem występuje na stronie mrwork.pl/detail ,oznacza to że nie pojawia się alert. Może być to spowodowane blokowaniem wyskakujących alertów przez przeglądarkę. Należy wtedy ją zresetować.
		</div>
      </div>
    </div>
	
	

<h3 style="text-align:center; margin-top:15px; font-size:25px; font-family:Muli;" class="cookie">Dla pracodawców</h3>

<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse3">Jak dodać ogłoszenie?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><b>Aby dodać ogłoszenie:</b>
		<br><b>1.</b> Zaloguj się na swoje konto
		<br><b>2.</b> Przejdź do formularza <a href="add">dodawawania ogłoszenia</a>
		<br><b>3.</b> Wypełnij wymagane dane
		<br><b>4.</b> Naciśnij "Dodaj"
		<br><b>5.</b> Twoje ogłoszenie zostało dodane!
		<br><b>Dodatkowe informacje:</b> W każdej chwili możesz zobaczyć jak będzie wyglądać Twoje ogłoszenie poprzez kliknięcie "Zobacz podgląd"
		
		</div>
      </div>
    </div>
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse4">Jak edytować lub usunąć ogłoszenie ogłoszenie?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><b>Aby edytować/usunąć ogłoszenie:</b>
		<br><b>1.</b> Zaloguj się na swoje konto
		<br><b>2.</b> Przejdź do zakładki <a href="mine">Moje ogłoszenia</a>
		<br><b>3.</b> Wybierz interesującą Cię opcje poprzez kliknięcie odpowiedniego przycisku
		<br><b>4a.</b> Wybranie opcji "Edytuj" przekieruje Cię do formularza edycji ,bardzo podobnego do tego przy dodawaniu ogłoszenia
		<br><b>4b.</b> Wybranie opcji "Usuń" spowoduje usunięcie ogłoszenia
		<br><b>Uwaga!</b> Pamiętaj, że po usunięciu ogłoszenia ,nie ma możliwości przywrócenia go!
		
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse5">Jak dodać logo firmy?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Aby dodać logo do swojego profilu:
		<br><b>1.</b> Zaloguj się na swoje konto
		<br><b>2.</b> Wejdź na swój profil
		<br><b>3.</b> Kliknij "Dodaj" pod tymczasowym logiem
		<br><b>4.</b> Po załadowaniu pliku kliknij "Wyślij"
		<br><b>Pamiętaj!</b> Twoje logo nie może łamać przepisów prawa oraz <a href="regulamin">regulaminu</a> serwisu mrwork.pl.
		<br>Logo musi mieć rozszerzenie .jpg, .png, .jpeg, .gif lub .bmp i nie może przekraczać 1Mb!
		<br>W każdej chwili możesz zmienić logo na inne klikając "Zmień logo" w swoim profilu.
		</div>
      </div>
    </div>
	
	<div class="panel panelik panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style=" font-weight: 700; font-family: Muli; " href="#collapse11">Nie widzę podglądu ogłoszenia</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">Podgląd ogłoszenia wyświetla się w nowym okienku. Niektóre przeglądarki mogą blokować wyświetlanie tzw. Pop-Up Window.
		</div>
      </div>
    </div>
	
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
					<a href="home" >Strona główna</a>
					·
					<a href="regulamin">Regulamin</a>
					·
					<a class="active" href="faq">FAQ</a>
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