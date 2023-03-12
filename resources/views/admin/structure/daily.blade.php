@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Badan Pengurus Harian Periode</h3>
                        <select name="" id="periods" class="form-control" style="width:130px">
                            @foreach($data['period'] as $item)
                                <option
                                    {{ $data['current'] == $item->year ? 'selected' : '' }}
                                    value="{{ $item->year }}">{{ $item->period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-toolbar">
                        <button id="" data-toggle="modal" data-target="#create_division"
                            class="btn btn-primary font-weight-bolder">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($data['bph']?->count() == 0)
                        ksoong aokwaokw
                    @endif
                    @foreach($data['bph'] ?? [] as $bph)
                        <div class="d-flex align-items-center mb-10">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40 symbol-light-white mr-5">
                                <img src="{{ asset('profiles/'.$bph->user?->profile->image ?? 'profiles/user.png')}}" class="symbol-label"
                                    style="object-fit: cover" alt="">
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                <span class="text-dark text-hover-primary mb-1 font-size-lg">
                                    <span>{{ $bph->user?->name ?? 'Belum ditentukan' }}</span>
                                    {{-- @if ($dpo->position == 'leader') --}}
                                    {{-- <span class="label label-inline label-light-info ml-4">Ketua</span> --}}
                                    {{-- @endif --}}
                                </span>
                                <span class="text-muted">{{ $bph->division }}</span>
                            </div>
                            <!--end::Text-->

                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                data-placement="left" aria-describedby="tooltip352885">
                                <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-220px, 30px, 0px);"
                                    x-placement="bottom-end">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-header font-weight-bold py-4">
                                            <span class="font-size-lg">Pilih Tindakan</span>
                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                                data-placement="right" title=""
                                                data-original-title="Click to learn more..."></i>
                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span
                                                        class="label label-xl label-inline label-light-success">Ubah</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span
                                                        class="label label-xl label-inline label-light-danger">Hapus</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal create new division --}}
<x-modal target="create_division" title="Tambahkan Divisi BPH">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="division" class="form-label">Nama Divisi</label>
            <input type="text" name="division" id="division" class="form-control" placeholder="Wakil Ketua 1">
        </div>
    </form>
</x-modal>




<x-modal target="dpo_modal" title="Tambahkan Pembina">
    <form id="create_form" action="{{ route('admin.structure.bph.create') }}" method="post">
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <div class="form-group">
            <label for="leader" class="form-label">Ketua Umum</label>
            <select name="leader" id="leader" style="width: 100%;" class="form-control select2">
            </select>
        </div>
        <div class="form-group">
            <label for="secretary" class="form-label">Sekretaris Umum</label>
            <select name="secretary" id="secretary" style="width: 100%;" class="form-control select2">
            </select>
        </div>
        <div class="form-group">
            <label for="treasurer" class="form-label">Bendahara Umum</label>
            <select name="treasurer" id="treasurer" style="width: 100%;" class="form-control select2">
            </select>
        </div>
    </form>
</x-modal>
{{-- @php
    $dpo_lead = $data['dpo_lead'];
    $dpo_members = $data['dpo_options'];
    // dd($dpo_members);
@endphp--}}
@endsection
@section('scripts')
<x-datatable-script />
<script>
    $('#table').DataTable()
</script>
{{-- @if($dpo_members != null || $dpo_lead != null) --}}
<script>
    // set leader
    const data_lead = ''
    const lead = JSON.parse(data_lead)
    let $option_lead = $("<option selected></option>").val(lead.id).text(lead.name);
    $('#dpo_lead').append($option_lead).trigger('change');

</script>
{{-- @endif --}}
<script>
    $(document).ready(function () {
        const route = "{{ route('admin.structure.bph.index') }}"
        $period = $('#periods')
        $period.change(() => {
            window.location.href = route + '/' + $period.val()
        })

        $('.select2').select2({
            placeholder: "Select an option",
            ajax: {
                url: "{{ route('admin.structure.bph.search') }}",
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
