
@extends('webSite.master')

@section('title', 'timer | '. env('APP_NAME'))

@section('style')

@section('content')

<!--
==================================================
Slider Section Start
================================================== -->
<section id="hero-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="block wow fadeInUp" data-wow-delay=".3s">

          <!-- Slider -->
          <section class="cd-intro">
            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
              <span>HI, MY NAME IS JONATHON &amp; I AM A</span><br>
              <span class="cd-words-wrapper">
                <b class="is-visible">DESIGNER</b>
                <b>DEVELOPER</b>
                <b>FATHER</b>
              </span>
            </h1>
          </section> <!-- cd-intro -->
          <!-- /.slider -->
          <h2 class="wow fadeInUp animated" data-wow-delay=".6s">
            With 10 years experience, I've occupied many roles including digital design director,<br> web designer and
            developer. This site showcases some of my work.
          </h2>
          <a class="btn-lines dark light wow fadeInUp animated btn btn-default btn-green hvr-bounce-to-right"
            data-wow-delay=".9s" href="{{ route('webSite.work') }}" target="_blank"> Viwe Work </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#main-slider-->

<!--
==================================================
About Section Start
================================================== -->
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
          <h2>
            ABOUT ME
          </h2>
          <p>
            Hello, I’m a UI/UX Designer &amp; Front End Developer from Victoria, Australia. I hold a master degree of
            Web Design from the World University.And scrambled it to make a type specimen book. It has survived not only
            five centuries
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, adipisci voluptatum repudiandae, natus
            impedit repellat aut officia illum at assumenda iusto reiciendis placeat. Temporibus, vero.
          </p>
        </div>

      </div>
      <div class="col-md-6 col-sm-6">
        <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
          <img src="{{ asset('webSite/images/about/about.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</section> <!-- /#about -->


<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="works" class="works">
  <div class="container">
    <div class="section-heading">
      <h1 class="title wow fadeInDown" data-wow-delay=".3s">Latest Works</h1>
      <p class="wow fadeInDown" data-wow-delay=".5s">
        Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est.
        Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis
        lacus.
      </p>
    </div>
    <div class="row">

      @foreach ( $latest_work as $work )

      <div class="col-md-4 col-sm-6">
        <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
          <div class="img-wrapper"  >
            <img width="100%" src="{{ asset('uploads/works/'.$work->image) }}" class="img-fluid" alt="this is a title">
            <div class="overlay">
              <div class="buttons">
                <a rel="gallery" class="fancybox" href="{{ asset('webSite/images/portfolio/item-1.jpg') }}">Demo</a>
                <a target="_blank" href="single-portfolio.html">Details</a>
              </div>
            </div>
          </div>
          <figcaption>
            <h4>
              <a href="#">
                {{ $work->title }}
              </a>
            </h4>
            <p>
                {{ $work->content }}
            </p>
          </figcaption>
        </figure>
      </div>

      @endforeach

    </div>
  </div>
</section> <!-- #works -->
<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="feature">
  <div class="container">
    <div class="section-heading">
      <h1 class="title wow fadeInDown" data-wow-delay=".3s">Offer From Me</h1>
      <p class="wow fadeInDown" data-wow-delay=".5s">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed,<br> quasi dolores numquam dolor vero ex, tempora
        commodi repellendus quod laborum.
      </p>
    </div>

    <div class="row">
        @foreach ( $latest_offer as $offer )
        <div class="col-sm-6 col-lg-4">
            <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
              <div class="media-left">
                <div class="icon">
                  <i > <img src="{{ asset('uploads/offers/'.$offer->image) }}" class="img-fluid" alt="this is a title"> </i>
                </div>
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{ $offer->title }}</h4>
                <p>{{ $offer->content }}</p>
              </div>
            </div>
          </div>
        @endforeach

    </div>
  </div>
</section> <!-- /#feature -->

@section('script')

@stop
