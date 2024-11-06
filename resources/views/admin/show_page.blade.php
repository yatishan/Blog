<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="m-auto " style="width:95%;">

            <h1 class="mt-4 text-center" style="font-size: 35px ;">All Posts</h1>
            @if (session('success'))
            <div class="alert alert-success mt-5" role="alert">
              {{ session('success') }}
            </div>
            @endif
            <table class="table text-white border-1 mt-5">
                <thead style="background-color: rgb(12, 57, 155);">
                  <tr>
                    <th scope="col">Post Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Post By</th>
                    <th scope="col">Post Status</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->name}}</td>
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->user_type }}</td>
                    <td>
                        <img style="width: 100px; height:100px;" src="/storage/images/{{ $post->image }}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('delete_page',$post->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                    <td>
                        <a href="{{ route('edit_page',$post->id) }}" class="btn btn-danger">Edit</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
        @include('admin.footer')

        <script>
            function confirmation(ev){
                ev.preventDefault();
                var urlToRedirect=ev.currentTarget.getAttribute('href');
                swal({
                    title:"Are you sure to delete this post?",
                    text:"You won't be able to revert this delete",
                    icon:"warning",
                    buttons:true,
                    dangerMode:true,
                })
                .then((willCancel)=>
                {
                    if(willCancel){
                        window.location.href=urlToRedirect;
                    }
                }
                );
            }
        </script>
  </body>
</html>
