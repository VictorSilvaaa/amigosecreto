@extends('layout')

@section('content')


<section class="home">
    <h1 class="home__title">Sorteie, Divirta-se, <br> Surpreenda!</h1>

    <p class="home__subtitle">Organize seu Amigo Secreto de forma fácil e divertida, tudo em um só lugar.</p>


    <div class="home__options">
        <a class="button bg-primary" href="#">
            <div class="button__icon bg-primary-dark">
                <img src="{{ asset('assets/imgs/icons/glass.svg')}}" alt="">
            </div>
            <p class="button__text">Encontrar Grupo</p>
        </a>
    
        <a class="button bg-secondary" href="{{route('group.create')}}">
            <div class="button__icon bg-secondary-dark">
                <img src="{{ asset('assets/imgs/icons/present.svg')}}" alt="">
            </div>
            <p class="button__text">Criar Amigo Secreto </p>
        </a>
    </div>
    

    <div class="home__img">
        <img src="{{ asset('assets/imgs/img_home.svg') }}" alt="Home Background">
    </div>
</section>
@endsection




