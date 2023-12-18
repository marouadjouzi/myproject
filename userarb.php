<?php
session_start();
$welcomeMessage = "!مرحبًا في مساحتك";
$welcomeMessage1 = ".ابدأ يومك بتخطيط وصفات جيدة";
$welcomeMessage2 = ".ولا تنسى تحديد المكونات الناقصة";
$welcomeMessage3 = ".في قائمة التسوق";
$name = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>مخطط الطهي</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="imag-text">
                <span class="image">
                    <img src="" alt="">
                </span>
                <div class="text header-text">
                 <span class="name">المنظم</span>
                 <span class="profession">لمطبخك</span>
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
                        <span class="text nav-text">حسابي</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="arabeplannificateur.php">
                        <i class='bx bx-book-reader icon'></i>
                        <span class="text nav-text">مخططي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="Mesrecettearb.php">
                        <i class='bx bx-bowl-hot icon'></i>
                        <span class="text nav-text">وصفاتي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="coursesarab.php">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">تسوقي</span>
                    </a>
                  </li>    
                </ul>
            </div>
            <div class="bottom-content">  	
			<ul class="language-switcher">			   
			<li class="language"> 
			<a href="">
           <div class="flag-icon language-icon">
           <i class="flag-icon flag-icon-sa"></i>
            </div>
            <span class="language-text text">العربية</span>
			</a>
			</li>
			<li class="language">
			<a href="user.php">
            <div class="flag-icon language-icon">
            <i class="flag-icon flag-icon-fr"></i>
            </div>
            <span class="language-text text">الفرنسية</span>
			</a>
			</li>
			</ul>
			<li class="">
            <a href="deconnexion.php">
            <i class='bx bx-log-out icon' ></i>
            <span class="text nav-text">تسجيل الخروج</span>
            </a>
               </li>
				<li class="mode">
                <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                    </div>
                    <span class="mode-text text">وضع الظلام</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
               </li>			   
            </div>
        </div>
    </nav>
    <section class="home">
        <div id="title" class="text">مرحبًا</div>
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
