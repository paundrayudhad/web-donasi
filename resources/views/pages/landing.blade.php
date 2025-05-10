   @extends('layouts.app')

   @section('title', 'Yuk Donasi')

   @section('content')

   <!-- Hero Section -->
   <header class="hero d-flex align-items-center position-relative">
     <!-- Navbar -->
     @include('includes.navbar')

     <!-- Hero Content -->
     <div class="container">
       <div class="row">
         <div class="col-lg-6">
           <div class="hero-content">
             <h1 class="fw-bold mb-5" style="font-size: 60px">
               Galang Dana Untuk
               <span class="break-text">Yang Membutuhkan</span>
             </h1>
             <p class="lead fw-light text-light-gray mb-5">
               Di Yuk Donasi.com ada jutaan <strong>#Orangbaik</strong> yang
               berdonasi ke segala jenis galang dana tiap harinya, yuk jadikan
               kamu <strong>#Orangbaik</strong> selanjutnya!
             </p>

             <a href="#" class="btn btn-primary btn-lg fw-normal fs-6 py-3">
               Mulai Donasi Sekarang →
             </a>
           </div>
         </div>
       </div>
     </div>
   </header>

   <section class="py-5 bg-white stats-section">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-lg-3 col-md-4 d-flex align-items-center">
           <h1 class="fw-bold text-dark me-3 display-5">12</h1>
           <div>
             <p class="text-secondary fs-6 mb-1">Tahun Berpengalaman</p>
             <p class="text-secondary fs-6 mb-0">Dalam Campaign</p>
           </div>
         </div>
         <div class="col-lg-3 col-md-4 d-flex align-items-center">
           <h1 class="fw-bold text-dark me-3 display-5">45K</h1>
           <div>
             <p class="text-secondary fs-6 mb-1">Volunter yang Aktif</p>
             <p class="text-secondary fs-6 mb-0">Sampai Saat Ini</p>
           </div>
         </div>
         <div class="col-lg-3 col-md-4 d-flex align-items-center">
           <h1 class="fw-bold text-dark me-3 display-5">{{\App\Models\Campaign::count()}}</h1>
           <div>
             <p class="text-secondary fs-6 mb-1">Campaign yang</p>
             <p class="text-secondary fs-6 mb-0">Telah Berlangsung</p>
           </div>
         </div>
       </div>
     </div>
   </section>

   <section
     class="py-5 bg-white"
     style="margin-top: 50px; margin-bottom: 75px">
     <div class="container">
       <h2 class="text-center fw-bold mb-3">
         Campaign yang Sedang Berlangsung Saat Ini
       </h2>
       <p class="text-center text-secondary mb-5">
         Pilih salah satu campaign dan mulai donasi pertamamu!
       </p>

       <div class="row mt-4">
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
         </div>
       </div>
     </div>
   </section>

   <section class="donation-section container">
     <div class="text-center">
       <h2 class="donation-title mb-3">Bagaimana Saya Bisa Memulai Donasi?</h2>
       <p class="donation-subtitle">
         Yuk Mulai Donasi Pertamamu dengan mengikuti <br />langkah-langkah
         berikut ini!
       </p>
     </div>
     <div class="row align-items-center">
       <div class="col-md-6">
         <div class="donation-img">
           <img src="{{asset('assets/image/vid.png')}}" class="img-fluid" alt="Donasi" />
           <div class="play-button">
             <a href="#" class="text-decoration-none"><span>&#9658;</span></a>
           </div>
         </div>
       </div>
       <div class="col-md-6">
         <div class="d-flex align-items-start mb-4">
           <div
             class="step-number d-flex align-items-center justify-content-center">
             1
           </div>
           <div class="ms-3">
             <p class="step-title">Buat Akunmu</p>
             <p class="text-muted">
               Kamu perlu membuat akun terlebih dahulu <br />
               sebelum memulai donasi kamu.
             </p>
           </div>
         </div>
         <div class="d-flex align-items-start mb-4">
           <div
             class="step-number d-flex align-items-center justify-content-center">
             2
           </div>
           <div class="ms-3">
             <p class="step-title">Pilih Campaign</p>
             <p class="text-muted">
               Setelah membuat akun, kamu bisa memilih <br />
               campaign mana yang ingin kamu beri donasi.
             </p>
           </div>
         </div>
         <div class="d-flex align-items-start">
           <div
             class="step-number d-flex align-items-center justify-content-center">
             3
           </div>
           <div class="ms-3">
             <p class="step-title">Mulai Donasi</p>
             <p class="text-muted">
               Kemudian kamu bisa mulai berdonasi <br />
               sebesar apapun yang kamu mau.
             </p>
           </div>
         </div>
       </div>
     </div>
   </section>

   <section
     class="quote-section d-flex align-items-center justify-content-center text-center text-white">
     <div class="container position-relative">
       <h5 class="quote-badge fs-5 mb-3">Kata Kata Hari Ini</h5>
       <blockquote class="quote-text fs-1">
         “Berbagi dengan orang lain adalah <br />
         bentuk terbaik mensyukuri apa yang <br />
         telah kita dapatkan”
       </blockquote>
     </div>
   </section>

   <section class="py-5">
     <div class="container text-start">
       <h2 class="fw-bold text-center" style="margin-bottom: 80px">
         Artikel Terbaru Kami
       </h2>

       <div class="row justify-content-center">
         <!-- Card 1 -->
         @foreach ($articles as $article)
         <div class="col-md-4">
           <a href="{{route('article.show', $article->slug)}}" class="card shadow-sm h-100" style="text-decoration: none">
             <img
               src="{{asset('storage/'.$article->thumbnail)}}"
               class="card-img-top img-article"
               alt="{{$article->title}}" />
             <div class="card-body">
               <small class="text-muted">{{$article->articleCategory->title}}</small>
               <h5 class="mt-2 fw-bold">
                 {{$article->title}}
               </h5>
             </div>
           </a>
         </div>

         @endforeach
       </div>

       <!-- Donasi Section -->
       <div
         class="d-flex align-items-center justify-content-between"
         style="margin-top: 140px">
         <p class="fw-bold mb-0 fs-1">
           Yuk mulai donasi pertama kamu <br />
           di YukDonasi.com
         </p>
         <div class="d-flex">
           <input
             type="email"
             class="form-control me-2"
             placeholder="Enter your email"
             style="width: 300px; height: 50px" />
           <button class="btn btn-primary">Daftar Sekarang →</button>
         </div>
       </div>
     </div>
   </section>
