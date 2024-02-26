@extends('layouts.main')
@push('css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href={{ @asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }} rel="stylesheet">
    <link href={{ @asset('assets/css/theme-rtl.min.css') }} rel="stylesheet" id="style-rtl">
    <link href={{ @asset('assets/css/theme.min.css') }} rel="stylesheet" id="style-default">
    <link href={{ @asset('assets/css/user-rtl.min.css') }} rel="stylesheet" id="user-style-rtl">
    <link href={{ @asset('assets/css/user.min.css') }} rel="stylesheet" id="user-style-default">
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src={{ @asset('assets/js/config.js') }}></script>
    <script src={{ @asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}></script>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <script src={{ @asset('vendors/popper/popper.min.js') }}></script>
    <script src={{ @asset('vendors/bootstrap/bootstrap.min.js') }}></script>
    <script src={{ @asset('vendors/anchorjs/anchor.min.js') }}></script>
    <script src={{ @asset('vendors/is/is.min.js') }}></script>
    <script src={{ @asset('vendors/echarts/echarts.min.js') }}></script>
    <script src={{ @asset('vendors/fontawesome/all.min.js') }}></script>
    <script src={{ @asset('vendors/lodash/lodash.min.js') }}></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src={{ @asset('vendors/list.js/list.min.js') }}></script>
    <script src={{ @asset('assets/js/theme.js') }}></script>
    <script>
        document.getElementById('showPopup').addEventListener('click', function (e) {
            e.preventDefault();
            var myModal = new bootstrap.Modal(document.getElementById('imageModal'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
@endpush

@section('content')
<div class="container">
    <div class="row g-3 my-2">
        <div class="col-xxl-6 col-lg-6 mx-auto">
            <div class="card h-100">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <div class="card-header z-index-1">
                    <h2 class="text-primary">Input Data Diri</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-6 col-lg-6 px-xxl-2 mx-auto">
        <div class="card h-100">
            <div class="card-header bg-light py-3">
                <div class="row flex-between-center">
                    <form action="{{ route('nametag') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Pengajuan Magang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kode" name="kode" required minlength="15">
                            <small>Kode dikirimkan melalui email setelah pengajuan magang diterima.</small>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Peserta Magang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required maxlength="15">
                            <small>Maksimal 15 karakter. Jika nama Anda lebih panjang, silahkan disesuaikan.</small>
                        </div>
                        <div class="mb-3">
                            <label for="instansi" class="form-label">Asal Instansi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="instansi" name="instansi" required maxlength="26">
                            <small>Asal sekolah/perguruan tinggi saat ini. Contoh: Universitas Riau.</small>
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Penempatan Divisi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="divisi" name="divisi" required maxlength="15">
                            <small>Maksimal 15 karakter. Contoh: DIVISI TI.</small>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Input Foto<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="formFile" name="foto" required accept="image/png, image/jpeg">
                            <small>Lihat ketentuan foto <a href="#" id="showPopup">disini</a>.</small>
                        </div>
                        <!-- Modal Ketentuan Foto -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Ketentuan Foto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('img/ketentuan_foto.png') }}" class="img-fluid" alt="Ketentuan Foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3" type="submit">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection