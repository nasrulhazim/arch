<div class="modal fade" id="{{ $id ?? 'modal-id' }}" role="dialog" aria-labelledby="{{ $id ?? 'modal-id' }}ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $modal_size ?? 'modal-lg' }}" role="document">
        <div class="modal-content">
            @isset($modal_title)
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id ?? 'modal-id' }}ModalLongTitle">{{ $modal_title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endisset

            @isset($modal_body)            
                <div class="modal-body">
                    {!! $modal_body !!}
                </div>
            @endisset

            @isset($modal_footer)
                <div class="modal-footer">
                    {!! $modal_footer !!}
                </div>
            @endisset

        </div>
    </div>
</div>
