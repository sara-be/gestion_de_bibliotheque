document.addEventListener('DOMContentLoaded', function () {
    // Gestion du survol des éléments de navigation
    let list = document.querySelectorAll(".navi li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }

    list.forEach((item) => item.addEventListener("mouseover", activeLink));

    // Gestion du toggle de la navigation
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navi");
    let main = document.querySelector(".main");

    if (toggle) {
        toggle.onclick = function () {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
            toggle.classList.toggle("active");
        };
    }

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
