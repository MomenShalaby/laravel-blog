   <x-layout>
       <div class="container">

           <h2>Create a New Item</h2>
           <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                       name="title" value="{{ old('title') }}">
                   @error('title')
                       <div class="text-danger">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="description">Description</label>
                   <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                       rows="4">{{ old('description') }}</textarea>
                   @error('description')
                       <div class="text-danger">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="image">Image</label>
                   <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                       name="image">
                   @error('image')
                       <div class="text-danger">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="user_id">Select User</label>
                   <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                       @foreach ($users as $user)
                           <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                               {{ $user->name }}</option>
                       @endforeach
                   </select>
                   @error('user_id')
                       <div class="text-danger">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       </div>
   </x-layout>
