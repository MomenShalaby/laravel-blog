<div class="posts-index container my-5">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/posts.css') }}">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
        @foreach ($posts as $post)
            <div class="col">
                <x-posts.card :post="$post"></x-posts.card>
            </div>
        @endforeach
    </div>

</div>
