<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Opciones</div>
          <a class="nav-link" href="index.php">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Principal
          </a>

          <?php if ($usuario_tipo == 1) { ?>
            <div class="sb-sidenav-menu-heading">Control de Usuarios</div>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Control
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="tablas.php">Lista</a>
                    <a class="nav-link" href="registro.php">Registro</a>
                  </nav>
            </div>
          <?php } ?>
          <div class="sb-sidenav-menu-heading">Procesos</div>
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTareas" aria-expanded="false" aria-controls="collapseTareas">
              <div class="sb-nav-link-icon"><i class="bi bi-check2-square"></i></div>
              Tareas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseTareas" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="tareas.php">Lista Tareas</a>
                <a class="nav-link" href="nuevaTarea.php">Nueva Tarea</a>
              </nav>
            </div>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Sesion iniciada como:</div>
        <?php echo $nombre ?>
      </div>
    </nav>
  </div>