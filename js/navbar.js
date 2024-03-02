// for sticky navbar
window.onscroll = function() {myFunction()};

let navbar = document.getElementById("navbar");
let  sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

let ul = document.getElementById("ul");
let btns = ul.getElementsByClassName("link_menu");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("menu_active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" menu_active", "");
  }
  this.className += " menu_active";
  });
}


