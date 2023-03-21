<div>
	<div class="card mb-2 shadow-sm">
		<div class="bg-holder bg-card" style="background-image:url({{ asset('img/icons/corner-5.png') }});"></div>
		<!--/.bg-holder-->
		<div class="py-2 px-2 position-relative">
			<div class="row align-items-sm-center pt-3">
				<div class="col-auto">
					<img src="{{ asset('img/icons/connect-circle.png') }}" alt="">
				</div>
				<div class="col">
					<div class="d-flex justify-content-between align-items-end">
						<div class="">
							<h4 class="mb-0 ">{{ __('All Requests Of Students') }}</h4>
						</div>
					</div>
					{{-- @hasrole('manager')
					@else --}}
					<div class='d-flex justify-content-between align-items-center mx-2 my-2'>
						

						<div>
							<strong><small class="badge rounded badge-soft-success false p-2 fs-0">{{__('Open')}}</small></strong>
						</div>
						<div>
							<strong><small class="badge rounded badge-soft-danger false p-2 fs-0">{{__('Closed')}}</small></strong>
						</div>

						<h2 class="fs-1 mb-3 mb-sm-0 text-primary">
						</h2>
						<h2 class="fs-1 mb-3 mb-sm-0 text-primary">
							<strong>{{ __('Not yet closed') }}</strong>
						</h2>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row g-3 mb-3">
		<div class="col-md-6 col-xxl-4">
			<div class="card h-md-100 ecommerce-card-min-width">
				<div class="card-header pb-0">
					<h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Total Requests') }}<span class="ms-1 text-400"></span></h6>
				</div>
				<div class="card-body d-flex flex-column justify-content-end">
					<div class="row">
						<div class="col">
							<p class="font-sans-serif lh-1 mb-1 fs-4 fw-semibold text-primary">
                              {{-- {{$total_request}} --}} 145
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xxl-4">
			<div class="card h-md-100">
				<div class="card-header pb-0">
					<h6 class="mb-0 mt-2">{{ __('Request Processed') }}</h6>
				</div>
				<div class="card-body d-flex flex-column justify-content-end">
					<div class="row justify-content-between">
						<div class="col-auto align-self-end">
							<div class="fs-2 fw-normal font-sans-serif text-700 lh-1 mb-1">
                                45
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xxl-4">
			<div class="card h-md-100 ecommerce-card-min-width">
				<div class="card-header pb-0">
					<h6 class="mb-0 mt-2 d-flex align-items-center">{{ __('Unprocessed Requests') }}<span class="ms-1 text-400"></span></h6>
				</div>
				<div class="card-body d-flex flex-column justify-content-end">
					<div class="row">
						<div class="col">
							<p class="font-sans-serif lh-1 mb-1 fs-2"> 
                                100
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
							<th scope="col">{{ __('code') }}</th>
							<th scope="col">{{ __('type query') }}</th>
							<th scope="col">{{ __('teaching unit') }}</th>
							<th scope="col">{{ __('description') }}</th>
							<th scope="col">{{ __('answer') }}</th>
							<th class="text-end" scope="col">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody class="px-5">
						@forelse ($queries as $query)
						<tr class="align-middle">
							<td class="text-nowrap">{{ $query->code }}</td>
							<td class="text-nowrap">{{ $query->type_query->label }}</td>
							<td class="text-nowrap">{{ $query->teaching_unit->name }}</td>
							<td class="text-nowrap">{{ $query->description }}</td>
							<td class="text-nowrap">
								@if (!empty($query->answers))
								  <span class="text-success"> {{$caution->query->answers}} </span>  
								@else
								   <span class="text-danger"> No Reponse Yet </span> 
								@endif
								{{-- {{ !empty($query->answers) ? ' | ' . $caution->query->answers : '' }} --}}
							</td>
							<td class="text-end">

								<a href='#' wire:click="initData({{ $query->id }})" data-bs-toggle="modal" data-bs-target="#EditQueryModal">
									{{-- <svg class="icon icon-xs text-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
										</path>
									</svg> --}}
									<span>edit</span>
								</a>


								<a href='#' wire:click="initData({{ $query->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal">
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