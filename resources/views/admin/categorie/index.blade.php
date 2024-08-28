@extends('template')

@section('title', 'Toutes les catégories')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Catégorie</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    {{-- <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form>  --}}
                    {{-- <form action="" method="get" class="container d-flex gap-2">
                        <input name="nomcat" id="nomcat" placeholder="Mot clé" value="{{ $input['nomcat'] ?? '' }}">
                        <button class="btn btn-primary btn-sm flex-grow-0">
                            Rechercher
                        </button>
                    </form>                    --}}
                </div><!--//col-->
                
                
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div>
<div class="row py-2">
    <div class="col-lg-6">
        <h2>
            <a href="{{ route('categorie.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
        </h2>
    </div>    

    <div class="col-lg-6">
        <div class="form-group">
            <form action="{{ route('categorie.index') }}" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Rechercher.........." value="{{ isset($search) ?  $search : ''}}">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    @if (Session::get('success_message'))
    <b style="font-size:10px; color:rgb(29, 255, 199)">{{ Session::get('success_message') }}</b>
    @endif

    @if (Session::get('error_msg'))
        <b style="font-size:10px; color:rgb(185, 81, 81)">{{ Session::get('error_msg') }}</b>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table catégorie</h4>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom catégorie</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $categorie)
                                <tr>
                                    <th scope="row">{{ $categorie->id }}</th>
                                    <td>{{ $categorie->nomcat }}</td>
                                    <td>
                                        <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-primary">Modifier</a>
                                        <a href="{{ route('categorie.destroy', $categorie->id) }}" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Aucune donnée</td>
                                </tr>
                            @endforelse                                                       
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>    
</div>



@endsection
