function cambio4(){
  var op4 = document.getElementById('contcol').value;

  if (op4=="Contaje de Colonias") {
    document.getElementById('opcontcol').value="";
    document.getElementById('opcontcol').removeAttribute('style');
    document.getElementById('opcontcol').removeAttribute('disabled');            
  }else if (op4=="Null") {
    document.getElementById('opcontcol').value="-";
    document.getElementById('opcontcol').setAttribute('style','display: none;');
    document.getElementById('opcontcol').setAttribute('disabled','');
  }
}

function cambio5(){
  var op5 = document.getElementById('microorganismo').value;

  if (op5=="Microorganismo") {
    document.getElementById('opmicroorganismo').value="";
    document.getElementById('opmicroorganismo').removeAttribute('style');
    document.getElementById('opmicroorganismo').removeAttribute('disabled');             
  }else if (op5=="Null") {
    document.getElementById('opmicroorganismo').value="-";
    document.getElementById('opmicroorganismo').setAttribute('style','display: none;');
    document.getElementById('opmicroorganismo').setAttribute('disabled','');
  }
}

function cambio6(){
  var op6 = document.getElementById('acinal').value;

  if (op6=="Acido Nalidixico") {
    var nxt = document.getElementById('opacinal').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opacinal').removeAttribute('disabled');            
  }else if (op6=="Null") {
    var nxt = document.getElementById('opacinal').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opacinal').setAttribute('disabled','');
  }
}

function cambio7(){
  var op7 = document.getElementById('amikacina').value;

  if (op7=="Amikacina") {
    var nxt = document.getElementById('opamikacina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opamikacina').removeAttribute('disabled');            
  }else if (op7=="Null") {
    var nxt = document.getElementById('opamikacina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opamikacina').setAttribute('disabled','');
  }
}

function cambio8(){
  var op8 = document.getElementById('ampicilina').value;

  if (op8=="Ampicilina Sulbactam") {
    var nxt = document.getElementById('opampicilina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opampicilina').removeAttribute('disabled');            
  }else if (op8=="Null") {
    var nxt = document.getElementById('opampicilina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opampicilina').setAttribute('disabled','');
  }
}

function cambio9(){
  var op9 = document.getElementById('amoxicilina').value;

  if (op9=="Amoxicilina + AC Clavulanico") {
    var nxt = document.getElementById('opamoxicilina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opamoxicilina').removeAttribute('disabled');            
  }else if (op9=="Null") {
    var nxt = document.getElementById('opamoxicilina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opamoxicilina').setAttribute('disabled','');
  }
}

function cambio10(){
  var op10 = document.getElementById('nitrofuran').value;

  if (op10=="Nitrofurantoina") {
    var nxt = document.getElementById('opnitrofuran').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opnitrofuran').removeAttribute('disabled');            
  }else if (op10=="Null") {
    var nxt = document.getElementById('opnitrofuran').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opnitrofuran').setAttribute('disabled','');
  }
}

function cambio11(){
  var op11 = document.getElementById('proteina').value;

  if (op11=="Proteínas") {
    var nxt = document.getElementById('opproteina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opproteina').removeAttribute('disabled');            
  }else if (op11=="Null") {
    var nxt = document.getElementById('opproteina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opproteina').setAttribute('disabled','');
  }
}

function cambio12(){
  var op12 = document.getElementById('uroblino').value;

  if (op12=="Uroblinogeno") {
    var nxt = document.getElementById('opuroblino').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opuroblino').removeAttribute('disabled');            
  }else if (op12=="Null") {
    var nxt = document.getElementById('opuroblino').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opuroblino').setAttribute('disabled','');
  }
}

function cambio13(){
  var op13 = document.getElementById('bilirrubin').value;

  if (op13=="Bilirrubinas") {
    var nxt = document.getElementById('opbilirrubin').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opbilirrubin').removeAttribute('disabled');            
  }else if (op13=="Null") {
    var nxt = document.getElementById('opbilirrubin').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opbilirrubin').setAttribute('disabled','');
  }
}

function cambio14(){
  var op14 = document.getElementById('sangre').value;

  if (op14=="Sangre") {
    var nxt = document.getElementById('opsangre').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opsangre').removeAttribute('disabled');            
  }else if (op14=="Null") {
    var nxt = document.getElementById('opsangre').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opsangre').setAttribute('disabled','');
  }
}

function cambio15(){
  var op15 = document.getElementById('acidoasc').value;

  if (op15=="Acido Ascorbico") {
    var nxt = document.getElementById('opacidoasc').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opacidoasc').removeAttribute('disabled');            
  }else if (op15=="Null") {
    var nxt = document.getElementById('opacidoasc').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opacidoasc').setAttribute('disabled','');
  }
}

