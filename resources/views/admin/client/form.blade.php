@extends('template')
@section('title', 'Toutes les clients')

@section('content')

<h1 class="app-page-title">clients</h1>

<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajout</h3>
        <div class="section-intro">Voir la liste des clients <a href="{{ route('client.index') }}">Learn more</a></div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="checkout-area mb-50">
                                <h4 class="card-title mt-0 mb-3">clients</h4>
                                <form class="mb-0" method="POST" action="{{ route('client.store') }}">
                                    @csrf
                                    @method('POST')
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
                                                <input type="text" class="form-control" id="designation" name="designation" value="{{old('designation')}}" required="">
                                            </div>
                                            @error('designation')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Raison sociale </label>
                                                <input type="text" class="form-control" id="raisonsociale" name="raisonsociale" value="{{old('raisonsociale')}}">
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
                                                </label> <input type="text" class="form-control" name="adresse" value="{{old("adresse")}}" required="">
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
                                                </label> <input type="text" class="form-control" name="telephone" value="{{old("telephone")}}" required="">
                                            </div>
                                            @error('telephone')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address <small class="text-danger font-13">*</small></label>
                                                <input type="email" class="form-control" name="email" value="{{old("email")}}" required="">
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
                                                <input type="text" class="form-control" name="ifu" value="{{old("ifu")}}" >
                                            </div>
                                            @error('ifu')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Numéro Registe de commerce</label>
                                                <input type="text" class="form-control" name="rccm" value="{{old("rccm")}}" >
                                            </div>
                                            @error('rccm')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->                                    
                                    <br>
                                    <button type="submit" class="btn btn-primary" >Enregistrer</button>
                                </form>
                                <!--end form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div>
<!--//row-->





@endsection
