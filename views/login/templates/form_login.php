<?php
require_once dirname(__DIR__, 3) . '/config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/views/login/css/login.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/views/login/css/custom.css">
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
    Bienvenidos al<span><?=APP_NAME;?></span>
  </div>
  <?php
    if (isset($_SESSION['login_error'])) {
      echo '<div style="color:red;text-align:center;margin:10px 0;">'.$_SESSION['login_error'].'</div>';
      unset($_SESSION['login_error']);
    }
  ?>
  <div class="login-form-container mt-5" style="display:flex;align-items:center;justify-content:center;position:relative;z-index:10;">
    <div class="login-form-glass" style="background:rgba(255,255,255,0.85);backdrop-filter:blur(8px);box-shadow:0 8px 32px 0 rgba(31,38,135,0.18);border-radius:24px;padding:40px 32px 32px 32px;max-width:370px;width:100%;">
      <div style="text-align:center;margin-bottom:18px;">
        <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" width="70" alt="Login icon">
        <h3 style="color:#2575fc;font-weight:700;letter-spacing:1px;margin:18px 0 8px 0;">Iniciar Sesión</h3>
        <p style="color:#444;font-size:1.05rem;margin-bottom:0;">Accede a tu cuenta</p>
      </div>
      <div id="login-error"></div>
      <form id="loginForm" method="POST" action="<?=APP_URL?>/login/auth" autocomplete="on">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required autocomplete="email" style="border-radius:18px 0 0 18px;">
          <div class="input-group-append">
            <div class="input-group-text" style="border-radius:0 18px 18px 0;background:#e3e6f0;">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required autocomplete="current-password" style="border-radius:18px 0 0 18px;">
          <div class="input-group-append">
            <div class="input-group-text" id="toggle-password" tabindex="0" style="border-radius:0 18px 18px 0;background:#e3e6f0;cursor:pointer;">
              <span class="fas fa-eye" id="eye-icon"></span>
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit" style="border-radius:22px;font-weight:600;font-size:1.1rem;background:linear-gradient(90deg,#6a11cb 0%,#2575fc 100%);border:none;box-shadow:0 2px 8px rgba(31,38,135,0.10);margin-top:10px;">Entrar</button>
      </form>
    </div>
  </div>
</body>
</html>

