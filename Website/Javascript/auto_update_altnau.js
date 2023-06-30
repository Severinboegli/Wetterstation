function reload() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./PHP/reload-altnau.php", true);
  xmlhttp.send();
}

function currentData() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("titleDatas").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./PHP/currentDatas-Altnau.php", true);
  xmlhttp.send();
}

function manipulateURL() {
  var aktuellerURL = window.location.href;
  var anzuzeigenderURL = aktuellerURL.split('.')[0];
  window.history.replaceState({}, document.title, anzuzeigenderURL);
}

function loadDatas() {
  //manipulateURL();
  currentData();
  reload();
}



// reloads the datas every 8 seconds


const interval = setInterval(function () {
  reload();
  currentData();
}, 1000);

