@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">Tambah</a>
                <button onclick='modalAction("{{ url("/kategori/create_ajax") }}")' class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"> {{ session('error') }} </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter :</label>
                        <div class="col-3">
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Kode</th>
                        <th>Kategori Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url) {
            $.get(url, function(response) {
                $('body').append(
                    '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">' +
                    response + '</div>');
                $('#myModal').modal('show');

                $('#myModal').on('hidden.bs.modal', function() {
                    $('#myModal').remove();
                });
            });
        }

        $(document).ready(function() {
            var datakategori = $('#table_kategori').DataTable({
                // serverSide: true, jika ingin menggunakan server side processing serverSide: true,
                ajax: {
                    "url": "{{ url('kategori/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [{
                    // nomor urut dari laravel datatable addIndexColumn()
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "kategori_kode",
                    className: "",
                    // orderable: true, jika ingin kolom ini bisa diurutkan orderable: true,
                    // searchable: true, jika ingin kolom ini bisa dicari searchable: true
                }, {
                    data: "kategori_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#kategori_id').on('change', function() {
                datakategori.ajax.reload();
            })

        });
    </script>
    <script>
        // Tangani form submit dari form yang dimuat via AJAX
        $(document).on('submit', '#form-tambah', function(e) {
            e.preventDefault(); // Hindari form reload
    
            let formData = new FormData(this);
            let url = "{{ url('/kategori/store_ajax') }}"; // Ganti sesuai route kamu
    
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    $('.text-danger').html(''); // Kosongkan error sebelumnya
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message); // Berhasil
                        $('#myModal').modal('hide'); // Tutup modal
                        $('#table_kategori').DataTable().ajax.reload(); // Reload datatable
                    } else {
                        if (response.msgField) {
                            // Tampilkan error field
                            $.each(response.msgField, function(key, value) {
                                $('#error-' + key).html(value[0]);
                            });
                        } else {
                            alert(response.message); // Error umum
                        }
                    }
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan. Coba lagi nanti.');
                }
            });
        });
    </script>
@endpush
