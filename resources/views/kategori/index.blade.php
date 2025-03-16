@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')

@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage Kategori</h5>
                <div class="ms-auto">
                    <a href="{{ url('/kategori/create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Kategori
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
