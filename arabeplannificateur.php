<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "repertoir";

 try{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
 }
 catch (PDOException $e){
     echo"la connection a echoue" . $e->getMessage();
 }
 if(isset($_POST['Ajouter'])) {
  $jour = $_POST['jour'];
  $repas = $_POST['repas'];
  $plat = $_POST['plat'];

  $sql = "INSERT INTO planning (jour, repas, plat) VALUES (:jour, :repas, :plat)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':jour', $jour);
  $stmt->bindParam(':repas', $repas);
  $stmt->bindParam(':plat', $plat);
  $stmt->execute();}

  $stmt = $conn->query("SELECT * FROM planning");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST['supprimer'])) {
      $id = $_POST['id'];
      $sql_s = "DELETE FROM planning WHERE id = :id"; // Utilisation d'un paramètre nommé
      $stmt_s = $conn->prepare($sql_s);
      $stmt_s->bindParam(':id', $id); // Liaison du paramètre
      $stmt_s->execute();
  }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plannificateur.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>plannificateur</title>
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
                 <span class="name">تنظيم</span>
                 <span class="profession">مطبخكم</span>
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
                    <a href="#">
                        <i class='bx bx-book-reader icon'></i>
                        <span class="text nav-text">جدولي الاسبوعي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="planner.php">
                        <i class='bx bx-bowl-hot icon'></i>
                        <span class="text nav-text">وصفاتي</span>
                    </a>
                  </li>  
                  <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-cart-add icon' ></i>
                        <span class="text nav-text">مشترياتي</span>
                    </a>
                  </li>    
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
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
   <style>
    .home   .popup{
    position:absolute;top:-200%;left:50%;opacity:0;transform:translate(-50%,-50%) scale(1.25);width:386px;padding:20px 30px;box-shadow:2px 2px 5px 5px(0,0,0,0.15);border-radius: 10px; transition:top 0ms ease-in-out 200ms,opacity 200ms ease-in-out 0ms,transform 20ms ease-in-out 0ms;
}
.home .popup.active{
    top:44%;
    opacity:1;
    transform:translate(-50%,-50%) scale(1);
    transition:top 0ms ease-in-out 0ms,
               opacity 200ms ease-in-out 0ms,
               transform 20ms ease-in-out 0ms;
    background:#f09cfe;}
.home   .popup .close-btn{
    position:absolute;top:20px;right:12px;width:29px;height:30px;background:#888;color:#eee;text-align:center;line-height:30px;border-radius:22px;cursor:pointer;
}
.home   .popup .form form{
    margin: 15px 0px;
}
.home .popup .form form label{
    margin-top:5px;display:block;width:100%;padding:10px;outline:none;border:none;border-radius:5px; color: #18191A;
}
.home .popup .form form input{
    margin-top:5px;display:block;width:100%;padding:10px;outline:none;border:none;border-radius:5px;color: #18191A;
}
.home .popup .form form .envoi input{
    width:100%;height:40px;border:none;font-size:16px;background:#b715d6;color:#f5f5f5;border-radius:10px;cursor:pointer;
}
.home .text .up  button:hover{
    background: #f09cfe;
    color: #fff;
}

   </style>
   <section class="home">
    <div class="up" style="display: flex;position: relative;margin-bottom: 30px;margin-top: 20px;"><div class="text"><h1> جدولي الاسبوعي</h1></div>
    <button id="show" class="show-login"  onclick="tooglePopup()" style=" color: #fff;padding: 20px 30px;font-size: 18px;font-weight: 600;background: #b715d6;border: none;outline: none;cursor: pointer;border-radius: 15px;margin-left: 40px;">اضف طبقك</button></div>
    <div class="popup" id="popup">
      <div class="close-btn">&times;</div>
      <div class="form"><form action="" method="post">
        <label style="color:#000;"for="jour" >:اختر يوما </label>
        <select name="jour" id="jour">
         <option value="dimanche">الاحد</option>
         <option value="lundi">الاثنين</option>
         <option value="mardi">الثلاثاء</option>
         <option value="mercredi">الاربعاء</option>
         <option value="jeudi">الخميس</option>
         <option value="vendredi">الجمعة</option>
         <option value="samedi">السبت</option>
        </select>
        <br>
       <label for="repas">الوجبات :</label>
       <select name="repas" id="repas">
         <option value="petitdejeuner">فطور الصباح</option>
         <option value="dejeuner">الغداء</option>
         <option value="dinner">العشاء</option>
       </select><br>
       <label style="color:#000;"for="plat" >اكتب طبقك:</label>
        <input type="text" id="plat" name="plat"placeholder="الطبق...."><br>
        <input type="submit" value="اضافة" name="Ajouter"  style="background:#b715d6;color:#fff;font-size:15px;">
      </form></div>
    </div>
  
   <div class="plan"><table style="font-size: x-large;">
  <thead>
    <tr>
      <th></th>
      <th><img src="الاحد.png"></th>
      <th><img src="الاثنين.png"></th>
      <th><img src="الثلاثاء.png"></th>
      <th><img src="الاربعاء.png"></th>
      <th><img src="الخميس.png"></th>
      <th><img src="الجمعة.png"></th>
      <th><img src="السبت.png"></th>
      
    </tr>
  </thead>
  <tbody>
     
   <tr>
      <td><img src="فطور الصباح.png"></td>
      <td ><p id="d1" class="d1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id1" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="l1" class="l1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id4" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="ma1" class="ma1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id7" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="me1" class="me1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id10" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="j1" class="j1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="13"value="" >
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="v1" class="v1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id16"value="" >
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="s1" class="s1"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id19" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>      
    </tr>
    <tr>
      <td><img src="الفطور.png"></td>
      <td ><p id="d2" class="d2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id2" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="l2" class="l2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id5" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="ma2" class="ma2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id8" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="me2" class="me2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" value="" id="id11">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="j2" class="j2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id14"value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="v2" class="v2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id"  value="" id="id17">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="s2" class="s2"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" value="" id="id20">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>  
      
      </tr>
      <tr>
      <td><img src="العشاء.png"></td>
      <td ><p id="d3" class="d3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id3" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="l3" class="l3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id7" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="ma3" class="ma3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id8" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="me3" class="me3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" value="" id="id12">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="j3" class="j3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="id15" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td ><p id="v3" class="v3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" id="18" value="">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>
      <td><p id="s3" class="s3"><form action="plannificateur.php" method="post">
              <input type="hidden" name="id" value="" id="id21">
              <input type="submit" name="supprimer" class="supprimer" value="حدف" style="border-radius: 5px;font-size: 14px;margin-top: 71px;background: teal;color: aliceblue;border: none;padding: revert;">
            </form></p></td>  
      </tr>
  
  </tbody>

  
</table></div>
    
   </section>
   <script src="planner.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    function tooglePopup(){
    document.getElementById("popup").classList.toggle("active");
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
                document.querySelector(".popup").classList.remove("active");
            });
    };
