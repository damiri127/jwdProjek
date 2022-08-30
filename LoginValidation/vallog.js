var $error = document.querySelector('.error');

function addError(message) {
    $error.innerHTML = message;
    $error.style.display = 'block';
  }

function validasiEmail() {
  var email = document.forms["login"]["email"].value;
  var pass = document.forms["login"]["password"].value;
  var atps=email.indexOf("@");
  var dots=email.lastIndexOf(".");
  if (email==""|| pass==""){
    alert("Email dan password tidak kosong.");
    return false;
  }else{
    if (atps<1 || dots<atps+2 || dots+2>=email.length) {
      addError("Alamat email tidak valid.");
      return false;
    } else {
      return true;
    }
  }
}


