<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artculinaire";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    echo "Erreur de connexion : " . $e->getMessage();
}
if (isset($_POST['Ajoutelf'])) {
    $taskl = $_POST['taskl'];
    try {
        // Préparation et exécution de la requête d'insertion
        // Utilisation de backticks (`) pour encadrer le nom de la table avec un caractère spécial
        $sql = "INSERT INTO `task_course` (taskl) VALUES (:taskl)"; // Correction du nom du paramètre
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':taskl', $taskl);
        $stmt->execute();
    } catch (PDOException $e) {
        // Gestion des erreurs d'insertion
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}


// Sélection des données de la table 'legume/fruit'
$query = 'SELECT * FROM `task_course`';
$stmt = $conn->query($query);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Encodage des données en JSON
$json = json_encode($data);

// Envoyer les données JSON au client (décommentez les lignes ci-dessous si nécessaire)
// header('Content-Type: application/json');
// echo $json;

// Fermer la connexion à la base de données
$conn = null;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="courses.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>مخطط</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="imag-text">
                <span class="image">
                    <img src="" alt="">
                </span>
                <div class="text header-text">
                 <span class="name">تنظيم</span>
                 <span class="profession">مطبخك</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                
                  <li class="nav-link">
                    <a href="userarb.php">
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
                    <a href="#">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">تسوقي</span>
                    </a>
                  </li>    
                </ul>
            </div>
            <div class="bottom-content">
			<ul class="language-switcher">			   
			<li class="language">
			<a href="#">
           <div class="flag-icon language-icon">
            <i class="flag-icon flag-icon-sa"></i>
            </div>
            <span class="language-text text">العربية</span>
			</a>
			</li>
			<li class="language">
			 <a href="courses.php">
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
		<div class="lists">
		<div class="list"> 
		<h1>خضروات/فواكه <i class='fas fa-apple-alt'></i> <i class='fas fa-carrot'></i></h1>
		<form method="post" action="">
		<div class="row">
		<input  type="text" name="taskl"  id="input-box" placeholder="أدخل">
		<button  name="Ajoutelf" onclick="add()">إضافة</button>
		</div>
		<ul id="list-container">
		<!--
		<li class="checked">Task 1</li>
		<li>Task 2</li>
		<li>Task 3</li>-->
		</ul> 
		</form>
		</div>
		<div class="list"> 
		<h1>لحوم  <i class='fas fa-drumstick-bite'></i></h1>
		<div class="row">
		<input type="text" id="input-box1" placeholder="لحم">
		<button  name="Ajouteviande" onclick="add1()">إضافة</button>
		</div>
		<ul id="list-container1">
		<!--
		<li class="checked">Task 1</li>
		<li>Task 2</li>
		<li>Task 3</li>
		-->
		</ul>
		</div>
		<div class="list"> 
		<h1>توابل</h1>
		<div class="row">
		<input type="text" id="input-box2" placeholder="أدخل">
		<button name="ajouteepice" onclick="add2()">إضافة</button>
		</div>
		<ul id="list-container2">
		<!--
		<li class="checked">Task 1</li>
		<li>Task 2</li>
		<li>Task 3</li>
		-->
		</ul>
		</div>
		<div class="list"> 
		<h1>مشتريات عامة <i class='bx bx-cart-add icon' ></i></h1>
		<div class="row">
		<input type="text" id="input-box3" placeholder="أدخل">
		<button onclick="add3()"> إضافة </button>
		</div>
		<ul id="list-container3">
		<!--
		<li class="checked">Task 1</li>
		<li>Task 2</li>
		<li>Task 3</li>
		-->
		</ul>
		</div>
		</div>
		</div>
		</div>
    </section>
    <script src="courses.js"></script>
</body>
</html>
