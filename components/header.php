<? 
session_start(); 
$connect = mysqli_connect('localhost', 'root', '', 'pool') or die('Не удалось подключиться к базе данных');
?>
<header class="flex">
    <div class="header-logo">
        <img src="src/img/logo.png" alt="aquatix logo">
    </div>
    <nav class="flex">
        <a href="/" class="nav-item">ГЛАВНАЯ</a>
        <a href="about.php" class="nav-item">О НАС</a>
        <a href="services.php" class="nav-item">АБОНЕМЕНТЫ</a>
        <a href="" id="profile-btn" class="nav-item">ПРОФИЛЬ</a>
    </nav>
</header>