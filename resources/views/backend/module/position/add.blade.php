@extends ('backend.master')
@section ('back',route('admin.position'))
@section ('title','Add Position')
@section ('controller','Position')
@section ('action','Add')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.position')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Position</h6>
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
					<input type="text" id="name-slug" name="txtName" class="form-control" placeholder="Please Enter Position Name" value="{{ old('txtName') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Width (Unit Pixels : px)</label>
					<input type="text" name="txtWidth" class="form-control" placeholder="Please Enter Position Width" value="{{ old('txtWidth') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Height (Unit Pixels : px)</label>
					<input type="text" name="txtHeight" class="form-control" placeholder="Please Enter Position Height" value="{{ old('txtHeight') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link </label>
					<input type="text" name="txtLink" class="form-control" placeholder="Please Enter Position Link" value="{{ old('txtLink') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Status Position</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch" checked="checked" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Position</h6>
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
					<label class="control-label">Position Parent</label>
					<select name="sltParent" class="form-control">
						<option value="0">---------------- ROOT ----------------</option>
						@php recursionSelect($parent,old('sltParent')) @endphp
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Main Image</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage') ? old('txtImage') :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage') ? old('txtImage') :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Remove Image</button>
					</center><br />
					<label class="control-label">Alt Image</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Please Enter Alt For Image" value="{{ old('txtAlt') }}" />
				</div>
			</div>
		</div>
	</div>

	@include ('backend.blocks.button_bottom',['exit' => route('admin.position')])
</form>
@endsection