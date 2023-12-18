<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artculinaire";

try {
    // الاتصال بقاعدة البيانات
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("فشل الاتصال: ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Inscrire'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // التحقق مما إذا كانت جميع الحقول مملوءة
    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        echo '<script>alert("يرجى ملء جميع الحقول.")</script>';
    } else {
        if ($password !== $password2) {
            echo '<script>alert("كلمات المرور غير متطابقة.")</script>';
        } else {
            // تجميد كلمة المرور
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            try {
                // إعداد وتنفيذ استعلام الإدراج
                $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();
                header("Location: userarb.php");
            } catch (PDOException $e) {
                echo '<script>alert("تعذر معالجة البيانات. خطأ: ' . $e->getMessage() . '")</script>';
            }
        }
    }
}

// استعلام البيانات من جدول 'users'
$query = 'SELECT * FROM users';
$stmt = $conn->query($query);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// ترميز البيانات إلى JSON
$json = json_encode($data);

// إرسال البيانات JSON إلى العميل (قم بفك التعليق عن السطور أدناه إذا لزم الأمر)
// header('Content-Type: application/json');
// echo $json;
?>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artculinaire";

try {
    // الاتصال بقاعدة البيانات
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("فشل الاتصال: ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Connexion'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        $recupUser = $conn->prepare('SELECT * FROM users WHERE username=?');
        $recupUser->execute(array($username));

        if ($recupUser->rowCount() > 0) {
            $userData = $recupUser->fetch();
            if (password_verify($password, $userData['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $userData['password'];
                $_SESSION['id'] = $userData['id'];
                // إعادة توجيه إلى صفحة المستخدم الخاصة
                header("Location: userarb.php");
            } else {
                echo '<script>alert("اسم المستخدم أو كلمة المرور غير صحيحة")</script>';
            }
        } else {
            echo '<script>alert("اسم المستخدم أو كلمة المرور غير صحيحة")</script>';
        }
    } else {
        echo '<script>alert("يرجى ملء الحقول....")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول/التسجيل</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="login.css">
</head>
<body>
<ul class="language-switcher">			   
			<div class="language">
			<a href="#">
            <div class="flag-icon language-icon">
			<i class="flag-icon flag-icon-sa"></i>
            </div>
            <span class="language-text text">Arabe</span>
			</a>
			</div>
			<div class="language">
			 <a href="login.php">
            <div class="flag-icon language-icon">
           <i class="flag-icon flag-icon-fr"></i>
            </div>
            <span class="language-text text">Français</span>
			</a>
			</div>
			</ul>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="" method="post">
        <h1>التسجيل.</h1>
        <input type="text" id="username" name="username" placeholder="اسم المستخدم" >
        <input type="email" id="email" name="email" placeholder="البريد الإلكتروني" >
        <input type="password" id="password" name="password" placeholder="كلمة المرور" >
        <input type="password"  id="password2" name="password2" placeholder="تأكيد كلمة المرور">
        <button type="submit" name="Inscrire">تسجيل</button>
        <span>أو استخدم حسابك</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="" method="POST">
        <h1>تسجيل الدخول.</h1>
         <input type="text" placeholder="اسم المستخدم" id="username" name="username">
		 <input type="password" placeholder="كلمة المرور" id="password" name="password">
        <div class="content">
          <div class="pass-link">
            <a href="#">نسيت كلمة المرور </a>
          </div>
        </div>
        <button type="submit" name="Connexion">تسجيل الدخول</button>
        <span>أو استخدم حسابك</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
         
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">مرحبًا <br> أصدقائي</h1>
          <p>إذا كان لديك حساب ، قم بتسجيل الدخول هنا</p>
          <button class="ghost" id="login">تسجيل الدخول
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">ابدأ يومك <br> الآن</h1>
          <p>إذا لم يكن لديك حساب ، انضم إلينا وابدأ يومك.</p>
          <button class="ghost" id="register">التسجيل
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>      

  </div>
  

  <script src="script.js"></script>

</body>
</html>