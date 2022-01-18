let i = 1;
let div;
let ch;

while (div = document.getElementById('div' + i)) {
    div.count = i;
    div.addEventListener("click", function () {
        ch = document.getElementById('ch' + this.count);
        ch.click();
    });
    i++;
}
