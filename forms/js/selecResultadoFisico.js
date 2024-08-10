function cambio4(){
  var op4 = document.getElementById('color').value;

  if (op4=="Color") {
    var nxt = document.getElementById('opcolor').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcolor').removeAttribute('disabled');            
  }else if (op4=="Null") {
    var nxt = document.getElementById('opcolor').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcolor').setAttribute('disabled','');
  }
}

function cambio5(){
  var op5 = document.getElementById('aspecto').value;

  if (op5=="Aspecto") {
    var nxt = document.getElementById('opaspecto').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opaspecto').removeAttribute('disabled');            
  }else if (op5=="Null") {
    var nxt = document.getElementById('opaspecto').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opaspecto').setAttribute('disabled','');
  }
}

function cambio6(){
  var op6 = document.getElementById('densidad').value;

  if (op6=="Densidad") {
    document.getElementById('txtdensidad').value="";
    document.getElementById('txtdensidad').removeAttribute('style');
    document.getElementById('txtdensidad').removeAttribute('disabled');            
  }else if (op6=="Null") {
    document.getElementById('txtdensidad').value="-";
    document.getElementById('txtdensidad').setAttribute('style','display: none;');
    document.getElementById('txtdensidad').setAttribute('disabled','');
  }
}

function cambio7(){
  var op7 = document.getElementById('ph').value;

  if (op7=="Ph") {
    document.getElementById('txtdensidad').value="";
    document.getElementById('txtph').removeAttribute('style');
    document.getElementById('txtph').removeAttribute('disabled');            
  }else if (op7=="Null") {
    document.getElementById('txtdensidad').value="-";
    document.getElementById('txtph').setAttribute('style','display: none;');
    document.getElementById('txtph').setAttribute('disabled','');
  }
}

function cambio8(){
  var op8 = document.getElementById('glucosaColesterol').value;

  if (op8=="Glucosa") {
    var nxt = document.getElementById('opglucosa').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opglucosa').removeAttribute('disabled');            
  }else if (op8=="Null") {
    var nxt = document.getElementById('opglucosa').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opglucosa').setAttribute('disabled','');
  }
}

function cambio9(){
  var op9 = document.getElementById('nitritos').value;

  if (op9=="Nitritos") {
    var nxt = document.getElementById('opnitritos').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opnitritos').removeAttribute('disabled');            
  }else if (op9=="Null") {
    var nxt = document.getElementById('opnitritos').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opnitritos').setAttribute('disabled','');
  }
}

function cambio10(){
  var op10 = document.getElementById('cetonicos').value;

  if (op10=="C. Cetonicos") {
    var nxt = document.getElementById('opcetonico').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcetonico').removeAttribute('disabled');            
  }else if (op10=="Null") {
    var nxt = document.getElementById('opcetonico').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcetonico').setAttribute('disabled','');
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

  if (op17=="Cel. Epiteliales Escamosas") {
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
  var op18 = document.getElementById('bacterias').value;

  if (op18=="Bacterias") {
    var nxt = document.getElementById('opbacterias').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opbacterias').removeAttribute('disabled');            
  }else if (op18=="Null") {
    var nxt = document.getElementById('opbacterias').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opbacterias').setAttribute('disabled','');
  }
}

function cambio19(){
  var op19 = document.getElementById('piocitos').value;

  if (op19=="Piocitos") {
    document.getElementById('oppiocitos').value="";
    document.getElementById('oppiocitos').removeAttribute('style');
    document.getElementById('oppiocitos').removeAttribute('disabled');            
  }else if (op19=="Null") {
    document.getElementById('oppiocitos').value="-";
    document.getElementById('oppiocitos').setAttribute('style','display: none;');
    document.getElementById('oppiocitos').setAttribute('disabled','');
  }
}

function cambio20(){
  var op20 = document.getElementById('hematies').value;

  if (op20=="Hematies") {
    document.getElementById('ophematies').value="";
    document.getElementById('ophematies').removeAttribute('style');
    document.getElementById('ophematies').removeAttribute('disabled');           
  }else if (op20=="Null") {
    document.getElementById('ophematies').value="-";
    document.getElementById('ophematies').setAttribute('style','display: none;');
    document.getElementById('ophematies').setAttribute('disabled','');
  }
}

function cambio21(){
  var op21 = document.getElementById('filamentosm').value;

  if (op21=="Filamentos Mucosos") {
    document.getElementById('opfilamentosm').value="";
    document.getElementById('opfilamentosm').removeAttribute('style');
    document.getElementById('opfilamentosm').removeAttribute('disabled');            
  }else if (op21=="Null") {
    document.getElementById('opfilamentosm').value="-";
    document.getElementById('opfilamentosm').setAttribute('style','display: none;');
    document.getElementById('opfilamentosm').setAttribute('disabled','');
  }
}