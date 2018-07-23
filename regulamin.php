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
<title>Regulamin | mrwork.pl</title>
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
        <div class="col-sm-8" style="background: #fff; text-align: justify; border-radius: 4px; border: 1px #f0f0f0 solid; min-height:450px; "><h3 class="cookie">Regulamin serwisu mrwork.pl</h3>
	<a href="regulaminmrwork.pdf" role="button" class="btn btn-primary btn-md"><b>Pobierz w formacie .pdf</b></a> 
	<h3 class="cookie" style="margin-top:15px; font-size:25px;">I. DEFINICJE</h3>
	<p class="monster"><b>Usługodawca bądź Operator</b> – firma Woorker.pl posiadająca siedzibę w Bydgoszczy, ul. 11 Listopada 4, powstała na rzecz konkursu młodzieżowe miniprzedsiębiorstwo.
<br><b>Serwis</b> – serwis internetowy należący do Usługodawcy, w ramach których Usługodawca świadczy Usługi. Serwis umieszczony jest pod adresem mrwork.pl. 
<br><b>Użytkownik</b> – osoba fizyczna, która ukończyła 13 rok życia, korzysta z usług serwisu, które nie wymagają założenia konta.
<br><b>Usługobiorca</b> – osoba fizyczna, która posiada Konto, ukończyła 13 rok życia, ma zgodę rodzica/opiekuna prawnego na korzystanie z serwisu i korzysta z Usług świadczonych drogą elektroniczną przez Usługodawcę.
<br><b>Konto</b> - zbiór zasobów i ustawień utworzonych dla Usługobiorcy w ramach Serwisów. Usługobiorca może wykorzystywać Konto do zarządzania Usługami.
<br><b>Profil</b> - funkcjonalność Konta, pozwalająca Usługobiorcy na gromadzenie wybranych informacji, w tym dotyczących przebiegu jego kariery zawodowej, historii edukacji oraz innych umiejętności.
<br><b>Limit</b> - dopuszczalna liczba darmowych Ogłoszeń przewidziana dla każdego Ogłoszenia, po przekroczeniu której, w celu zamieszczenia kolejnego Ogłoszenia w Serwisie konieczne jest wykupienie Pakietu premium.
<br><b>Usługi</b> - wszelkie usługi świadczone drogą elektroniczną przez Usługodawcę na rzecz Użytkowników i Usługobiorców w oparciu o niniejszy Regulamin. Wykaz i opis Usług umieszczony został w Załączniku nr 2 do niniejszego Regulaminu, stanowiącym jego integralną część. Usługobiorca może samodzielnie modyfikować zakres Usług za pomocą odpowiednich ustawień funkcjonalności Ustawienia Prywatności.
<br><b>Cennik</b> – Spis kosztów pobieranych za daną usługę
<br><b>Regulamin</b> – niniejszy regulamin 
	<br><br><b>II. POSTANOWIENIA OGÓLNE</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
	<br><b>1.</b> Użytkownik sam ustala treść Ogłoszenia, zachowując przy tym zgodność ze stanem faktycznym.
