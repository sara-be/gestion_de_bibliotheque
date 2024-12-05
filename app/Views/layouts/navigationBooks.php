<link rel="stylesheet" href="/css/navigation.css">


<div class="navi">
    <ul class="nav flex-column">
   
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </span>
                <span class="title">Bookly</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= route_to('admin.dashboard') ?>">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= route_to('books.index') ?>">
                <span class="icon">
                <ion-icon name="book-outline"></ion-icon>
                    
                </span>
                <span class="title">Books</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= route_to('books.retard') ?>">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Emprunteurs</span>
            </a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="<?= route_to('demandes.index') ?>">
        <span class="icon">
            <ion-icon name="document-text-outline"></ion-icon>
        </span>
        <span class="title">Demandes</span>
    </a>
</li>


        <li class="nav-item">
        <a class="nav-link" href="<?= route_to('admin.logout') ?>">
    <span class="icon">
        <ion-icon name="log-out-outline"></ion-icon>
    </span>
    <span class="title">Sign Out</span>
</a>

        </li>
    </ul>
</div>

<script src="/js/navigation.js"></script>

