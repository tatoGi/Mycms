$(document).ready(function(){
     $("#rightarrow").click(function(){
        $("#rightarrow").addClass("changecolor");
        $("#leftarrow").removeClass("changecolor");
     });
     $("#leftarrow").click(function(){
      $("#leftarrow").addClass("changecolor");
      $("#rightarrow").removeClass("changecolor");
     });
     $("#content").click(function(){
      $("#rightarrow").removeClass("changecolor");
      $("#leftarrow").removeClass("changecolor");
   });
     let progressBarStartPoint = 49.5;
     $("#progressBar").css("width",progressBarStartPoint+"%");
     document.getElementById("content").onscroll = function() {progressIndicator(progressBarStartPoint)};
});

const slider = document.querySelector('.items');
let isDown = false;
let startX;
let scrollLeft;
if (slider) {
  
slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});
}

function progressIndicator(i) {
   var scrollLeft = document.getElementById("content").scrollLeft;
   var width = document.getElementById("content").scrollWidth - document.getElementById("content").clientWidth;
   var scrolled = ((scrollLeft) / width) * 100;
   scrolled = scrolled * ((100 - i) / 100);
   scrolled += i;
   document.getElementById("progressBar").style.width = scrolled + "%";
 }

 $('#rightarrow').click(function() {
   event.preventDefault();
   $('#content').animate({
     scrollLeft: "+=1600%"
   }, "slow");
 });
 $('#leftarrow').click(function() {
   
   event.preventDefault();
   $('#content').animate({
     scrollLeft: "-=1600%"
   }, "slow");
 });






 $(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 100);
	
});


setTimeout(function() {
  $('.alert').fadeOut('slow');
}, 3000);


$('.qwe2>a').filter(function() {
  return $(this).text().length > 25;
}).addClass('strlimit');



$( ".burgermenuicon" ).click(function() {
  $( ".burgermenunav" ).toggleClass( "opened" );
});
$( ".burgermenuicon" ).click(function() {
  $( ".burgermenuicon" ).toggleClass( "opened-x" );
});

$( ".burgerchildicon" ).click(function() {
  event.preventDefault();
  $(this).parent().parent().toggleClass( "oppened" );
});

