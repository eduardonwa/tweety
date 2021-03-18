<?php

namespace App\Http\Livewire;

use App\Models\Faro;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;

class FaroPostsTable extends Component
{   
    use WithPagination;

    public $search = '';
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];
    public $path = 'faro_posts_img/';

    public Faro $post;
    public Image $image;

    public function deletePost()
    {
        Faro::destroy($this->selected);
    }
    
    public function render()
    {
        return view('livewire.faro-posts-table', [
            'posts' => Faro::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
        ])
            ->layout('components.master');
    }
}