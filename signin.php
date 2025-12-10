<!DOCTYPE html>
<html>
<head>
    <title>نموذج التسجيل</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- رابط أيقونات Font Awesome -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Cairo', sans-serif; 
            color: #fff;
            text-align: right; 
            overflow: hidden; 
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
            position: relative; 
            z-index: 1; 
        }

        .input-container {
            position: relative; 
            
        }

        label {
            display: block; 
            margin-bottom: 5px; 
            color: #fff; 
            font-weight: bold; 
        }

        input[type="text"],
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

        button {
            background-color: #c67316; 
            color: #fff; 
            padding: 1px; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            height: 40px;
            font-size: 1em; 
            margin-top: 10px; 
            font-family: 'Cairo', sans-serif;
        }

        button:hover {
            background-color: #a65e12; 
        }
    </style>
</head>

<body>
<div class="message">

    </div>
    <div class="background">
        <video autoplay muted loop>
            <source src="vid.mp4" type="video/mp4">
        </video>
    </div>

    <form method="post" action="signin-sec.php">
        <div class="input-container">
            <label for="name">الاسم</label>
            <i class="fas fa-user"></i>
            <input type="text" id="name" name="name" placeholder="أدخل اسمك" required />
        </div>

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

        <button type="submit">سجل</button>
    </form>
    
</body>

</html>