<div>
    <div class="modal fade" id="{{ $target }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="submit_modal_{{ $target }}" class="btn btn-primary font-weight-bold">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
