<?php
$elInter = "29.086";

	$ultimoCaracter = substr($elInter, -1);
	$elInter = substr_replace($elInter ,"",-1);
	$penultimoCaracter = substr($elInter, -1);
	
	if ($ultimoCaracter > 5){
		$penultimoCaracter++;
		$elInter = substr_replace($elInter ,"",-1);
		$elInter = $elInter."".$penultimoCaracter;
		$elInterExplode = explode(".", $elInter);
		$elInter = $elInterExplode[0].",".$elInterExplode[1];
	}	

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