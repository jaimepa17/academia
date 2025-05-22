<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">

  <style>
    body.login-page {
      min-height: 100vh;
      background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      font-family: 'Montserrat', sans-serif;
    }
    .login-bg-art {
      position: absolute;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle at 60% 40%, #fff 0%, #6a11cb 100%);
      opacity: 0.12;
      border-radius: 50%;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%) scale(1.2);
      filter: blur(10px);
      z-index: 0;
      animation: float 8s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translate(-50%, -50%) scale(1.2); }
      50% { transform: translate(-50%, -52%) scale(1.28); }
    }
    .login-title {
      position: relative;
      z-index: 2;
      color: #fff;
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      letter-spacing: 2px;
      margin-top: 30px;
      text-shadow: 0 4px 24px rgba(0,0,0,0.18);
      padding: 30px 40px 20px 40px;
      border-radius: 24px;
      background: rgba(255,255,255,0.08);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
      backdrop-filter: blur(4px);
      border: 1px solid rgba(255,255,255,0.18);
      display: inline-block;
    }
    .login-title i {
      font-size: 2.2rem;
      margin-bottom: 10px;
      color: #fff;
      filter: drop-shadow(0 2px 8px #6a11cb);
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-bg-art"></div>
  <div class="login-title">
    <i class="fas fa-user-lock"></i><br>
    Bienvenido a <span><?=APP_NAME;?></span>
  </div>
    <?php
      if (isset($_SESSION['login_error'])) {
        echo '<div style="color:red;text-align:center;margin:10px 0;">'.$_SESSION['login_error'].'</div>';
        unset($_SESSION['login_error']);
      }
      require_once __DIR__ . '/templates/form_login.php';
    ?>
</body>
</html>