<br><b>2.</b> Zamieszczenie Ogłoszenia jest równoznaczne z zamiarem dokonania transakcji, dotyczącej Go.
<br><b>3.</b> Ogłoszenia są ogólnodostępne dla wszystkich internautów. Każdemu użytkownikowi umożliwia się skontaktowanie z ogłoszeniodawcą za pośrednictwem, zamieszczonego wraz z Ogłoszeniem, formularza kontaktowego, który przesyła wiadomości na adres e-mail przypisany do Ogłoszenia.
<br><b>4.</b> Publikacja Ogłoszenia w Serwisie w liczbie nieprzekraczającej Limitu jest bezpłatna. Przekroczenie Limitu oznacza obowiązek wykupienia przez Użytkownika Pakietu, chyba, że Limit przekroczony został tylko o jedno Ogłoszenie, w takim przypadku stosuje się opłaty dokładniej opisane w cenniku.
<br><b>5.</b> Po przekroczeniu Limitu Użytkownik otrzymuje komunikat z informacją o jego przekroczeniu oraz o konieczności dokonania opłaty, o której mowa w punkcie 4 lub o konieczności wykupu Pakietu.
<br><b>6.</b> Użytkownik jest odpowiedzialny za publikowane treści (w tym zdjęcia) i gwarantuje, że są one zgodne ze stanem faktycznym oraz prawem a ich publikacja nie narusza praw Usługodawcy, Regulaminu oraz praw osób trzecich, w tym praw autorskich.
<br><b>7.</b> Treść ogłoszenia powinna być jasna i czytelna. Niedopuszczalne jest wprowadzanie w błąd potencjalnego pracodawcy, co może odbić się na opinii Użytkownika. W takim przypadku Serwis zastrzega sobie prawo do usunięcia konta.
<br><b>8.</b> Użytkownik, zgadzając się na emisję Ogłoszenia w Serwisie, wyraża jednocześnie zgodę na równoległą jego publikację oraz publikację elementów Ogłoszenia (w tym zdjęć zawartych w Ogłoszeniu) u partnerów Usługodawcy. W przypadku emisji części Ogłoszenia, nie będą ujawnione dane kontaktowe Użytkownika, jednakże wskazany zostanie sposób zapoznania się z całym Ogłoszeniem. Publikacja Ogłoszenia u partnerów jest bezpłatna i służy pozyskaniu jak największej liczby potencjalnych odbiorców Ogłoszenia.
<br><b>9.</b> Usługodawca chroni dane Użytkowników zgodnie z polityką prywatności określoną w Załączniku nr 1 do Regulaminu stanowiąca jego integralną część.

	<br><br><b>III. OGŁOSZENIA</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
	<br><b>1.</b> Zamieszczenie Ogłoszenia wymaga akceptacji Regulaminu, wypełnienia przez Użytkownika odpowiedniego formularza lub utworzenia Konta.
<br><b>2.</b> W przypadku wypełnienia formularza, o którym mowa powyżej, na podany przez Użytkownika adres e-mail zostanie niezwłocznie wysłana wiadomość zwrotna Usługodawcy służąca do aktywacji Ogłoszenia oraz zawierająca inne wymagane prawem informacje.
<br><b>3.</b> Utworzenie Konta obok aktywacji Ogłoszeń zapewnia Użytkownikowi dodatkowo pełen dostęp do jego Ogłoszeń ( np. w celu ich modyfikacji) i korespondencji z innymi Użytkownikami. Aktywacja Konta następuje po utworzeniu hasła i wskazaniu adresu e-mail przez Użytkownika na odpowiedniej stronie Serwisu mrwork.pl. Po dokonaniu czynności, o których mowa w zdaniu poprzednim, Usługodawca na podany przez Użytkownika adres e-mail wyśle wiadomość wskazującą sposób aktywacji Konta (link aktywacyjny) oraz inne wymagane prawem informacje.
<br><b>4.</b> Utworzenie Konta i/lub zamieszczenie pierwszego Ogłoszenia jest równoznaczne z zawarciem umowy pomiędzy Użytkownikiem a Usługodawcą w przedmiocie świadczenia usług na warunkach przewidzianych w Regulaminie.
<br><b>5.</b> Użytkownik może posiadać i korzystać tylko z jednego Konta w Serwisie.
<br><b>6.</b> Niedozwolone jest używanie tymczasowych adresów email, zarówno do tworzenia Konta jak i zamieszczenia Ogłoszenia.
<br><b>7.</b> Świadczenie usług przez Usługodawcę w ramach Konta w Serwisie ma charakter bezterminowy, jednakże Użytkownik może w dowolnym momencie usunąć Konto i tym samym rozwiązać umowę z Operatorem będąc zalogowanym na swoim Koncie poprzez wybranie odpowiedniej opcji
	
