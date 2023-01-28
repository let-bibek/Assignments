const timeInput = document.querySelector("#timeInput");
const timer = document.querySelector(".timer");
const btn1 = document.querySelector(".btn1");
const btn2 = document.querySelector(".btn2");
let timerTime, timerTime2, minute, second=60, flag;
timeInput.addEventListener("keyup", () => {
  if (isNumber(timeInput.value)) {
    timerTime = parseInt(timeInput.value);
    timerTime2 = parseInt(timeInput.value);
    timer.innerHTML = timerTime + ":00";
    flag = true;
  } else {
    timer.innerHTML = `timer here`;
    flag = false;
  }
});

let timerInterval;

function setTimer() {
  timerInterval = setInterval(startTimer, 1000);
  timerTime2 = timerTime2 - 1;
}

function startTimer() {
  second--;
  if (timerTime2 >0) {
  if(second==0){
    second=59;
    timerTime2 = timerTime2 - 1;
  }
    timer.innerHTML = timerTime2 + ":" + second;
  }
  else{
    if (second == 0) {
       clearInterval(timerInterval);
      timerTime2 = 0;
    }
    timer.innerHTML = timerTime2 + ":" + second;
  }
}

btn1.addEventListener("click", () => {
  if (flag) {
    setTimer();
  } else {
    timer.innerHTML = "<p style=color:red;>please enter the time</p>";
  }
});
btn2.addEventListener("click", () => {
  clearInterval(timerInterval);
  timer.innerHTML = timerTime + ":00";
  timerTime2 = timerTime;
  second=60;
});

function isNumber(str) {
  const letters = /^\d+$/;
  if (str.match(letters)) {
    return true;
  }
}
function minutes(minutes) {
  return minutes;
}
// !!coded by BIBEK SHRESTHA