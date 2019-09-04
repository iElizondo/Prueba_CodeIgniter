<!-- Login -->
<!-- En el submit vuelve acargar el contolador iniciar -->
<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="usuario" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="required" autofocus="autofocus">
              <label for="usuario">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required="required">
              <label for="contrasena">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar Contraseña
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>