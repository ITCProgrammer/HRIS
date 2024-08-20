@extends('layouts.app')

@section('title')
    HRIS | Dashboard
@endsection

@section('content')
    <div class="content-page">
        <!-- Start Content-->
        <div class="content">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">HUMAN RESOURCES INFORMATION SYSTEM</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card h-100 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="flex-grow-1 text-center">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Total Karyawan Pria</span>
                                        <h3 class="mb-0">{{ $jml_karyawan_pria }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-6">
                        <div class="card h-100 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="flex-grow-1 text-center">
                                        <span class="text-muted text-uppercase fs-12 fw-bold" align = "center">TOTAL
                                            KARYAWAN TETAP & KONTRAK</span>
                                        <p class="text-muted text-uppercase fs-12 fw-bold" align = "center">PT.
                                            Indotaichen Textile Industry</p>
                                        <h3 class="mb-0">{{ $jml_karyawan }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card h-100 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="flex-grow-1 text-center">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Total Karyawan Wanita</span>
                                        <h3 class="mb-0">{{ $jml_karyawan_wanita }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-20">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="employe-dept"
                                        class="table table-sm table-bordered table-hover table-striped  w-100">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Departement</th>
                                                <th>Jumlah Karyawam</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($tot_karyawan as $data)
                                                <tr>
                                                    <td>{{ $data->dept }}</td>
                                                    <td>{{ $data->dept_name }}</td>
                                                    <td>{{ $data->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>

            </div> 
            
        </div> 
        <!-- End content -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#employe-dept').DataTable({});
        });
    </script>
@endsection

