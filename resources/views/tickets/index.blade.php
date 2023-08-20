<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Tickets') }}
		</h2>
	</x-slot>

	@foreach ($tickets as $ticket)
		<div class="py-2">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						Name: {{ $ticket->name }}<br />
						Phone: {{ $ticket->phone }}<br />
						Address: <a href={{ $ticket->google_maps_link }}"
							target="_blank">{{ $ticket->address }}</a><br />
						Condition: {{ $ticket->condition }}<br />
						Notes: {{ $ticket->notes }}
					</div>
				</div>
			</div>
		</div>
	@endforeach

</x-app-layout>
