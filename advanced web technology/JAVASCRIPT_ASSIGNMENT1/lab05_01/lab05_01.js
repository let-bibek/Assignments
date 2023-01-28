var uid = document.getElementById("uId");
var password = document.getElementById("password");
var fName = document.getElementById("fName");
var address = document.getElementById("address");
var country = document.getElementById("country");
var zip = document.getElementById("zip");
var email = document.getElementById("email");
var english = document.getElementById("english");
var nonenglish = document.getElementById("nonenglish");
var sex = document.getElementsByName("sex");
var submit = document.getElementById("submit");
var reset = document.getElementById("resetbtn");
var myform = document.getElementById("myForm");
submit.addEventListener("click", (e) => {
  if (uid.value) {
    let uidlenght = uid.value;
    if (uidlenght.length < 5 || uidlenght.length > 12) {
      alert("User id lenght should be between 5 to 12");
    }
    if (password.value) {
      if (password.value.length < 7 || password.value.length > 12) {
        alert("User password lenght should be between 7 to 12");
      }
      if (fName.value) {
        if (isLetter(fName.value)) {
          if (address.value) {
            if (isAlphaNumeric(address.value)) {
              if (country.value !== "Please select a country") {
                if (zip.value) {
                  if (isNumber(zip.value)) {
                    if (email.value) {
                      if (isEmail(email.value)) {
                        if (sex[0].checked || sex[1].checked) {
                          if (english.checked || nonenglish.checked) {
                            alert("form submitted successfully");
                            myform.submit();
                          } else {
                            alert("Language is required");
                          }
                        } else {
                          alert("Select your sex");
                        }
                      } else {
                        alert("enter valid email");
                      }
                    } else {
                      alert("Email required");
                    }
                  } else {
                    alert("zip should be numbers only");
                  }
                } else {
                  alert("zip code required");
                }
              } else {
                alert("Country required");
              }
            } else {
              alert("Address should be alphanumeric only.");
            }
          } else {
            alert("enter address");
          }
        } else {
          alert("Full name must be alphabets only");
        }
      } else {
        alert("Enter Username");
      }
    } else {
      alert("User passworld sould not empty");
    }
  } else {
    alert("User id sould not empty/legth be between 5 to 12");
  }
});
function isLetter(str) {
  var letters = /^[A-Za-z]+$/;
  if (str.match(letters)) {
    return true;
  }
}

function isAlphaNumeric(str) {
  var letters = /^\w+$/;
  if (str.match(letters)) {
    return true;
  }
}

function isNumber(str) {
  var letters = /[0-9]/;
  if (str.match(letters)) {
    return true;
  }
}

function isEmail(str) {
  var letters = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
  if (str.match(letters)) {
    return true;
  }
}

