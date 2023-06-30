function reloadillighausen() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("table").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "./PHP/reload-illighausen.php", true);
    xmlhttp.send();
  }
  
  function currentDataillighausen() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("titleDatas").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "./PHP/currentDatas-Illighausen.php", true);
    xmlhttp.send();
  }
  
  function manipulateURL() {
    var aktuellerURL = window.location.href;
    var anzuzeigenderURL = aktuellerURL.split('.')[0];
    window.history.replaceState({}, document.title, anzuzeigenderURL);
  }
  
  function loaddatasforillighausen() {
    //manipulateURL();
    currentDataillighausen();
    reloadillighausen();
  }
  
  
  
  // reloads the datas every 8 seconds

  
  const interval = setInterval(function () {
    reloadillighausen();
    currentDataillighausen();

  }, 1000);
  
  
  