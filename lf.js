function formvalid() {
  var pw = document.getElementById("pass").value;
var un = document.getElementById("user").value;
  if (pw=="srit@2004"&&un=="CanteenSR") {
    
  } else {
document.getElementById("error-message").innerHTML = "Incorrect username or password";
    return false;
  }
}
function show() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").src =
      "https://static.thenounproject.com/png/777494-200.png";
  } else {
    x.type = "password";
    document.getElementById("showimg").src =
      "https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png";
  }
}