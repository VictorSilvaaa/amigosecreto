@props([
    'type_view' => null,
    'canEdit' => true,
])

<div class="repeater-item d-flex {{$class??''}}">
    
    {{$slot}}
    
    @if($canEdit)
    <div class="">
        <a href="javascript:;" class="delete-item btn btn-sm font-weight-bolder btn-light-danger">
            <img src="{{ asset('assets/imgs/icons/remove_icon.svg') }}" alt="Remover">
        </a>
    </div>
    @endif
</div>
