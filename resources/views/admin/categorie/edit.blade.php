@extends('template')
@section('title', 'Toutes les catégories')
@section('content')


<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'une catégorie</h4>
                
                <form action="{{ route('categorie.update', $categorie)}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
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
                                <input type="text" class="form-control" name="nomcat" id="validationCustom01" 
                                    value="{{ $categorie->nomcat }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        @error('nomcat')
                            <div class="error_msg">{{$message}} </div>
                        @enderror
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