<br><br><b>IV. PRAWA I OBOWIĄZKI USŁUGODAWCY, UŻYTKOWNIKÓW I USŁUGOBIORCÓW</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Usługodawca zastrzega sobie prawo do:
<br><b style=" padding-left: 15px; ">a.</b> przejściowego zaprzestania świadczenia Usług ze względu na czynności konserwacyjne lub związane z modyfikacją Serwisów,
<br><b style=" padding-left: 15px; ">b.</b> wysyłania komunikatów technicznych, prawnych i transakcyjnych związanych z funkcjonowaniem Usług,
<br><b style=" padding-left: 15px; ">c.</b> odmowy świadczenia Usług jeśli Użytkownik lub Usługobiorca narusza Regulamin,
<br><b style=" padding-left: 15px; ">d.</b> dowolnej modyfikacji świadczonych Usług, narzędzi oraz sposobu działania Serwisów, poprzez zmianę Regulaminu. 
<br><b style=" padding-left: 15px; ">e.</b> zamknięcia serwisu i jednocześnie zakończenia świadczenia wszelkich usług w każdym momencie, po uprzednim poinformowaniu wcześniej wszystkich użytkowników na 30 dni przed planowanym zakończeniem świadczenia wszelkich usług.
<br><b>2.</b> Usługodawca zastrzega sobie prawo do zaprzestania świadczenia Usług, usunięcia wszelkich danych Usługobiorców oraz podjęcia wszelkich innych dozwolonych prawem czynności związanych z Serwisami, z tytułu których Użytkownikowi i Usługobiorcy nie będą przysługiwać żadne roszczenia wobec Usługodawcy.
<br><b>3.</b> Usługobiorca ma prawo zarządzania Usługami za pośrednictwem Konta oraz Ustawień Prywatności, w tym edytowania podanych przez siebie danych w dowolnym momencie.
<br><b>4.</b> W przypadku skorzystania przez Usługobiorcę z Usług związanych z publicznym udostępnieniem w Serwisach swojego wizerunku wyraża on zgodę na takie udostępnienie. Usługobiorca udziela niewyłącznej licencji, nieograniczonej w przestrzeni na czas realizacji Usług, do utworów, których jest autorem a wykorzystywanych w ramach korzystania z Usług na następujących polach eksploatacji: wytwarzanie, zwielokrotnianie, publiczne odtworzenie i wyświetlanie, wprowadzenie do pamięci komputera i serwerów sieci komputerowych, umieszczanie w sieci Internet.
<br><b>5.</b> Użytkownik i/lub Usługobiorca korzystając z Usług zobowiązani są do powstrzymania się od:
<br><b style=" padding-left: 15px; ">a.</b> podawania nieprawdziwych bądź nieaktualnych informacji oraz danych osobowych,
<br><b style=" padding-left: 15px; ">b.</b> publikacji oraz przesyłania treści obraźliwych, sprzecznych z prawem lub naruszających chronione prawem dobra osobiste osób trzecich,
<br><b style=" padding-left: 15px; ">c.</b> wykorzystywania Usług do publikacji reklam towarów i usług oraz wszelkich informacji o charakterze komercyjnym,
<br><b style=" padding-left: 15px; ">d.</b> kopiowania, modyfikowania, rozpowszechniania, transmitowania lub wykorzystywania w inny sposób jakichkolwiek utworów i baz danych udostępnionych w Serwisach, za wyjątkiem korzystania z nich w ramach dozwolonego użytku,
<br><b style=" padding-left: 15px; ">e.</b> podejmowania jakichkolwiek działań, które mogą utrudnić lub zakłócić funkcjonowanie Serwisów oraz od korzystania z Serwisów w sposób uciążliwy dla Usługodawcy oraz innych Użytkowników i Usługobiorców,
<br><b style=" padding-left: 15px; ">f.</b> wykorzystywania Usług w sposób sprzeczny z prawem, dobrymi obyczajami, naruszający dobra osobiste osób trzecich lub uzasadnione interesy Usługodawcy.
<br><b>6.</b> Użytkownik i Usługobiorca zobowiązani są do niezwłocznego zawiadamiania Usługodawcy o znanych im przypadkach naruszania Regulaminu oraz o bezprawnym charakterze danych lub związanej z nimi działalności. Operator po otrzymaniu takiego zawiadomienia podejmie przewidziane prawem działania, w tym niezwłocznie uniemożliwi dostęp do takich danych.
<br><b>7.</b> Niezależnie od postanowień powyższych punktów Usługodawca zastrzega sobie prawo do zablokowania dostępu do zasobów Usługobiorców zawierających treści niezgodne z Regulaminem, w tym treści erotyczne, pornograficzne, zawierające nielegalne oprogramowanie lub informację na temat jego pozyskania, oraz inne treści sprzeczne z prawem, dobrymi obyczajami lub uzasadnionymi interesami Usługodawcy, w razie powzięcia wiarygodnych, uzasadnionych informacji na ten temat.

