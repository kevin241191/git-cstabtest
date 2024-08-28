@extends('template')

{{-- @section('title', 'Tous les configu') --}}

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Configurations</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form>
                    
                </div><!--//col-->
                
                <div class="col-auto">						    
                    <a class="btn app-btn-secondary" href="{{ route('configurations.create')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                       Nouvelle configuration
                    </a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


@if (Session::get('success_message'))
    <div class="alert alert-success">
        {{ session::get('success_message') }}
    </div>
@endif

@if (Session::get('error_message'))
    <div class="alert alert-danger">
        {{ session::get('error_message') }}
    </div>
@endif

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">#</th>
                                <th class="cell">Type</th>
                                <th class="cell">Value</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @forelse ($allconfigurations as $config)
                                <tr>
                                    <td class="cell"> {{ $config->id}} </td>
                                    <td class="cell">
                                        {{-- {{ $config->type}} --}}
                                        @if ($config->type == 'RDV_DATE')
                                            Date de rendez-vous
                                        @endif

                                        @if ($config->type == 'APP_NAME')
                                            Nom de l'application
                                        @endif

                                        @if ($config->type == 'DEVELOPPER_NAME')
                                            Equipe de déeloppement
                                        @endif

                                        @if ($config->type == 'ANOTHER')
                                            Autres Options
                                        @endif

                                    </td>
                                    <td class="cell">
                                        {{ $config->value}}
                                        @if ($config->type == 'RDV_DATE')
                                            de chaque mois
                                        @endif
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary" href="{{ route('configurations.delete', $config)}}">Retiter</a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="cell" colspan="6">Aucune configurations enregistrée</td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
        <nav class="app-pagination">
           {{ $allconfigurations->links()}}
        </nav><!--//app-pagination-->
        
    </div><!--//tab-pane-->

@endsection
