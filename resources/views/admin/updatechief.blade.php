<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
    @include("admin.navbar")

    <form action="{{ url('/updatefoodchief',$data->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div>
            <label for="">Chief Name</label>
            <input style="color: black" type="text" name="name" value="{{ $data->name }}">
        </div>
        <div>
            <label for="">Speciality</label>
            <input style="color: black" type="text" name="speciality" value="{{ $data->speciality }}">
        </div>
        <div>
            <label for="">Old Image</label>
            <img height="200" width="200" src="/chiefimage/{{ $data->image }}" alt="">
        </div>
        <div>
            <label for="">New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input style="color: black" class="btn btn-success" value="Update Chief" type="submit" required>
        </div>
    </form>

    </div>
    @include("admin.adminjs")
  </body>
</html>
