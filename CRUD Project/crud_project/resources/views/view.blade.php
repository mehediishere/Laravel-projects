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

	<section class="container my-5">
		<div class="text-center"><h3>USER INFORMATION</h3></div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">User</th>
		      <th scope="col">Email</th>
		      <th scope="col">Date of Birth</th>
			  <th scope="col">City</th>
			  <th scope="col">Country</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
          @foreach ($list as $item)
		    <tr>
		      <th>{{ $item->id }}</th>
		      <td>{{ $item->username }}</td>
		      <td>{{ $item->email }}</td>
		      <td>{{ $item->date_of_birth }}</td>
			  <td>{{ $item->city }}</td>
			  <td>{{ $item->country }}</td>
		      <td>
                <a href="edit/{{ $item->id }}" class="btn btn-outline-warning">Edit</a>
                <a href="delete/{{ $item->id }}" class="btn btn-outline-danger">Delete</a>
              </td>
		    </tr>
            @endforeach
		  </tbody>
		</table>
        <div class="text-end"><a href="{{ url("/") }}" class="btn btn-outline-info">New Registration</a></div>
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