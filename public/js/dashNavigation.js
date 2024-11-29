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

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('userChart').getContext('2d');

   

    // Tableau des couleurs pour chaque mois
    const backgroundColors = [
        'rgba(255, 99, 132, 0.2)',  // Janvier (rouge clair)
        'rgba(54, 162, 235, 0.2)',  // Février (bleu clair)
        'rgba(255, 206, 86, 0.2)',  // Mars (jaune clair)
        'rgba(75, 192, 192, 0.2)',  // Avril (vert clair)
        'rgba(153, 102, 255, 0.2)', // Mai (violet clair)
        'rgba(255, 159, 64, 0.2)',  // Juin (orange clair)
        'rgba(199, 199, 199, 0.2)', // Juillet (gris clair)
        'rgba(83, 51, 237, 0.2)',   // Août (indigo clair)
        'rgba(0, 204, 102, 0.2)',   // Septembre (vert foncé clair)
        'rgba(255, 51, 153, 0.2)',  // Octobre (rose clair)
        'rgba(0, 102, 204, 0.2)',   // Novembre (bleu foncé clair)
        'rgba(204, 0, 0, 0.2)'      // Décembre (rouge foncé clair)
    ];

    const borderColors = [
        'rgba(255, 99, 132, 1)',  // Janvier
        'rgba(54, 162, 235, 1)',  // Février
        'rgba(255, 206, 86, 1)',  // Mars
        'rgba(75, 192, 192, 1)',  // Avril
        'rgba(153, 102, 255, 1)', // Mai
        'rgba(255, 159, 64, 1)',  // Juin
        'rgba(199, 199, 199, 1)', // Juillet
        'rgba(83, 51, 237, 1)',   // Août
        'rgba(0, 204, 102, 1)',   // Septembre
        'rgba(255, 51, 153, 1)',  // Octobre
        'rgba(0, 102, 204, 1)',   // Novembre
        'rgba(204, 0, 0, 1)'      // Décembre
    ];

    // Création du graphique
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre d\'utilisateurs par mois',
                data: data,
                backgroundColor: backgroundColors, // Appliquer les couleurs de fond
                borderColor: borderColors,         // Appliquer les couleurs des contours
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Afficher un pas de 1
                    }
                }
            }
        }
    });
});


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


document.addEventListener('DOMContentLoaded', function () {
  
    // Gestion de l'affichage du spinner (si nécessaire)
    window.addEventListener("load", function () {
        const spinner = document.querySelector('.spinner');
        if (spinner) {
            spinner.style.display = "none"; // Masquer le spinner lorsque la page est complètement chargée
        }
    });

    // Gestion de la suppression d'un livre avec SweetAlert
    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Empêche la navigation immédiate

            const bookId = this.getAttribute('data-book-id'); // Récupère l'ID du livre
            const deleteUrl = this.getAttribute('data-url'); // Récupère l'URL de suppression depuis l'attribut data-url

            // SweetAlert pour la confirmation de suppression
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous ne pourrez pas récupérer ce livre !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl; // Redirige vers l'URL de suppression
                }
            });
        });
    });

    // Gestion de la recherche dans les livres
    const searchInput = document.getElementById("searchInput");

    // Fonction pour filtrer les livres
    searchInput.addEventListener("input", function () {
        // Récupère la valeur du champ de recherche et convertit en minuscules
        const query = searchInput.value.toLowerCase();

        // Récupère tous les livres
        const books = document.querySelectorAll(".product_item");

        // Parcourt tous les livres et vérifie s'ils correspondent à la recherche
        books.forEach(function (book) {
            const title = book.getAttribute("data-title").toLowerCase();

            // Affiche ou masque les livres en fonction de la recherche
            if (title.includes(query)) {
                book.style.display = "block"; // Affiche le livre
            } else {
                book.style.display = "none"; // Masque le livre
            }
        });
    });
});
