@extends('layouts.template')
@section('content')

<style>
    body {
        background: #f4f7fb;
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-wrapper {
        padding: 10px 5px 30px;
    }

    /* HERO */
    .hero-card {
        background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
        border-radius: 24px;
        padding: 32px 36px;
        color: white;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
        margin-bottom: 30px;
    }

    .hero-title {
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .hero-text {
        color: rgba(255,255,255,.8);
        font-size: 16px;
        line-height: 1.8;
        max-width: 700px;
    }

    /* CARD STAT */
    .stat-card {
        background: white;
        border-radius: 22px;
        padding: 26px;
        border: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 18px;
        transition: .25s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(0,0,0,.05);
    }

    .stat-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        flex-shrink: 0;
    }

    .bg-blue {
        background: #2563eb;
    }

    .bg-green {
        background: #059669;
    }

    .bg-orange {
        background: #ea580c;
    }

    .bg-dark {
        background: #111827;
    }

    .stat-label {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .stat-value {
        font-size: 30px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1;
    }

    /* SECTION */
    .section-card {
        background: white;
        border-radius: 24px;
        border: 1px solid #e5e7eb;
        padding: 30px;
        height: 100%;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #111827;
    }

    /* TABLE */
    .custom-table {
        width: 100%;
    }

    .custom-table th {
        font-size: 14px;
        color: #64748b;
        padding-bottom: 14px;
    }

    .custom-table td {
        padding: 16px 0;
        border-top: 1px solid #f1f5f9;
        font-size: 15px;
        color: #0f172a;
    }

    /* LIST */
    .career-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 18px;
        background: #f8fafc;
        border-radius: 18px;
        margin-bottom: 14px;
        transition: .25s;
    }

    .career-item:hover {
        background: #eef2ff;
        transform: translateX(4px);
    }

    .career-name {
        font-weight: 600;
        color: #111827;
    }

    .career-total {
        font-weight: 700;
        color: #2563eb;
    }

    @media(max-width:992px){
        .hero-title {
            font-size: 28px;
        }

        .section-card {
            margin-bottom: 20px;
        }
    }
</style>

<div class="container-fluid dashboard-wrapper">

    <!-- HERO -->
    <div class="hero-card">

        <div class="hero-title">
            Dashboard Admin 📊
        </div>

        <div class="hero-text">
            Kelola seluruh data mahasiswa, hasil tes, dan rekomendasi karier
            melalui dashboard admin secara real-time.
        </div>

    </div>

    <!-- STATISTIC -->
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="stat-card">

                <div class="stat-icon bg-blue">
                    <i class="fas fa-users"></i>
                </div>

                <div>
                    <div class="stat-label">Total User</div>
                    <div class="stat-value">{{ $totalMahasiswa }}</div>
                </div>

            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">

                <div class="stat-icon bg-green">
                    <i class="fas fa-file-alt"></i>
                </div>

                <div>
                    <div class="stat-label">Total Tes</div>
                    <div class="stat-value">{{ $totalTes }}</div>
                </div>

            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">

                <div class="stat-icon bg-orange">
                    <i class="fas fa-briefcase"></i>
                </div>

                <div>
                    <div class="stat-label">Total Karier</div>
                    <div class="stat-value">{{ $totalKarir }}</div>
                </div>

            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">

                <div class="stat-icon bg-dark">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <div class="stat-label">Tes Hari Ini</div>
                    <div class="stat-value">{{ $tesHariIni }}</div>
                </div>

            </div>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="row">

        <!-- LEFT -->
        <div class="col-lg-7 mb-4">

            <div class="section-card">

                <div class="section-title">
                    Riwayat Tes Terbaru
                </div>

                <div class="table-responsive">

                    <table class="custom-table">

                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Tanggal Tes</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($recentTes as $tes)

                                <tr>
                                    <td>{{ $tes->pengguna->nama_pengguna ?? '-' }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($tes->tanggal_tes)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        <span class="badge badge-success px-3 py-2">
                                            Selesai
                                        </span>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        Belum ada data tes.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-5 mb-4">

            <div class="section-card">

                <div class="section-title">
                    Karier Paling Direkomendasikan
                </div>

                @forelse($topKarir as $index => $item)

                    <div class="career-item">

                        <div class="career-name">
                            {{ $index + 1 }}. {{ $item->okupasi->nama_okupasi ?? '-' }}
                        </div>

                        <div class="career-total">
                            {{ $item->total }}x
                        </div>

                    </div>

                @empty

                    <div class="text-muted text-center py-5">
                        Belum ada data rekomendasi karier.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection
