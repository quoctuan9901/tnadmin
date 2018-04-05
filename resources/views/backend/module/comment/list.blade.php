@extends ('backend.master')
@section ('back',route('admin.comment'))
@section ('title','List Comment')
@section ('controller','Comment')
@section ('action','List')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">List Comment</h5>
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
					<th>Comment</th>
					<th>Reply For</th>
					<th>Title</th>
					<th width="200px">Created By</th>
					<th width="200px">Created At</th>
					<th width="120px">Status</th>
					<th width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($comment as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>

					@if ($item["parent_id"] == 0)
						<td><a class="text-danger-600" href="{{ route('admin.comment.getReply',['id' => $item["id"]]) }}" target="_blank">{!! $item["comment"] !!}</a></td>
					@else
						<td>{!! $item["comment"] !!}</td>
					@endif

					@if ($item["parent_id"] == 0)
						<td>No Comment</td>
					@else
						@php
						$comment_root = \DB::table("comment")->select('id','comment')->where('id',$item["parent_id"])->first();
						@endphp
						<td><a href="{{ route('admin.comment.getReply',['id' => $comment_root->id]) }}" target="_blank">{{ $comment_root->comment }}</a></td>
					@endif	
					
					@php
						$article = \DB::table($item["table_name"])
								->select('id','title')
								->where("id" ,'=',$item["table_id"])->first();
					@endphp
					<td><a href="{{ route('admin.'.$item["table_name"].'.edit',['id' => $article->id]) }}" target="_blank">{{ $article->title }}</a></td>
					
					@if (empty($item["user"]["firstname"]) && empty($item["user"]["lastname"]))
						<td>Unknown</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $item["user"]["id"]]) }}" target="_blank">{{ $item["user"]["firstname"] . ' ' . $item["user"]["lastname"] }}</a></td>
					@endif

					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="comment" data-col="status" data-id="{{ $item["id"] }}" {{ ($item["status"] == "on") ? "checked" : "" }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-danger-600"><a href="{{ route('admin.comment.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection