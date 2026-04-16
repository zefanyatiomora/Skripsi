@extends('layouts.template')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body text-center">

            <h3>Hasil Tes Kemampuan</h3>
            <hr>

            <p>Total Skor: <b>{{ $total }}</b></p>
            <p>Jumlah Soal: <b>{{ $jumlah }}</b></p>
            <p>Persentase: <b>{{ number_format($persen,2) }}%</b></p>

            <h4 class="mt-3">
                Hasil:
                <span class="badge badge-primary">
                    {{ $hasil }}
                </span>
            </h4>

            <a href="/" class="btn btn-secondary mt-3">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection