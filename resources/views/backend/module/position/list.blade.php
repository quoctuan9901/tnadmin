@extends ('backend.master')
@section ('back',route('admin.position'))
@section ('title','List Position')
@section ('controller','Position')
@section ('action','List')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">List Position</h5>
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
					<th>Name</th>
					<th>Width</th>
					<th>Height</th>
					<th width="200px">Created By</th>
					<th width="200px">Created At</th>
					<th width="120px">Status</th>
					<th width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($position as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.position.edit',['id' => $item["id"]]) }}">{{ $item["name"] }}</a></td>
					<td>{{ $item["width"] }} {{ ($item["width"] == NULL ? "Auto" : "px") }}</td>
					<td>{{ $item["height"] }} {{ ($item["height"] == NULL ? "Auto" : "px") }}</td>
					@if (empty($item["user"]["firstname"]) && empty($item["user"]["lastname"]))
						<td>Unknown</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $item["user"]["id"]]) }}" target="_blank">{{ $item["user"]["firstname"] . ' ' . $item["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="position" data-col="status" data-id="{{ $item["id"] }}" {{ ($item["status"] == "on") ? "checked" : "" }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.position.edit',['id' => $item["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.position.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection