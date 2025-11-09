// Sikrer at siden er loadet før funktionen med pop-up bliver kørt
document.addEventListener('DOMContentLoaded', startPopup);

function startPopup(){
  //Definerer elementerne på siden
  var boks = document.getElementById('bellis-box');
  var overlay = document.getElementById('popup-overlay');
  var lukKnap = document.getElementById('bellis-close');
  var ctaKnap = document.getElementById('bellis-button');
  
  //Skjuler pop-up fra start
  skjulPopup(boks, overlay);
  
  //Viser pop-up efter 1 sekund
  setTimeout(function(){
    visPopup(boks, overlay);
  }, 1000);
  
  //Luk pop-up ved klik på krydset
  lukKnap.addEventListener('click', function(){
    skjulPopup(boks, overlay);
  });
  
  overlay.addEventListener('click', function(){
    skjulPopup(boks, overlay);
  });
  
  //Ved tryk på cta knap sendes brugeren videre til siden
  ctaKnap.addEventListener('click', visSiden);
}

// Viser pop-up
function visPopup(boks, overlay){
  boks.classList.remove('slide-top');
  boks.classList.add('slide-down');
  overlay.classList.add('active');
}

//Skjuler pop-up
function skjulPopup(boks, overlay){
  boks.classList.remove('slide-down');
  boks.classList.add('slide-top');
  overlay.classList.remove('active');
}

//Sender brugeren videre
function visSiden(event){
  event.preventDefault();
  window.location.href = 'https://storyscaping.shstudio.dk/elementor-615/home/';
}