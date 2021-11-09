      <!-- start: sidebar -->
      <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
          <div class="sidebar-title" id="sd-header">
            <!-- <h4 class="text-white fw-bold" id="sidebar-header"> -->
            Navigation
            <!-- </h4> -->
          </div>
          <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
          </div>
        </div>

        <div class="nano">
          <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
              <ul class="nav nav-main">
                <li class="<?= ($title == "Dashboard") ? "nav-active" : '' ?>">
                  <a href="<?= base_url('admin/dashboard'); ?>">
                    <i class=" fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                  </a>
                </li>

                <li
                  class="nav-parent <?= ($title == "Surat Masuk" || $title == "Surat Keluar") ? "nav-expanded nav-active" : ''; ?>">
                  <a>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>Surat</span>
                  </a>
                  <ul class="nav nav-children">
                    <li class="<?= ($title == "Surat Masuk") ? "nav-active" : '' ?>">
                      <a href="<?= base_url('admin/surat_masuk'); ?>">
                        Surat Masuk
                      </a>
                    </li>
                    <li class="<?= ($title == "Surat Keluar") ? "nav-active" : '' ?>">
                      <a href="<?= base_url('admin/surat_keluar'); ?>">
                        Surat Keluar
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="<?= ($title == "Daftar Warga") ? "nav-active" : '' ?>">
                  <a href="<?= base_url('admin/all_user'); ?>">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Data Warga</span>
                  </a>
                </li>
                <li class="<?= ($title == "Pengumuman") ? "nav-active" : '' ?>">
                  <a href="<?= base_url('admin/pengumuman'); ?>">
                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                    <span>Pengumuman</span>
                  </a>
                </li>

                <li>
                  <a href="/user/user_guide" target="_blank">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span>User Guide</span>
                  </a>
                </li>

              </ul>
            </nav>
          </div>

        </div>

      </aside>
      <!-- end: sidebar -->