<br><br><b>V. ODPOWIEDZIALNOŚĆ</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Usługodawca oraz Użytkownik i Usługobiorca zobowiązani są do naprawienia szkody, jaką druga strona poniosła na skutek niewykonania lub nienależytego wykonania przez nich obowiązków wynikających z Regulaminu, chyba że ich niewykonanie lub nienależyte wykonanie było następstwem okoliczności, za które strona nie ponosi odpowiedzialności, w szczególności siły wyższej.
<br><b>2.</b> Usługodawca, który otrzymał urzędowe zawiadomienie lub wiarygodną wiadomość o bezprawnym charakterze danych przekazanych przez Usługobiorcę i uniemożliwił dostęp do tych danych, nie ponosi względem nich odpowiedzialności za powstałą szkodę.
<br><b>3.</b> Usługodawca nie ponosi wobec Użytkownika i Usługobiorcy naruszających Regulamin odpowiedzialności za jakiekolwiek szkody powstałe na skutek zaprzestania świadczenia im Usług, w tym na skutek usunięcia Konta.
<br><b>4.</b> Usługodawca nie ponosi ponadto odpowiedzialności za:
<br><b style=" padding-left: 15px; ">a.</b> jakiekolwiek szkody wyrządzone osobom trzecim, powstałe w wyniku korzystania przez Użytkowników i Usługobiorców z Usług w sposób sprzeczny z Regulaminem lub przepisami prawa,
<br><b style=" padding-left: 15px; ">b.</b> za treści udostępniane przez Użytkowników i Usługobiorców za pośrednictwem Usług, które to treści naruszają prawo lub chronione prawem dobra osób trzecich,
<br><b style=" padding-left: 15px; ">c.</b> informacje oraz materiały pobrane, zamieszczone w Serwisach lub wysyłane za pośrednictwem sieci Internet przez Użytkowników i Usługobiorców,
<br><b style=" padding-left: 15px; ">d.</b> utratę przez Usługobiorcę danych spowodowaną działaniem czynników zewnętrznych (np. awaria sprzętu) lub też innymi okolicznościami niezależnymi od Usługodawcy (działanie osób trzecich), w tym zawinionymi przez Usługobiorcę,
<br><b style=" padding-left: 15px; ">e.</b> szkody wynikłe na skutek braku ciągłości dostarczania Usług, będące następstwem okoliczności, za które Usługodawca nie ponosi odpowiedzialności (siła wyższa, działania i zaniechania osób trzecich itp.),
<br><b style=" padding-left: 15px; ">f.</b> podania przez Usługobiorców nieprawdziwych, nieaktualnych lub niepełnych danych lub informacji,
<br><b style=" padding-left: 15px; ">g.</b> nieprzestrzeganie przez Użytkowników i Usługobiorców postanowień Regulaminu.
<br><b>5.</b> Usługodawca nie ponosi odpowiedzialności za treści generowane przez Użytkowników.

