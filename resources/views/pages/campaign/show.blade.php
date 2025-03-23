@extends('layouts.app')
@section('title', $campaign->title)

@section('content')
    @include('includes.navbar', ['background' => 'white', 'color' => 'dark'])

    
  <section class="container mt-20">
    <div class="row">
      <!-- Gambar Campaign -->
      <div class="col-md-8">
        <img src="{{ asset('storage/' . $campaign->thumbnail) }}" alt="Campaign Image" class="img-fluid rounded thumbnail-campaign" />
      </div>
      <!-- Info Campaign -->
      <div class="col-md-4">
        <div class="card p-3 shadow-sm position-relative">
          <h5 class="fw-bold">
            {{$campaign->title}}
          </h5>

          <!-- Progress Bar -->
          @php
                  $raised = $campaign->campaignDonations()->where('status', 'success')->sum('amount');//Menjumlahkan total donasi
                  $Progresspercentage = ($raised / $campaign->target) * 100;//Menghitung persentase
                 @endphp
                 <div class="progress mt-2 mb-2" style="height: 5px">
                   <div
                     class="progress-bar bg-primary rounded"
                     style="width: {{$Progresspercentage}}%"></div>
                 </div>
          <!-- Informasi Donasi -->
          <div class="d-flex justify-content-between text-muted">
            <div>
              <small>Terkumpul</small>
              <h6 class="fw-bold text-dark fs-5">Rp {{ number_format($raised, 0, 2) }}</h6>
            </div>
            <div>
              <small>Sisa Hari</small>
              @if (\Carbon\Carbon::parse($campaign->end_date)->gte(\Carbon\Carbon::now()))
                <h6 class="fw-bold text-dark fs-5">
                  @if (ceil(\Carbon\Carbon::parse($campaign->end_date)->diffInDays(\Carbon\Carbon::now())) == 0)
                    Hari ini
                  @else
                    {{ ceil(\Carbon\Carbon::parse($campaign->end_date)->diffInDays(\Carbon\Carbon::now())) }} Hari Lagi
                  @endif
                </h6>
              @else
                <h6 class="fw-bold text-dark fs-5">
                  Sudah Berakhir
                </h6>
              @endif
                <!-- <h6 class="fw-bold text-dark fs-5">
                  {{\Carbon\Carbon::parse($campaign->end_date)->diffForHumans()}}
                </h6> -->
            </div>
            <div>
              <small>Target</small>
              <h6 class="fw-bold text-dark fs-5">{{number_format($campaign->target, 0, 2)}}</h6>
            </div>
          </div>

          <!-- Icon Share -->
          <div class="position-absolute top-0 end-0 m-3">
            <img src="{{ asset('assets/image/arrow.png') }}" alt="" width="35" height="35" />
          </div>
        </div>
        <div class="mt-3">
          <a href="{{route('campaign.donation', $campaign->slug)}}" class="btn btn-primary w-100" style="background-color: #473bf0 !important">
            Donasi Sekarang
          </a>
          <button class="btn btn-outline-primary w-100 mt-3">
            <i class="bi bi-share" style="color: #473bf0 !important"></i>
            Bagikan
          </button>
        </div>
      </div>
    </div>
    <div class="mt-4">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#detail">Detail Cerita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#kabar">Kabar Penggunaan Dana</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#donatur">Donatur</a>
        </li>
      </ul>

      <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="detail">
          <article>
            {!!$campaign->description!!}
          </article>
        </div>
        <div class="tab-pane fade" id="kabar">
          @foreach ($campaign->campaignNews  as $news)
          <div class="mt-3 custom-border border-bottom">
            <h6 class="text-primary">{{\Carbon\Carbon::parse($news->date)->format('d F Y')}}</h6>
            <h5 class="fw-bold">{{$news->title}}</h5>
            <article>
              {!!$news->content!!}
            </article>
          </div>
          @endforeach
        </div>
        <div class="tab-pane fade " id="donatur">
          <!-- Menampilkan data donatur dari campaign yang statusnya success -->
          @foreach ($campaign->campaignDonations->where('status', 'success') as $donation)
          <div class="d-flex align-items-center justify-content-between border-bottom py-3">
            <div class="d-flex align-items-center">
              <div class="rounded bg-light p-3 d-flex align-items-center justify-content-center"
                style="width: 40px; height: 40px">
                <i class="bi bi-person-fill fs-5 text-primary"></i>
              </div>
              <div class="ms-3">
                <h6 class="mb-0">{{$donation->name}}</h6>
                <small class="text-muted">{{$donation->created_at->diffForHumans()}}</small>
              </div>
            </div>
            <div class="fw-bold text-primary fs-5">Rp {{number_format($donation->amount, 0, 2)}}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection