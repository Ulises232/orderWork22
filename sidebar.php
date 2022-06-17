  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="dropdown">
          <a href="./" class="brand-link">
              <?php if ($_SESSION['login_type'] == 1) : ?>
                  <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
              <?php else : ?>
                  <h3 class="text-center p-0 m-0"><b>USER</b></h3>
              <?php endif; ?>

          </a>

      </div>
      <div class="sidebar pb-4 mb-4">
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item dropdown">
                      <a href="<?php echo SERVERURL ?>" class="nav-link nav-home">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <!-- CATALOGO -->
                  <li class="nav-item">
                      <a href="#" class="nav-link nav-clients_new nav-clients_list nav-client_edit nav-material_new nav-material_list nav-material_edit">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Catalogs
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <!-- CLIENTES -->

                          <li class="nav-item margin-menu">
                              <a href="#" class="nav-link nav-clients_new nav-clients_list nav-client_edit">
                                  <i class="nav-icon fas fa-user-alt"></i>
                                  <p>
                                      Clients
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="<?php echo SERVERURL ?>clients/clients_new/" class="nav-link nav-clients_new tree-item">
                                          <i class="fas fa-angle-right nav-icon"></i>
                                          <p>Add New</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?php echo SERVERURL ?>clients/clients_list/" class="nav-link nav-clients_list tree-item">
                                          <i class="fas fa-angle-right nav-icon"></i>
                                          <p>List</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <!-- FIN CLIENTES -->

                           <!-- MATERIALES -->

                           <li class="nav-item margin-menu">
                              <a href="#" class="nav-link nav-material_new nav-material_list nav-material_edit">
                                  <i class="nav-icon fas fa-user-alt"></i>
                                  <p>
                                      Materials
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="<?php echo SERVERURL ?>materials/materials_new" class="nav-link nav-material_new tree-item">
                                          <i class="fas fa-angle-right nav-icon"></i>
                                          <p>Add New</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?php echo SERVERURL ?>materials/materials_list" class="nav-link nav-material_list tree-item">
                                          <i class="fas fa-angle-right nav-icon"></i>
                                          <p>List</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <!-- FIN MATERIALES -->
                      </ul>
                  </li>
                  <!-- FIN CATALOGO -->
                  <?php if ($_SESSION['login_type'] == 1) : ?>
                      <li class="nav-item">
                          <a href="#" class="nav-link nav-edit_user">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  Users
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?php echo SERVERURL ?>user/user_new/" class="nav-link nav-new_user tree-item">
                                      <i class="fas fa-angle-right nav-icon"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?php echo SERVERURL ?>user/user_list/" class="nav-link nav-user_list tree-item">
                                      <i class="fas fa-angle-right nav-icon"></i>
                                      <p>List</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  <?php endif; ?>

              </ul>
          </nav>
      </div>
  </aside>
  <script>
      $(document).ready(function() {
          var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
          var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
          if (s != '')
              page = page + '_' + s;
          if ($('.nav-link.nav-' + page).length > 0) {
              $('.nav-link.nav-' + page).addClass('active')
              if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                  $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                  $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
              }
              if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                  $('.nav-link.nav-' + page).parent().addClass('menu-open')
              }

          }

      })
  </script>