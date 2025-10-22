<x-layout.spmi class="home">
    
    {{-- Home Profile --}}
    <div class="home__profile">
        <img class="profile__background" src="{{ asset('assets/img/gedung-unpatti.jpg') }}">
        <div class="profile__container" style="background: {{ $upps->color }}">
            <div class="profile__left">
                <div class="profile__avatar">
                    <img src="{{ asset('assets/img/logo-unpatti.png') }}">
                </div>
                <div class="profile__list">
                    <div class="list__item">
                        <h5 class="item__label">Kode PT</h5>
                        <span>:</span>
                        <div class="item__value">{{ $profil_upps->where('profil_id', 1)->first()?->value }}</div>
                    </div>
                    <div class="list__item">
                        <h5 class="item__label">Nomor SK UPPS</h5>
                        <span>:</span>
                        <div class="item__value">{{ $profil_upps->where('profil_id', 2)->first()?->value }}</div>
                    </div>
                    <div class="list__item">
                        <h5 class="item__label">Tanggal Berdiri</h5>
                        <span>:</span>
                        <div class="item__value">{{ $profil_upps->where('profil_id', 3)->first()?->value ? \Carbon\Carbon::parse($profil_upps->where('profil_id', 3)->first()?->value)->format('d M Y') : null }}</div>
                    </div>
                    <div class="list__item">
                        <h5 class="item__label">Jumlah Dosen</h5>
                        <span>:</span>
                        <div class="item__value">{{ $profil_upps->where('profil_id', 4)->first()?->value }}</div>
                    </div>
                    <div class="list__item">
                        <h5 class="item__label">Jumlah Tenaga Kependidikan</h5>
                        <span>:</span>
                        <div class="item__value">{{ $profil_upps->where('profil_id', 5)->first()?->value }}</div>
                    </div>
                </div>
            </div>
            <div class="profile__right">
                <div class="right__top">
                    <h4 class="profile__title">Contact Info</h4>
                    <div class="profile__list">
                        <div class="list__item">
                            <h5 class="item__label">Kode Pos</h5>
                            <span>:</span>
                            <div class="item__value">{{ $profil_upps->where('profil_id', 6)->first()?->value }}</div>
                        </div>
                        <div class="list__item">
                            <h5 class="item__label">Telepon</h5>
                            <span>:</span>
                            <div class="item__value">{{ $profil_upps->where('profil_id', 7)->first()?->value }}</div>
                        </div>
                        <div class="list__item">
                            <h5 class="item__label">Website</h5>
                            <span>:</span>
                            <div class="item__value">{{ $profil_upps->where('profil_id', 8)->first()?->value }}</div>
                        </div>
                        <div class="list__item">
                            <h5 class="item__label">Email</h5>
                            <span>:</span>
                            <div class="item__value">{{ $profil_upps->where('profil_id', 9)->first()?->value }}</div>
                        </div>
                    </div>
                </div>
                <div class="right__bottom">
                    <h4 class="profile__title">Accreditation Statistics Obtained</h4>
                    <div class="profile__list">
                        <div class="list__item">
                            <h5 class="item__label">Akreditasi</h5>
                            <span>:</span>
                            <div class="item__value"></div>
                        </div>
                        <div class="list__item">
                            <h5 class="item__label">No. SK</h5>
                            <span>:</span>
                            <div class="item__value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Home Module --}}
    <div class="home__module">
        <h3 class="module__title">All Modules</h3>
        <div class="module__list">
            <button class="list__arrow prev"><i class="fa-solid fa-angle-left"></i></button>
            <div class="list__content">
                <a class="list__item" href="{{ route('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', compact('upps', 'periode')) }}">
                    <div class="item__icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="item__right">
                        <small class="item__progress">{{ $penetapan->where('verification_status', 'accepted')->count() }}/{{ $penetapan->count() }} Complete</small>
                        <h4 class="item__title">Penetapan</h4>
                    </div>
                </a>
                <a class="list__item" href="{{ route('dashboard.spmi.pelaksanaan', compact('upps', 'periode')) }}">
                    <div class="item__icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="item__right">
                        <small class="item__progress">{{ $pelaksanaan->where('verification_status', 'accepted')->count() }}/{{ $pelaksanaan->count() }} Complete</small>
                        <h4 class="item__title">Pelaksanaan</h4>
                    </div>
                </a>
                <a class="list__item" href="{{ route('dashboard.spmi.evaluasi.evaluasi-lain', compact('upps', 'periode')) }}">
                    <div class="item__icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="item__right">
                        <small class="item__progress">{{ $evaluasis->where('verification_status', 'accepted')->count() }}/{{ $evaluasis->count() }} Complete</small>
                        <h4 class="item__title">Evaluasi</h4>
                    </div>
                </a>
                <a class="list__item" href="{{ route('dashboard.spmi.pengendalian', compact('upps', 'periode')) }}">
                    <div class="item__icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="item__right">
                        <small class="item__progress">{{ $pengendalian->where('verification_status', 'accepted')->count() }}/{{ $pengendalian->count() }} Complete</small>
                        <h4 class="item__title">Pengendalian</h4>
                    </div>
                </a>
                <a class="list__item" href="{{ route('dashboard.spmi.peningkatan', compact('upps', 'periode')) }}">
                    <div class="item__icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="item__right">
                        <small class="item__progress">{{ $peningkatan->where('verification_status', 'accepted')->count() }}/{{ $peningkatan->count() }} Complete</small>
                        <h4 class="item__title">Peningkatan</h4>
                    </div>
                </a>
            </div>
            <button class="list__arrow next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    
    {{-- Home Information --}}
    <div class="home__info">
        <h3 class="info__title">Informations</h3>
    </div>
    
    {{-- Home Statistics --}}
    <div class="home__statistics">
        <div class="statistics__number">
            <div class="statistics__left">
                <div class="statistics__item">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h3 class="item__count">259</h3>
                    <h3 class="item__title">Jumlah Mahasiswa</h3>
                </div>
            </div>
            <div class="statistics__right">
                <div class="statistics__list">
                    <div class="list__item">
                        <h3 class="item__count">259</h3>
                        <h3 class="item__title">Sarjana</h3>
                    </div>
                    <div class="list__item">
                        <h3 class="item__count">259</h3>
                        <h3 class="item__title">Diploma</h3>
                    </div>
                    <div class="list__item">
                        <h3 class="item__count">259</h3>
                        <h3 class="item__title">Magister</h3>
                    </div>
                    <div class="list__item">
                        <h3 class="item__count">259</h3>
                        <h3 class="item__title">Doktor</h3>
                    </div>
                    <div class="list__item">
                        <h3 class="item__count">259</h3>
                        <h3 class="item__title">Sarjana Terapan</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="statistics__chart">
            @php
                $labels = ['Ant', 'Dog', 'Cat', 'Sheep', 'Elephant', 'Graffe'];
                $datas = [12, 19, 3, 5, 2, 3];
                $backgrounds = [
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 75)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ];
            @endphp
            <x-chart id="chartVote" type="bar" :labels="$labels" :datas="$datas" :backgrounds="$backgrounds" height="200px" />
        </div>
    </div>
    
    {{-- Home Program Studi --}}
    <div class="home__program-studi">
        <div class="program-studi__header">
            <h2 class="header__title">Daftar Program Studi</h2>
            <p class="header__description">Data mahasiswa berdasarkan pelaporan aktifitas mahasiswa. Jika tidak sesuai, Perguruan tinggi diwajibkan memperbaiki pelaporannya melalui aplikasi PDDikti Feeder</p>
        </div>
        <x-table>
            <x-slot:head>
                <th>No</th>
                <th>Kode Prodi</th>
                <th>Nama Program Studi</th>
                <th>Status</th>
                <th>Jenjang	Akreditasi</th>
                <th>Tanggal SK Akreditasi</th>
                <th>Rasio Dosen/Mahasiswa</th>
            </x-slot:head>
            <x-slot:body>
                @foreach ($upps->programStudis as $program_studi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td></td>
                        <td>{{ $program_studi->name }}</td>
                        <td></td>
                        <td></td>
                        <td>12 Agustus 2025</td>
                        <td>1:20</td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table>
    </div>
    
</x-layout.spmi>
