@extends('layouts.app')

@section('title')
    Dyeing | Change Password
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <!-- Start Content-->
        <div class="content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Profile</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb"><a href="{{ route('profile') }}">Profile</a></li>
                                    <li class="breadcrumb-item active">/Change Password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-2">
                                    @if (auth()->user()->image)
                                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Picture"
                                            class="avatar-lg rounded-circle">
                                    @else
                                        <img src="{{ asset('profile/empty.png') }}" alt="Default Profile Picture"
                                            class="avatar-lg rounded-circle">
                                    @endif
                                    <h4 class="mt-2 mb-0">{{ ucwords(auth()->user()->username) }}</h4>
                                    <h6 class="text-muted fw-normal mt-2 mb-0">
                                        @if (auth()->user()->level == '1')
                                            Level | Superadmin
                                        @elseif (auth()->user()->level == '2')
                                            Level | Admin
                                        @else
                                            Level | Biasa
                                        @endif
                                    </h6>
                                    <h6 class="text-muted fw-normal mt-1 mb-3">{{ auth()->user()->dept }}</h6>

                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                    </div>

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <form class="user" method="POST" action="{{ route('change-password') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Old Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="lock"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" name="old_password" placeholder="Enter your password">
                                            @error('old_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="lock"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" name="new_password" placeholder="Enter your password">
                                            @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Confirm New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="lock"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('confirm_new_password') is-invalid @enderror"
                                                id="confirm_new_password" name="confirm_new_password"
                                                placeholder="Enter your password">
                                            @error('confirm_new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <button class="btn btn-primary px-4" type="submit">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->
        </div> 
        <!-- End content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
