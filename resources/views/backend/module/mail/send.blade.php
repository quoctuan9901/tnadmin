@extends ('backend.master')
@section ('back',route('admin.mail.getSend'))
@section ('title','Send Mail')
@section ('controller','Mail')
@section ('action','Send')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.alert')

	<!-- Detached sidebar -->
	<div class="col-md-3">
		<div class="sidebar-detached">
			<div class="sidebar sidebar-default" style="width: 312px">
				<div class="sidebar-content">

					<!-- Sub navigation -->
					<div class="sidebar-category">
						<div class="category-title">
							<span>Navigation</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-alt navigation-accordion no-padding-bottom">
								<li class="navigation-header">Folders</li>
								<li><a href="#"><i class="icon-drawer-in"></i> Inbox <span class="badge badge-success">32</span></a></li>
								<li><a href="#"><i class="icon-drawer3"></i> Drafts</a></li>
								<li><a href="{{ route('admin.mail') }}"><i class="icon-drawer-out"></i> Sent mail</a></li>
								<li><a href="#"><i class="icon-stars"></i> Starred</a></li>
								<li class="navigation-divider"></li>
								<li><a href="#"><i class="icon-spam"></i> Spam <span class="badge badge-danger">99+</span></a></li>
								<li><a href="#"><i class="icon-bin"></i> Trash</a></li>
							</ul>
						</div>
					</div>
					<!-- /sub navigation -->
				</div>
			</div>
		</div>
	</div>
	<!-- /detached sidebar -->

	<!-- Detached content -->
	<div class="col-md-9">
		<div class="container-detached">
			<div class="content-detached">

				<!-- Single mail -->
				<div class="panel panel-white">

					<!-- Mail toolbar -->
					<div class="panel-toolbar panel-toolbar-inbox">
						<div class="navbar navbar-default">
							<ul class="nav navbar-nav visible-xs-block no-border">
								<li>
									<a class="text-center collapsed" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
										<i class="icon-circle-down2"></i>
									</a>
								</li>
							</ul>

							<div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">
								<div class="btn-group navbar-btn">
									<button type="submit" class="btn bg-blue"><i class="icon-checkmark3 position-left"></i> Send mail</button>
								</div>

								<div class="btn-group navbar-btn">
									<button type="button" class="btn btn-default"><i class="icon-plus2"></i> <span class="hidden-xs position-right">Save</span></button>
									<button type="reset" class="btn btn-default"><i class="icon-cross2"></i> <span class="hidden-xs position-right">Cancel</span></button>

			                    	<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu7"></i>
											<span class="caret"></span>
										</button>

										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li><a href="#">One more line</a></li>
										</ul>
									</div>
								</div>

								<div class="pull-right-lg">
									<div class="btn-group navbar-btn">
										<button type="button" class="btn btn-default"><i class="icon-printer"></i> <span class="hidden-xs position-right">Print</span></button>
										<button type="button" class="btn btn-default"><i class="icon-new-tab2"></i> <span class="hidden-xs position-right">Share</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /mail toolbar -->

					<!-- Mail details -->
					<div class="table-responsive mail-details-write">
						<table class="table">
							<tbody>
								<tr>
									<td style="width: 150px">To:</td>
									<td class="no-padding"><input type="text" name="txtTo" class="form-control" placeholder="Add recipients"></td>
									<td style="width: 250px" class="text-right">
										<ul class="list-inline list-inline-separate no-margin">
											<li><a href="#">Copy</a></li>
											<li><a href="#">Hidden copy</a></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td>Fullname:</td>
									<td class="no-padding"><input type="text" name="txtFullname" class="form-control" placeholder="Please Enter Fullname"></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Subject:</td>
									<td class="no-padding"><input type="text" name="txtSubject" class="form-control" placeholder="Add subject"></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2">
										<ul class="list-inline no-margin">
											<li><a href="#"><i class="icon-attachment position-left"></i> Attach files</a></li>
											<li><a href="#"><i class="icon-google-drive position-left"></i> Google Drive</a></li>
											<li><a href="#"><i class="icon-dropbox position-left"></i> Dropbox</a></li>
										</ul>
									</td>
									<td class="text-right">
										<a href="#"><i class="icon-cloud-upload2 position-left"></i> Cloud drive</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /mail details -->

					<!-- Mail container -->
					<div class="mail-container-write">
						<textarea name="txtContent">{{ old('txtContent') }}</textarea>
						<script type="text/javascript">
							CKEDITOR.replace('txtContent', { height: '400px' });
						</script>
					</div>
					<!-- /mail container -->

				</div>
				<!-- /single mail -->

			</div>
		</div>	
	</div>
	<!-- /detached content -->
</form>
@endsection