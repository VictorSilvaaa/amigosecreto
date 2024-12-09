@extends('layout')

@section('header')
    <a href="{{ url()->previous() }}">
        <img src="{{ asset('assets/imgs/icons/arrow_back.svg') }}" alt="Voltar">
    </a>
@endsection

@section('content')
<section class="group-create">
    <form class="group-create__form" action="{{ route('group.store') }}" method="POST">
        @csrf
        <h2 class="group-create__title">Criar Amigo Secreto</h2>

        <!-- Nome do Grupo -->
        <div class="group-create__form-group form-group">
            <label class="group-create__label" for="name">Nome do Grupo:</label>
            <input class="group-create__input" type="text" id="name" name="name" required>
        </div>

        <!-- Participantes -->
        <div id="participants" class="group-create__form-group form-group">
            <label class="group-create__label">Participantes:</label>
            <x-form-repeat name="Participante" excludeLastItem="false" exclusiveSelection="true" canEdit="true" :initVisibleOption="false">
                <x-repeater-item canEdit="true">
                    <div class="group-create__participant">
                        <input class="group-create__participant-input" type="text" name="participants[]" placeholder="Nome do participante" required>
                    </div>
                </x-repeater-item>
            </x-form-repeat>            
        </div>

        <button type="submit" class="group-create__submit">Criar Grupo</button>
    </form>
</section>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
    <script>
        const btnAdd = document.getElementById('participants');
        const btnRemove = document.querySelectorAll('participants');
        const participantsContainer = document.getElementById('participants');
    </script>
@endsection
