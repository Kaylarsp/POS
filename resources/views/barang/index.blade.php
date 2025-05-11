@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        {{-- <h3 class="card-title">{{ $page->title }}</h3> --}}
        <h3 class="card-title">{{ $page->title ?? 'Default Title' }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-sm btn-info mt-1">Import Barang</button>
            {{-- <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a> --}}
            <a href="{{ url('/barang/export_excel') }}" class="btn btn-sm mt-1 btn-primary"><i class="fa fa-file-excel"></i> Export Barang</a>
            <a href="{{ url('/barang/export_pdf') }}" class="btn btn-sm mt-1 btn-warning" target="_blank"><i class="fa fa-file-pdf"></i> Export Barang</a>
            <button onclick='modalAction("{{ url("/barang/create_ajax") }}")' class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
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
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option value="">- Semua -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Barang</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
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
            var dataBarang = $('#table_barang').DataTable({
                ajax: {
                    url: "{{ url('barang/list') }}",
                    type: "POST",
                    data: function(d) {
                        d.kategori_id = $('#kategori_id').val();
                    },
                    dataType: "json"
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_kode"
                    },
                    {
                        data: "barang_nama"
                    },
                    {
                        data: "kategori.kategori_nama",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "harga_beli"
                    },
                    {
                        data: "harga_jual"
                    },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#kategori_id').on('change', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush