<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mehedi H.</title>
	{{-- Datepicker CSS --}}
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css'>
    {{-- Bootstrap CSS --}}
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    {{-- Custom CSS --}}
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
	<section class="container my-5 px-5">
		<div class="text-center">
			<h3>UPDATE USER INFORMATION</h3>
		</div>
		@if(Session::get('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
		@endif
		@if(Session::get('fail'))
			<div class="alert alert-danger">
				{{ Session::get('fail') }}
			</div>
		@endif
		<form action="update" method="post">
		@csrf
			<input type="hidden" name="id" class="form-control" value="{{ $info->id }}">
			<div class="mb-3">
				<label class="form-label">User name</label>
				<input type="text" name="username" class="form-control" value="{{ $info->username }}">
			</div>
			<div class="mb-3">
				<label class="form-label">Email address</label>
				<input type="email" name="email" class="form-control" value="{{ $info->email }}">
			</div>
			<div class="mb-3">
				<label class="form-label">Date of Birth</label>
				<input type="text" name="date" class="datepicker_input form-control" placeholder="dd/mm/yyyy" value="{{ $info->date_of_birth }}">
			</div>
			<div class="row mb-3">
				<div class="col">
					<label class="form-label">City</label>
					<input type="text" name="city" class="form-control" value="{{ $info->city }}">
				</div>
				<div class="col">
					<label class="form-label">Country</label>
					<input type="text" name="country" class="form-control" value="{{ $info->country }}">
				</div>
			</div>
			<div class="mb-3">
				<label class="form-label">Old Password</label>
				<input type="hidden" name="oldPasswordHidden" value="{{ $info->password }}">
				<input type="password" name="oldPassword" class="form-control">
				<span style="color:red">@error('old password'){{ $message }} @enderror</span>

				<label class="form-label">New Password</label>
				<input type="password" name="newPassword" class="form-control">
				<span style="color:red">@error('new password'){{ $message }} @enderror</span>
			</div>
			<div class="row mb-3">
				<label class="form-label">Status</label>
				<div class="col">
					<input class="form-check-input" type="radio" name="radiobtn" value="Active" @if(($info->status) == "Active") checked @endif>
					<label class="form-check-label">
					Active
					</label>
				</div>
				<div class="col">
					<input class="form-check-input" type="radio" name="radiobtn" value="In-Active" @if(($info->status) == "In-Active") checked @endif>
					<label class="form-check-label">
					Inactive
					</label>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" name="submit_btn" value="Update" class="btn btn-outline-success">
				<a href="{{ url("/view") }}" class="btn btn-outline-secondary">Go back</a>
			</div>
		</form>
	</section>

{{-- Datepicker JS --}}
<script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>
{{-- Bootstrap JS --}}
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript">
const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
  const datepicker = new Datepicker(elem, {
    autohide: true
  });
}     
</script>
</body>
</html>