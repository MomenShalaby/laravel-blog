   <x-layout>

       <!-- Page Content -->
       <div class="container">

           <div class="row">

               <!-- Blog Post Content Column -->
               <div class="col-lg-12">

                   <!-- Blog Post -->
                   <img src="{{ $post->image }}" alt="card__image" class="card__image" width="600">

                   <!-- Title -->
                   <h1 class="post-title">{{ $post->title }}</h1>

                   <!-- Author -->
                   <p class="lead">
                       by {{ $post->user->name }}
                   </p>

                   <hr>

                   <!-- Date/Time -->
                   <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>

                   <hr>

                   <p>{{ $post->description }}</p>


                   <hr>

               </div>
           </div>
           <!-- /.row -->

       </div>
       <!-- /.container -->

   </x-layout>
