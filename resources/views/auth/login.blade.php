@extends('site.layouts.app')

@section('title', 'Login')

@section('styles')

@endsection

@section('content')


    <section class="page-header page-header--bg-two"  data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="page-header__bg jarallax-img"></div>
        <div class="page-header__overlay"></div>
        <div class="container text-center">
            <h2 class="page-header__title">Login</h2>
        </div>
    </section>
    <section class="contact-one">
        <div class="container wow fadeInUp" data-wow-delay="300ms">
            <div class="section-title  text-center">
                    <span class="section-title__tagline" style=" font-weight: bold">
                       Acesso
                    </span>
                <h2 class="section-title__title">Insira seu email e senha abaixo para usar o sistema</h2>
            </div>
            <div class="contact-one__form-box  text-center">
                @livewire('site.auth.login')
            </div>
        </div>
    </section>
    <section class="contact-info">
        @livewire('site.help.card')
    </section>


@endsection

{{--@section('scripts')--}}

{{--@endsection--}}
