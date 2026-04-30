function loadData() {
  var xhr = new XMLHttpRequest();

  xhr.open("GET", "data.php", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);

      var output = "";

      for (var i = 0; i < data.length; i++) {
        output +=
          "Name: " +
          data[i].name +
          "<br>" +
          "ID: " +
          data[i].id +
          "<br>" +
          "Department: " +
          data[i].department +
          "<br>" +
          "CGPA: " +
          data[i].cgpa +
          "<br><br>";
      }

      document.getElementById("result").innerHTML = output;
    } else {
      document.getElementById("result").innerHTML = "Error loading data";
    }
  };

  xhr.onerror = function () {
    document.getElementById("result").innerHTML = "Request failed";
  };

  xhr.send();
}
