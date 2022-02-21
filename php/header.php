<header class="bg-primary">
    <div class="container header__container">
        <div class="flex jc-between ai-center py-8">
            <h2><a href="/" class="logo">BarberShop</a></h2>
            <nav class="nav">
                <ul class="nav__list flex">
                    <li class="nav__item"><a href="/php/pages/service.php" class="nav__link">Услуги</a></li>
                    <li class="nav__item"><a href="/php/pages/barbers.php" class="nav__link">Мастера</a></li>
                    <?php                    
                        if (isset($_SESSION['id'])) {
                            if ($_SESSION['role'] == 'user') {
                                echo '<li class="nav__item"><a href="/php/pages/userCabinet.php" class="nav__link">Личный кабинет</a></li>';
                            } elseif ($_SESSION['role'] == 'barber') {
                                echo '<li class="nav__item"><a href="/php/pages/barberCabinet.php" class="nav__link">Личный кабинет</a></li>';
                            } elseif ($_SESSION['role'] == 'admin') {
                                echo '<li class="nav__item"><a href="/php/pages/admin.php" class="nav__link">Панель администратора</a></li>';
                            }
                            echo '<li class="nav__item"><a href="/php/scripts/logout.php" id="logoutBtn" class="nav__link">Выйти</a></li>';
                            echo '<script src="/js/logout.js"></script>';
                        } else {
                            echo '<li class="nav__item"><a href="/php/pages/login.php" class="nav__link">Войти</a></li>';
                        }                    
                    ?>
                </ul>
            </nav>
        </div>        
    </div>
</header>