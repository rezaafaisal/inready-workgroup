@extends('layouts.admin')
@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('body')
@php
    $structure = new App\Models\Structure();
@endphp
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Badan Pengurus Organisasi Periode</h3>
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
                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
                        @foreach ($data['division'] ?? [] as $i => $division)
                        <div class="card">
                            <div class="card-header" id="headingThree3_{{ $i }}">
                                <div class="card-title collapsed" data-toggle="collapse"
                                    data-target="#collapseThree3_{{ $i }}">
                                    {{ $division->division }}
                                </div>
                            </div>
                            <div id="collapseThree3_{{ $i }}" class="collapse" data-parent="#accordionExample3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex" style="gap:5px">

                                            @php
                                            // data bpo member by division
                                            $bpo_members = $structure::where([
                                                    'type' => 'bpo',
                                                    'period_id' => $data['latest']->id,
                                                    'division' => $division->division,
                                                ])->orderBy('position')->get();

                                                // data to set select
                                                $current_bpo = [
                                                    'division' => $division->division,
                                                    'leader' => [
                                                        'name' => $structure->where([
                                                            'division' => $division->division,
                                                            'position' => 'leader'
                                                        ])->first()->user->name,
                                                        'id' => $structure->where([
                                                            'division' => $division->division,
                                                            'position' => 'leader'
                                                        ])->first()->user_id
                                                    ],
                                                    'members' => $structure->where([
                                                        'division' => $division->division,
                                                        'position' => 'member'])->get()->map(function($row){
                                                            return [
                                                                'name' => $row->user->name,
                                                                'id' =>  $row->user_id
                                                            ];
                                                    })->toArray()
                                                ];
                                            @endphp
                                            
                                            <button data-toggle="modal" data-target="#set_division" onclick="setBpo('{{ json_encode($current_bpo) }}', '{{ $division->division }}')" class="btn btn-sm btn-outline-primary">Perbarui</button>
                                            <button class="btn btn-sm btn-outline-danger">Hapus Divisi</button>
                                        </div>
                                    </div>
                                    @foreach($bpo_members ?? [] as $i => $bpo_member)
                                        <div class="d-flex align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-white mr-5">
                                                <img src="{{ asset('profiles/'.$bpo_member->user?->profile->image ?? 'profiles/user.png') }}"
                                                    class="symbol-label" style="object-fit: cover" alt="">
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                <span class="text-dark text-hover-primary mb-1 font-size-lg">
                                                    <span>{{ $bpo_member->user?->name ?? 'Belum ditentukan' }}</span>
                                                    @if ($bpo_member->position == 'leader')
                                                        <span class="label label-inline label-light-info ml-4">Kepala</span>
                                                    @endif
                                                </span>
                                                <span class="text-muted">{{ $bpo_member->position == 'leader' ? 'Ketua Divisi' : 'Anggota' }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($data['bpo']?->count() == 0)
                        ksoong aokwaokw
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal create new division --}}
<x-modal target="create_division" title="Tambahkan Divisi BPO">
    <form id="create_division_form" action="{{ route('admin.structure.bpo.createDivision') }}"
        method="POST">
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <div class="form-group">
            <label for="division" class="form-label">Nama Divisi</label>
            <input type="text" name="division" id="division"
                class="form-control @error('division') is-invalid @enderror" placeholder="Wakil Ketua 1">
            @error('division')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Kepala Divisi</label>
            <select name="elder" id="elder" style="width: 100%;" class="form-control select2" autofocus>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Anggota Divisi</label>
            <select name="members[]" id="member" multiple="multiple" style="width: 100%;" class="form-control select2" autofocus>
            </select>
        </div>
    </form>
</x-modal>


{{-- modal set division --}}
<x-modal target="set_division" title="Perbarui Divisi BPO">
    <form id="set_division_form" action="{{ route('admin.structure.bpo.setDivision') }}"
        method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <input type="hidden" name="old_division" id="old_division">
        <div class="form-group">
            <label for="division" class="form-label">Nama Divisi</label>
            <input type="text" name="division" id="division"
                class="form-control @error('division') is-invalid @enderror" placeholder="Wakil Ketua 1">
            @error('division')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="set_leader" class="form-label">Kepala Divisi</label>
            <select name="leader" id="set_leader" style="width: 100%;" class="form-control select2" autofocus>
            </select>
        </div>
        <div class="form-group">
            <label for="set_member" class="form-label">Anggota Divisi</label>
            <select name="members[]" id="set_member" multiple="multiple" style="width: 100%;" class="form-control select2" autofocus>
            </select>
        </div>
    </form>
</x-modal>

{{-- form destroy --}}
<form action="{{ route('admin.structure.bph.destroyDivision') }}" method="post" id="destroy_form">
    @csrf
    @method('DELETE')
    <input type="hidden" name="destroy_id" id="destroy_id">
</form>

@endsection
@section('scripts')
<x-datatable-script />
<script>
    $('#table').DataTable()
</script>
@php($current = $data['current'])
    <script>
        $(document).ready(function () {
            const route = "{{ route('admin.structure.bpo.index') }}"
            $period = $('#periods')
            $period.change(() => {
                window.location.href = route + '/' + $period.val()
            })

            $('.select2').select2({
                placeholder: "Pilih pengurus",
                ajax: {
                    url: "{{ route('admin.structure.bph.search', ['period' => $current]) }}",
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

            $('#submit_modal_create_division').click(() => {
                $('#create_division_form').submit()
            })

            $('#submit_modal_set_division').click(() => {
                $('#set_division_form').submit()
            })
        });

        // set division function
        function setBpo(data, division){
            const leader = JSON.parse(data).leader;
            const members = JSON.parse(data).members;

            // set division
            $('#set_division_form #division').val(division)
            $('#set_division_form #old_division').val(division)
            
            // set leader
            let $option_lead = $("<option selected></option>").val(leader.id).text(leader.name);
            $('#set_leader').append($option_lead).trigger('change');

            // set member
            members.forEach(element => {
                let $option_members = $("<option selected></option>").val(element.id).text(element.name);
                $('#set_member').append($option_members).trigger('change');
            })
        }

        // confirm delete division function
        function confirmDelete(id) {
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi Hapus',
                text: 'Tindakan ini tidak dapat dibatalkan, yakin hapus?',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#F54E60',
                cancelButtonColor: '#3185D6',
            }).then((e) => {
                if (e.isConfirmed) {
                    $('#destroy_id').val(id)
                    $('#destroy_form').submit()
                }
            })
        }

    </script>
    @endsection
