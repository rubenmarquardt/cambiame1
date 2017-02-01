<?php
    //captura el interbancarrio original
    $elInter2 = $elInter;

	//comento por ahora lo del string en php	 
    /*
    //aca le esta quitando el ultimo caracter
	$ultimoCaracter = substr($elInter, -1);
	$elInter = substr_replace($elInter ,"",-1);
	$penultimoCaracter = substr($elInter, -1);

	echo( 'caracter ' + $ultimoCaracter);
	// aca no estaria entrando nunca aparentemente
	if ($ultimoCaracter > 5){
		$penultimoCaracter++;
		$elInter = substr_replace($elInter ,"",-1);
		$elInter = $elInter."".$penultimoCaracter;
			
		//$elInterExplode = explode(",", $elInter);

		//$elInter = $elInterExplode[0].",".$elInterExplode[1];
    }
	*/
	
    // echo ('tengo ' . strlen($elInter));		 
    //$elInter = $elInter2;

	//echo ('tengo ' . strlen($elInter));		 	
       if (strlen($elInter)<5)
	   	  $elInter = $elInter . '0';
   //le corto el ultimo digito al interbancario, 
   //ver como estan hechas las cuentas si no hay que redondearlo          
       if (strlen($elInter)>5)     
          $elInter = substr_replace($elInter ,"",-1);

?>
<div class="row" style="background-color:#494d49;width:100%;height:155px;margin-top: 1em;">
    <div class="col-lg-12">
        <div class="col-md-12 col-xs-12 col-lg-12 text-center" style="height:56px;">
            <h4 class="labeltext">DOLAR INTERBANCARIO</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">            
        <div class="text-center" ><font id="elInter" class="aaa"><span class="elInter"><?= $elInter ?></span></font></div>
    </div>
</div>