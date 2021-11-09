    <!-- start: header -->
    <header class="header">
      <div class="logo-container">
        <a href="https://unusa.ac.id/" class="logo" target="_blank">
          <img src="<?= base_url(); ?>/assets/images/unusa.png" height="35" alt="Logo" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
          data-fire-event="sidebar-left-opened">
          <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
      </div>

      <!-- start: search & user box -->
      <div class="header-right">

        <input type="submit" class="notifications btn btn-primary" style="padding: 10px 57px;" value="Refresh Page"
          onClick="document.location.reload(true)">

        <span class="separator"></span>

        <div id="userbox" class="userbox fixed-top">
          <a href="#" data-toggle="dropdown">
            <figure class="profile-picture">
              <img src="<?= base_url(); ?>/assets/img/user_img/" alt="Joseph Doe" class="img-circle"
                data-lock-picture="<?= base_url(); ?>/assets/img/user_img/" />
            </figure>


            <i class="fa custom-caret"></i>
          </a>

          <div class="dropdown-menu">
            <ul class="list-unstyled">
              <li class="divider"></li>
              <li>
                <a role="menuitem" tabindex="-1" href="<?= base_url('user/profile'); ?>"><i class="fa fa-user"></i> My
                  Profile</a>
              </li>
              <li>
                <a role="menuitem" tabindex="-1" href="<?= base_url('logout'); ?>"><i class="fa fa-power-off"></i>
                  Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end: search & user box -->
    </header>
    <!-- end: header -->