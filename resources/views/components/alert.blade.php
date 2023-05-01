
<div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session()->has('alert'))
    @php
        $value = session()->get('alert');
    @endphp
    <script>
        Swal.fire({
            icon: "{{ $value['icon'] }}",
            title: "{{ $value['title'] }}",
            text: "{{ $value['text'] }}"
        })
    </script>
    @php
        session()->forget('alert');
    @endphp
  
  @elseif(!$errors->isEmpty())
  <script>
      Swal.fire({
          icon: "error",
          title: "Gagal",
          text: "Terjadi Kesalahan",
      })
  </script>
  @endif
</div>