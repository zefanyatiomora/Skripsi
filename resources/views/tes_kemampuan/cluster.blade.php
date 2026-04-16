@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <div class="mb-3">
        <h4 class="font-weight-bold">
            Area: {{ $area->nama_area_fungsi }}
        </h4>
        <p class="text-muted">Pilih Cluster Skill</p>
    </div>

    <div class="row">
        @foreach($cluster as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">
                            {{ $item->nama_cluster }}
                        </h5>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ url('/tes-kemampuan/cluster/'.$item->id_cluster) }}" 
   class="btn btn-success btn-sm">
    Pilih
</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection