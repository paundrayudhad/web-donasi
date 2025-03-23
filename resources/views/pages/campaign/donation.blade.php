@extends('layouts.app')
@section('title', 'Donasi Untuk Campaign '.$campaign->title)
@section('content')
    @include('includes.navbar', ['background' => 'white', 'color' => 'dark'])

    <div class="container mt-20">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold text-primary"> Donasi Untuk Campaign {{$campaign->title}}</h6>
                        <form action="{{route('campaign.storeDonation', $campaign->slug)}}" method="POST">
                            @csrf
                            <!-- attribut name pada inputan melambangkan kolom yang akan kita isi di database -->
                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah Donasi</label>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" >
                                @error('amount')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Donasi Sekarang</button>
                        </form>
                    </div>
                </div>
                
        </div>
    </div>
@endsection