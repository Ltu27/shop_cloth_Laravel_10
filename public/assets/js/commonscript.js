// Btn show navbar
var menuBtn = document.querySelector('.navbar-icon')
var myMenu = document.querySelector('.header__nav')
menuBtn.onclick = function() {
    myMenu.classList.toggle('show')
    menuBtn.classList.toggle('open')
}

// Go to Top
function goToTop() {
    var timer = setInterval(function() {
        document.documentElement.scrollTop -= 20
        if (document.documentElement.scrollTop <= 0) {
            clearInterval(timer)
        }
    }, 10)
}

// Tabline
const tabs = document.querySelectorAll(".tab-item");
const panes = document.querySelectorAll(".tab-pane");

const tabActive = document.querySelector(".tab-item.active");
const line = document.querySelector(".tabs .line");
if (line) {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
}


tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function() {
        document.querySelector(".tab-item.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
})

// // // Rateting js
// // $(':radio').change(function() {
// //     console.log('New star rating: ' + this.value);
// // });
function minusProduct(button) {
    const input = button.parentNode.querySelector('.input-qty');
    let value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;

    if (value > 1) {
        value--;
    }

    input.value = value;
}

function plusProduct(button) {
    const input = button.parentNode.querySelector('.input-qty');
    let value = parseInt(input.value, 10);
    const max = parseInt(input.getAttribute('max'), 10);

    value = isNaN(value) ? 0 : value;
    value++;

    if (value > max) {
        value = max;
        alert('Số sản phẩm trong kho của shop đã đạt giới hạn');
    }

    input.value = value;
}