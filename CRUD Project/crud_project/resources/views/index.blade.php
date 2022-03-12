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

<main class="container">
	<div class="div_form">
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
	<form action="add" method="post">
	@csrf
		<div class="row">
			<div class="col">
				<div class="text-center">
					<h3>REGISTRATION FORM</h3>
				</div>
				<div class="mb-3">
					<label class="form-label">User name</label>
					<input type="text" name="username" class="form-control" value="{{ old('username') }}">
					<span style="color:red">@error('username'){{ $message }} @enderror</span>
				</div>
				<div class="mb-3">
					<label class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					<span style="color:red">@error('email'){{ $message }} @enderror</span>
				</div>
				<div class="mb-3">
					<label class="form-label">Date of Birth</label>
					<input type="text" name="date" class="datepicker_input form-control" placeholder="dd/mm/yyyy" value="{{ old('date') }}">
					<span style="color:red">@error('date'){{ $message }} @enderror</span>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label">City</label>
						<input type="text" name="city" class="form-control" value="{{ old('city') }}">
						<span style="color:red">@error('city'){{ $message }} @enderror</span>
					</div>
					<div class="col">
						<label class="form-label">Country</label>
						<input type="text" name="country" class="form-control" value="{{ old('country') }}">
						<span style="color:red">@error('country'){{ $message }} @enderror</span>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" value="{{ old('password') }}">
					<span style="color:red">@error('password'){{ $message }} @enderror</span>
				</div>
				<div class="row mb-3">
					<div class="col">
					  <input class="form-check-input" type="radio" name="radiobtn" value="Active" checked>
					  <label class="form-check-label">
					    Active
					  </label>
					</div>
					<div class="col">
					  <input class="form-check-input" type="radio" name="radiobtn" value="In-Active">
					  <label class="form-check-label">
					    Inactive
					  </label>
					</div>
				</div>
				<div class="text-center">
					<input type="submit" name="submit_btn" value="Submit" class="btn btn-outline-secondary">
				</div>
				<div class="text-center mt-3 d-lg-none d-xl-none d-xxl-none">
					<h6>OR</h6>
					<a href="{{ url("/view") }}" class="btn btn-outline-info">Update/Delete ▶</a>
				</div>
			</div>
			<div class="col d-none d-lg-block d-xl-block">
				<img src="{{ asset('img/1.jpg') }}" class="img-fluid" alt="...">
				<div class="text-center">
					<a href="{{ url("/view") }}" class="btn btn-outline-info">Update/Delete ▶</a>
				</div>
			</div>
		</div>
	</form>
	</div>
</main>

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