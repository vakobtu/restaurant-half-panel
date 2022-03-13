<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
    @include("admin.navbar")

    <form action="{{ url('/uploadchief') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div>
            <label for="">Name</label>
            <input style="color: blue" type="text" name="name" required="" placeholder="Enter Name">
        </div>
        <div>
            <label for="">Speciality</label>
            <input style="color: blue" type="text" name="speciality" required="" placeholder="Enter Speciality">
        </div>
        <div>

            <input  type="file" name="image" required="" >
        </div>
        <div>

            <input  class="btn btn-success" type="submit" value="Save">
        </div>
    </form>

    <table bgcolor="black">
        <tr>
            <th style="padding: 30px">Chief Name</th>
            <th style="padding: 30px">Speciality</th>
            <th style="padding: 30px">Image</th>
            <th style="padding: 30px">Action</th>
            <th style="padding: 30px">Action2</th>
        </tr>
        @foreach ($data as $data)
        <tr align="center">
            <td>{{ $data->name }}</td>
            <td>{{ $data->speciality }}</td>
            <td><img height="100" width="100" src="/chiefimage/{{ $data->image }}" alt=""></td>
            <td><a class="btn btn-warning" href="{{ url('/updatechief',$data->id) }}">Update</a></td>
            <td><a class="btn btn-danger" href="{{ url('/deletechief',$data->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </table>

    </div>
    @include("admin.adminjs")
  </body>
</html>
