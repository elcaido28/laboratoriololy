// Examen de Heces
function cambio22(){
  var op22 = document.getElementById('celepitel').value;

  if (op22=="Celulas Epiteliales Escamosas") {
    var nxt = document.getElementById('opcelepitel').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcelepitel').removeAttribute('disabled');            
  }else if (op22=="Null") {
    var nxt = document.getElementById('opcelepitel').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcelepitel').setAttribute('disabled','');
  }
}

function cambio23(){
  var op23 = document.getElementById('bacteria').value;

  if (op23=="Bacterias") {
    var nxt = document.getElementById('opbacterias').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opbacterias').removeAttribute('disabled');            
  }else if (op23=="Null") {
    var nxt = document.getElementById('opbacterias').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opbacterias').setAttribute('disabled','');
  }
}

function cambio24(){
  var op24 = document.getElementById('piocito').value;

  if (op24=="Piocitos") {
    document.getElementById('oppiocito').removeAttribute('style');
    document.getElementById('oppiocito').removeAttribute('disabled');             
  }else if (op24=="Null") {
    document.getElementById('oppiocito').setAttribute('style','display: none;');
    document.getElementById('oppiocito').setAttribute('disabled','');
  }
}

function cambio25(){
  var op25 = document.getElementById('filamentos').value;

  if (op25=="Filamentos Mucosos") {
    document.getElementById('opfilamentos').removeAttribute('style');
    document.getElementById('opfilamentos').removeAttribute('disabled');            
  }else if (op25=="Null") {
    document.getElementById('opfilamentos').setAttribute('style','display: none;');
    document.getElementById('opfilamentos').setAttribute('disabled','');
  }
}

function cambio26(){
  var op26 = document.getElementById('acnalse').value;

  if (op26=="Ac Nalidixico") {
    var nxt = document.getElementById('opacnalse').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opacnalse').removeAttribute('disabled');            
  }else if (op26=="Null") {
    var nxt = document.getElementById('opacnalse').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opacnalse').setAttribute('disabled','');
  }
}

function cambio27(){
  var op27 = document.getElementById('amikacina').value;

  if (op27=="Amikacina") {
    var nxt = document.getElementById('opamikacina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opamikacina').removeAttribute('disabled');            
  }else if (op27=="Null") {
    var nxt = document.getElementById('opamikacina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opamikacina').setAttribute('disabled','');
  }
}

function cambio28(){
  var op28 = document.getElementById('clavulanico').value;

  if (op28=="Amox +AC Clavulanico") {
    var nxt = document.getElementById('opclavulanico').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opclavulanico').removeAttribute('disabled');            
  }else if (op28=="Null") {
    var nxt = document.getElementById('opclavulanico').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opclavulanico').setAttribute('disabled','');
  }
}

function cambio29(){
  var op29 = document.getElementById('celafexina').value;

  if (op29=="Cefalexina") {
    var nxt = document.getElementById('opcelafexina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opcelafexina').removeAttribute('disabled');            
  }else if (op29=="Null") {
    var nxt = document.getElementById('opcelafexina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opcelafexina').setAttribute('disabled','');
  }
}

function cambio30(){
  var op30 = document.getElementById('ceftriaxona').value;

  if (op30=="Ceftriaxona") {
    var nxt = document.getElementById('opceftriaxona').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('opceftriaxona').removeAttribute('disabled');            
  }else if (op30=="Null") {
    var nxt = document.getElementById('opceftriaxona').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('opceftriaxona').setAttribute('disabled','');
  }
}

function cambio31(){
  var op31 = document.getElementById('levofloxacina').value;

  if (op31=="Levofloxacina") {
    var nxt = document.getElementById('oplevofloxacina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('oplevofloxacina').removeAttribute('disabled');            
  }else if (op31=="Null") {
    var nxt = document.getElementById('oplevofloxacina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('oplevofloxacina').setAttribute('disabled','');
  }
}

function cambio32(){
  var op32 = document.getElementById('tetraciclina').value;

  if (op32=="Tetraciclina") {
    var nxt = document.getElementById('optetraciclina').nextSibling;
    nxt.setAttribute('style','display: block;');
    document.getElementById('optetraciclina').removeAttribute('disabled');            
  }else if (op32=="Null") {
    var nxt = document.getElementById('optetraciclina').nextSibling;
    nxt.setAttribute('style','display: none;');
    document.getElementById('optetraciclina').setAttribute('disabled','');
  }
}