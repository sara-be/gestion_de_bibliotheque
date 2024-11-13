<link rel="stylesheet" href="/css/navigation.css">


<div class="navi">
    <ul class="nav flex-column">
   
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </span>
                <span class="title">Bookl</span>
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
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Books</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                </span>
                <span class="title">Experts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="title">Rating</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> <!-- Ajout des classes "nav-item" et "nav-link" -->
                <span class="icon">
                    <ion-icon name="videocam-outline"></ion-icon>
                </span>
                <span class="title">Meeting</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="time-outline"></ion-icon>
                </span>
                <span class="title">Historique</span>
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

