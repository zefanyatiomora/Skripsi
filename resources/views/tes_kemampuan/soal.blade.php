@extends('layouts.template')

@section('content')
<div class="container mt-4">

    <h4 class="mb-3">Tes Kemampuan - {{ $cluster->nama_cluster }}</h4>

    <form action="{{ route('tes.kemampuan.submit') }}" method="POST">
        @csrf

        @foreach($kompetensi as $k)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <p>
                    <b>{{ $k->kode_kompetensi }}</b> - {{ $k->kompetensi }}
                </p>

                <div class="d-flex">

                    <!-- YA -->
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="radio"
                               name="jawaban[{{ $k->id_kompetensi }}]"
                               value="1" required>
                        <label class="form-check-label text-success">
                            Ya
                        </label>
                    </div>

                    <!-- TIDAK -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="jawaban[{{ $k->id_kompetensi }}]"
                               value="0" required>
                        <label class="form-check-label text-danger">
                            Tidak
                        </label>
                    </div>

                </div>

            </div>
        </div>
        @endforeach

        <button class="btn btn-primary">
            Submit Jawaban
        </button>

    </form>

</div>
@endsection