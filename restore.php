<?php
 ob_start();
 session_start();

 if( isset($_SESSION['user'])!="" ){
  header("Location: home");
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zmień hasło!</title>
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/eddc31b09e568f5b3c2012f2892dde31.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<link rel="stylesheet" href="style.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body style="background-color:#F0F0F0;">

<center><div class="container">
 <div id="abc"><div class="cl-effect-1" style="margin-top:10%;"><h1 class="heh" >Hasło zostało zmienione!</h1>
  <br>
  <a href="login" style="text-decoration: none ;font-weight: bold; font-size:30px; color: #000;">Zaloguj się</a></div>
  </div></div>
 <div id="login-form">
    
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h1 class="">Zmień hasło</h1>
            </div>
        

            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            

            

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" id="passnew" class="form-control" placeholder="Nowe hasło" maxlength="20" autocomplete="off" />
                </div>
                <p id="dd" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Hasło musi zawierać co najmniej 6 liter i przynajmniej 1 dużą literę!</p>
            </div>
			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" id="passag" name="repass" class="form-control" placeholder="Powtórz hasło" maxlength="20" autocomplete="off" />
                </div>
               <p id="bb" style="margin-top:10px; font-size:18px; font-weight: 600; color:#a94442;">Hasła muszą być takie same!</p>
            </div>
            
            <div class="form-group">
             <button type="submit" id="bat" class="btn btn-block btn-primary" name="btn-signup" disabled>Zmień!</button>
            </div>

	<script>$(document).ready(function(){ 
	$('#bb').hide();
$("#dd").hide();
var tr;                
var dl = 500;  

$('#passnew').keyup(function(){
    clearTimeout(tr);
    if ($('#passnew').val()) {
        tr = setTimeout(dg, dl);
    }
});

function dg () {
var str = $('#passnew').val();
var patt = new RegExp("[A-Z]");
var res = patt.test(str);
var n = str.length;
if (n >= 6 && res == true ){
		$("#dd").hide();
		$("#passnew").removeClass("bad");
		$("#passnew").addClass("good");
				if ($("#passag").hasClass("good") && $('#passnew').hasClass("good")) {
$("#bat").prop("disabled", false );
}
else {
$('#bat').prop('disabled', true);
}
}
else {
$('#bat').prop('disabled', true);
$("#passnew").addClass("bad");
$("#dd").show();
 $("#passnew").removeClass("good");
}
}
	});</script>
<script>var typing;                //timer identifier
var doneTyping = 500;  //time in ms (5 seconds)

//on keyup, start the countdown
$('#passag').keyup(function(){
    clearTimeout(typing);
    if ($('#passag').val()) {
        typing = setTimeout(doneTyp, doneTyping);
    }
});

function doneTyp () {
if ($('#passag').val() === $('#passnew').val()) {
		$("#bb").hide();
		$("#passnew").removeClass("bad");
		$("#passnew").addClass("good");
		$("#passag").removeClass("bad");
		$("#passag").addClass("good");
		if ($("#passag").hasClass("good") && $('#passnew').hasClass("good")) {
$("#bat").prop("disabled", false );
}
else {
$('#bat').prop('disabled', true);
}
    } else {
	$('#bat').prop('disabled', true);
        $("#passnew").addClass("bad");
$("#bb").show();
 $("#passnew").removeClass("good");
  $("#passag").removeClass("good");
   $("#passag").addClass("bad");
    }
}</script> 	
<script>function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
} 
</script>
<script>
$("#abc").hide();
$('#bat').click(function()
{
var foo = getParameterByName('name');
var a =  $("#passnew").val();
		$.ajax({
     url: 'newajax.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({pass: a,
	 url: foo}),
     success: function(data){
	 $("#passnew").val("");
	 $("#passag").val("");
	 $("#login-form").hide();
	 $("#abc").show();
	 },
	 error: function () {
       alert("Coś poszło nie tak,spróbuj jeszcze raz!"); 
      }
});
});</script>
        </div>
   
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>