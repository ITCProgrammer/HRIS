@extends('layouts.app')

@section('title')
    HRIS | Karyawan Baru
@endsection

@section('css')
    <style>
        .form-control::placeholder {
            color: #4B4B5A !important;
            opacity: 1;
        }
    </style>
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

                <h4 class="text-center">DATA KARYAWAN BARU DEPARTEMEN</h4>
                <div class="row mt-3 mb-0">
                    <div class="col-20">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="data-karyawan-baru"
                                        class="table table-sm table-bordered table-hover table-striped w-100">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>No</th>
                                                <th>No Scan</th>
                                                <th>Nama</th>
                                                <th>Departement</th>
                                                <th>Tgl Masuk</th>
                                                <th>Tgl Akhir Evaluasi</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($dept_employes as $employe)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $employe->no_scan }}</td>
                                                    <td>{{ $employe->nama }}</td>
                                                    <td>{{ $employe->dept }}</td>
                                                    <td>{{ $employe->ftgl_masuk }}</td>
                                                    <td>{{ $employe->ftgl_evaluasi }}</td>
                                                    <td>{{ $employe->jabatan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="text-danger mt-1 mb-0 fs-15">Note : </h5>
                <h6 class="text-muted fw-normal mt-1 mb-2">Mohon kirim Evaluasi Karyawan Baru H-7 Sebelum Masa
                    Training
                    Berakhir.
                </h6>

                @if (auth()->user()->dept == 'HRD')
                    <h4 class="text-center mt-5">DATA KARYAWAN BARU SEMUA DEPARTEMEN</h4>
                    <form method="POST" action="{{ route('sendmail-new-employee') }}">
                        @csrf
                        <div class="row mt-3 mb-0">
                            <div class="col-20">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <button class="btn btn-success me-2" id="export-excel">
                                                    <i class="fa fa-file-excel"></i> Export Excel
                                                </button>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="float-sm-end mt-3 mt-sm-0">

                                                    <div class="d-inline-block  mb-sm-0 me-sm-1">
                                                        <div class="input-group">
                                                            <input type="text" name="datefilter" class="form-control"
                                                                placeholder="--- Filter by Date ---" />
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-inline-block  mb-sm-0 me-sm-1">
                                                        <select id="department-filter" class="form-select"
                                                            aria-label="Filter by Department">
                                                            <option value="" disabled selected>--- Filter by
                                                                Department
                                                                ---
                                                            </option>
                                                            @foreach ($depts as $dept)
                                                                <option value="{{ $dept->code }}">{{ $dept->code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="dropdown float-end">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class='uil uil-sort-amount-down'></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end px-3 py-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkDaterange" checked>
                                                                <label class="form-check-label ms-2" for="checkDaterange">
                                                                    Date Range
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkDepartment" checked>
                                                                <label class="form-check-label ms-2" for="checkDepartment">
                                                                    Department
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-3 mb-3" />
                                        <div class="table-responsive">
                                            <table id="data-karyawan-semua"
                                                class="table table-sm table-bordered table-hover table-striped w-100">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkbox-all">
                                                            </div>
                                                        </th>
                                                        <th>No Scan</th>
                                                        <th>Nama</th>
                                                        <th>Departement</th>
                                                        <th>Tgl Masuk</th>
                                                        <th>Jabatan</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 text-end mb-2">
                                @if (auth()->user()->dept == 'HRD')
                                    <button id="send-email-btn" class="btn btn-primary me-2" type="submit"
                                        name="send-email">
                                        <i class="fa fa-envelope"></i> Kirim Email
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <!-- End content -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#data-karyawan-baru').DataTable({});

            let start_date = '';
            let end_date = '';
            let department = '';

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                start_date = picker.startDate.format('YYYY-MM-DD');
                end_date = picker.endDate.format('YYYY-MM-DD');
                $(this).val(start_date + ' s/d ' + end_date);
                table.draw();
                updateFilterCheckboxes();
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                start_date = '';
                end_date = '';
                $(this).val('');
                table.draw();
                updateFilterCheckboxes();
            });

            $('#department-filter').on('change', function() {
                let dept = $(this).val();
                department = dept;
                table.draw();
                updateFilterCheckboxes();
            });

            let table = $('#data-karyawan-semua').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('new-employe') }}",
                    type: 'GET',
                    data: function(data) {
                        data.from_date = start_date;
                        data.to_date = end_date;
                        data.department = department;
                    }
                },
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <input type="checkbox" class="form-check-input mx-1 check-table" name="no_scan[]"
                                    value="${row.no_scan}/${row.nama}/${row.dept}/${row.tgl_masuk}/${row.tgl_evaluasi}/${row.jabatan}">
                            `;
                        }
                    },
                    {
                        data: 'no_scan',
                        name: 'no_scan'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'dept',
                        name: 'dept'
                    },
                    {
                        data: 'ftgl_masuk',
                        name: 'ftgl_masuk'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    }
                ]
            });

            // Initialize "All" checkbox to be unchecked
            $('#checkbox-all').prop('checked', false);

            // Handle "All" checkbox change
            $('#checkbox-all').on('change', function() {
                let isChecked = $(this).is(':checked');
                $('.check-table').prop('checked', isChecked);
                toggleSendEmailButton();
            });

            // Handle individual checkbox changes
            $('#data-karyawan-semua').on('change', '.check-table', function() {
                let checkedItems = [];
                $('.check-table:checked').each(function() {
                    checkedItems.push($(this).val());
                });

                // Optionally update the "All" checkbox state based on individual checkboxes
                let allChecked = $('.check-table').length === $('.check-table:checked')
                    .length;
                $('#checkbox-all').prop('checked', allChecked);

                // Tampilkan atau sembunyikan tombol Kirim Email
                toggleSendEmailButton();
                // Log or process the checked items
                console.log(checkedItems);
            });


            function updateFilterCheckboxes() {
                const isDaterangeActive = start_date && end_date;
                const isDepartmentActive = department !== '';

                $('#checkDaterange').prop('checked', isDaterangeActive).prop('disabled', !isDaterangeActive);
                $('#checkDepartment').prop('checked', isDepartmentActive).prop('disabled', !isDepartmentActive);
            }

            $('#checkDaterange').on('change', function() {
                if (!$(this).is(':checked')) {
                    start_date = '';
                    end_date = '';
                    $('input[name="datefilter"]').val('');
                    table.draw();
                    updateFilterCheckboxes();
                }
            });

            $('#checkDepartment').on('change', function() {
                if (!$(this).is(':checked')) {
                    department = '';
                    $('#department-filter').val('');
                    table.draw();
                    updateFilterCheckboxes();
                }
            });

            updateFilterCheckboxes();

            function toggleSendEmailButton() {
                // Cek jika ada setidaknya satu checkbox yang tercentang
                if ($('.check-table:checked').length > 0) {
                    $('#send-email-btn').show(); // Tampilkan tombol
                } else {
                    $('#send-email-btn').hide(); // Sembunyikan tombol
                }
            }

            // Panggil toggleSendEmailButton saat halaman dimuat untuk memastikan status tombol yang benar
            toggleSendEmailButton();


            $('#export-excel').on('click', function(e) {
                e.preventDefault(); // Mencegah reload halaman

                // Buat URL dengan parameter query
                let url = "{{ route('new-employe-export') }}";
                url += `?from_date=${encodeURIComponent(start_date)}`;
                url += `&to_date=${encodeURIComponent(end_date)}`;
                url += `&department=${encodeURIComponent(department)}`;

                // Arahkan browser ke URL untuk memulai unduhan
                window.location.href = url;
            });
        });
    </script>
@endsection
