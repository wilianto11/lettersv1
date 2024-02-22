
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Surat Masuk {{ date('d-F-y') }}</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { size: legal
}
.sheet.padding-5mm{
    padding:5mm 10mm 10mm 10mm ;
    font-family: Arial, Helvetica, sans-serif;
}
    .table {
        border-collapse: collapse;
        width: 100%;


    }

    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
        font-size: 10px;
    }

    .table td {
        padding: 4px 4px;
        font-size: 10px;

    }

    .text-center {
        text-align: center;
    }
    .ttd{
        margin: 25px 20px 75px 100px;

    }
</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="legal">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-5mm">

    <!-- Write HTML just like a web page -->
    <table style="font-family: Arial, Helvetica, sans-serif;vertical-align: top;width:100%">
        <tr >
            <td>
                <img style="padding-left: 20px" src="{{ asset('assets/images/logo/logo.jpg') }}" width="130px" height="130px" alt="" >
            </td>
            <td align=center >

                <p  style="padding-right: 50px; font-size: 20px;valign:top">PEMERINTAH KABUPATEN BEKASI<br>
                <b style="font-size: 26px">SEKRETARIAT DAERAH</b><br>
                Komplek Perkantoran Pemerintah Kabupaten Bekasi<br>
                di Desa Sukamahi Kecamatan Cikarang Pusat <br>
                <b> BEKASI</b></p>
            </td>
        </tr>
    </table>
    <hr style="border-bottom: 5px solid black">
    <h2 style="text-align: center">Laporan Surat Masuk Tahun {{ $tahun }} </h2>
    <table class="table bordered">
        <thead>
        <tr>
                <th>#</th>
                <th>NO Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Disposisi Kepada</th>
                <th>Catatan Kabag</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suratmasuk as $d)
            <tr>
                <th>{{ $loop->iteration }} </th>
                <th>{{ $d->nosurat }}</th>
                <th>{{ $d->tglsurat }}</th>
                <th>{{ $d->tglditerima }}</th>
                <th>{{ $d->instansi }}</th>
                <th>{{ $d->perihal }}</th>
                <th>{{ $d->jabatan }} </th>
                <th>{{ $d->catcamat }} </th>
            </tr>
        @endforeach
    </tbody>
    </table>
  </section>

</body>

</html>

