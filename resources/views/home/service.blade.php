<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Blogs </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <div><img style="height: 300px;" src="storage/images/{{ $post->image }}" class="services_img"></div>
                <h2>{{ $post->title }}</h2>
                <p>Post By {{ $post->name }}</p>
                <div class="btn_main"><a href="{{ route('page_details',$post->id) }}">Read More</a></div>
             </div>
            @endforeach
          </div>
       </div>
    </div>
 </div>
