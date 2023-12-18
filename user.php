<?php
session_start();
$welcomeMessage = "Bienvenue Dans votre Espace!";
$welcomeMessage1 = "Commencez votre journée par planifier de bonnes recettes.";
$welcomeMessage2 = "Sans oublier de marquer les ingrédients manquants";
$welcomeMessage3 = "dans la liste des courses.";
$name = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>Mon compte</title>
</head>
<body>
<body>
    <nav class="sidebar close">
        <header>
            <div class="imag-text">
                <span class="image">
                    <img src="" alt="">
                </span>
                <div class="text header-text">
                 <span class="name">Organiser</span>
                 <span class="profession">Votre cuisine</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                
                  <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Mon compte</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="plannificateur.php">
                        <i class='bx bx-book-reader icon'></i>
                        <span class="text nav-text">Mon plannificateur</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="Mesrecette.php">
                        <i class='bx bx-bowl-hot icon'></i>
                        <span class="text nav-text">Mes recettes</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="courses.php">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">Mes courses</span>
                    </a>
                  </li>    
                </ul>
            </div>
            <div class="bottom-content">  	
			<ul class="language-switcher">			   
			<li class="language">
			<a href="userarb.php">
            <div class="flag-icon language-icon">
			<i class="flag-icon flag-icon-sa"></i>
            </div>
            <span class="language-text text">Arabe</span>
			</a>
			</li>
			<li class="language">
			 <a href="#">
            <div class="flag-icon language-icon">
           <i class="flag-icon flag-icon-fr"></i>
            </div>
            <span class="language-text text">Français</span>
			</a>
			</li>
			</ul>
			<li class="">
            <a href="deconnexion.php">
            <i class='bx bx-log-out icon' ></i>
            <span class="text nav-text">Deconnecter</span>
            </a>
               </li>
				<li class="mode">
                <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                    </div>
                    <span class="mode-text text">Mode sombre</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
               </li>			   
            </div>
        </div>
    </nav>
    <section class="home">
        <div id="title" class="text">Bienvenue</div>
		<div class="text"><h1><?php echo $welcomeMessage;?>
		<p id="content"><p><?php echo $name; ?></p></h1>
		<p><?php echo $welcomeMessage1; ?></p>
		<p><?php echo $welcomeMessage2; ?></p>		
		<p><?php echo $welcomeMessage3; ?></p></p>
		
		</div>
	<div class="imgs">
	<img src="photo\salut.png" height="250px">
	<img src="photo\salut1.png" height="250px">
	</div>
    </section>
    <script src="planner.js"></script>
</body>
</html>