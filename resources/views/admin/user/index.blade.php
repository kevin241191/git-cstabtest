@extends('template')

@section('title', 'Toutes les admins')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Administrateurs</h1>
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
                <div class="col-auto">

                    <!-- <select class="form-select w-auto" >
                          <option selected value="option-1">All</option>
                          <option value="option-2">This week</option>
                          <option value="option-3">This month</option>
                          <option value="option-4">Last 3 months</option>

                    </select>
                </div> -->
                <div class="col-auto">
                    <a class="btn app-btn-secondary" href="{{ route('adminuser.create')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                       Ajouter utilisateur
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
    <div class="alert alert-success">
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
                                <th class="cell">Nom</th>
                                <th class="cell">Prénom</th>
                                <th class="cell">Téléphone</th>
                                <th class="cell">Email</th>
                                <th class="cell">Role</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="cell">{{ $user->id}}</td>
                                    <td class="cell">{{ $user->fname}}</td>
                                    <td class="cell">{{ $user->lname}}</td>
                                    <td class="cell">{{ $user->phone}}</td>
                                    <td class="cell">{{ $user->email}}</td>
                                    <td class="cell">{{ $user->role}}</td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary" href="{{ route('adminuser.edit' , $user) }}">Editer</a>
                                        <a class="btn-sm app-btn-secondary" href="{{ route('user.delete', $user) }}">Retiter</a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="cell" colspan="6">Aucun utilisateurs ajoutés</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            {{ $users->links()}}
        </nav><!--//app-pagination-->

    </div><!--//tab-pane-->

</div><!--//tab-content-->

@endsection

