@extends ('backend.master')
@section ('back',route('admin.manufacturer'))
@section ('title','Add Manufacturer')
@section ('controller','Manufacturer')
@section ('action','Add')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.manufacturer')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Manufacturer</h6>
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
					<input type="text" name="txtName" class="form-control" placeholder="Please Enter Manufacturer Name" value="{{ old('txtName') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Website</label>
					<input type="text" name="txtWesbite" class="form-control" placeholder="Please Enter Manufacturer Webiste" value="{{ old('txtWesbite') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Address</label>
					<input type="text" name="txtAddress" class="form-control" placeholder="Please Enter Manufacturer Address" value="{{ old('txtWesbite') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Email</label>
					<input type="email" name="txtEmail" class="form-control" placeholder="Please Enter Manufacturer Email" value="{{ old('txtEmail') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Phone</label>
					<input type="text" name="txtPhone" class="form-control" placeholder="Please Enter Manufacturer Phone" value="{{ old('txtPhone') }}" />
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
				<h6 class="panel-title">Add Manufacturer</h6>
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
					<label class="control-label">Logo Manufacturer</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage') ? old('txtImage') :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage') ? old('txtImage') :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Remove Image</button>
					</center>
				</div>
			</div>
		</div>
	</div>

	<hr />

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Add Manufacturer English</h6>
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
					<input type="text" name="txtNameEn" class="form-control" placeholder="Please Enter Manufacturer Name" value="{{ old('txtNameEn') }}" />
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

	@include ('backend.blocks.button_bottom',['exit' => route('admin.manufacturer')])
</form>
@endsection