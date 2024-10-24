<div>
    
    <div class="card">
        <div class="card-header text-center">
            <h1 class="bg-dark text-light mt-3 text-center"><i class="fa-solid fa-pen"></i> Manage Posts</h1>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" wire:model.live="title" class="form-control mt-2">
                    @error('title') 
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea id="description" wire:model.live="description" class="form-control mt-2"></textarea>
                    @error('description') 
                        <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                </div>

                <div class="form-group mt-2">
                      <label for="image">Image</label>
                      <input type="file" wire:model="image" class="form-control mt-2">
                      <div wire:loading wire:target="photo">Uploading...</div>
                         @error('image') <span class="error">{{ $message }}</span> @enderror
                         @if($image) 
                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail mt-2" width="200">
                         @endif
                </div>

                 <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
            </form>
        </div>
    </div>
    

    <div class="d-flex justify-content-end mt-4">
        <form wire:submit.prevent="search" class="input-group">
            @csrf
            <input type="text" wire:model="query" class="form-control bg-light border-0" aria-label="Search" placeholder="Search..." aria-describedby="basic-addon2">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </form>
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    @if ($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="Image" class="img-thumbnail" width="100">
                    @else
                    <span class="badge" style="background-color: red">
                        No Image Found!
                    </span>
                    
                    @endif
                </td>

                <td>
                    <button wire:click="edit({{ $post->id }})" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>

    <div>
        {{ $posts->links() }}
    </div>

</div>




