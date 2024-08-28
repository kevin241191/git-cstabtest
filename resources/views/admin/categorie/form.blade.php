@extends('template')
@section('title', 'Toutes les catégories')
@section('content')


<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Création d'une catégorie</h4>
                
                <form action="{{ route('categorie. ')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('POST')
                    @if (Session::get('success_message'))
                    <b style="font-size:10px; color:rgb(29, 255, 199)">{{ Session::get('success_message') }}</b>
                    @endif
            
                    @if (Session::get('error_msg'))
                        <b style="font-size:10px; color:rgb(185, 81, 81)">{{ Session::get('error_msg') }}</b>
                    @endif

                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Libellé catégorie</label>
                                <input type="text" class="form-control" name="nomcat" id="validationCustom01" placeholder="nom catégorie"
                                    value="{{ old('nomcat') }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        @error('nomcat')
                            <div class="error_msg">{{$message}} </div>
                        @enderror
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
   
    {{-- @if (Session::get('success_message'))
    <b style="font-size:10px; color:rgb(29, 255, 199)">{{ Session::get('success_message') }}</b>
    @endif

    @if (Session::get('error_msg'))
        <b style="font-size:10px; color:rgb(185, 81, 81)">{{ Session::get('error_msg') }}</b>
    @endif
    <div class="col-lg-6">
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
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->nomcat }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
                                        <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach                                                       
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> --}}
</div>
@endsection
