<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    // public function render()
    // {
    //     return view('livewire.category-component');
    // }

    public $posts, $title, $content, $postId;

    public function mount()
    {
        $this->resetFields();
        $this->posts = Category::all();
    }

    public function render()
    {
        return view('livewire.category-component');
    }

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Category::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetFields();
        $this->posts = Category::all();
    }

    public function edit($id)
    {
        $post = Category::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Category::findOrFail($this->postId);
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetFields();
        $this->posts = Category::all();
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        $this->posts = Category::all();
    }

    private function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->postId = null;
    }
}
