@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Pembina Periode</h3>
                <select name="" id="periods" class="form-control" style="width:130px">
                    @foreach($data['period'] as $item)
                        <option {{ $data['current'] == $item->year ? 'selected' : '' }} value="{{ $item->year }}">{{ $item->period }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-toolbar">
                <button id="" data-toggle="modal" data-target="#elder_modal"
                    class="btn btn-primary font-weight-bolder">Perbarui</button>
            </div>
        </div>
        <div class="card-body">
            @if($data['elders'] != null)
                @foreach($data['elders'] as $elder)
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <img src="{{ asset('profiles/'.$elder->user->profile->image) }}"
                                class="symbol-label" style="object-fit: cover" alt="">
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $elder->user->name }}</span>
                            <span
                                class="text-muted">{{ $elder->user->profile->job ?? 'Pembina' }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                    <div class="alert-text">Belum ada data tersedia!</div>
                </div>
            @endif
        </div>
    </div>
</div>

<x-modal target="elder_modal" title="Tambahkan Pembina">
    <form id="create_form" action="{{ route('admin.structure.elder.create') }}" method="post">
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <div class="form-group">
            <select name="elders[]" id="elders_input" multiple="multiple" style="width: 100%;" class="form-control">
            </select>
        </div>
    </form>
</x-modal>
@php
    $elders = $data['elder_options']
@endphp
@endsection
@section('scripts')
<x-datatable-script />
<script>
    $('#table').DataTable()
</script>
@if ($elders != null)
    <script>
        const data = '{!! $elders !!}'
        if(data != null){
            const parse = JSON.parse(data)
            console.log('hai');
            parse.forEach(element => {
                // id.append(element.id)
                let $option = $("<option selected></option>").val(element.id).text(element.name);
                $('#elders_input').append($option).trigger('change');
            })
        }
    </script>
@endif
<script>
    $(document).ready(function () {
        const route = "{{ route('admin.structure.elder.index') }}"
        $period = $('#periods')
        $period.change(() => {
            window.location.href = route + '/' + $period.val()
        })


        

        $('#elders_input').select2({
            ajax: {
                url: "{{ route('admin.structure.elder.search') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    })



    $('#submit_modal_elder_modal').click(() => {
        $('#create_form').submit()
    })

</script>
@endsection
