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
    <div class="row">
        <div class="col text-center">
            <h1>Selamat Datang!</h1>
            <p>Silakan klik tombol di bawah untuk membuat nametag magang Anda.</p>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Buat Nametag</a>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection