<!DOCTYPE html>
<html lang="en">
<head>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>People's Information</h2>

    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

<table>
  <thead>
  <tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Permanent Address</th>
    <th>Contact Number</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($phonebooks as $phonebook)
  <tr>
    <td>{{ $phonebook-> firstName}}</td>
    <td>{{ $phonebook-> lastName}}</td>
    <td>{{ $phonebook-> middleName}}</td>
    <td>{{ $phonebook-> email}}</td>
    <td>{{ $phonebook-> address}}</td>
    <td>{{ $phonebook-> contact}}</td>
    <td>
        <form action="{{ route('phonebooks.destroy',$phonebook->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('phonebooks.edit',$phonebook->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
  </tr>
  @endforeach
  </tbody>
  {!! $phonebooks->links() !!}
</table>

<button class="button"><a href="{{ route('phonebooks.create') }}">Add Person</a></button>
    
</body>
</html>