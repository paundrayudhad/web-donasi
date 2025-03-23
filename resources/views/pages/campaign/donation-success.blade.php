@extends('layouts.app')
@section('title', 'Donasi Berhasil')
@section('content')
@include('includes.navbar', ['background' => 'white', 'color' => 'dark'])
    <div class="d-flex justify-content-center align-items-center min-vh-100 flex-column text-center mt-20" >
        <h1 class="mt-3">Donasi Berhasil</h1>
        <p class="mt-3">Terima kasih telah berdonasi, semoga amal baik Anda diterima oleh Allah SWT.</p>
        <a href="{{ route('campaign.index') }}" class="btn btn-primary">Kembali ke Halaman Campaign</a>
    </div>
@endsection