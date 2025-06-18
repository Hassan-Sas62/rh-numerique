@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tableau de Bord</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Employés</h5>
                    <p class="card-text">{{ $total }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Salaire total</h5>
                    <p class="card-text">{{ number_format($salaireTotal, 0, ',', ' ') }} FCFA</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Salaire moyen</h5>
                    <p class="card-text">{{ number_format($moyenneSalaire, 0, ',', ' ') }} FCFA</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection