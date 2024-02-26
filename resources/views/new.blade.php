<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary">Daftar Kontrak</h2>
            </div>
        </div>
        <div class="bg-holder bg-card"
            style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
        </div>
    </div>
    <div class="bg-holder bg-card"
        style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
    </div>
</div>
<div class="card h-100">
    <div class="card-header py-2">
        <div class="row flex-between-center">
            <div class="table-responsive scrollbar mt-3">
                <div class="row justify-content-between mb-2">
                    <div class="col-md-6">
                        <button class="btn btn-secondary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#error-modal">
                            <span class="fas fa-plus"></span> Tambah kontrak baru
                        </button>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px">
                                <div class="modal-content position-relative">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0" style="text-align: left;">
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                            <h4 class="mb-1" id="modalExampleDemoLabel">Input Data Kontrak </h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <form action="" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="no_kontrak">No. Kontrak:</label>
                                                    <input class="form-control" id="no_kontrak" name="no_kontrak" type="text" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="objek_pekerjaan" >Objek Pekerjaan:</label>
                                                    <textarea class="form-control" id="objek_pekerjaan" name="objek_pekerjaan" ></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="nama_rekanan">Nama Rekanan:</label>
                                                    <input class="form-control" id="nama_rekanan" name="nama_rekanan" type="text" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="nilai_kontrak">Nilai Kontrak:</label>
                                                    <input class="form-control" id="nilai_kontrak" name="nilai_kontrak" type="text" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="tanggal_mulai">Tanggal Mulai:</label>
                                                    <input class="form-control" id="tanggal_mulai" name="tanggal_mulai" type="date" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="tanggal_selesai">Tanggal Selesai:</label>
                                                    <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" type="date" />
                                                </div>
                                           
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary me-auto" type="submit">Simpan</button>
                                        <button class="btn btn-secondary ms-auto" type="button" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>