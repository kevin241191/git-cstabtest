@extends('template')
@section('title', 'Toutes les clients')

@section('content')
    <h1 class="app-page-title">clients</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Editer</h3>
            <div class="section-intro">Edit un client<a href="#">Learn more</a></div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('client.update', $client) }}">
                        @csrf
                        @method('PUT')

                        @if (Session::get('success_message'))
                            <b style="font-size:10px; color:rgb(29, 255, 199)">{{ Session::get('success_message') }}</b>
                        @endif
                            
                        @if (Session::get('error_msg'))
                            <b style="font-size:10px; color:rgb(185, 81, 81)">{{ Session::get('error_msg') }}</b>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation ou nom complet <small class="text-danger font-13">*</small></label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $client->designation }}" required="">
                                </div>
                                @error('designation')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Raison sociale </label>
                                    <input type="text" class="form-control" id="raisonsociale" name="raisonsociale" value="{{ $client->raisonsociale }}" >
                                </div>
                                @error('raisonsociale')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Adresse <small class="text-danger font-13"></small>
                                    </label> <input type="text" class="form-control" name="adresse" value="{{ $client->adresse }}" required="">
                                </div>
                                @error('adresse')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Téléphone <small class="text-danger font-13"></small>
                                    </label> <input type="text" class="form-control" name="telephone" value="{{ $client->telephone }}" required="">
                                </div>
                                @error('telephone')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address <small class="text-danger font-13">*</small></label>
                                    <input type="email" class="form-control" name="email" value="{{ $client->email }}" required="">
                                </div>
                                @error('email')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numéro IFU</label> 
                                    <input type="text" class="form-control" name="ifu" value="{{ $client->ifu }}" >
                                </div>
                                @error('ifu')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numéro Registe de commerce</label>
                                    <input type="text" class="form-control" name="rccm" value="{{ $client->rccm }}" >
                                </div>
                                @error('rccm')
                                    <div class="error_msg">{{$message}}</div>
                                @enderror
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->  
                        
                        <br>

                        <button type="submit" class="btn btn-primary">Mise à jour</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div>
    <!--//row-->
@endsection
