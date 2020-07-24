<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Seleksi Akhir</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(1) == 'berita' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('berita/list') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Kelola Berita</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(1) == 'beasiswa' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('beasiswa/list') ?>">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Kelola Beasiswa</span></a>
    </li>
</ul>
