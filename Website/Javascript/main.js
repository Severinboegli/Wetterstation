function up() {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}

function nav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
