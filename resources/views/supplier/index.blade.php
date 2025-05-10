@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/supplier/import') }}')" class="btn btn-sm mt-1 btn-info">Import Supplier</button>
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('supplier/create') }}">Tambah</a>
                <button onclick='modalAction("{{ url("/supplier/create_ajax") }}")' class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"> {{ session('error') }} </div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
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
            var dataSupplier = $('#table_supplier').DataTable({
                ajax: {
                    url: "{{ url('supplier/list') }}",
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function(d) {
                        // bisa tambahkan filter kalau ada
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    { data: "nama_supplier" },
                    { data: "alamat_supplier" },
                    { data: "telp_supplier" },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Jika nanti pakai filter
            // $('#filter_supplier').on('keyup change', function () {
            //     dataSupplier.ajax.reload();
            // });
        });
    </script>
@endpush
