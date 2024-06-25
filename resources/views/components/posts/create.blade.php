<div class="container my-4">

    <h2>Create a New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating my-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" placeholder="Title">
            <label for="title">Title</label>
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating my-3">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="4" placeholder="Description" style="height: 100px">{{ old('description') }}</textarea>
            <label for="description">Description</label>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <div class="my-4">
                <label for="formFile" class="form-label">Add Image for your post</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile"
                    name="image">
            </div>
            <div class="holder my-4" style="display:none; position: relative;"">
                <img id="imgPreview" src="#" alt="pic" width="200" height="200" />
                <div id="deselectBtn" class="btn-danger btn"
                    style="position: absolute; top: 5px; left: 220px; width: 20px; height: 20px;  display: flex; justify-content: center; align-items: center; ">
                    X</div>

            </div>
            <x-shared.preview-image></x-shared.preview-image>

            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="form-floating my-3">
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
            <label for="user_id">Select User</label>
            @error('user_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}
        <div class="form-floating my-3">
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="" disabled selected>Select User</option>
            </select>
            <label for="user_id">Select User</label>
            @error('user_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '{{ route('users.index') }}', // Make sure to define this route
                    type: 'GET',
                    success: function(response) {
                        var selectBox = $('#user_id');
                        selectBox.empty(); // Clear existing options
                        selectBox.append('<option value="" disabled selected>Select User</option>');

                        $.each(response.users, function(key, user) {
                            var selected = '{{ old('user_id') }}' == user.id ? 'selected' : '';
                            selectBox.append('<option value="' + user.id + '" ' + selected + '>' +
                                user.name + '</option>');
                        });
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            });
        </script>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
