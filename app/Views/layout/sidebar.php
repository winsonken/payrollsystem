<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light elevation-4 text-light" style="background-color: #28a745; overflow: hidden">
    <!-- Brand Logo -->
    <a href="/" class="brand-link ml-1 text-light">
      <i class="fas fa-money-check brand-image mt-2"></i>
      
      <span class="brand-text text-light font-weight-bold">Payroll</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>img/user-img.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile" class="d-block text-light"><?= session()->get('username') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <?php if (session()->get('level') == 1) : ?>
          <li class="nav-item">
            <a href="/home" class="nav-link text-light text-light">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php endif; ?>

          <?php if (session()->get('level') == 1 || 2) : ?>

          <li class="nav-item">
            <a href="/profile" class="nav-link text-light">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <?php if (session()->get('level') == 2) : ?>
          <li class="nav-item">
            <a href="/payslipkaryawan" class="nav-link text-light">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Payslip
              </p>
            </a>
          </li>
          <?php endif; ?>

          <?php endif; ?>
          
          <?php if (session()->get('level') == 1) : ?>
          <li class="nav-item">
            <a href="/departemen" class="nav-link text-light">
              <i class="nav-icon far fa-building"></i>
              <p>
                Departemen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tingkatan" class="nav-link text-light">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Tingkatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/karyawan" class="nav-link text-light">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Karyawan
              </p>
            </a>
          </li>
          
          
          
          <li class="nav-item">
            <a href="/payroll" class="nav-link text-light">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Payroll
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/payslip" class="nav-link text-light">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Payslip
              </p>
            </a>
          </li>
          <?php endif; ?>
          
          <li class="nav-item">
            <a href="/login/logout" class="nav-link text-light">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>