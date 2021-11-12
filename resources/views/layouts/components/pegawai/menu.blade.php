<!--App Sidebar-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user clearfix">
        <div class="user-pro-body">
            <div class="sideuser-img">
                <img src="{{ asset('storage/'.$pegawai->foto) }}" alt="user-img" class="">
                <span class="sidebar-icon"></span>
            </div>
            <div class="user-info">
                <h2 class="app-sidebar__user-name">{{ $pegawai->nama }}</h2>
                <span class="app-sidebar__title">{{ $pegawai->jabatan->nama }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <h3>Main</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('home') }}"><i class="side-menu__icon" data-eva="monitor-outline"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        <li>
            <h3>Kenaikan</h3>
        </li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon" data-eva="cube-outline"></i><span class="side-menu__label">Kenaikan Berkala</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon" data-eva="email-outline"></i><span class="side-menu__label">Kenaikan Pangkat</span></a>
        </li>
        <li>
            <h3>Surat</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('pegawai.surat_masuk.index') }}"><i class="side-menu__icon" data-eva="email-outline"></i><span class="side-menu__label">Surat Masuk</span></a>
        </li>
        <li>
            <h3>Document</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('pegawai.file.index') }}"><i class="side-menu__icon" data-eva="cube-outline"></i><span class="side-menu__label">Document Control</span></a>
        </li>
    </ul>
</aside>
<!--/App Sidebar-->