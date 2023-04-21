var site = document.querySelector(":root");
var darkmode = false;

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

// Change From Lightmode to Darkmode, for more functions
function changeColorMode() {
  if (!darkmode) {
    site.style.setProperty("--main-text-color", "#dddddd");
    site.style.setProperty("--main-bg-color", "#333");
    site.style.setProperty("--main-bg-hover", "#161616");

    site.style.setProperty("--out-text-color", "#101010");
    site.style.setProperty("--out-bg-hover", "#333");

    darkmode = true;
  } else {
    site.style.setProperty("--main-text-color", "#333");
    site.style.setProperty("--main-bg-color", "#dddddd");
    site.style.setProperty("--main-bg-hover", "#ffffff");

    site.style.setProperty("--out-text-color", "#333");
    site.style.setProperty("--out-bg-hover", "#101010");

    darkmode = false;
  }
}
