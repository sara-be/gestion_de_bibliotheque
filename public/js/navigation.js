
let list = document.querySelectorAll(".navi li");

list.forEach((item) => item.addEventListener("mouseover", activeLink));

function activeLink() {

    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navi");
let main = document.querySelector(".main");
toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    toggle.classList.toggle("active");
};

//charger le DOM ici: pour empécher le chargement de le js avant le chargement de la page
document.addEventListener('DOMContentLoaded', function () {






    // le hover de navigation
    let list = document.querySelectorAll(".navi li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }


    list.forEach((item) => item.addEventListener("mouseover", activeLink));


    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navi");
    let main = document.querySelector(".main");


    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

});
window.addEventListener("load", function () {
    spinner.style.display = "none";
});