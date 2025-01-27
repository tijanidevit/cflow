<?php

namespace App\Livewire\Post;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PostTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render(): View
    {

        $posts = auth()->user()->posts()
            ->where('content', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.post.post-table', compact('posts'));
    }

    public function delete($id) : void {
        auth()->user()->posts()->where('id', $id)->delete();

        session()->flash('success', 'Post deleted successfully!');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
