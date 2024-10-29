function tes() {
  var img = document.getElementById("img");
  img.style.display = "block";
  document.getElementById("nyumput").style.display = "block";
}
function select() {
  var hobi = document.getElementById("hobi").value;
  document.getElementById("textHobi").innerHTML = "<h1>" + hobi.toUpperCase() + "</h1>";
}
function nyumput() {
  document.getElementById("img").style.display = "none";
  document.getElementById("nyumput").style.display = "none";
}

function pop() {
  let x = Math.floor(Math.random() * 10 + 1);
  alert(x);
}
