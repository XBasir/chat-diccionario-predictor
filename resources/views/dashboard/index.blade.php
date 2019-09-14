<?php ?>
@extends('layouts.app')

@section('content')
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<h3 class="box-title" style="text-align: left; font-style: italic;">DASHBOARD
 @role('admin')
     ADMIN
 @endrole </h3>

 <br>
<!--Script para el manejo de ajax en los mensajes-->
<script>
$(document).ready(function(){
  $("#btn").click(function(){
    var text = $("#text").val();
    var token = $("#token").val();
    $.ajax({
      type: "post",
      data: "text=" + text + "&_token=" + token,
      url: "<?php echo url('messages') ?>",

      });
    });

var auto_refresh = setInterval(
    function(){
      $('#messages_table').load('<?php echo url('messages_table');?>').fadeIn("slow");
    },30000); //segundos que tarda en recargarse, 30 segundos segun lo establecido

  });
</script>

<div class="col-md-12">
    <body style="background-color:#e8eeec;"> 
    <div class="box-body" id="messages_table">
    <p style="text-align: center;">El chat se ctualiza cada 30seg.<i class="fa fa-spinner fa-spin" ></i></p>
      
    </div> 
    <br><br>
	<div style="text-align:center;">
		<label for="palabra">Palabra</label>
		<input class="col-md-3" type="text" id="palabra" />
		<button type="button" class="btn" id="agregar">Agregar</button>
		<button type="button" class="btn" onclick="validar('palabra');">Verificar</button>
		<button type="button" class="btn btn-success" id="option1" value="1" style="display: none"></button>
		<button type="button" class="btn btn-success" id="option2" value="2" style="display: none"></button>
		<button type="button" class="btn btn-success" id="option3" value="3" style="display: none"></button>
		<br>

        <input type="hidden" value="{{csrf_token()}}" id="token"/>
        <label for="mensaje">Mensaje</label>
        <input class="col-md-6" type="text" name="text" id="text" value="">
        <br>
        <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>
    </div>
</div>

	@role('admin')
 		<br><br>
     	@include('partials.dictionary')
	@endrole
@endsection

<!--script para el manejo del corrector de palabras-->

<script type="text/javascript">

function esconder() {
	for (var i = 1; i < 4; i++ ) {
		document.getElementById("option" + i).style.display="none";
	    document.getElementById("option" + i).innerHTML = "";
	}
}

window.onload=function(){
  document.getElementById("option1").addEventListener('click', function () {
    var text = document.getElementById('text');
    text.value += ' ' + document.getElementById("option1").value ;
    document.getElementById('palabra').value = "";
    esconder();
});

document.getElementById("option2").addEventListener('click', function () {
    var text = document.getElementById('text');
    text.value += ' ' + document.getElementById("option2").value ;
    document.getElementById('palabra').value = "";
    esconder();
});

document.getElementById("option3").addEventListener('click', function () {
    var text = document.getElementById('text');
    text.value += ' ' + document.getElementById("option3").value ;
    document.getElementById('palabra').value = "";
    esconder();
});

document.getElementById("agregar").addEventListener('click', function () {
    var text = document.getElementById('text');
    text.value += ' ' + document.getElementById("palabra").value ;
    document.getElementById('palabra').value = "";
    esconder();
});

}
	
function validar(palabra) {
	var cadena = document.getElementById(palabra).value;
	var resultado = cadena.match(/.{1,1}/g); //dividiendo el contenido del input por caracter
	var recom=1; //recomendacion de palabra
	esconder();
	
	<?php 
    	foreach($dictionary as $dic) {
    ?>
	    	 //dividiendo los nombres de la tabla dictionary por caracter
	    	var compare_word = "<?php echo $dic->word?>"; //palabra a comparar
	    	var dictionary_word = "<?php echo $dic->word?>".match(/.{1,1}/g); //array con los caracteres de la palabra a comparar

	    	if(compare_word != cadena && cadena.length < compare_word.length+2 ){
		    	for (var j = 0; j < resultado.length; j++) {	 
		    		if(j == 0){
		    			 var match=0;
		    		}
		    		if(resultado[j] == dictionary_word[j]){
		    			match++;
		    		} 
		    		if(match == dictionary_word.length-1){
			    		document.getElementById("option" + recom).style.display="inline-block";
			    		document.getElementById("option" + recom).innerHTML = "<?php echo $dic->word?>";
			    		document.getElementById("option" + recom).value = "<?php echo $dic->word?>";
			    		recom++;
		    		}
		    	}
	  		}
   	   <?php
        }
        ?>
}
</script>
