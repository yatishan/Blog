<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
    <div class="header_section">
      @include('home.header')
         <!-- banner section start -->
    </div>

    <div class="col-md-6" style="margin:auto;">
        <h2 style="text-align: center; font-size:30px;">Add Post</h2>
        <form action="{{ route('add_post') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
              <div class="alert alert-success mt-5" role="alert">
                {{ session('success') }}
              </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-warning mt-5" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
            <div class="mt-2" >
                <lable class="form-lable" for="title">Post Title</lable>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" style="border-radius:5px;">
            </div>
            <div class="mt-5">
                <lable class="form-lable" for="description">Post Description</lable>
                <textarea name="description" class="form-control" style="border-radius:5px;">{{ old('description') }}</textarea>
            </div>
            <div class="mt-5">
                <lable class="form-lable" for="image">Post Image</lable>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Add Post</button>
            </div>
        </form>
    </div>

      @include('home.footer')
   </body>
</html>
