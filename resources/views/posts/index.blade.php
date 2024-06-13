   <x-layout>
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   @foreach ($posts as $post)
                       <a href="{{ route('posts.show', $post->id) }}">
                           <img src="{{ $post->image }}" alt="card__image" class="card__image" width="600">
                           <h2 class="post-title">
                               {{ $post->title }}

                       </a>
                       </h2>
                       <p class="lead">
                           by {{ $post->user->name }}
                       </p>
                       <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                       <p>{{ $post->description }}</p>
                       <a class="btn btn-default" href="{{ route('posts.show', $post->id) }}">Read More</a>
                       <hr>
                   @endforeach
               </div>
           </div>
       </div>
   </x-layout>
