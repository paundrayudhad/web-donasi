@extends('layouts.app')

@section('title', 'Campaigns')

@section('content')
    @include('includes.navbar', ['background' => 'white', 'color' => 'dark'])

    <div class="heading-section">
        <h1>Campaign Kami</h1>
        <p>Berikut Campaign yang sedang berlangsung yang kami sediakan</p>
    </div>

   <div class="container mt-5">
    <div class="row">
        <!-- Campaign 1 -->
        @foreach ($campaigns as $campaign)
          <div class="col-md-3">
           <a href="{{route('campaign.show', $campaign->slug)}}" class="text-decoration-none">
             <div class="card border-0 shadow-sm h-100"> 
               <img
                 src="{{asset('storage/'.$campaign->thumbnail)}}"
                 class="card-img-top img-campaign"
                 alt="Campaign 1" />
               <div class="card-body">
                 <div class="d-flex justify-content-between align-items-start">
                   <h6 class="fw-bold mb-2 flex-grow-1 text-dark">
                      {{$campaign->title}}
                   </h6>
                   <img
                     src="{{asset('assets/image/arrow.png')}}"
                     alt="Arrow Icon"
                     width="25"
                     height="25" />
                 </div>
                 @php
                  $raised = $campaign->campaignDonations()->where('status', 'success')->sum('amount');//Menjumlahkan total donasi
                  $Progresspercentage = ($raised / $campaign->target) * 100;//Menghitung persentase
                 @endphp
                 <div class="progress mt-2 mb-2" style="height: 5px">
                   <div
                     class="progress-bar bg-primary rounded"
                     style="width: {{$Progresspercentage}}%"></div>
                 </div>
                 <p class="text-secondary mt-1 small">
                   Terkumpul <span class="fw-bold text-dark">Rp {{number_format($raised, 0, 2)}}</span>
                 </p>
               </div>
             </div>
           </a>
         </div>
          @endforeach
          <div class="d-flex justify-content-center mt-5">
              {{$campaigns->links()}}

          </div>
    </div>
   </div>
@endsection