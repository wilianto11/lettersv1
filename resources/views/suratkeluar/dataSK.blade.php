@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Data Surat Keluar</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">

                    <section class="section">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                Surat Keluar
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No Surat</th>
                                            <th>Unit</th>
                                            <th>Tanggal Surat</th>
                                            <th>Judul atau Perihal Surat</th>
                                            <th>Keterangan</th>
                                            <th>Detail Surat</th>
                                            <th>Tindakan</th>
                                            <th>File Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sk as $s)
                                            <tr>
                                                <td>{{ $s->nosurat }}</td>
                                                <td>{{ $s->user->jabatan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($s->tglsurat)->translatedFormat('l, d F Y') }}
                                                </td>
                                                <td>{{ $s->perihal }}</td>
                                                <td>
                                                    @if ($s->role == 1)
                                                        Sedang diproses Sekretaris
                                                    @elseif ($s->role == 2)
                                                        Menunggu tindakan Operator
                                                    @elseif ($s->role == 3)
                                                        Surat Keluar tidak disetujui oleh Sekretaris
                                                    @elseif ($s->role == 4)
                                                        Sedang diproses Kabag
                                                    @elseif ($s->role == 5)
                                                        Surat Keluar disetujui oleh Kabag
                                                    @elseif ($s->role == 6)
                                                        Surat Keluar tidak disetujui oleh Kabag
                                                    @elseif ($s->role == 7)
                                                        Surat Keluar didisposisikan Kabag ke Operator
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn fs-3" style="border: none"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailsurat{{ $s->id }}">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                </td>
                                                <!-- modal detailsurat -->
                                                <div class="modal fade" id="detailsurat{{ $s->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                        role="document">
                                                        <div class="modal-content" style="height: 615px">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title white"
                                                                    id="exampleModalScrollableTitle">
                                                                    Detail Surat Keluar</h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>INFORMASI UMUM</h5>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        No. Surat
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->nosurat }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Unit Pemohon
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->user->jabatan }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Nama Pemohon
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->user->name }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Judul atau Perihal Surat
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->perihal }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Tanggal Surat
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ \Carbon\Carbon::parse($s->tglsurat)->translatedFormat('l, d F Y') }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Tanggal Pengajuan
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ \Carbon\Carbon::parse($s->created_at)->translatedFormat('l, d F Y') }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Lampiran
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->lampiran }} Lampiran
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Sifat Surat
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{ $s->sifat }}
                                                                    </div>

                                                                </div>
                                                                <h5 class="mt-5">INFORMASI TINDAKAN</h5>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        Keterangan
                                                                    </div>
                                                                    <div class="col-8"
                                                                        style="font-style: oblique; font-weight: 700">
                                                                        @if ($s->validasisekcam)
                                                                            @if ($s->validasisekcam == 1)
                                                                                @if ($s->validasicamat)
                                                                                    @if ($s->validasicamat == 1)
                                                                                        Disetujui oleh Kabag
                                                                                    @else
                                                                                        Tidak disetujui oleh Kabag
                                                                                    @endif
                                                                                @else
                                                                                    Disetujui oleh Sekretaris
                                                                                @endif
                                                                            @else
                                                                                Tidak disetujui oleh Sekretaris
                                                                            @endif
                                                                        @else
                                                                            Menunggu persetujuan Sekretaris
                                                                        @endif
                                                                    </div>

                                                                    <div class="col-4">
                                                                        Tanggal disposisi
                                                                    </div>
                                                                    <div class="col-8">
                                                                        @if ($s->tgldisposisi)
                                                                            {{ \Carbon\Carbon::parse($s->tgldisposisi)->translatedFormat('l, d F Y') }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </div>

                                                                    <code class="mt-2" style="font-size: 17px">#Tindakan
                                                                        Sekretaris</code>

                                                                    <div class="col-4">
                                                                        Tanggal Tindakan Sekretaris
                                                                    </div>
                                                                    <div class="col-8">
                                                                        @if ($s->tglsekcam)
                                                                            {{ \Carbon\Carbon::parse($s->tglsekcam)->translatedFormat('l, d F Y') }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Catatan Sekretaris
                                                                    </div>
                                                                    <div class="col-8">
                                                                        @if ($s->catsekcam)
                                                                            {{ $s->catsekcam }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </div>

                                                                    <code class="mt-2" style="font-size: 17px">#Tindakan
                                                                        Kabag</code>

                                                                    <div class="col-4">
                                                                        Tanggal Tindakan Kabag
                                                                    </div>
                                                                    <div class="col-8">
                                                                        @if ($s->tglcamat)
                                                                            {{ \Carbon\Carbon::parse($s->tglcamat)->translatedFormat('l, d F Y') }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-4">
                                                                        Catatan kabag
                                                                    </div>
                                                                    <div class="col-8">
                                                                        @if ($s->catcamat)
                                                                            {{ $s->catcamat }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tutup</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <td style="text-align: center;">
                                                    @if ($s->role == 2)
                                                        <form action="/disposisisuratkeluar" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $s->id }}">
                                                            @if ($s->validasisekcam == 1)
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    Teruskan ke kabag
                                                                </button>
                                                            @else
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    Teruskan ke {{ $s->user->jabatan }}
                                                                </button>
                                                            @endif
                                                        </form>
                                                    @elseif ($s->role == 7)
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#submit{{ $s->id }}">
                                                            Tindakan
                                                        </button>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <div class="modal fade" id="submit{{ $s->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content" style="height: 250px;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                    No Registrasi Surat Keluar</h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            @php
                                                                $tahunIni = now()->year;
                                                                $noregis = App\Models\SuratKeluar::whereYear('created_at', '=', $tahunIni)->where('validasicamat', 1)->get();
                                                                $count = str_pad($noregis->count(), 3, '0', STR_PAD_LEFT);
                                                                $nosurat = $s->nojenis."/".$count."/".$s->noinstansi."/".$s->notahun;
                                                            @endphp
                                                            <form action="/submitnoregis" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $s->id }}">
                                                                <div class="modal-body">
                                                                    <div class="d-flex align-items-ceter">
                                                                        <input type="text" name="nosurat"
                                                                            value="{{ $nosurat }}" readonly class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Tutup</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kirim</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <td style="text-align: center;">
                                                    <a href="{{ asset('storage/' . $s->pdf) }}" target="_blank"><i
                                                            class="bi bi-file-earmark-medical fs-4"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>

                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>{{ date("Y") }} &copy;
                        <a href="https://wilianto11.github.io/wilianto.github.io/">WILIANTO</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
    <script src="assets/vendors/choices.js/choices.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
