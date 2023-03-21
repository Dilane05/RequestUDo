<div wire:ignore.self class="modal side-layout-modal fade" id="EditTypeModal"  tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered " role="document" style="max-width:35%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ __('Edit  Type Query') }}</h1>
                        <p>{{ __('Edit Type Query') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit.prevent="update">

                        <hr class="p-0 mt-2 mb-2">

                        <div class="form-group mb-2 row">
                            <div class='col-md-12 col-xs-12'>
                                <label for="label">{{ __('Label') }}</label>
                                <input wire:model="label" name="label" type="text"
                                    class="form-control  @error('label') is-invalid @enderror"
                                    placeholder="Lack of Note" required="" name="label">
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class='col-md-12 col-xs-12'>
                                <label for="validity">{{ __('Validity') }}</label>
                                <input wire:model="validity" name="validity" type="text"
                                    class="form-control  @error('validity') is-invalid @enderror" placeholder="14 Days"
                                    required="" name="validity">
                                @error('validity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" wire:click="clearFields()"
                                class="btn btn-sm text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="update"
                                class="btn btn-primary btn-sm btn-loading">{{ __('update') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
