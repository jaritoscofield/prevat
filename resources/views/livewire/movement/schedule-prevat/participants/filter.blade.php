<div>
    <form wire:submit="submit" class="form-horizontal mt-2">
        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="form-group">
                    <label for="Busca" class="form-label">Busca</label>
                    <input wire:model="filter.search" class="form-control form-control">
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="form-group">
                    <label class="form-label">Empresas</label>
                    <x-select2 wire:model="filter.company_id" class="form-select select2 select2-show-search">
                        @foreach($response->companies as $itemCompany)
                            <option value="{{$itemCompany['value']}}" >  {{$itemCompany['label']}}  </option>
                        @endforeach
                    </x-select2>
                </div>
            </div>

            <div class="col-md-12 col-xl-2 align-content-end mb-1">
                <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary"> Buscar </button>
                <button wire:click="clearFilter()" class="btn btn-sm btn-default"> Limpar </button>
                </div>
            </div>
        </div>




    </form>
</div>
@section('scripts')

    <!-- SELECT2 JS -->
    <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- TIMEPICKER JS -->
    {{--    <script src="{{asset('build/assets/plugins/time-picker/jquery.timepicker.js')}}"></script>--}}
    {{--    <script src="{{asset('build/assets/plugins/time-picker/toggles.min.js')}}"></script>--}}

    <!-- FLATPICKER JS -->
    <script src="{{asset('build/assets/plugins/flatpickr/flatpickr.js')}}"></script>
    @vite('resources/assets/js/flatpickr.js')


    <!-- DATEPICKER JS -->
    {{--    <script src="{{asset('build/assets/plugins/spectrum-date-picker/spectrum.js')}}"></script>--}}
    <script src="{{asset('build/assets/plugins/spectrum-date-picker/jquery-ui.js')}}"></script>

@endsection
