var mult_title = document.querySelector(".mult-title");
var tableTitle = prompt("Multiplication table of:");
var mult_table_container = document.querySelector(".mult-table-container");
mult_title.innerHTML = `Multiplication table of ${tableTitle}`;
var multupto = prompt("Multiplication upto");
let i;
document.title = `Multiplication table of ${tableTitle}`;
for (i = 1; i <= multupto; i++) {
  mult_table_container.innerHTML += ` <div class="has-border">
  ${tableTitle} X ${i} = ${tableTitle * i} <br>
</div>`;
}
// !! coded by BIBEK SHRESTHA https://bibekshrestha.info.np/
