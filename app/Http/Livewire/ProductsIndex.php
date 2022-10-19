<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsIndex extends Component
{
    use WithFileUploads;

    public $showingProductsModal = false;
    public $title;
    public $price;
    public $newImage;
    public $description;



    public function storeProducts()
    {

        $this->validate([
            'newImage'=> 'image|max:1024',
            'title'=> 'required|min:4',
            'price'=> 'required|min:4',
            'description'=> 'required|min:10',
        ]);

        $images = $this->newImage->store('public/path');
        Products::create([
            'title'=> $this->title,
            'price'=> $this->price,
            'images' => $images,
            'description'=> $this->description,
        ]);
        $this->reset();
    }

    public function showProductsModal()
    {

        $this->showingProductsModal = true;
    }

    public function render()
    {
        $product = Products::latest()->paginate(1);
        return view(
            'livewire.products-index',
            [
        ],compact('product'));
    }
}