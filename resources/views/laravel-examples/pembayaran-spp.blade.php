@extends('layouts.user_type.auth')
<style>
    sup {
        color: red;
        font-size: 4px;
    }

    input {
        text-transform: uppercase;
    }
</style>
@section('content')
    <div>
        {{-- <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Form Bukti Pembayaran SPP</h5>
                            </div>
                            {{-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a> --}}
                        </div>
                    </div>
                    <div class="card-body px-5 pt-3 pb-2">
                        <form action="{{ Route('save-spp') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-2">NIM<sup>(*)</sup></div>
                                <div class="col-md-6"><input type="text" name="nim" id="nim"
                                        class="form-control" value="{{ auth()->user()->nim }}" required readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">Nama Mahasiswa<sup>(*)</sup></div>
                                <div class="col-md-6"><input type="text" name="nama_mahasiswa" id="namaMahasiswa"
                                        value="{{ auth()->user()->name }}" class="form-control" required readonly></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">Semester<sup>(*)</sup></div>
                                <div class="col-md-6"><input type="number" name="semester"
                                        id="semester" class="form-control" placeholder="1"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">Jumlah<sup>(*)</sup></div>
                                <div class="col-md-6"><input type="text" name="pembayaran_semester"
                                        id="pembayaranSemester" class="form-control" oninput="formatCurrency(this)"
                                        required placeholder="Rp. 2.000.000">
                                    <input type="hidden" name="amount" id="amount">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">Upload Bukti Bayar<sup>(*)</sup></div>
                                <div class="col-md-6"><input type="file" name="bukti_bayar" id="buktiBayar"
                                        class="form-control" accept="image/*" required>
                                    <span id="imgBukti" class="mt-3"></span>
                                </div>
                            </div>
                            <div class="row md-3 mt-4">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var buktiBayar = document.getElementById('buktiBayar');
        var imgBukti = document.getElementById('imgBukti');

        buktiBayar.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.style.maxWidth = '200px'; // Optional: Adjust the image display size
                    imgElement.style.maxHeight = '200px'; // Optional: Adjust the image display size
                    imgElement.style.marginTop = '15px';
                    imgBukti.innerHTML = ''; // Clear previous content
                    imgBukti.appendChild(imgElement);
                };

                reader.readAsDataURL(buktiBayar.files[0]);
            }
        });
    </script>
@endsection
