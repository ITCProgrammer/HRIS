@extends('layouts.app')

@section('title')
    Dyeing | Profile
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
                                    <li class="breadcrumb-item active">Profile</li>
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

                                    <a href="{{ route('change-password') }}" type="button"
                                        class="btn btn-white btn-sm">Change Password</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                    </div>

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <form class="user" method="POST" action="{{ route('change-profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="col-lg-2 col-form-label" for="example-fileinput">Picture</label>
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-center">
                                                @if (auth()->user()->image)
                                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                                        alt="Profile Picture" class="avatar-lg rounded-circle"
                                                        id="preview-image">
                                                @else
                                                    <img src="{{ asset('profile/empty.png') }}"
                                                        alt="Default Profile Picture" class="avatar-lg rounded-circle"
                                                        id="preview-image">
                                                @endif

                                                <input type="file" id="fileInput" style="display: none;" accept="image/*"
                                                    name="foto" onchange="previewFile()">
                                                <label for="fileInput" class="btn btn-white btn-sm ms-2">Upload</label>
                                            </div>
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

            </div> 
        </div> 
        <!-- End content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection


@section('scripts')
    <script>
        function previewFile() {
            var preview = document.getElementById('preview-image');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        }
    </script>
@endsection
