<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    <div class="page-content">
        <h1 style="font-size: 30px;" class="text-white mt-4 text-center">Update Page</h1>
        <div class="m-auto" style="width:650px;">
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
            <form action="{{ route('update_page',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mt-5" >
                    <lable class="form-lable" for="title">Post Title</lable>
                    <input type="text" name="title" id="title" value="{{ old('title',$post->title) }}" class="form-control" style="border-radius:5px;">
                </div>
                <div class="mt-5">
                    <lable class="form-lable" for="description">Post Description</lable>
                    <textarea name="description" class="form-control" style="border-radius:5px;">{{ old('description',$post->description) }}</textarea>
                </div>
                <div class="mt-5">
                    <lable class="form-lable" for="image">Post Image</lable>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mt-3">
                    <img style="width: 100px; height:100px;" src="/storage/images/{{ $post->image}}" alt="">
                </div>
                <div class="mt-3">
                    <input type="submit" value="Update" class="btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>
