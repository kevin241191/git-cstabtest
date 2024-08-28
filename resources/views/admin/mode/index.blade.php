@extends('template')

@section('title', 'Toutes les modes de règlement')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Mode de règlement</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <!-- <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form> -->
                     
                </div><!--//col-->
                
                
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div>

<div class="row">
    @if (Session::get('success_message'))
    <b style="font-size:10px; color:rgb(29, 255, 199)">{{ Session::get('success_message') }}</b>
    @endif

    @if (Session::get('error_msg'))
        <b style="font-size:10px; color:rgb(185, 81, 81)">{{ Session::get('error_msg') }}</b>
    @endif
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Mode de règlement</h4>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($modes as $mode)
                                <tr>
                                    <th scope="row">{{ $mode->id }}</th>
                                    <td>{{ $mode->lib_mode }}</td>
                                    <td>
                                        <a href="{{ route('mode.edit', $mode->id) }}" class="btn btn-primary">Modifier</a>
                                        <a href="{{ route('mode.destroy', $mode->id) }}" class="btn btn-danger">Supprimer</a>
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un mode</h4>
                <div class="col-auto">						    
                    <a class="btn app-btn-secondary" href="{{ route('mode.create')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Ajouter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
