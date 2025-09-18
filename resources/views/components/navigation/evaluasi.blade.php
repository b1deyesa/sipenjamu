<nav class="evaluasi__navigation">
    <a class="navigation__item {{ request()->routeIs('dashboard.spmi.evaluasi.evaluasi-lain') ? 'active' : '' }}" href="{{ route('dashboard.spmi.evaluasi.evaluasi-lain', compact('upps')) }}">Evaluasi Lain</a>
    <a class="navigation__item {{ request()->routeIs('dashboard.spmi.evaluasi.mahasiswa') ? 'active' : '' }}" href="{{ route('dashboard.spmi.evaluasi.mahasiswa', compact('upps')) }}">Mahasiswa</a>
    <a class="navigation__item {{ request()->routeIs('dashboard.spmi.evaluasi.dosen') ? 'active' : '' }}" href="{{ route('dashboard.spmi.evaluasi.dosen', compact('upps')) }}">Dosen</a>
</nav>