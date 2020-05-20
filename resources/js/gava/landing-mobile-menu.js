/*let optionBtn = document.querySelector('div.menu');
let line1 = document.querySelector('div.line1');
let line2 = document.querySelector('div.line2');
let line3 = document.querySelector('div.line3');
let options = document.querySelector('.buttons');
let open = false;
let buttonsContainer = document.querySelector('.buttonsContainer');
let menu_cart_little = document.querySelector('.menu-cart-little');

if (typeof optionBtn !== "undefined" && line1 != null && typeof line2 !== "undefined" && typeof line3 !== "undefined" && typeof options !== "undefined" && typeof buttonsContainer !== "undefined") {

    optionBtn.addEventListener('click', function(e){
        if (open == true){
            options.style.opacity = "0";
            options.style.display = "none";
            buttonsContainer.style.height = "0vh";
            line1.style.transform = "rotate(0deg)";
            line1.style.top = "0";
            line2.style.opacity = "1";
            line3.style.top = "0";
            buttonsContainer.style.backgroundColor = "black";
            line3.style.transform = "rotate(0deg)";
            open = false;
        }

        else {
            if(menu_cart_little != null) {
                menu_cart_little.style.display = "none";
            }
            options.style.display = "block";
            options.style.opacity = "1";
            buttonsContainer.style.height = "100vh";
            line1.style.transform = "rotate(45deg)";
            line3.style.transform = "rotate(-45deg)";
            line1.style.top = "9px";
            line2.style.opacity = "0";
            line3.style.top = "-9px";
            open = true;
        }
    });
}*/

var hamburger_menu_icon = document.querySelector('.menu-icon');
let line1               = document.querySelector('div.line1');
let line2               = document.querySelector('div.line2');
let line3               = document.querySelector('div.line3');
var hamburger_menu      = document.querySelector('.landing-nav');
var nav_links           = document.querySelectorAll('.nav-link');
var menu_open           = false;

if (typeof hamburger_menu !== "undefined" && hamburger_menu != null) {
    hamburger_menu_icon.addEventListener('click', function(){
        if (menu_open == false) {

            line1.style.transform = "rotate(45deg)";
            line1.style.top = "7px";
            line2.style.opacity = "0";
            line3.style.transform = "rotate(-45deg)";
            line3.style.top = "-7px";

            hamburger_menu.classList.remove("d-none");
            hamburger_menu.classList.add("justify-content-center");
            hamburger_menu.classList.add("align-items-center");
            hamburger_menu.classList.add("flex-column");
            hamburger_menu.classList.add("text-center");
            menu_open = true;
        }
        
        else {
            line1.style.transform = "rotate(0deg)";
            line1.style.top = "0px";
            line2.style.opacity = "1";
            line3.style.transform = "rotate(0deg)";
            line3.style.top = "0px";

            hamburger_menu.classList.add("d-none");
            hamburger_menu.classList.remove("justify-content-center");
            hamburger_menu.classList.remove("align-items-center");
            hamburger_menu.classList.remove("flex-column");
            hamburger_menu.classList.remove("text-center");
            menu_open = false;
        } 
    });

    for (var i = 0; i < nav_links.length; i++) {
        nav_links[i].addEventListener('click', function(event) {
            hamburger_menu.classList.add("d-none");
        });
    }
}