</script><script>

   <?php foreach($result as $row){
    if($row['jour']=="dimanche"){
      if($row['repas']=="petitdejeuner"){?>
        $(d1).html('<?php echo $row['plat'];?>');
        $('#id1').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(d2).html('<?php echo $row['plat'];?>');
      $('#id2').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(d3).html('<?php echo $row['plat'];?>');
    $('#id3').val('<?php echo $row['id'];?>');
  <?php }}else
  if($row['jour']=="lundi"){
      if($row['repas']=="petitdejeuner"){?>
        $(l1).html('<?php echo $row['plat'];?>');
        $('#id4').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(l2).html('<?php echo $row['plat'];?>');
      $('#id5').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(l3).html('<?php echo $row['plat'];?>');
    $('#id6').val('<?php echo $row['id'];?>');
  <?php }} else 
  if($row['jour']=="mardi"){
      if($row['repas']=="petitdejeuner"){?>
        $(ma1).html('<?php echo $row['plat'];?>');
        $('#id7').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(ma2).html('<?php echo $row['plat'];?>');
      $('#id8').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(ma3).html('<?php echo $row['plat'];?>');
    $('#id9').val('<?php echo $row['id'];?>');
  <?php }}else 
  if($row['jour']=="mercredi"){
      if($row['repas']=="petitdejeuner"){?>
        $(me1).html('<?php echo $row['plat'];?>');
        $('#id10').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(me2).html('<?php echo $row['plat'];?>');
      $('#id11').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(me3).html('<?php echo $row['plat'];?>');
    $('#id12').val('<?php echo $row['id'];?>');
  <?php }}else 
  if($row['jour']=="jeudi"){
      if($row['repas']=="petitdejeuner"){?>
        $(j1).html('<?php echo $row['plat'];?>');
        $('#id13').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(j2).html('<?php echo $row['plat'];?>');
      $('#id14').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(j3).html('<?php echo $row['plat'];?>');
    $('#id15').val('<?php echo $row['id'];?>');
  <?php }}else 
  if($row['jour']=="vendredi"){
      if($row['repas']=="petitdejeuner"){?>
        $(v1).html('<?php echo $row['plat'];?>');
        $('#id16').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(v2).html('<?php echo $row['plat'];?>');
      $('#id17').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(v3).html('<?php echo $row['plat'];?>');
    $('#id18').val('<?php echo $row['id'];?>');
  <?php }}else 
  if($row['jour']=="samedi"){
      if($row['repas']=="petitdejeuner"){?>
        $(s1).html('<?php echo $row['plat'];?>');
        $('#id19').val('<?php echo $row['id'];?>');
    <?php  } else  if($row['repas']=="dejeuner"){?>
      $(s2).html('<?php echo $row['plat'];?>');
      $('#id20').val('<?php echo $row['id'];?>');
   <?php } else  if($row['repas']=="dinner"){?>
    $(s3).html('<?php echo $row['plat'];?>');
    $('#id21').val('<?php echo $row['id'];?>');
  <?php }}
  ?>
     

<?php }

  ?>
 
</script>
  <?php
  ?>
</body>
</html>   