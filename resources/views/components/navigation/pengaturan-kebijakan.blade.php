<nav class="evaluasi__navigation">
    <a class="navigation__item {{ request()->routeIs('dashboard.spmi.penetapan.kebijakan-spmi') ? 'active' : '' }}" href="{{ route('dashboard.spmi.penetapan.kebijakan-spmi', compact('upps', 'periode')) }}">Kebijakan SPMI</a>
    <a class="navigation__item {{ request()->routeIs('dashboard.spmi.penetapan.standar-perguruan-tinggi') ? 'active' : '' }}" href="{{ route('dashboard.spmi.penetapan.standar-perguruan-tinggi', compact('upps', 'periode')) }}">Standar Perguruan Tinggi</a>
</nav>