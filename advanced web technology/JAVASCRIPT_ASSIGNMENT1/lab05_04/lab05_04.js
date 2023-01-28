var incBtn = document.querySelector(".incBtn");
var decBtn = document.querySelector(".decBtn");
var quantityInput = document.querySelector("#quantityInput");
var discountTotal = document.querySelector(".discountTotal");
var discount = document.querySelector("#discount");
var totalPrice = 135,
  actualPrice = 135;
incBtn.addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
  totalPrice = actualPrice = 135 * quantityInput.value;
  discountTotal.innerHTML = `Rs.${totalPrice}`;
});
decBtn.addEventListener("click", () => {
  if (!(quantityInput.value == 1)) {
    quantityInput.value = parseInt(quantityInput.value) - 1;
    totalPrice = actualPrice = 135 * quantityInput.value;
    discountTotal.innerHTML = `Rs.${totalPrice}`;
  }
});
discount.addEventListener("keyup", () => {
  if (discount.value <= actualPrice) {
    totalPrice = 135 * quantityInput.value - discount.value;
    discountTotal.innerHTML = `Rs.${totalPrice}`;
  } else {
    discountTotal.innerHTML = `<span style=color:red>Error</span>`;
  }
});
// !  !! coded by BIBEK SHRESTHA https://bibekshrestha.info.np/
