@extends('layouts.template')

@section('content')
    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== CONTAINER ===== */
        .container-screening {
            max-width: 760px;
            margin: auto;
        }

        /* ===== PROGRESS ===== */
        .top-progress-wrapper {
            margin-bottom: 18px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .progress-step {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .8px;
            color: #64748b;
            text-transform: uppercase;
        }

        .custom-progress {
            height: 6px;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .custom-bar {
            background: linear-gradient(90deg, #020817, #0f172a, #1e293b);
        }

        /* ===== TITLE ===== */
        .title-main {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 10px;
            margin-bottom: 18px;
        }

        .subtitle {
            font-size: 13px;
            color: #64748b;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        /* ===== CARD ===== */
        .main-card {
            background: #fff;
            border-radius: 18px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        /* ===== ALERT ===== */
        .alert-info-screening {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 16px;
        }

        .focus-warning {
            background: #fff7ed;
            border: 1px solid #fdba74;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 16px;
        }

        .focus-warning-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .focus-warning-text {
            font-size: 13px;
            line-height: 1.6;
        }

        /* ===== OPTION ===== */
        .option-item {
            margin-bottom: 10px;
        }

        .option-item input {
            display: none;
        }

        .option-label {
            display: block;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            padding: 14px 16px;
            cursor: pointer;
            transition: .2s;
            background: white;
        }

        .option-label:hover {
            border-color: #2563eb;
        }

        .option-item input:checked+.option-label {
            border-color: #2563eb;
            background: #eff6ff;
            box-shadow: 0 3px 10px rgba(37, 99, 235, .06);
        }

        .option-title {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .option-desc {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            line-height: 1.7;
        }

        .cluster-description {
            font-size: 13px;
            color: #334155;
            line-height: 1.8;
        }

        /* ===== FOCUS HINT ===== */
        .focus-hint {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px dashed #dbeafe;
            font-size: 11px;
            color: #2563eb;
            font-weight: 600;
        }

        /* ===== BUTTON ===== */
        .btn-next {
            background: #020817;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            font-size: 13px;
            margin-top: 18px;
            transition: .25s;
        }

        .btn-next:hover {
            background: #111827;
        }

        /* ===== POPUP ===== */
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-box {
            background: white;
            width: 90%;
            max-width: 360px;
            border-radius: 20px;
            padding: 24px;
            text-align: center;
        }

        .popup-icon {
            width: 65px;
            height: 65px;
            margin: auto auto 14px;
            border-radius: 50%;
            background: #fee2e2;
            color: #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .popup-box h3 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .popup-box p {
            font-size: 13px;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .popup-btn {
            border: none;
            background: #020817;
            color: white;
            padding: 10px 22px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .popup-btn:hover {
            background: #111827;
        }

        /* ===== UTILITY ===== */
        .hidden {
            display: none;
        }

        @media(max-width:768px) {

            .container-screening {
                max-width: 100%;
            }

            .title-main {
                font-size: 20px;
            }

            .main-card {
                padding: 16px;
            }

            .section-title {
                font-size: 15px;
            }

            .option-label {
                padding: 12px;
            }

            .cluster-description {
                font-size: 12px;
            }
        }
    </style>

    <!-- PROGRESS -->
    <div class="top-progress-wrapper">

        <div class="progress-info">
            <div class="progress-step">
                LANGKAH 1 DARI 3
            </div>
        </div>

        <div class="progress custom-progress">
            <div class="progress-bar custom-bar" style="width:33%"></div>
        </div>

    </div>

    <div class="container-screening">

        <div class="title-main">
            Screening Minat dan Kompetensi
        </div>

        <!-- STEP 1 -->
        <div class="main-card" id="step1">
            <div class="section-title">
                Aktivitas apa yang paling sering Anda lakukan, kuasai, atau sukai?
            </div>

            <div class="alert-info-screening">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Petunjuk:</strong>
                Anda dapat memilih lebih dari satu pilihan (multiple choice).
                Pilih aktivitas yang paling menggambarkan pengalaman, kegiatan,
                atau bidang yang paling Anda minati.
            </div>
            @foreach ($domains as $d)
                <div class="option-item">

                    <input type="checkbox" id="domain{{ $d->id_domain }}" class="domain-checkbox"
                        value="{{ $d->id_domain }}">

                    <label for="domain{{ $d->id_domain }}" class="option-label">

                        <div class="option-title">
                            {{ $d->nama_domain }}
                        </div>

                    </label>

                </div>
            @endforeach

            <button type="button" class="btn-next" onclick="loadClusters()">

                Lanjut Pilih Cluster →

            </button>

        </div>

        <!-- STEP 2 -->
        <div class="main-card hidden" id="step2">

            <div class="section-title">
                Fokus atau Bidang yang Paling Sesuai dengan Anda
            </div>

            <!-- PETUNJUK -->
            <div class="alert-info-screening">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Petunjuk:</strong>
                Pilih fokus atau bidang yang paling menggambarkan pengalaman,
                aktivitas, proyek, organisasi, pekerjaan, maupun minat yang Anda miliki.
                Anda tetap dapat memilih lebih dari satu fokus jika diperlukan, namun
                memilih satu fokus utama akan membantu sistem memberikan rekomendasi
                yang lebih spesifik.
            </div>

            <form method="POST" action="{{ route('screening.soal') }}" id="clusterForm">
                @csrf

                <div id="clusterContainer"></div>

                <button type="submit" class="btn-next">
                    Mulai Tes Screening →
                </button>

            </form>

        </div>

    </div>

    </div>

    <script>
        function loadClusters() {

            let selected = [];

            document.querySelectorAll('.domain-checkbox:checked').forEach(el => {
                selected.push(el.value);
            });

            if (selected.length === 0) {

                showPopup(
                    'Silakan pilih minimal <b>1 domain</b>'
                );

                return;
            }

            fetch("{{ url('/screening/get-cluster') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id_domain: selected
                    })
                })
                .then(res => res.json())
                .then(data => {

                    let html = '';

                    data.forEach(c => {

                        if (!c.deskripsi) return;

                        html += `
    <div class="option-item">

        <input type="checkbox"
            id="cluster${c.id_cluster_skill}"
            name="cluster_skill[]"
            value="${c.id_cluster_skill}">

        <label for="cluster${c.id_cluster_skill}"
            class="option-label">

            <div class="option-desc cluster-description">
                ${c.deskripsi}
            </div>

        </label>

    </div>
    `;
                    });


                    document.getElementById('clusterContainer').innerHTML = html;

                    document.getElementById('step1').classList.add('hidden');
                    document.getElementById('step2').classList.remove('hidden');

                    document.querySelector('.progress-bar').style.width = '66%';

                    document.querySelector('.progress-step').innerHTML =
                        'LANGKAH 2 DARI 3';

                })
                .catch(err => {

                    console.error(err);
                    alert('Gagal mengambil data cluster');

                });

        } // <-- PENUTUP function loadClusters()

        function showPopup(message) {

            document.getElementById('popupMessage').innerHTML = message;
            document.getElementById('customPopup').style.display = 'flex';
        }

        function closePopup() {

            document.getElementById('customPopup').style.display = 'none';
        }

        document.getElementById('clusterForm')
            .addEventListener('submit', function(e) {

                let totalCluster =
                    document.querySelectorAll(
                        'input[name="cluster_skill[]"]:checked'
                    ).length;

                if (totalCluster === 0) {

                    e.preventDefault();

                    showPopup(
                        'Silakan pilih minimal <b>1 fokus/bidang</b> yang paling sesuai dengan diri Anda.'
                    );
                }
            });
    </script>
    <!-- POPUP -->
    <div id="customPopup" class="popup-overlay">

        <div class="popup-box">

            <div class="popup-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>

            <h3>Peringatan</h3>

            <p id="popupMessage"></p>

            <button type="button" onclick="closePopup()" class="popup-btn">

                Oke

            </button>

        </div>

    </div>
@endsection
