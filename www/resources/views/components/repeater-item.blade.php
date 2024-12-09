@props([
    'type_view' => null,
    'canEdit' => true,
])

<div class="repeater-item d-flex align-items-center justify-content-between p-6 border custom-border-color {{$class??''}}">
    
    {{$slot}}
    
    @if($canEdit)
    <div class="">
        <a href="javascript:;" class="delete-item btn btn-sm font-weight-bolder btn-light-danger">
            <i class="la la-trash-o"></i>Excluir
        </a>
    </div>
    @endif
</div>
