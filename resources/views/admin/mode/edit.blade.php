@extends('template')
@section('title', 'Toutes les modes de règlement')

@section('content')

 
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'un mode de règlement</h4>
                
                <form action="{{ route('mode.update', $mode)}}" method="post" class="needs-validation" novalidate>
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
                                <label class="form-label" for="validationCustom01">Mode de règlement</label>
                                <input type="text" class="form-control" name="lib_mode" id="validationCustom01" 
                                    value="{{ $mode->lib_mode }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        @error('lib_mode')
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
