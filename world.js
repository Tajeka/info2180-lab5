document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("lookup").addEventListener("click", function () {
    var country = encodeURIComponent(document.getElementById("country").value);

    fetch("world.php?country=" + country)
      .then((response) => {
        return response.json();
      })
      .then((res) => {
        document.getElementById("result").innerHTML = res;
      })
      .catch((error) => {
        console.error(error);
      });
  });

  // city

  document.getElementById("city").addEventListener("click", function () {
    var country = encodeURIComponent(document.getElementById("country").value);

    fetch("world.php?country=" + country + "&lookup=cities")
      .then((response) => {
        return response.json();
      })
      .then((res) => {
        document.getElementById("result").innerHTML = res;
      })
      .catch((error) => {
        console.error(error);
      });
  });
});