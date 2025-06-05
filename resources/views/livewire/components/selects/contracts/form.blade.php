<div class="d-flex col-md-12 col-xl-8 align-items-end px-4">
    <label for="firstName" class="col-md-4 form-label text-nowrap mt-2 text"></label>
    <div class="col-md-5">
        <select wire:model.live="contractor_id" class="form-control form-select form-select-sm"
                data-placeholder="Choose one">
            @foreach($response->contractors as $itemContract)
                <option value="{{ $itemContract['value'] }}" @if(isset($contract_id) && $contract_id == $itemContract['value']) selected @endif>{{ $itemContract['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>
