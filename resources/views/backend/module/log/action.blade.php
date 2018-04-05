@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Action User')
@section ('controller','Log')
@section ('action','Action User')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-body border-top-primary text-left">
		<a href="{{ route('admin.log.delete_all_action') }}" class="btn btn-danger"><i class="icon-trash"></i> Delete All ({{$totalLog}} Log)</a>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Action User</h5>
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
					<th>Title</th>
					<th width="200px">Action</th>
					<th width="200px">Controller</th>
					<th width="200px">Fullname</th>
					<th width="200px">Created At</th>
					<th width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($actions as $action)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{!! $action["title"] !!}</td>
					<td>{{ $action["action"] }}</td>
					<td>{{ $action["controller"] }}</td>
					<td>{{ $action["fullname"] }}</td>
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($action["created_at"]))->diffForHumans() }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-danger-600"><a href="{{ route('admin.log.delete_one_action',['id' => $action["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection