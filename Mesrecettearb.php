<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "artculinaire";

 try{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
 }
 catch (PDOException $e){
     echo"la connection a echoue" . $e->getMessage();
 }
 if (isset($_POST['Ajouter'])){
     $titre=$_POST['titre'];
     if (isset($_POST['ingredients1'])) {
        $ingredients1 = $_POST['ingredients1'];
    } else {
        $ingredients1 = '';
    }
    if (isset($_POST['ingredients2'])) {
        $ingredients2 = $_POST['ingredients2'];
    
    }
    if ( isset($_POST['ingredients3'])) {
        $ingredients3 = $_POST['ingredients3'];
    
    }
    if (isset($_POST['ingredients4'])) {
        $ingredients4 = $_POST['ingredients4'];
    
    }
    if (isset($_POST['ingredients5'])) {
        $ingredients5 = $_POST['ingredients5'];
   
    }
     if (isset($_POST['ingredients6'])) {
        $ingredients6 = $_POST['ingredients6'];
    
    }
    if (isset($_POST['ingredients7'])) {
        $ingredients7 = $_POST['ingredients7'];
   
    }
    if (isset($_POST['ingredients8'])) {
        $ingredients8 = $_POST['ingredients8'];
   
    }
    if (isset($_POST['ingredients9'])) {
        $ingredients9 = $_POST['ingredients9'];
    
    }
    if (isset($_POST['ingredients10'])) {
        $ingredients10 = $_POST['ingredients10'];
    
    }
    $photo = $_FILES['photo']['name'];
     $fileTmpName = $_FILES['photo']['tmp_name'];
     $fileSize = $_FILES['photo']['size'];
     $folder = "./img/";
 
     // Vérifiez si le dossier existe, sinon créez-le
     if (!file_exists($folder)) {
         mkdir($folder, 0755, true);
     }
 
     // Vérifiez si le fichier a été uploadé et si la taille ne dépasse pas le limite
     if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] <= 1000000) {
         // Génèrez un nom unique pour le fichier
         $newImageName = uniqid();
         $newImageName .= "." . pathinfo($photo, PATHINFO_EXTENSION);
 
         // Déplacez le fichier temporaire vers le dossier 'img'
         move_uploaded_file($fileTmpName, $folder . $newImageName);
 
     $preparation=$_POST['preparation'];
    
     $sql = ("INSERT INTO repertoir(valeurTitre, valeurIngredients1, valeurIngredients2, valeurIngredients3, valeurIngredients4, valeurIngredients5, valeurIngredients6,valeurIngredients7, valeurIngredients8, valeurIngredients9, valeurIngredients10, valeurPhoto, valeurPreparation ) VALUES(:titre, :ingredients1, :ingredients2, :ingredients3, :ingredients4, :ingredients6, :ingredients6, :ingredients7, :ingredients8, :ingredients9, :ingredients10, :photo, :preparation)");
     $stmt = $conn->prepare($sql);
     
     $stmt->bindParam(':titre', $titre);
     $stmt->bindParam(':photo', $newImageName);
     $stmt->bindParam(':ingredients1', $ingredients1);
     $stmt->bindParam(':ingredients2', $ingredients2);
     $stmt->bindParam(':ingredients3', $ingredients3);
     $stmt->bindParam(':ingredients4', $ingredients4);
     $stmt->bindParam(':ingredients5', $ingredients5);
     $stmt->bindParam(':ingredients6', $ingredients6);
     $stmt->bindParam(':ingredients7', $ingredients7);
     $stmt->bindParam(':ingredients8', $ingredients8);
     $stmt->bindParam(':ingredients9', $ingredients9);
     $stmt->bindParam(':ingredients10', $ingredients10);
     $stmt->bindParam(':preparation', $preparation);
     
    
        

 
   $stmt->execute();}     }

$stmt = $conn->query("SELECT * FROM repertoir");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Mesrecette.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>>وصفاتي</title>
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
                    <a href="plannificateur.php">
                        <i class='bx bx-book-reader icon'></i>
                        <span class="text nav-text">مخططي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="Mesrecettearb">
                        <i class='bx bx-bowl-hot icon'></i>
                        <span class="text nav-text">وصفاتي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="coursesarab">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">مشترياتي</span>
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
			 <a href="Mesrecette.php">
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
                    <span class="mode-text text">الوضع الداكن</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
               </li>       
            </div>
        </div>
   </nav> 
     
    <section class="home">
     <div class="text">
        <div class="up" >
            <h1>وصفاتي</h1>
            <button id="show" class="show-login" onclick="tooglePopup()">إضافة</button>
        </div>
		<br>
		<br>
       <div class="popup" id="popup">
        <div class="close-btn">&times;</div>
        <div class="form"><form action="" method="post" autocomplete="off" enctype="multipart/form-data">
       
        
       <div class="titre"><label style="color:#000;"for="titre" >أدخل العنوان:</label>
        <input type="text" id="titre" name="titre"placeholder="العنوان...."></div>
        <div class="photo"><label  for="photo">أدخل الصورة:</label>
        <input type="file" id="photo" name="photo" ></div>
        <div class="ingredient"><label   for="ingredient">أدخل المكونات:</label>
        <div id="ingredient" ><input  type="text" id="ingredients1" id="b" name="ingredients1" placeholder="مكون.....">
        <input type="text" id="ingredients2" id="b" name="ingredients2"placeholder="مكون....." >
        <input type="text" id="ingredients3" id="b" name="ingredients3"placeholder="مكون....." >
        <input type="text" id="ingredients4" id="b" name="ingredients4"placeholder="مكون.....">
        <input type="text" id="ingredients5" id="b" name="ingredients5"placeholder="مكون.....">
        <input type="text" id="ingredients6" id="b" name="ingredients6"placeholder="مكون.....">
        <input type="text" id="ingredients7" id="b" name="ingredients7"placeholder="مكون.....">
        <input type="text" id="ingredients8" id="b" name="ingredients8"placeholder="مكون.....">
        <input type="text" id="ingredients9" id="b" name="ingredients9"placeholder="مكون.....">
        <input type="text" id="ingredients10"id="b"name="ingredients10"placeholder="مكون....."></div></div>
        <br>
         
        <div class="preparation"><label for="preparation">أدخل طريقة التحضير:</label><br>
        <textarea id="preparation" name="preparation" rows="30" cols="47" placeholder="الطريقة...."></textarea></div>

        <div class="envoie" id="submit">
                <input type="submit" value="إضافة" name="Ajouter"  style="background:#b715d6;color:#fff;font-size:15px;"></div>
       </div>
    </div>
        <div class="contenu-carte" >
          
          
     
    <?php foreach($result as $row) {  ?> 
       <div class="carte" style="  background: #fff;;padding: 100px;box-sizing: border-box;max-width: 80rem;height: fit-content;border-radius: 10px;margin-top: 30px;margin-bottom: 30px ">
      <div class="text-carte">
        <img class src="img/<?php  echo $row['valeurPhoto']; ?>" alt="" style="float: right;width: 20%;border-radius: 55px;position: relative; "/>
        
      

      <h2 style="color:#9f2aa1; font-size:40px;"><?php  echo  $row['valeurTitre'];?></h2>
        <p><div class="p" style="font-size: 20px; text-decoration:underline;"><div style="font-size: 30px;">المكونات:</div></div><br><?php
                    if (trim($row['valeurIngredients1']) != '') {
                        echo '1)'. $row['valeurIngredients1'] . '<br>';
                    }if (trim($row['valeurIngredients2']) != '') {
                        echo '2)'. $row['valeurIngredients2'] .'<br>';
                    }if (trim($row['valeurIngredients3']) != '') {
                        echo '3)'.$row['valeurIngredients3'] . '<br>';
                    }if (trim($row['valeurIngredients4']) != '') {
                        echo '4)'.$row['valeurIngredients4'] . '<br>';
                    }if (trim($row['valeurIngredients5']) != '') {
                        echo '5)'.$row['valeurIngredients5'] . '<br>';
                    }if (trim($row['valeurIngredients6']) != '') {
                        echo '6)'.$row['valeurIngredients6'] . '<br>';
                    }if (trim($row['valeurIngredients7']) != '') {
                        echo  '7)'.$row['valeurIngredients7'] .'<br>';
                    }if (trim($row['valeurIngredients8']) != '') {
                        echo '8)'.$row['valeurIngredients8'] . '<br>';
                    }if (trim($row['valeurIngredients9']) != '') {
                        echo '9)'.$row['valeurIngredients9'] . '<br>';
                    }if (trim($row['valeurIngredients10']) != '') {
                        echo '10)'.$row['valeurIngredients10'] . '<br>';
                    }
                ?></p>
      

   
        <br><br><p><div class="p" style="font-size: 20px; text-decoration:underline;"><div style="font-size: 30px;"> طريقة التحضير:</div></div><br>
<?php echo  $row['valeurPreparation'] ;?> </p> <br>
    <div class="btnn" style="display:flex;"><form action="planner.php" method="post">
    <input type="hidden" name="id" value="' <?php echo $row['id']; ?> '">
    <input type="submit" name="supprimer" class="supprimer" value="حدف" style="background: #b715d6;border:none;
    color:#fff;
    font-size:20px;
    padding:5px 10px;
    text-decoration:none;
    border-radius:10px;
    margin-right:30px;"></form>
    <button id="show1" class="show-login1"  onclick="tooglePopup2()"  style="background: #b715d6; border: none; color: #fff; font-size: 20px; padding: 15px 10px; text-decoration: none; border-radius: 10px;">modifier</button></div> 
    <div class="popup1" id="popup1">
        <div class="close-btn">&times;</div>
        <div class="form"><form action="" method="post" autocomplete="off" enctype="multipart/form-data">
       
        
       <div class="titre"><label style="color:#000;"for="titre1" >غير العنوان:</label>
        <input type="text" id="titre1" name="titre1"placeholder="العنوان...."></div>
        <br>
        

         
        <div class="ingredient"><label   for="ingredient">غير المقادير:</label><br>
        <div id="ingredient1" ><input  type="text" id="ingredients11" id="b" name="ingredients11" placeholder="مكون.....">
        <input type="text" id="ingredients21" id="b" name="ingredients21"placeholder="مكون...." >
        <input type="text" id="ingredients31" id="b" name="ingredients31"placeholder="مكون....." >
        <input type="text" id="ingredients41" id="b" name="ingredients41"placeholder="مكون.....">
        <input type="text" id="ingredients51" id="b" name="ingredients51"placeholder="مكون.....">
        <input type="text" id="ingredients61" id="b" name="ingredients61"placeholder="مكون.....">
        <input type="text" id="ingredients71" id="b" name="ingredients71"placeholder="مكون.....">
        <input type="text" id="ingredients81" id="b" name="ingredients81"placeholder="مكون.....">
        <input type="text" id="ingredients91" id="b" name="ingredients91"placeholder="مكون.....">
        <input type="text" id="ingredients101"id="b"name="ingredients101"placeholder="مكون....."></div></div>
        <br>
         
        <div class="preparation"><label for="preparation1">غير طريقة التحضير:</label><br>
        <textarea id="preparation1" name="preparation1" rows="30" cols="47" placeholder="الطريقة...."></textarea></div>
              
              <div class="envoie" id="submit">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>
                <input type="submit" value="تغيير" name="Modifier"  style="background:#b715d6;color:#fff;font-size:15px;"></div>
       </div>
            </form></div></div>
     </div><?php
      }
  ?>
        </div></section>  
  <style>
    .home .contenu-carte  .popup1{
    position:absolute;top:-200%;left:50%;opacity:0;transform:translate(-50%,-50%) scale(1.25);width:386px;padding:20px 30px;box-shadow:2px 2px 5px 5px(0,0,0,0.15);border-radius: 10px; transition:top 0ms ease-in-out 200ms,opacity 200ms ease-in-out 0ms,transform 20ms ease-in-out 0ms;
}
.home .contenu-carte .popup1.active{
    top:112%;
    opacity:1;
    transform:translate(-50%,-50%) scale(1);
    transition:top 0ms ease-in-out 0ms,
               opacity 200ms ease-in-out 0ms,
               transform 20ms ease-in-out 0ms;
    background:#f09cfe;}
.contenu-carte .popup1 .close-btn{
    position:absolute;top:20px;right:12px;width:29px;height:30px;background:#888;color:#eee;text-align:center;line-height:30px;border-radius:22px;cursor:pointer;
}
.contenu-carte  .popup1 .form form{
    margin: 15px 0px;
}
 .contenu-carte .popup1 .form form label{
    margin-top:5px;display:block;width:100%;padding:10px;outline:none;border:none;border-radius:5px; color: #18191A;
}
.contenu-carte .popup1 .form form input{
    margin-top:5px;display:block;width:100%;padding:10px;outline:none;border:none;border-radius:5px;color: #18191A;
}
 .contenu-carte .popup1 .form form .envoi input{
    width:100%;height:40px;border:none;font-size:16px;background:#b715d6;color:#f5f5f5;border-radius:10px;cursor:pointer;
}
  </style>  
        <script>
    function tooglePopup(){
    document.getElementById("popup").classList.toggle("active");
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
                document.querySelector(".popup").classList.remove("active");
            });
 };
 function tooglePopup2(){
    document.getElementById("popup1").classList.toggle("active");
    document.querySelector(".popup1 .close-btn").addEventListener("click", function() {
                document.querySelector(".popup1").classList.remove("active");
            });
 };
</script>
<script src="planner.js"></script>
        <?php 

if(isset($_POST['supprimer'])) {
    $id = $_POST['id']; // Get the ID of the element to delete
    $sql = "DELETE FROM repertoir WHERE id = $id"; // Replace your_table_name with the actual table name
    if ($conn->query($sql) === TRUE) {
        
    } else {
      
    }
}
if (isset($_POST['Modifier'])) {
    $id = $_POST['id'];
    $titre1=$_POST['titre1'];
    $ingredients11 = $_POST['ingredients11'];
    $ingredients21 = $_POST['ingredients21'];
    $ingredients31 = $_POST['ingredients31'];
    $ingredients41 = $_POST['ingredients41'];
    $ingredients51 = $_POST['ingredients51'];
    $ingredients61 = $_POST['ingredients61'];
    $ingredients71 = $_POST['ingredients71'];
    $ingredients81 = $_POST['ingredients81'];
    $ingredients91 = $_POST['ingredients91'];
    $ingredients101 = $_POST['ingredients101'];
    $preparation1=$_POST['preparation1'];
    
   if($titre1 != null){
    $sql1 = "UPDATE repertoir SET valeurTitre = :titre1 where id = :id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':titre1', $titre1);
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();}

    if($ingredients11 != null){
        $sql2 = "UPDATE repertoir SET  valeurIngredients1= :ingredients11 where id = :id";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':ingredients11', $ingredients11);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();}
     
   if($ingredients21 != null){
    $sql3 = "UPDATE repertoir SET  valeurIngredients2= :ingredients21 where id = :id";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bindParam(':ingredients21', $ingredients21);
    $stmt3->bindParam(':id', $id);
    $stmt3->execute();
   }

   if($ingredients31 != null){
    $sql4 = "UPDATE repertoir SET  valeurIngredients3= :ingredients31 where id = :id";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->bindParam(':ingredients31', $ingredients31);
    $stmt4->bindParam(':id', $id);
    $stmt4->execute();
   }

   if($ingredients41 != null){
    $sql5 = "UPDATE repertoir SET  valeurIngredients4= :ingredients41 where id = :id";
    $stmt5 = $conn->prepare($sql5);
    $stmt5->bindParam(':ingredients41', $ingredients41);
    $stmt5->bindParam(':id', $id);
    $stmt5->execute();
   }
   if($ingredients51 != null){
    $sql6 = "UPDATE repertoir SET  valeurIngredients5= :ingredients51 where id = :id";
    $stmt6 = $conn->prepare($sql6);
    $stmt6->bindParam(':ingredients51', $ingredients51);
    $stmt6->bindParam(':id', $id);
    $stmt6->execute();
   }

   if($ingredients61 != null){
    $sql7 = "UPDATE repertoir SET  valeurIngredients6= :ingredients61 where id = :id";
    $stmt7 = $conn->prepare($sql7);
    $stmt7->bindParam(':ingredients61', $ingredients61);
    $stmt7->bindParam(':id', $id);
    $stmt7->execute();
   }
 
   if($ingredients71 != null){
   $sql8 = "UPDATE repertoir SET  valeurIngredients7= :ingredients71 where id = :id";
   $stmt8 = $conn->prepare($sql8);
   $stmt8->bindParam(':ingredients71', $ingredients71);
   $stmt8->bindParam(':id', $id);
   $stmt8->execute();
   }

   if($ingredients81 != null){
   $sql9 = "UPDATE repertoir SET  valeurIngredients8= :ingredients81 where id = :id";
   $stmt9 = $conn->prepare($sql9);
   $stmt9->bindParam(':ingredients81', $ingredients81);
   $stmt9->bindParam(':id', $id);
   $stmt9->execute();
   }

  if($ingredients91 != null){
  $sql10 = "UPDATE repertoir SET  valeurIngredients9= :ingredients91 where id = :id";
  $stmt10 = $conn->prepare($sql10);
  $stmt10->bindParam(':ingredients91', $ingredients91);
  $stmt10->bindParam(':id', $id);
  $stmt10->execute();
  }
  if($ingredients101 != " "){
  $sql11 = "UPDATE repertoir SET  valeurIngredients10= :ingredients101 where id = :id";
  $stmt11 = $conn->prepare($sql11);
  $stmt11->bindParam(':ingredients101', $ingredients101);
  $stmt11->bindParam(':id', $id);
  $stmt11->execute();
 }
 

 if($preparation1 != " "){
    $sql12 = "UPDATE repertoir SET  valeurPreparation= :preparation1 where id = :id";
    $stmt12 = $conn->prepare($sql12);
    $stmt12->bindParam(':preparation1', $preparation1);
    $stmt12->bindParam(':id', $id);
    $stmt12->execute();
   }


}
?>
<?php


?> 
</body>
</html>