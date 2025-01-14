<div id="custom_repeater">
    <div class="form-group col">
        <label class="col-lg-2 col-form-label text-left">{{$title??''}}</label>
        <div class="repeater-list col-lg-10">
            {{$slot}}
        </div>
    </div>
    @if($canEdit??true)
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right"></label>
            <div class="col-lg-4">
                <button id="add-item" class="btn btn-sm font-weight-bolder btn-light-primary">
                    <img src="{{ asset('assets/imgs/icons/add_icon.svg') }}" alt="Remover">
                </button>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        const excludeLastItem = {{ $excludeLastItem ?? 'true' }}; // variável para ocultar o último item
        const initVisibleOption = "{{ $initVisibleOption ?? 'true' }}"; // variável para ja iniciar com um repeat item
        const exclusiveSelection = "{{ $exclusiveSelection ?? 'false' }}"; // variável para select com opcoes unicas

        const firstItem = $('.repeater-item').first(); 
        firstItem.attr('style', 'display: none !important;'); 

        //exibe logo 1 item ao iniciar, caso esteja com essa opcao ativada
        if(initVisibleOption){
            let newItem = firstItem.clone(true, true);
            newItem.removeAttr('style'); 
            $('.repeater-list').append(newItem);
        }
        
        $('#add-item').on('click', function(event) {
            event.preventDefault();

            //clona e exibe novo item
            let newItem = firstItem.clone(true, true); 
            newItem.find('input').val(''); 
            newItem.find('select').val(''); 
            newItem.removeAttr('style'); 
            $('.repeater-list').append(newItem); 

            updateIndices(); 
            updateSelectOptions(); 
        });

        $(document).on('change', 'select', function() {
            updateIndices();
            updateSelectOptions(); 
        });

        $(document).on('changeRepeaterItem', function() {
            updateIndices();
            updateSelectOptions(); 
        });

        $(document).on('click', '.delete-item', function() {
            const closestRepeaterItem = $(this).closest('.repeater-item');
            if($('.repeater-item').length > 2){
                closestRepeaterItem.remove();
            }else if(excludeLastItem){
                closestRepeaterItem.remove(); 
            }else{
                alert('Você não pode excluir o último item.');
            }
            
            updateIndices();
            updateSelectOptions(); 
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            const firstItem = $('.repeater-item').first(); 
            firstItem.remove();

            $(this).off('submit').submit(); 
        });

        function updateSelectOptions() {
            if(exclusiveSelection){
                let selectedOptions = [];
                let allOptions = [];

                // Coleta as opções selecionadas
                $('.repeater-item select').each(function() {
                    let selectedValue = $(this).val();
                    if (selectedValue) {
                        selectedOptions.push(selectedValue);
                    }
                });

                // coletas as opcoes do repeat item base
                $('.repeater-item select').first().find('option').each(function() {
                    allOptions.push({
                        text: $(this).text(),
                        value: $(this).val()
                    });
                });

               
                $('.repeater-item select').each(function(index) {
                    let currentSelect = $(this);
                    let currentValue = currentSelect.val();

                    if (index !== 0) {
                        
                        //remove opcoes selecionadas em outros selects
                        currentSelect.find('option').each(function() {
                            let optionValue = $(this).val();
                            if (selectedOptions.includes(optionValue) && optionValue !== currentValue) {
                                $(this).remove();
                            }
                        });

                        //adiciona opcoes nao selecionas em outros selects
                        allOptions.forEach(function(option) {
                            if (!selectedOptions.includes(option.value) && 
                                currentSelect.find('option[value="' + option.value + '"]').length === 0) {
                                currentSelect.append($('<option>', {
                                    value: option.value,
                                    text: option.text
                                }));
                            }
                        });
                    }
                });
            }
        }

        updateSelectOptions();
    });

    function updateIndices() {
        document.querySelectorAll('.repeater-item').forEach((item, i) => {
            item.querySelectorAll('select, input').forEach(field => {
                const name = field.getAttribute('name');
                if (name) {
                    const newName = name.replace(/\[\d+\]/, `[${i}]`);
                    field.setAttribute('name', newName);
                    field.id = newName;
                }
            });
        });
    }
</script>
@endpush
