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

    <div class="col-12" style="display: flex; flex-direction:column; align-items:center;">
        <div><img style="width:550px;height:400px;" src="storage/images/{{ $post->image }}" class="services_img mt-5"></div>
        <h3 class="mt-2"><b>{{ $post->title }}</b></h3>
        <h4>{{ $post->description }}</h4>
        <p>Post By {{ $post->name }}</p>
     </div>

      @include('home.footer')
   </body>
</html>
