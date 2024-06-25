<div class="container my-4">
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating my-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $post->title) }}" placeholder="Title">
            <label for="title">Title</label>
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating my-3">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="4" placeholder="Description" style="height: 100px">{{ old('description', $post->description) }}</textarea>
            <label for="description">Description</label>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if ($post->image)
            <div class="my-2">
                <h4>current image: </h4>
                <img src="{{ asset($post->image) }}" alt="Post Image" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif
        <div class="form-group my-3">
            <div class="my-4">
                <label for="formFile" class="form-label">Update your post image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile"
                    name="image">


                <div class="holder my-4" style="display:none;">
                    <img id="imgPreview" src="#" alt="pic" width="200" height="200" />
                </div>
                <x-shared.preview-image></x-shared.preview-image>


            </div>
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="form-floating my-3">
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="" disabled {{ old('user_id', $post->user_id) ? '' : 'selected' }}>Select User
                </option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
            <label for="user_id">Select User</label>
            @error('user_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
