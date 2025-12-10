<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $conn = new mysqli("localhost", "root", "", "database_library") or die(mysqli_error($conn));

    if ($conn) { 
   
        $checkEmailQuery = "SELECT * FROM registration WHERE email='$email'";
        $checkResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkResult) > 0) {
          
            echo "<script>alert('البريد الإلكتروني مستخدم مسبقًا. يرجى استخدام بريد إلكتروني آخر.');</script>";
                    echo 'المحاولة ببريد الكتروني آخر؟<a href="signin.php"> سجل الآن</a>';
        }

         else {
          
            $query = "INSERT INTO registration (name, email, password) 
                      VALUES ('$name', '$email', '$password')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    $conn->close();
}
?>