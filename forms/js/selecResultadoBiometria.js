function cambio1(){
  var op1 = document.getElementById('globulos').value;

  if (op1=="Globulos Blancos") {
    document.getElementById('gl1').value="";
    document.getElementById('gl1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('gl1').removeAttribute('style');
    document.getElementById('gl2').removeAttribute('disabled');
    document.getElementById('gl2').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
    document.getElementById('gl3').removeAttribute('disabled');
    document.getElementById('gl3').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
  }else if (op1=="Null") {
    document.getElementById('gl1').value="0";
    document.getElementById('gl1').setAttribute('style','display:none');
    document.getElementById('gl2').setAttribute('style','display:none');
    document.getElementById('gl3').setAttribute('style','display:none');
  }
}

function cambio2(){
  var op2 = document.getElementById('linfositos').value;

  if (op2=="Linfocitos #") {
    document.getElementById('linfo1').value="";
    document.getElementById('linfo1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('linfo1').removeAttribute('style');
    document.getElementById('linfo2').removeAttribute('disabled');
    document.getElementById('linfo2').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
    document.getElementById('linfo3').removeAttribute('disabled');
    document.getElementById('linfo3').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
  }else if (op2=="Null") {
    document.getElementById('linfo1').value="0";
    document.getElementById('linfo1').setAttribute('style','display:none');
    document.getElementById('linfo2').setAttribute('style','display:none');
    document.getElementById('linfo3').setAttribute('style','display:none');
  }
}

function cambio3(){
  var op3 = document.getElementById('celi').value;

  if (op3=="Celulas Intermedias #") {
    document.getElementById('celi1').value="";
    document.getElementById('celi1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('celi1').removeAttribute('style');
    document.getElementById('celi2').removeAttribute('disabled');
    document.getElementById('celi2').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
    document.getElementById('celi3').removeAttribute('disabled');
    document.getElementById('celi3').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
  }else if (op3=="Null") {
    document.getElementById('celi1').value="0";
    document.getElementById('celi1').setAttribute('style','display:none');
    document.getElementById('celi2').setAttribute('style','display:none');
    document.getElementById('celi3').setAttribute('style','display:none');
  }
}

function cambio4(){
  var op4 = document.getElementById('segmentados').value;

  if (op4=="Segmentados #") {
    document.getElementById('segmen1').value="";
    document.getElementById('segmen1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('segmen1').removeAttribute('style');
    document.getElementById('segmen2').removeAttribute('disabled');
    document.getElementById('segmen2').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
    document.getElementById('segmen3').removeAttribute('disabled');
    document.getElementById('segmen3').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
  }else if (op4=="Null") {
    document.getElementById('segmen1').value="0";
    document.getElementById('segmen1').setAttribute('style','display:none');
    document.getElementById('segmen2').setAttribute('style','display:none');
    document.getElementById('segmen3').setAttribute('style','display:none');
  }
}

function cambio5(){
  var op5 = document.getElementById('linfositosp').value;

  if (op5=="Linfocitos %") {
    document.getElementById('linfop1').value="";
    document.getElementById('linfop1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('linfop1').removeAttribute('style');
    document.getElementById('linfop2').removeAttribute('disabled');
    document.getElementById('linfop2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('linfop3').removeAttribute('disabled');
    document.getElementById('linfop3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op5=="Null") {
    document.getElementById('linfop1').value="0";
    document.getElementById('linfop1').setAttribute('style','display:none');
    document.getElementById('linfop2').setAttribute('style','display:none');
    document.getElementById('linfop3').setAttribute('style','display:none');
  }
}

function cambio6(){
  var op6 = document.getElementById('celip').value;

  if (op6=="Celulas Intermedias %") {
    document.getElementById('celip1').value="";
    document.getElementById('celip1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('celip1').removeAttribute('style');
    document.getElementById('celip2').removeAttribute('disabled');
    document.getElementById('celip2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('celip3').removeAttribute('disabled');
    document.getElementById('celip3').setAttribute('style','display:block; margin-left: 13px; padding-left: 20px; width: 100px;');
  }else if (op6=="Null") {
    document.getElementById('celip1').value="0";
    document.getElementById('celip1').setAttribute('style','display:none');
    document.getElementById('celip2').setAttribute('style','display:none');
    document.getElementById('celip3').setAttribute('style','display:none');
  }
}

function cambio7(){
  var op7 = document.getElementById('segmentadosp').value;

  if (op7=="Segmentados %") {
    document.getElementById('segmenp1').value="";
    document.getElementById('segmenp1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('segmenp1').removeAttribute('style');
    document.getElementById('segmenp2').removeAttribute('disabled');
    document.getElementById('segmenp2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('segmenp3').removeAttribute('disabled');
    document.getElementById('segmenp3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op7=="Null") {
    document.getElementById('segmenp1').value="0";
    document.getElementById('segmenp1').setAttribute('style','display:none');
    document.getElementById('segmenp2').setAttribute('style','display:none');
    document.getElementById('segmenp3').setAttribute('style','display:none');
  }
}

// SECCION 2
function cambio8(){
  var op8 = document.getElementById('hemoglobina').value;

  if (op8=="Hemoglobina") {
    document.getElementById('hemoglo1').value="";
    document.getElementById('hemoglo1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('hemoglo1').removeAttribute('style');
    document.getElementById('hemoglo2').removeAttribute('disabled');
    document.getElementById('hemoglo2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('hemoglo3').removeAttribute('disabled');
    document.getElementById('hemoglo3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op8=="Null") {
    document.getElementById('hemoglo1').value="0";
    document.getElementById('hemoglo1').setAttribute('style','display:none');
    document.getElementById('hemoglo2').setAttribute('style','display:none');
    document.getElementById('hemoglo3').setAttribute('style','display:none');
  }
}

function cambio9(){
  var op9 = document.getElementById('globulosr').value;

  if (op9=="Glóbulos Rojos") {
    document.getElementById('globulosr1').value="";
    document.getElementById('globulosr1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('globulosr1').removeAttribute('style');
    document.getElementById('globulosr2').removeAttribute('disabled');
    document.getElementById('globulosr2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('globulosr3').removeAttribute('disabled');
    document.getElementById('globulosr3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op9=="Null") {
    document.getElementById('globulosr1').value="0";
    document.getElementById('globulosr1').setAttribute('style','display:none');
    document.getElementById('globulosr2').setAttribute('style','display:none');
    document.getElementById('globulosr3').setAttribute('style','display:none');
  }
}

function cambio10(){
  var op10 = document.getElementById('hematocrito').value;

  if (op10=="Hematocrito") {
    document.getElementById('hemato1').value="";
    document.getElementById('hemato1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('hemato1').removeAttribute('style');
    document.getElementById('hemato2').removeAttribute('disabled');
    document.getElementById('hemato2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('hemato3').removeAttribute('disabled');
    document.getElementById('hemato3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op10=="Null") {
    document.getElementById('hemato1').value="0";
    document.getElementById('hemato1').setAttribute('style','display:none');
    document.getElementById('hemato2').setAttribute('style','display:none');
    document.getElementById('hemato3').setAttribute('style','display:none');
  }
}

function cambio11(){
  var op11 = document.getElementById('vcm').value;

  if (op11=="VCM") {
    document.getElementById('vcm1').value="";
    document.getElementById('vcm1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('vcm1').removeAttribute('style');
    document.getElementById('vcm2').removeAttribute('disabled');
    document.getElementById('vcm2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('vcm3').removeAttribute('disabled');
    document.getElementById('vcm3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op11=="Null") {
    document.getElementById('vcm1').value="0";
    document.getElementById('vcm1').setAttribute('style','display:none');
    document.getElementById('vcm2').setAttribute('style','display:none');
    document.getElementById('vcm3').setAttribute('style','display:none');
  }
}

function cambio12(){
  var op12 = document.getElementById('hcm').value;

  if (op12=="HCM") {
    document.getElementById('hcm1').value="";
    document.getElementById('hcm1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('hcm1').removeAttribute('style');
    document.getElementById('hcm2').removeAttribute('disabled');
    document.getElementById('hcm2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('hcm3').removeAttribute('disabled');
    document.getElementById('hcm3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op12=="Null") {
    document.getElementById('hcm1').value="0";
    document.getElementById('hcm1').setAttribute('style','display:none');
    document.getElementById('hcm2').setAttribute('style','display:none');
    document.getElementById('hcm3').setAttribute('style','display:none');
  }
}

function cambio13(){
  var op13 = document.getElementById('chcm').value;

  if (op13=="CHCM") {
    document.getElementById('chcm1').value="";
    document.getElementById('chcm1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('chcm1').removeAttribute('style');
    document.getElementById('chcm2').removeAttribute('disabled');
    document.getElementById('chcm2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('chcm3').removeAttribute('disabled');
    document.getElementById('chcm3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op13=="Null") {
    document.getElementById('chcm1').value="0";
    document.getElementById('chcm1').setAttribute('style','display:none');
    document.getElementById('chcm2').setAttribute('style','display:none');
    document.getElementById('chcm3').setAttribute('style','display:none');
  }
}

function cambio14(){
  var op14 = document.getElementById('wdrvc').value;

  if (op14=="WDR-VC") {
    document.getElementById('wdrvc1').value="";
    document.getElementById('wdrvc1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('wdrvc1').removeAttribute('style');
    document.getElementById('wdrvc2').removeAttribute('disabled');
    document.getElementById('wdrvc2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('wdrvc3').removeAttribute('disabled');
    document.getElementById('wdrvc3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op14=="Null") {
    document.getElementById('wdrvc1').value="0";
    document.getElementById('wdrvc1').setAttribute('style','display:none');
    document.getElementById('wdrvc2').setAttribute('style','display:none');
    document.getElementById('wdrvc3').setAttribute('style','display:none');
  }
}

function cambio15(){
  var op15 = document.getElementById('wdrds').value;

  if (op15=="WDR-DS") {
    document.getElementById('wdrds1').value="";
    document.getElementById('wdrds1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('wdrds1').removeAttribute('style');
    document.getElementById('wdrds2').removeAttribute('disabled');
    document.getElementById('wdrds2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 100px;');
    document.getElementById('wdrds3').removeAttribute('disabled');
    document.getElementById('wdrds3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op15=="Null") {
    document.getElementById('wdrds1').value="0";
    document.getElementById('wdrds1').setAttribute('style','display:none');
    document.getElementById('wdrds2').setAttribute('style','display:none');
    document.getElementById('wdrds3').setAttribute('style','display:none');
  }
}

function cambio16(){
  var op16 = document.getElementById('plaquetas').value;

  if (op16=="Plaquetas") {
    document.getElementById('plaquetas1').value="";
    document.getElementById('plaquetas1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('plaquetas1').removeAttribute('style');
    document.getElementById('plaquetas2').removeAttribute('disabled');
    document.getElementById('plaquetas2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 90px;');
    document.getElementById('plaquetas3').removeAttribute('disabled');
    document.getElementById('plaquetas3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op16=="Null") {
    document.getElementById('plaquetas1').value="0";
    document.getElementById('plaquetas1').setAttribute('style','display:none');
    document.getElementById('plaquetas2').setAttribute('style','display:none');
    document.getElementById('plaquetas3').setAttribute('style','display:none');
  }
}

function cambio17(){
  var op17 = document.getElementById('mpv').value;

  if (op17=="MPV") {
    document.getElementById('mpv1').value="";
    document.getElementById('mpv1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('mpv1').removeAttribute('style');
    document.getElementById('mpv2').removeAttribute('disabled');
    document.getElementById('mpv2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 90px;');
    document.getElementById('mpv3').removeAttribute('disabled');
    document.getElementById('mpv3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op17=="Null") {
    document.getElementById('mpv1').value="0";
    document.getElementById('mpv1').setAttribute('style','display:none');
    document.getElementById('mpv2').setAttribute('style','display:none');
    document.getElementById('mpv3').setAttribute('style','display:none');
  }
}

function cambio18(){
  var op18 = document.getElementById('wdp').value;

  if (op18=="WDP") {
    document.getElementById('wdp1').value="";
    document.getElementById('wdp1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('wdp1').removeAttribute('style');
    document.getElementById('wdp2').removeAttribute('disabled');
    document.getElementById('wdp2').setAttribute('style','display:block; margin-left: 13px; padding-left: 18px; width: 90px;');
    document.getElementById('wdp3').removeAttribute('disabled');
    document.getElementById('wdp3').setAttribute('style','display:block; margin-left: 13px; padding-left: 13px; width: 100px;');
  }else if (op18=="Null") {
    document.getElementById('wdp1').value="0";
    document.getElementById('wdp1').setAttribute('style','display:none');
    document.getElementById('wdp2').setAttribute('style','display:none');
    document.getElementById('wdp3').setAttribute('style','display:none');
  }
}

function cambio19(){
  var op19 = document.getElementById('pct').value;

  if (op19=="PCT") {
    document.getElementById('pct1').value="";
    document.getElementById('pct1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('pct1').removeAttribute('style');
    document.getElementById('pct2').removeAttribute('disabled');
    document.getElementById('pct2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
    document.getElementById('pct3').removeAttribute('disabled');
    document.getElementById('pct3').setAttribute('style','display:block; margin-left: 5px; padding-left: 13px; width: 117px;');
  }else if (op19=="Null") {
    document.getElementById('pct1').value="0";
    document.getElementById('pct1').setAttribute('style','display:none');
    document.getElementById('pct2').setAttribute('style','display:none');
    document.getElementById('pct3').setAttribute('style','display:none');
  }
}

// SECCION 3
function cambio20(){
  var op20 = document.getElementById('segmenext').value;

  if (op20=="SEGMENTADOS") {
    document.getElementById('segmenext1').value="";
    document.getElementById('segmenext1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('segmenext1').removeAttribute('style');
    document.getElementById('segmenext2').removeAttribute('disabled');
    document.getElementById('segmenext2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op20=="Null") {
    document.getElementById('segmenext1').value="0";
    document.getElementById('segmenext1').setAttribute('style','display:none');
    document.getElementById('segmenext2').setAttribute('style','display:none');
  }
}

function cambio21(){
  var op21 = document.getElementById('linfoext').value;

  if (op21=="LINFOCITOS") {
    document.getElementById('linfoext1').value="";
    document.getElementById('linfoext1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('linfoext1').removeAttribute('style');
    document.getElementById('linfoext2').removeAttribute('disabled');
    document.getElementById('linfoext2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op21=="Null") {
    document.getElementById('linfoext1').value="0";
    document.getElementById('linfoext1').setAttribute('style','display:none');
    document.getElementById('linfoext2').setAttribute('style','display:none');
  }
}

// Examen de Heces
function cambio22(){
  var op22 = document.getElementById('monocitos').value;

  if (op22=="MONOCITOS") {
    document.getElementById('monocitos1').value="";
    document.getElementById('monocitos1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('monocitos1').removeAttribute('style');
    document.getElementById('monocitos2').removeAttribute('disabled');
    document.getElementById('monocitos2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op22=="Null") {
    document.getElementById('monocitos1').value="0";
    document.getElementById('monocitos1').setAttribute('style','display:none');
    document.getElementById('monocitos2').setAttribute('style','display:none');
  }
}

function cambio23(){
  var op23 = document.getElementById('neutrofilos').value;

  if (op23=="NEUTROFILOS") {
    document.getElementById('neutrofilos1').value="";
    document.getElementById('neutrofilos1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('neutrofilos1').removeAttribute('style');
    document.getElementById('neutrofilos2').removeAttribute('disabled');
    document.getElementById('neutrofilos2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op23=="Null") {
    document.getElementById('neutrofilos1').value="0";
    document.getElementById('neutrofilos1').setAttribute('style','display:none');
    document.getElementById('neutrofilos2').setAttribute('style','display:none');
  }
}

function cambio24(){
  var op24 = document.getElementById('eosinofilos').value;

  if (op24=="EOSINOFILOS") {
    document.getElementById('eosinofilos1').value="";
    document.getElementById('eosinofilos1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('eosinofilos1').removeAttribute('style');
    document.getElementById('eosinofilos2').removeAttribute('disabled');
    document.getElementById('eosinofilos2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op24=="Null") {
    document.getElementById('eosinofilos1').value="0";
    document.getElementById('eosinofilos1').setAttribute('style','display:none');
    document.getElementById('eosinofilos2').setAttribute('style','display:none');
  }
}

function cambio25(){
  var op25 = document.getElementById('basofilos').value;

  if (op25=="BASOFILOS") {
    document.getElementById('basofilos1').value="";
    document.getElementById('basofilos1').removeAttribute('disabled'); //si se requiere poner lo mismo pero con setAttribute en la parte de null
    document.getElementById('basofilos1').removeAttribute('style');
    document.getElementById('basofilos2').removeAttribute('disabled');
    document.getElementById('basofilos2').setAttribute('style','display:block; margin-left: 15px; padding-left: 18px; width: 90px;');
  }else if (op25=="Null") {
    document.getElementById('basofilos1').value="0";
    document.getElementById('basofilos1').setAttribute('style','display:none');
    document.getElementById('basofilos2').setAttribute('style','display:none');
  }
}