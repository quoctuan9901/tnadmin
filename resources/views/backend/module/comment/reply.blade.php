@extends ('backend.master')
@section ('back',route('admin.comment'))
@section ('title','Reply Comment')
@section ('controller','Comment')
@section ('action','Reply')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.comment')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Reply Comment</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Type</label>
					<input type="text" class="form-control" name="txtTableName" value="{{ $comment["table_name"] }}" readonly="true" />
				</div>
				<div class="form-group">
					<label class="control-label">Title</label>
					<input type="text" class="form-control" value="{{ $article->title }}" readonly="true" />
					<input type="hidden" class="form-control" name="txtTableId" value="{{ $comment["table_id"] }}" readonly="true" />
				</div>
				<div class="form-group">
					<label class="control-label">User Comment</label>
					<textarea class="form-control" readonly="true">{{ $comment["comment"] }}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">IP Comment</label>
					<textarea class="form-control" readonly="true">{{ $comment["ip_comment"] }}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">Reply Comment <span class="text-danger">*</span></label>
					<textarea name="txtReply">{{ old('txtReply') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtReply', { height: '200px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Reply Comment</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Like</label>
					<input type="text" name="txtLike" class="touchspin-basic" value="{{ old('txtLike',$comment["like"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Dislike</label>
					<input type="text" name="txtDislike" class="touchspin-basic" value="{{ old('txtDislike',$comment["dislike"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Report</label>
					<input type="text" name="txtReport" class="touchspin-basic" value="{{ old('txtReport',$comment["report"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Status Comment</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="comment" data-col="status" data-id="{{ $comment["id"] }}" {{ $comment["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.comment')])
</form>
@endsection