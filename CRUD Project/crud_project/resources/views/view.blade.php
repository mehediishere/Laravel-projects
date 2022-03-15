<!DOCTYPE html>
<html>
<head>
	@include('link.starting')
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

	@include('link.ending')
</body>
</html>