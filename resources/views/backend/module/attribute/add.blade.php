@extends ('backend.master')
@section ('back',route('admin.attribute'))
@section ('title','Add Attribute')
@section ('controller','Attribute')
@section ('action','Add')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.attribute')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Attribute</h6>
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
					<label class="control-label">Name <span class="text-danger">*</span></label>
					<input type="text" id="name-slug" name="txtName" class="form-control" placeholder="Please Enter Attribute Name" value="{{ old('txtName') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Description</label>
					<textarea name="txtDescription">{{ old('txtDescription') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtDescription', { height: '400px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Attribute</h6>
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
					<label class="control-label">Attribute Parent</label>
					<select name="sltParent" class="form-control">
						<option value="0">---------------- ROOT ----------------</option>
						@php recursionSelect($parent,old('sltParent')) @endphp
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Status Attribute</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch" checked="checked" />
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr />

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Attribute English</h6>
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
					<label class="control-label">Name <span class="text-danger">*</span></label>
					<input type="text" id="name-slug-en" name="txtNameEn" class="form-control" placeholder="Please Enter Attribute Name" value="{{ old('txtNameEn') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Description</label>
					<textarea name="txtDescriptionEn">{{ old('txtDescriptionEn') }}</textarea>
					<script type="text/javascript">
                        CKEDITOR.replace('txtDescriptionEn', { height: '400px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	@endif

</form>
@endsection