@extends ('backend.master')
@section ('back',route('admin.category'))
@section ('title','Edit Category')
@section ('controller','Category')
@section ('action','Edit')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.category')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Edit Category</h6>
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
					<label class="control-label">Category Name <span class="text-danger">*</span></label>
					<input type="text" id="name-slug" name="txtName" class="form-control" placeholder="Please Enter Category Name" value="{{ old('txtName',$category["name"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Description</label>
					<textarea name="txtDescription">{{ old('txtDescription',$category["description"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtDescription', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Slug URL</label>
					<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Please Enter Slug URL" value="{{ old('txtSlug',$category["slug"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Title Tag (Ex : Primary Keyword - Secondary Keyword)</label>
					<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Please Enter Primary Keyword - Secondary Keyword (SEO)" value="{{ old('txtMetaTitle',$category["title_tag"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Meta Keywords</label>
					<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Please Enter Meta Keywords Tag (SEO)" value="{{ old('txtMetaKeywords',$category["meta_keywords_tag"]) }}" />
					<span class="help-block">Keywords not more that 10 words</span>
				</div>
				<div class="form-group">
					<label class="control-label">Meta Description</label>
					<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Please Enter Meta Description Tag (SEO)">{{ old('txtMetaDescription',$category["meta_description_tag"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Edit Category</h6>
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
					<label class="control-label">Category Parent</label>
					<select name="sltParent" class="form-control">
						<option value="0">---------------- ROOT ----------------</option>
						@php recursionSelect($parent,old('sltParent',$category["parent_id"]),$category["id"]) @endphp
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Category Position</label>
					<input type="text" name="txtCategoryPosition" class="touchspin-basic" value="{{ old('txtCategoryPosition',$category["position"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Access</label>
					<select name="sltAccess" class="form-control">
						<option value="0" {{ (old('sltAccess',$category["access"]) == '0') ? 'selected' : '' }}>Public</option>
						<option value="1" {{ (old('sltAccess',$category["access"]) == '1') ? 'selected' : '' }}>Admin</option>
						<option value="2" {{ (old('sltAccess',$category["access"]) == '2') ? 'selected' : '' }}>Member</option>
						<option value="3" {{ (old('sltAccess',$category["access"]) == '3') ? 'selected' : '' }}>Guest</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Target Open</label>
					<select name="sltTarget" class="form-control">
						<option value="_self" {{ (old('sltTarget',$category["target_open"]) == '_self') ? 'selected' : '' }}>The same frame (_self)</option>
						<option value="_blank" {{ (old('sltTarget',$category["target_open"]) == '_blank') ? 'selected' : '' }}>New window or tab (_blank)</option>
						<option value="_parent" {{ (old('sltTarget',$category["target_open"]) == '_parent') ? 'selected' : '' }}>The parent frame (_parent)</option>
						<option value="_top" {{ (old('sltTarget',$category["target_open"]) == '_top') ? "selected" : '' }}>The full body of the window (_top)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Meta Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot',$category["meta_robot"]) == 'noindex,follow') ? "selected" : '' }}>Noindex, Follow</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot',$category["meta_robot"]) == 'index,nofollow') ? "selected" : '' }}>Index, Nofollow</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot',$category["meta_robot"]) == 'noindex,nofollow') ? "selected" : '' }}>Noindex, Nofollow</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Main Image</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$category["image"]) ? old('txtImage',$category["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$category["image"]) ? old('txtImage',$category["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Remove Image</button>
					</center><br />
					<label class="control-label">Alt Image</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Please Enter Alt For Image" value="{{ old('txtAlt',$category["alt"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Status Category</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="category" data-col="status" data-id="{{ $category["id"] }}" {{ $category["status"] == "on" ? "checked" : "" }} />
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
					<h6 class="panel-title">Edit Category English</h6>
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
						<label class="control-label">Category Name <span class="text-danger">*</span></label>
						<input type="text" id="name-slug-en" name="txtNameEn" class="form-control" placeholder="Please Enter Category Name" value="{{ old('txtNameEn',$category["name_en"]) }}" />
					</div>
					<div class="form-group">
						<label class="control-label">Description</label>
						<textarea name="txtDescriptionEn">{{ old('txtDescriptionEn',$category["description_en"]) }}</textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('txtDescriptionEn', { height: '400px' });
						</script>
					</div>
					<div class="form-group">
						<label class="control-label">Slug URL</label>
						<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Please Enter Slug URL" value="{{ old('txtSlugEn',$category["slug_en"]) }}" />
					</div>
					<div class="form-group" style="margin-bottom: 50px">
						<label class="control-label">Title Tag (Ex : Primary Keyword - Secondary Keyword)</label>
						<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Please Enter Primary Keyword - Secondary Keyword (SEO)" value="{{ old('txtMetaTitleEn',$category["title_tag_en"]) }}" />
					</div>
					<div class="form-group">
						<label class="control-label">Meta Keywords</label>
						<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Please Enter Meta Keywords Tag (SEO)" value="{{ old('txtMetaKeywordsEn',$category["meta_keywords_tag_en"]) }}" />
						<span class="help-block">Keywords not more that 10 words</span>
					</div>
					<div class="form-group">
						<label class="control-label">Meta Description</label>
						<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Please Enter Meta Description Tag (SEO)">{{ old('txtMetaDescriptionEn',$category["meta_description_tag_en"]) }}</textarea>
					</div>
				</div>
			</div>
		</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.category')])
</form>
@endsection