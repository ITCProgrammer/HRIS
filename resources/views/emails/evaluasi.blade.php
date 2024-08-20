<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass * {
            line-height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 0;
        }

        .custom-card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            margin-bottom: 5px;
            padding: 10px;
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }

            @viewport {
                width: 320px;
            }
        }
    </style>
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="background-color:#f9f9f9;">

    <div style="background-color:#f9f9f9;">

        <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
                <tbody>
                    <tr>
                        <td
                            style="border-bottom:#367d39 solid 10px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="background:#fff;background-color:#fff;width:100%;">
                <tbody>
                    <tr>
                        <td
                            style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">

                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">

                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:bottom;" width="100%">

                                    <tr>
                                        <td align="center"
                                            style="font-size:0px;padding:10px 25px;word-break:break-word;">

                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                role="presentation"
                                                style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:70px;">
                                                            <img height="auto"
                                                                src="{{ $message->embed(public_path('img/ITTI_logo_large.png')) }}"
                                                                style="border:0;display:block;outline:none;text-decoration:none;width:100%;"
                                                                width="70">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center"
                                            style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
                                            <div
                                                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:24px;font-weight:bold;line-height:1.3;text-align:center;color:#555;">
                                                HR ITTI
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="left"
                                            style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div
                                                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:1.5;text-align:left;color:#555;">
                                                Kepada Yth,<br>
                                                Pimpinan Departemen<br><br>
                                                Dengan hormat,<br><br>
                                                Kami dari Departemen HRD ingin memberitahukan bahwa telah tiba waktunya
                                                untuk melakukan evaluasi terhadap beberapa karyawan di departemen Anda.
                                                Evaluasi ini adalah bagian dari upaya kami untuk memastikan bahwa semua
                                                karyawan mendapatkan penilaian yang adil dan tepat waktu sesuai dengan
                                                kebijakan perusahaan.<br><br>
                                                Berikut adalah daftar nama karyawan yang dijadwalkan untuk
                                                dievaluasi:<br><br>
                                                @foreach ($data_employe as $employe)
                                                    <div class="custom-card">
                                                        <p><strong>Nama:</strong> {{ $employe['nama'] }}</p>
                                                        <p><strong>No Scan:</strong> {{ $employe['no_scan'] }}</p>
                                                        <p><strong>Departemen:</strong> {{ $employe['dept'] }}</p>
                                                        <p><strong>Tanggal Masuk:</strong>
                                                            {{ \Carbon\Carbon::parse($employe['tgl_masuk'])->format('Y-m-d') }}
                                                        </p>
                                                        <p><strong>Tanggal Evaluasi:</strong>
                                                            {{ \Carbon\Carbon::parse($employe['tgl_evaluasi'])->format('Y-m-d') }}
                                                        </p>
                                                        <p><strong>Jabatan:</strong> {{ $employe['jabatan'] }}</p>
                                                    </div>
                                                    <br>
                                                @endforeach
                                                Kami mohon agar Bapak/Ibu dapat menyiapkan informasi yang diperlukan dan
                                                melaksanakan evaluasi sesuai jadwal yang telah ditetapkan. Jika ada
                                                pertanyaan atau membutuhkan informasi tambahan, silakan jangan ragu
                                                untuk menghubungi kami.<br><br>
                                                Terima kasih atas perhatian dan kerjasamanya.<br><br>
                                                Hormat kami,<br><br><br>
                                                HRD PT Indo Taichen Textile Industry
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:bottom;padding:0;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    role="presentation" width="100%">
                                                    <tr>
                                                        <td align="center"
                                                            style="font-size:0px;padding:0;word-break:break-word;">
                                                            <div
                                                                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1.5;text-align:center;color:#575757;">
                                                                Jl. Gatot Subroto Km.3 Jl. Kalisabi, Desa Uwung Jaya,
                                                                Cibodas Tangerang 15138, Kota Tangerang - Banten -
                                                                Indonesia
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"
                                                            style="font-size:0px;padding:10px;word-break:break-word;">
                                                            <div
                                                                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1.5;text-align:center;color:#575757;">
                                                                PT. Indo Taichen Textile Industry
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
