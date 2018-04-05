@extends ('backend.master')
@section ('back',route('admin.mail'))
@section ('title','List Mail')
@section ('controller','Mail')
@section ('action','List')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">List Mail</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<table class="table table-bordered table-hover datatable-button-init-basic">
			<thead>
				<tr>
					<th width="80px">ID</th>
					<th>Subject</th>
					<th>To</th>
					<th width="200px">Sent By</th>
					<th width="200px">Created At</th>
					<th width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($email as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item["subject"] }}</td>
					<td><a href="mailto:{{ $item["to"] }}" target="_top">{{ $item["to"] }}</a></td>
					@if (empty($item["user"]["firstname"]) && empty($item["user"]["lastname"]))
						<td>Unknown</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $item["user"]["id"]]) }}" target="_blank">{{ $item["user"]["firstname"] . ' ' . $item["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-danger-600"><a href="{{ route('admin.mail.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection