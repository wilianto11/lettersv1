@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Daftar Pegawai Baru</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <section class="section">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Pegawai</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="/tambahpegawai" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Nama Pegawai</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="first-name" class="form-control"
                                                        name="name" placeholder="Nama Pegawai">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>NIP</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="email-id" class="form-control" name="nip"
                                                        placeholder="NIP">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <select class="choices form-select" name="roleid"
                                                        style="background-color: white" id="roleSelect">
                                                        <option selected="selected" disabled="disabled">Pilih Jabatan
                                                        </option>
                                                        <option value="2">KEPALA BAGIAN HUKUM</option>
                                                        <option value="3">SEKRETARIS</option>
                                                        <option value="4">OPERATOR</option>
                                                        <option value="5">KASUBAG PENGKAJIAN HUKUM</option>
                                                        <option value="5">KASUBAG PERUNDANG UNDANGAN</option>
                                                        <option value="5">KASUBAG BANTUAN HUKUM</option>
                                                    </select>
                                                    <input type="hidden" name="jabatan" id="jabatanHidden"
                                                        value="">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Tambahkan</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Atur
                                                        ulang</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                {{-- <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">A. Saugi</a></p>
                </div> --}}
            </div>
        </footer>
    </div>
@endsection
@section('js')
    <script src="assets/vendors/choices.js/choices.min.js"></script>
    <script>
        // Mendengarkan perubahan pada elemen select
        document.getElementById("roleSelect").addEventListener("change", function() {
            var selectedText = this.options[this.selectedIndex].text;
            var jabatanHidden = document.getElementById("jabatanHidden");

            // Mengisi nilai input hidden 'jabatan' dengan teks yang dipilih pada select
            jabatanHidden.value = selectedText;
        });
    </script>
@endsection
