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
    @foreach ($datas as $post)
    <div class="col-12" style="display: flex; flex-direction:column; align-items:center;">
        <div><img style="width:450px;height:300px;" src="storage/images/{{ $post->image }}" class="services_img mt-5"></div>
        <h3 class="mt-2"><b>{{ $post->title }}</b></h3>
        <h4>{{ $post->description }}</h4>
        <p>Post By {{ $post->name }}</p>
        <div style="display: flex;">
            <a href="{{ route('my_post_del',$post->id) }}" class="btn btn-danger" >Delete</a>
            <a href="{{ route('my_post_update',$post->id) }}" class="btn btn-info ms-2">Update</a>
        </div>


     </div>
    @endforeach


      @include('home.footer')
   </body>
</html>
