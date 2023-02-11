<div>
    <form id="delete_form" action="{{ $action }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="">
    </form>
    <script>
        function delete_data(data) {
            const input = $('#delete_form input[name="id"]');
            Swal.fire({
                icon: 'warning',
                title: 'Yakin Hapus?',
                text: 'Data akan dihapus permanen',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#F64E60',
                cancelButtonColor: '#1BC5BD',
                reverseButtons: true
            }).then((e) => {
                if (e.isConfirmed) {
                    input.val(data.id);
                    $('#delete_form').submit()
                }
            })
        }

    </script>
</div>
