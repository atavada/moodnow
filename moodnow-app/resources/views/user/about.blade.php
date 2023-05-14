@extends('layouts.master')

@section('content')
  <!-- page title -->
  <section class="page-title bg-primary position-relative">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="text-white font-tertiary">About MoodNow</h1>
        </div>
      </div>
    </div>
    <!-- background shapes -->
    <img src="{{ asset('kroos/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
    <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
    <img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
    <img src="{{ asset('kroos/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
    <img src="{{ asset('kroos/images/illustrations/leaf-yellow.png') }}" alt="illustrations" class="bg-shape-5">
    <img src="{{ asset('kroos/images/illustrations/dots-group-cyan.png') }}" alt="illustrations" class="bg-shape-6">
    <img src="{{ asset('kroos/images/illustrations/leaf-cyan-lg.png') }}" alt="illustrations" class="bg-shape-7">
  </section>
  <!-- /page title -->
  
  <!-- about -->
  <section class="section">
    <div class="container">
      <h3 class="font-tertiary mb-3">MoodNow is a website to intensify your mood </h3>
      <div class="content mt-5">
      <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{ asset('kroos/images/blog/mood.jpg') }}" alt="post-thumb" class="img-fluid rounded float-left mr-5 mb-4">
          </div>
          <div class="col-12 col-md-6">
            <p style="font-size: 20px;text-align: justify">MoodNow merupakan sebuah aplikasi yang berfungsi untuk mencatat
              suasana hati seseorang secara berkala. Aplikasi ini diharapkan dapat
              berguna bagi orang-orang yang sedang berjuang untuk memulihkan kondisi
              mental seperti depresi untuk dapat mengidentifikasi suasana hati mereka dari
              waktu ke waktu. Dengan melakukan tracking secara real-time, pengguna
              dapat mengetahui dan mengekspresikan perasaannya melalui color code
              yang disediakan.
              </p>
          </div>
          <div class="col-12">
            <blockquote>Semua hal yang telah kamu pendam tak akan hilang dengan sendirinya. Adakalanya semua hal yang 
              kamu pendam selama ini akan hilang ketika kamu berbagi cerita dan duka. Semuanya akan menjadi ceria ketika 
              matahari berbagi sinarnya, namun semua hilang padam ketika cahaya terbenam. 
            </blockquote>
          </div>
          <div class="col-12">
            <p style="font-size: 20px;text-align: justify">MoodNow berupa website yang secara spesifik dapat membantu dalam
              mengidentifikasi pemicu eksternal dan internal yang menyebabkan perubahan
              emosi dan suasana hati, mempelajari mengenai pengaruh faktor-faktor
              seperti tidur dan aktivitas sehari-hari lainnya, membantu untuk dapat
              mengendalikan suasana hati yang negatif dan perilaku yang tidak diinginkan,
              serta memberikan pemahaman yang lebih baik untuk menemukan pola
              perubahan suasana hati yang dirasakan. Kemudian website MoodNow juga
              memberikan opsi bagi pengguna untuk dapat berkonsultasi langsung atau
              hanya sekedar berbagi cerita kepada konsultan MoodNow atau yang kami
              sebut “Sobat MoodNow”.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /about -->

@endsection 