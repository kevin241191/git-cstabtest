@extends('template')
@section('title', 'Toutes les admins')

@section('content')
    <h1 class="app-page-title">Administrateurs</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Editer</h3>
            <div class="section-intro">Edit un nouveau administrateur<a href="help.html">Learn more</a></div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('adminuser.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom <small class="text-danger font-13">*</small></label>
                                    <input type="text" class="form-control" id="firstname" name="fname"
                                        value="{{ $user->fname }}" required="">
                                </div>
                                @error('fname')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prenom <small class="text-danger font-13">*</small></label>
                                    <input type="text" class="form-control" id="lastname" name="lname"
                                        value="{{ $user->lname }}" required="">
                                </div>
                                @error('lname')
                                    <div class="danger">{{ $message }}</div>
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
                                    </label> <input type="text" class="form-control" name="phone"
                                        value="{{ $user->phone }}" required="" readonly>
                                </div>
                                @error('phone')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address <small class="text-danger font-13">*</small></label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                        required="" readonly>
                                </div>
                                @error('email')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Role <small
                                            class="text-danger font-13">*</small></label>
                                    <select class="form-control" name="role">
                                        <option>Select</option>
                                        <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="Manager" {{ $user->role === 'Manager' ? 'selected' : '' }}>Manager
                                        </option>                                                          
                                        <option value="Agent" {{ $user->role === 'Agent' ? 'selected' : '' }}>Agent
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

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
