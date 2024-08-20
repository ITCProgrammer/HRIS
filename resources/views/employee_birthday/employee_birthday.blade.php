@extends('layouts.app')

@section('title')
    HRIS | Karyawan Ulang Tahun
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">HUMAN RESOURCES INFORMATION SYSTEM</h4>
                        </div>
                    </div>
                </div>
                <!-- End page title -->
                <form action="{{ route('sendmail-employee-birthday') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Kirim ucapan melalui email</button>
                    <div class="row mt-3 mb-0">
                        @foreach ($employee_birthday_list as $employe)
                            <input type="hidden" name="emails[]"
                                value="{{ $employe->email_pribadi }}/{{ $employe->nama }}/{{ $employe->age }}">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="text-center mt-2">
                                            <x-lottie class="class-1 class-2"
                                                style="color:red; background-color:transparent; width:100%; height:150px;"
                                                path="lottie/birthday.json" animType="svg" loop="true" autoplay="true" />
                                            <h4 class="mt-2 mb-0">{{ $employe->nama }}</h4>
                                            <h6 class="text-muted fw-normal ">{{ $employe->dept }}</h6>
                                            @if (auth()->user()->dept == 'DIT' || auth()->user()->dept == 'HRD')
                                                @if ($employe->email_pribadi != null or $employe->email_pribadi != '')
                                                    <h6 class="text-muted fw-normal mb-4">{{ $employe->email_pribadi }}</h6>
                                                @else
                                                    <h6 class="text-muted fw-normal mb-4">---</h6>
                                                @endif
                                            @else
                                                <h6 class="text-muted fw-normal mb-4">---</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <!-- End content -->
    </div>
@endsection