<br><br><b>VI. OCHRONA DANYCH OSOBOWYCH</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Każdy Użytkownik i Usługobiorca ma prawo do ochrony jego prywatności przez Usługodawcę. Polityka Prywatności jest dostępna w każdym Serwisie i stanowi Załącznik nr 1 do niniejszego Regulaminu.
<br><b>2.</b> Usługodawca przetwarza dane osobowe Użytkownika i Usługobiorcy niezbędne do nawiązania, ukształtowania treści, zmiany lub rozwiązania umowy o świadczenie Usług przez Usługodawcę oraz wyłącznie w celu prawidłowej realizacji Usług, określonych Regulaminem, zgodnie z ustawą z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną (Dz. U. Nr 144, poz. 1204 z późn. zm.). Dane osobowe Użytkownika i Usługobiorcy przetwarzane są z zachowaniem zasad bezpieczeństwa wymaganych ustawą z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (tj. Dz. U. z 2014 r. poz. 1182, 1662).
<br><b>3.</b> Usługodawca jest administratorem danych osobowych i dochowuje najwyższej staranności w ochronie danych osobowych przestrzegając technicznych i organizacyjnych środków ochrony danych osobowych, o których mowa w art. 36 – 39 a ustawy z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (tj. Dz. U. z 2014 r. poz. 1182, 1662). Dane osobowe Użytkownika i Usługobiorcy przetwarzane są w celu świadczenia Usług, o jakich mowa w Regulaminie oraz w prawnie usprawiedliwionym celu administratora danych. Podmiot danych ma prawo dostępu do treści swoich danych oraz ich poprawiania. Podanie danych jest dobrowolne ale warunkuje możliwość świadczenia Usług.
<br><b>4.</b> Dane osobowe Usługobiorców mogą być wykorzystywane przez Usługodawcę do celów przesyłania drogą elektroniczną informacji handlowych pochodzących od Usługodawcy lub osób trzecich, wyłącznie po wyrażeniu przez Usługobiorcę odrębnej, wyraźnej zgody na takie wykorzystanie.
<br><b>5.</b> Usługodawca nie ponosi odpowiedzialności za jakiekolwiek działania pracodawców mające związek z treścią lub zakresem danych osobowych oraz za szkody powstałe w ich następstwie dla podmiotu danych.

<br><br><b>VII. KONTAKT Z USŁUGODAWCĄ</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Użytkownicy i Usługobiorcy mogą kontaktować się z Usługodawcą we wszelkich sprawach innych niż reklamacje na adres: <a href="mailto:kontakt@mrwork.pl">kontakt@mrwork.pl</a>.
	
<br><br><b>VIII. POSTANOWIENIA KOŃCOWE</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Firma woorker.pl powstała na potrzeby konkursu młodzieżowe miniprzedsiębiorstwo i zastrzega sobie prawo:
<br><b style=" padding-left: 15px; ">a.</b> do zakończenia świadczenia usług w chwili zakończenia konkursu, lub przekroczenia kwoty zarobku o wartości 4200 złotych.
<br><b style=" padding-left: 15px; ">b.</b> do zmiany regulaminu w celu jego aktualizacji w każdej chwili
<br><b style=" padding-left: 15px; ">c.</b> do usunięcia konta użytkownika naruszającego regulamin.
<br><b>2.</b> Każdy użytkownik jak i usługobiorca jest zobowiązany do przestrzegania niniejszego regulaminu.

<br><br><b>ZAŁĄCZNIK NR 1</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>a)</b> Operatorem Serwisu mrwork.pl jest firma woorker.pl (pełne dane kontaktowe)
<br><b>b)</b> Serwis zbiera informacje o użytkowniku w następujący sposób: 
<br><b style=" padding-left: 15px; ">•</b> Poprzez dobrowolnie wprowadzone w formularzach informacje
<br><b style=" padding-left: 15px; ">•</b> Poprzez zapisywanie w urządzeniach końcowych plików cookie
<br><b>c)</b> Użytkownik przyjmuje do wiadomości, że obsługę płatności powiązanej z kupnem konta Premium prowadzi zewnętrzna spółka , w której proces gromadzenia danych odbywa się poza bezpośrednią kontrolą Operatora. Polityka ta może różnić się od tej ,która obowiązuje w Serwisie.

<br><b>2. Informacje w formularzach</b>
<br><b>a)</b> Serwis zbiera informacje podane dobrowolnie przez użytkownika.
<br><b>b)</b> Serwis może zapisać ponadto informacje o parametrach połączenia (oznaczenie czasu, adres IP)
<br><b>c)</b> Dane w formularzu nie są udostępniane podmiotom trzecim inaczej, niż za zgodą użytkownika.
<br><b>d)</b> Dane zebrane w formularzu są używane do bieżącego działania serwisu tj. obsługa logowania do Serwisu czy danych w profilu Użytkownika

