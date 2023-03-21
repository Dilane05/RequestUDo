<div class="mt-3">
       
    @include('livewire.portal.setup.type-query.create')
    @include('livewire.portal.setup.type-query.edit')
    @include('livewire.partials.delete-modal')
        <x-alert />
        <div class="card mb-2 shadow-sm">
            <div class="bg-holder bg-card" style="background-image:url({{ asset('img/icons/corner-5.png') }});"></div>
            <!--/.bg-holder-->
            <div class="py-2 px-2 position-relative">
                <div class="row g-2 align-items-sm-center">
                    <div class="col-auto">
                        <img src="{{ asset('/img/icons/connect-circle.png') }}" alt="" height="55">
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h4 class="mb-0 ">{{__('Type QUery')}} </h4>
                            </div>
                            <div class=" ms-auto">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#CreateTypeModal" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1 h-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                      </svg>
                                      
                                    <!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('New') }}</span>
                                </button>
                                <button class="btn btn-secondary btn-sm mx-1" type="button" data-bs-toggle="modal" data-bs-target="#ImportCautionsModal">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    <!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Import') }}</span>
                                </button>
                                <button wire:loading.remove wire:click="export()" class="btn btn-outline-secondary btn-sm mx-1" type="button">
                                    <svg class="icon icon-xs " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    <!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Export') }}</span>
                                </button>
                                <div class="text-center" wire:loading wire:target="export">
                                    <div class="text-center">
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='card mb-2 shadow-sm'>
            <div class="row py-3 px-3 ">
                <div class="col-md-3">
                    <label for="search">{{ __('Search') }}: </label>
                    <input wire:model="query" id="search" type="text" placeholder="{{ __('Search...') }}" class="form-control">
                    <p class="badge badge-info" wire:model=""></p>
                </div>
                <div class="col-md-3">
                    <label for="orderBy">{{ __('Order By') }}: </label>
                    <select wire:model="orderBy" id="orderBy" class="form-select">
                        <option value="patient_id">{{ __('Patient') }}</option>
                        <option value="service_id">{{ __('Service') }}</option>
                        <option value="caution_code">{{ __('Code') }}</option>
                        <option value="caution_deposited_by">{{ __('Deposited By') }}</option>
                        <option value="caution_amount">{{ __('Amount') }}</option>
                        <option value="created_at">{{ __('Created Date') }}</option>
                    </select>
                </div>
    
                <div class="col-md-3">
                    <label for="direction">{{ __('Order direction') }}: </label>
                    <select wire:model="orderAsc" id="direction" class="form-select">
                        <option value="asc">{{ __('Ascending') }}</option>
                        <option value="desc">{{ __('Descending') }}</option>
                    </select>
                </div>
    
                <div class="col-md-3">
                    <label for="perPage">{{ __('Items Per Page') }}: </label>
                    <select wire:model="perPage" id="perPage" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="25">50</option>
                        <option value="25">75</option>
                        <option value="25">100</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='card z-index-1 mb-3'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">{{ __('All Type Query') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 py-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-hover fs--1 table-striped overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th scope="col">{{ __('Label') }}</th>
                                <th scope="col">{{ __('Validity') }}</th>
                                <th class="text-end" scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="px-5">
                            @forelse ($types as $type)
                            <tr class="align-middle">
                                <td class="text-nowrap">{{ $type->label }}</td>
                                <td class="text-nowrap">{{ $type->validity }}</td>
                                <td class="text-end">
                                    <a href='#' wire:click="initData({{ $type->id }})" data-bs-toggle="modal" data-bs-target="#EditTypeModal">
                                        {{-- <svg class="icon icon-xs text-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg> --}}
                                        <span>edit</span>
                                    </a>
    
                                    <a href='#' wire:click="initData({{ $type->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
										<span>delete</span>
                                    </a>
    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div wire:loading.remove wire:target="query" class="text-center text-gray-800 mt-2">
                                        <h4 class="fs-1 fw-bold">{{ __('Opps nothing here') }} &#128540;</h4>
                                        <p>{{ __('No Record Found..!') }}</p>
                                    </div>
                                    <div class="text-center mt-2" wire:loading wire:target="query">
                                        <div class="text-center">
                                            <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                            <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                            <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                            <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-end">
                {{-- {{ $cautions->links() }} --}}
            </div>
        </div>
</div>
    {{-- @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.livewire.emit('show');
        });
        window.livewire.on('show', () => {
            $('#CreateCautionModal').modal('show');
        });
    </script>
    @endpush --}}