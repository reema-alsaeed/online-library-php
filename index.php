<!DOCTYPE html>
<html>
<head>
    <title>نموذج تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        body {
            font-family: 'Cairo', sans-serif; 
            color: #fff;
            text-align: right;
        }

        .background {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .background video {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            opacity: 0.7; 
        }

        form {
            background-color: rgba(231, 164, 71, 0.916); 
            padding: 40px; 
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
            width: 450px; 
            margin: 10% auto; 
            z-index: 1; 
        }

        .input-container {
            position: relative; 
        }

        input[type="email"],
        input[type="password"] {
            width: 87%;
            height: 10px;
            padding: 15px 15px 15px 40px; 
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9); 
            color: #333; 
            font-size: 1em; 
            text-align: right; 
            font-family: 'Cairo', sans-serif;
        }

        .input-container i {
            position: absolute;
            left: 15px; 
            top: 50%;
            transform: translateY(50%);
            color: #c67316; 
        }

        label {
            color: #fff; 
            font-weight: bold;
        }
        .remember-me {
            align-items: center; 
            margin: 10px 0; 
            justify-content: flex-end; 
        }

        button {
            background-color: #c67316; 
            color: #fff; 
            padding: 1px; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Cairo', sans-serif;
            width: 100%;
            height: 40px;
            font-size: 1em; 
            margin-top: 5px; 
        }

        button:hover {
            background-color: #a65e12; 
        }
        .register-link {
            text-align: center;
            margin-top: 10px; 
            color: #fff; 
            font-size: 0.9em; 
        }

        .register-link a {
            color: #c67316; 
            text-decoration: none; 
            font-weight: bold; 
        }

        .register-link a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>

    <div class="background">
        <video autoplay muted loop>
            <source src="vid.mp4" type="video/mp4">
        </video>
    </div>
    
    <form method="post" action="login-sec.php">
        <div class="input-container">
            <label for="email">البريد الإلكتروني</label>
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required />
        </div>
        <div class="input-container">
            <label for="password">كلمة المرور</label>
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required />
        </div>

        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember" />
            <label for="remember" style="color: #fff;">تذكرني؟</label>
        </div>

        <button type="submit">تسجيل دخول</button>
        <label class="register-link">ليس لديك حساب؟ <a href="signin.php"> سجل الآن</a> </label> 
    </form>

    
</body>
</html>