<br><b>3. Informacje o plikach cookie</b>
<br><b>a)</b> Serwis korzysta z plików cookies.
<br><b>b)</b> Pliki cookies (tzw. „ciasteczka”) stanowią dane informatyczne, w szczególności pliki tekstowe, które przechowywane są w urządzeniu końcowym Użytkownika Serwisu i przeznaczone są do korzystania ze stron internetowych Serwisu. Cookies zazwyczaj zawierają nazwę strony internetowej, z której pochodzą, czas przechowywania ich na urządzeniu końcowym oraz unikalny numer.
<br><b>c)</b> Podmiotem zamieszczającym na urządzeniu końcowym Użytkownika Serwisu pliki cookies oraz uzyskującym do nich dostęp jest operator Serwisu.
<br><b>d)</b> Pliki cookies wykorzystywane są w następujących celach:
<br><span style=" padding-left: 15px; ">ułatwiać logowanie ,gdy zaznaczona jest opcja "Zapamiętaj mnie",</span>
<br><span style=" padding-left: 15px; ">aby zapewnić bezpieczeństwo i przyśpieszyć dostęp do "Wersji roboczych", są     one trzymane w plikach cookies, zapisanych na komputerze,</span>
<br><span style=" padding-left: 15px; ">sprawdzić czy użytkownik wyraził zgodę na korzystanie przez stronę z plików cookie.</span>
<br><b>e)</b> W ramach Serwisu stosowane są dwa zasadnicze rodzaje plików cookies: „sesyjne” (session cookies) oraz „stałe” (persistent cookies). Cookies „sesyjne” są plikami tymczasowymi, które przechowywane są w urządzeniu końcowym Użytkownika do czasu wylogowania, opuszczenia strony internetowej lub wyłączenia oprogramowania (przeglądarki internetowej). „Stałe” pliki cookies przechowywane są w urządzeniu końcowym Użytkownika przez czas określony w parametrach plików cookies lub do czasu ich usunięcia przez Użytkownika.
<br><b>f)</b> Oprogramowanie do przeglądania stron internetowych (przeglądarka internetowa) zazwyczaj domyślnie dopuszcza przechowywanie plików cookies w urządzeniu końcowym Użytkownika. Użytkownicy Serwisu mogą dokonać zmiany ustawień w tym zakresie. Przeglądarka internetowa umożliwia usunięcie plików cookies. Możliwe jest także automatyczne blokowanie plików cookies Szczegółowe informacje na ten temat zawiera pomoc lub dokumentacja przeglądarki internetowej.
<br><b>g)</b> Ograniczenia stosowania plików cookies mogą wpłynąć na niektóre funkcjonalności dostępne na stronach internetowych Serwisu.

<br><b>4. Bezpieczeństwo</b>
<br>Wszystkie zbierane przez Operatora dane chronione są z użyciem racjonalnych środków technicznych i organizacyjnych oraz procedur bezpieczeństwa, w celu zabezpieczenia ich przed dostępem osób nieupoważnionych lub ich nieupoważnionym wykorzystaniem. 

<br><b>5. Udostępnianie danych</b>
<br><b>a)</b> Dane umożliwiające identyfikację osoby fizycznej są udostępniane wyłączenie za zgodą tej osoby.
<br><b>b)</b> Operator może mieć obowiązek udzielania informacji zebranych przez Serwis upoważnionym organom na podstawie zgodnych z prawem żądań w zakresie wynikającym z żądania.
	
<br><br><b>ZAŁĄCZNIK NR 2</b>&nbsp;<a href="#" id="#back-to-top" style="font-size:11px">Wróć do góry</a>
<br><b>1.</b> Jedyna płatną usługą od dnia 15.02.2017r. Jest konto premium możliwe do zakupienia pod linkiem <a href="premium">mrwork.pl/premium</a>.
<br><br><span>Obowiązuje od <b>15.02.2017r.</b></span>
	</p>
<script>    $('#back-to-top').on('click', function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });</script>		
		</div>
        <div class="col-sm-2">&nbsp;</div>
    </div>
</div>
<div class="row" ><footer class="footer-distributed">

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
					<a href="regulamin" class="active">Regulamin</a>
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