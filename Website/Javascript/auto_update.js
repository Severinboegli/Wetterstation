function reload() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./PHP/reload.php", true);
  xmlhttp.send();
}

function currentData() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("titleDatas").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./PHP/currentDatas.php", true);
  xmlhttp.send();
}

// reloads the datas every 8 seconds
const interval = setInterval(function () {
  reload();
  currentData();
}, 1000);
