// 

let index = 0;

showslide(index);

function plusslides(n){
  showslide(index += n)
}
function showslide(n){
  let slides = document.getElementsByClassName('mySlides');
  console.log(slides);
 
  if( n == slides.length){
    index = 0
    n = 0}
  if( n < 0){
    n = slides.length - 1;
  }

  for(let i = 0; i < slides.length; i++){
    slides[i].style.display = "none";
  }

  slides[n].style.display = "block";

}



// for sticky navbar