function cambio16(){
  var op16 = document.getElementById('leucocitos').value;

  if (op16=="Leucocitos") {
    var nxt = document.getElementById('opleucocitos').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opleucocitos').removeAttribute('disabled');            
  }else if (op16=="Null") {
    var nxt = document.getElementById('opleucocitos').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opleucocitos').setAttribute('disabled','');
  }
}

// SEDIMENTO
function cambio17(){
  var op17 = document.getElementById('celepitel').value;

  if (op17=="Cell Epiteliales Escamosas") {
    var nxt = document.getElementById('opcelepitel').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcelepitel').removeAttribute('disabled');            
  }else if (op17=="Null") {
    var nxt = document.getElementById('opcelepitel').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcelepitel').setAttribute('disabled','');
  }
}

function cambio18(){
  var op18 = document.getElementById('bacteriasbac').value;

  if (op18=="Bacterias Bacilares") {
    var nxt = document.getElementById('opbacteriasbac').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opbacteriasbac').removeAttribute('disabled');            
  }else if (op18=="Null") {
    var nxt = document.getElementById('opbacteriasbac').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opbacteriasbac').setAttribute('disabled','');
  }
}

function cambio19(){
  var op19 = document.getElementById('procitos').value;

  if (op19=="Procitos") {
    document.getElementById('opprocitos').removeAttribute('style');
    document.getElementById('opprocitos').removeAttribute('disabled');            
  }else if (op19=="Null") {
    document.getElementById('opprocitos').setAttribute('style','display: none;');
    document.getElementById('opprocitos').setAttribute('disabled','');
  }
}

function cambio20(){
  var op20 = document.getElementById('oxacal').value;

  if (op20=="C. Oxalato de Calcio") {
    document.getElementById('opoxacal').removeAttribute('style');
    document.getElementById('opoxacal').removeAttribute('disabled');           
  }else if (op20=="Null") {
    document.getElementById('opoxacal').setAttribute('style','display: none;');
    document.getElementById('opoxacal').setAttribute('disabled','');
  }
}

function cambio21(){
  var op21 = document.getElementById('filamentosm').value;

  if (op21=="Filamentos Mucosos") {
    document.getElementById('opfilamentosm').removeAttribute('style');
    document.getElementById('opfilamentosm').removeAttribute('disabled');            
  }else if (op21=="Null") {
    document.getElementById('opfilamentosm').setAttribute('style','display: none;');
    document.getElementById('opfilamentosm').setAttribute('disabled','');
  }
}

// Examen de Heces
function cambio22(){
  var op22 = document.getElementById('colorheces').value;

  if (op22=="Colorhe") {
    var nxt = document.getElementById('opcolorheces').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcolorheces').removeAttribute('disabled');            
  }else if (op22=="Null") {
    var nxt = document.getElementById('opcolorheces').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcolorheces').setAttribute('disabled','');
  }
}

function cambio23(){
  var op23 = document.getElementById('aspectoheces').value;

  if (op23=="Aspectohe") {
    var nxt = document.getElementById('opaspectoheces').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opaspectoheces').removeAttribute('disabled');            
  }else if (op23=="Null") {
    var nxt = document.getElementById('opaspectoheces').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opaspectoheces').setAttribute('disabled','');
  }
}

function cambio24(){
  var op24 = document.getElementById('reaccion').value;

  if (op24=="Reaccion") {
    document.getElementById('opreaccion').removeAttribute('style');
    document.getElementById('opreaccion').removeAttribute('disabled');             
  }else if (op24=="Null") {
    document.getElementById('opreaccion').setAttribute('style','display: none;');
    document.getElementById('opreaccion').setAttribute('disabled','');
  }
}

// Observacio microscopica
function cambio25(){
  var op25 = document.getElementById('parasitos').value;

  if (op25=="Parásitos") {
    document.getElementById('opparasitos').removeAttribute('style');
    document.getElementById('opparasitos').removeAttribute('disabled');          
  }else if (op25=="Null") {
    document.getElementById('opparasitos').setAttribute('style','display: none;');
    document.getElementById('opparasitos').setAttribute('disabled','');
  }
}

function cambio26(){
  var op26 = document.getElementById('predominio').value;

  if (op26=="Predominio Bacterias Bacilares") {
    document.getElementById('oppredominio').removeAttribute('style');
    document.getElementById('oppredominio').removeAttribute('disabled');             
  }else if (op26=="Null") {
    document.getElementById('oppredominio').setAttribute('style','display: none;');
    document.getElementById('oppredominio').setAttribute('disabled','');
  }
}

function cambio27(){
  var op27 = document.getElementById('granulos').value;

  if (op27=="Granulos de almidon") {
    document.getElementById('opgranulos').removeAttribute('style');
    document.getElementById('opgranulos').removeAttribute('disabled');            
  }else if (op27=="Null") {
    document.getElementById('opgranulos').setAttribute('style','display: none;');
    document.getElementById('opgranulos').setAttribute('disabled','');
  }
}