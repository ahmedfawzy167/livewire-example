<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class PostForm extends Component
{
    use WithPagination, WithFileUploads;

    #[Validate('required|string|min:3')]
    public $title;
    #[Validate('required|string|min:10')]
    public $description;
    public $postId;
    public $query = '';

    #[Validate('nullable|image|max:1024|mimes:jpg,png,jpeg,gif')]
    public $image;


    protected $rules = [
        'title' => 'required|string|min:5',
        'description' => 'required|string|min:10',
        'image' => 'nullable|image|max:1024',
    ];


    public function search()
    {
        $this->resetPage();
    }


    public function submit()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('photos', 'public');
        }

        // Create or Update the Post
        Post::updateOrCreate(
            ['id' => $this->postId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'image' => $imagePath
            ]
        );

        // Reset the form and refresh the post list
        $this->resetForm();
        toastr()->success('Post Saved Successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->image = null;
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        toastr()->success('Post Deleted Successfully.');
    }

    public function resetForm()
    {
        $this->reset(['title', 'description', 'postId', 'image']);
    }


    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->query . '%')->paginate(5);
        return view('livewire.post-form', compact('posts'));
    }
}
