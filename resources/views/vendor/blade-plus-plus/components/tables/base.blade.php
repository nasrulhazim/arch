<div class="table-responsive">
	<table
		class="table {{ $table_class ?? '' }}" 
		id="{{ $table_id ?? 'table-id' }}">
		@isset($thead)
			<thead class="{{ $thead_class ?? '' }}">
				{{ $thead ?? '' }}
			</thead>
		@endisset

		@isset($tbody)
			<tbody class="{{ $tbody_class ?? '' }}">
				{{ $tbody ?? '' }}
			</tbody>
		@endisset

		@isset($tfoot)
			<tfoot class="{{ $tfoot_class ?? '' }}">
				{{ $tfoot ?? '' }}
			</tfoot>
		@endisset
	</table>
</div>