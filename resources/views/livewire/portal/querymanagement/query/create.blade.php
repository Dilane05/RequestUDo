<div wire:ignore.self class="modal side-layout-modal fade" id="CreateQueryModal" data-bs-backdrop="static"  tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ __('Create new Query') }}</h1>
                        <p>{{ __('Create a new Query') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit.prevent="store">

                        <hr class="p-0 mt-2 mb-2">

                        <div class="form-group mb-2 row">
                            <div class='col-md-5 col-xs-12'>
                                <label for="name">{{ __('Name') }}</label>
                                <input wire:model="name" name="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="" required="" name="name" disabled>
                            </div>
                            <div class='col-md-5 col-xs-12'>
                                <label for="registration_number">{{ __('Registration Number') }}</label>
                                <input wire:model="registration_number" name="registration_number" type="text" class="form-control  @error('registration_number') is-invalid @enderror" placeholder="" required="" name="registration_number" disabled>
                            </div>
            
                            <div class='col-md-2 col-xs-12'>
                                <label for="level">{{ __('Level') }}</label>
                                <input wire:model="level" name="last_name" type="text" class="form-control  @error('level') is-invalid @enderror" placeholder="" required="" name="level" disabled>
                            </div>
                        </div>

                        <div class="form-group mb-2 row">
                            <div wire:ignore class="col-md-5">
                                <label for="type_query_id">{{ __('Type Query') }}</label>
                                
                                <select wire:model="type_query_id" name="type_query_id"
                                                class="form-select  @error('type_query_id') is-invalid @enderror">
                                                <option value="">{{ __('--Select Type Query--') }}</option>
                                @foreach ($type_queries as $type_query)
                                <option value="{{ $type_query->id }}">{{ $type_query->label }}
                                </option>
                                @endforeach
                                </select>
                                @error('type_query_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col-md-2 col-xs-12'>
                                <label for="validity">{{ __('Validity') }}</label>
                                <input wire:model="validity" name="validity" type="text"
                                    class="form-control  @error('validity') is-invalid @enderror" placeholder=""
                                    required="" name="validity" disabled>
                                @error('validity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div wire:ignore class="col-md-5">
                                <label for="teaching_unit_id">{{ __('Teaching Unit') }}</label>
                                
                                <select wire:model="teaching_unit_id" name="type_query_id"
                                                class="form-select  @error('teaching_unit_id') is-invalid @enderror">
                                                <option value="">{{ __('--Select Teaching Unit--') }}</option>
                                @foreach ($teaching_units as $teaching_unit)
                                <option value="{{ $teaching_unit->id }}">{{ $teaching_unit->name }}
                                </option>
                                @endforeach
                                </select>
                                @error('teaching_unit_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content Query</label>
                            <textarea wire:model="content_query" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('content_query')
                                    <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end my-2">
                            <button type="button" wire:click="clearFields()"
                                class="btn btn-sm text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" wire:click.prevent="store"
                                class="btn btn-primary btn-sm btn-loading">{{ __('create') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
