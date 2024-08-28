@extends('template')
@section('title', 'Toutes les admins')

@section('content')

<h1 class="app-page-title">Administrateurs</h1>

<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajout</h3>
        <div class="section-intro">Voir la liste des administrateurs <a href="{{ route('adminuser.index') }}">Learn more</a></div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="checkout-area mb-50">
                                <h4 class="card-title mt-0 mb-3">Administrateurs</h4>
                                <form class="mb-0" method="POST" action="{{ route('adminuser.store') }}">
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
                                                <label>Nom <small class="text-danger font-13">*</small></label>
                                                <input type="text" class="form-control" id="firstname" name="fname" value="{{old('fname')}}" required="">
                                            </div>
                                            @error('fname')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prenom <small class="text-danger font-13">*</small></label>
                                                <input type="text" class="form-control" id="lastname" name="lname" value="{{old('lname')}}" required="">
                                            </div>
                                            @error('lname')
                                                <div class="error_msg">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <!--end row-->
                                    <div class="row">
                                        <!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile <small class="text-danger font-13"></small>
                                                </label> <input type="text" class="form-control" name="phone" value="{{old("phone")}}" required="">
                                            </div>
                                            @error('phone')
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
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label pt-0">Role <small class="text-danger font-13">*</small></label>
                                                <select class="form-control" name="role">
                                                    <option>Select</option>
                                                    <option>Admin</option>
                                                    <option>Manager</option>
                                                    <option>Agent</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

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
