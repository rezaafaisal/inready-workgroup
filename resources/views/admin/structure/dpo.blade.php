@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Dewan Pertimbangan Organisasi Periode</h3>
                <select name="" id="periods" class="form-control" style="width:130px">
                    @foreach($data['period'] as $item)
                        <option
                            {{ $data['current'] == $item->year ? 'selected' : '' }}
                            value="{{ $item->year }}">{{ $item->period }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-toolbar">
                <button id="" data-toggle="modal" data-target="#dpo_modal"
                    class="btn btn-primary font-weight-bolder">Perbarui</button>
            </div>
        </div>
        <div class="card-body">
            {{-- {{ dd($data['dpos']) }} --}}
            @if($data['dpos']?->count() > 0)
                @foreach($data['dpos'] as $dpo)
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <img src="{{ asset('profiles/'.$dpo->user->profile->image) }}"
                                class="symbol-label" style="object-fit: cover" alt="">
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark text-hover-primary mb-1 font-size-lg">
                                <span>{{ $dpo->user->name }}</span>
                                @if ($dpo->position == 'leader')
                                    <span class="label label-inline label-light-info ml-4">Ketua</span>
                                @endif
                        </span>
                            <span
                                class="text-muted">{{ $dpo->user->profile->job ?? 'Dewan Pertimbangan Organisasi' }}</span>
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

<x-modal target="dpo_modal" title="Tambahkan Pembina">
    <form id="create_form" action="{{ route('admin.structure.dpo.create') }}" method="post">
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <div class="form-group">
            <label for="dpo_lead" class="form-label">Ketua DPO</label>
            <select name="dpo_lead" id="dpo_lead" style="width: 100%;" class="form-control select2">
            </select>
        </div>
        <div class="form-group">
            <label for="dpo_members" class="form-label">Anggota DPO</label>
            <select name="dpos[]" id="dpo_members" multiple="multiple" style="width: 100%;"
                class="form-control select2">
            </select>
        </div>
    </form>
</x-modal>
@php
    $dpo_lead = $data['dpo_lead'];
    $dpo_members = $data['dpo_options'];
@endphp
@endsection
@section('scripts')
<x-datatable-script />
<script>
    $('#table').DataTable()
</script>
@if($dpo_members != null || $dpo_lead != null)
    <script>
        // set leader
        const data_lead = '{!! $dpo_lead !!}'
        const lead = JSON.parse(data_lead)
        let $option_lead = $("<option selected></option>").val(lead.id).text(lead.name);
        $('#dpo_lead').append($option_lead).trigger('change');

        // set member
        const data_member = '{!! $dpo_members !!}'
        const members = JSON.parse(data_member)
        members.forEach(element => {
            let $option_members = $("<option selected></option>").val(element.id).text(element.name);
            $('#dpo_members').append($option_members).trigger('change');
        })

    </script>
@endif
<script>
    $(document).ready(function () {
        const route = "{{ route('admin.structure.dpo.index') }}"
        $period = $('#periods')
        $period.change(() => {
            window.location.href = route + '/' + $period.val()
        })

        $('#dpo_lead').select2({
            placeholder: "Select an option",
            ajax: {
                url: "{{ route('admin.structure.dpo.search') }}",
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
        $('#dpo_members').select2({
            ajax: {
                url: "{{ route('admin.structure.dpo.search') }}",
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



    $('#submit_modal_dpo_modal').click(() => {
        $('#create_form').submit()
    })

</script>
@endsection
