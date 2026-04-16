@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <div class="row">
        @foreach($areaFungsi as $area)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">
                            {{ $area->nama_area_fungsi }}
                        </h5>

                        <p class="card-text text-muted" style="font-size: 13px;">
                            {{ $area->deskripsi }}
                        </p>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('tes.kemampuan.cluster', $area->id_area_fungsi) }}" 
   class="btn btn-primary btn-sm">
    Pilih
</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection