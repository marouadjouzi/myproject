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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="courses.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>planner</title>
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
                    <a href="user.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Mon compte</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="planner.php">
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
                    <a href="#">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">Mes courses</span>
                    </a>
                  </li>    
                </ul>
            </div>
            <div class="bottom-content">
			<ul class="language-switcher">			   
			<li class="language">
			<a href="coursesarab.php">
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
		<div class="lists">
		<div class="list"> 
		<h1>Légume/Fruits <i class='fas fa-apple-alt'></i> <i class='fas fa-carrot'></i></h1>
		<form method="post" action="">
		<div class="row">
		<input  type="text" name="taskl"  id="input-box" placeholder="Entrer">
		<button  name="Ajoutelf" onclick="add()">Ajoute</button>
		</form>
		</div>
		<ul id="list-container">
		<!--
		<li class="checked">Task 1</li>
		<li>Task 2</li>
		<li>Task 3</li>-->
		</ul> 
		
		</div>
		<div class="list"> 
		<h1>Viande  <i class='fas fa-drumstick-bite'></i></h1>
		<div class="row">
		<input type="text" name="taskl" id="input-box1" placeholder="Vinade">
		<button  name="Ajouteviande" onclick="add1()">Ajoute</button>
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
		<h1>épices</h1>
		<div class="row">
		<input type="text" name="taskl" id="input-box2" placeholder="Entrer">
		<button name="ajouteepice" onclick="add2()">Ajoute</button>
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
		<h1>Courses Générale <i class='bx bx-cart-add icon' ></i></h1>
		<div class="row">
		
		<input type="text" name="taskl" id="input-box3" placeholder="Entrer">
		<button onclick="add3()"> Ajoute </button>
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