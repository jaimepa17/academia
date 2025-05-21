<div class="login-form-container mt-5" style="display:flex;align-items:center;justify-content:center;position:relative;z-index:10;">
  <div class="login-form-glass" style="background:rgba(255,255,255,0.85);backdrop-filter:blur(8px);box-shadow:0 8px 32px 0 rgba(31,38,135,0.18);border-radius:24px;padding:40px 32px 32px 32px;max-width:370px;width:100%;">
    <div style="text-align:center;margin-bottom:18px;">
      <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" width="70" alt="Login icon">
      <h3 style="color:#2575fc;font-weight:700;letter-spacing:1px;margin:18px 0 8px 0;">Iniciar Sesión</h3>
      <p style="color:#444;font-size:1.05rem;margin-bottom:0;">Accede a tu cuenta</p>
    </div>
    <div id="login-error"></div>
    <form id="loginForm" autocomplete="on">
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

