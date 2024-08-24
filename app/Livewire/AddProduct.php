<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Add this trait for file uploads
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AddProduct extends Component
{
    use WithFileUploads; // Enable file uploads

    public $name;
    public $description;
    public $price;
    public $category_id;
    public $in_stock;
    public $image; // Property to store the uploaded image file
    public $categories;

    protected $rules = [
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'in_stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }


    public function submit()
    {
        $this->validate();
    
        // Create the product
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'in_stock' => $this->in_stock,
        ]);
    
        // Handle image upload
        if ($this->image) {
            // Generate a unique filename for the image
            $imageName = time() . '_' . $this->image->getClientOriginalName();
    
            // Store the image in the public/images directory
            $path = $this->image->storeAs('public/images', $imageName);
    
            // Extract the filename from the path
            $imageName = basename($path);
    
            // Create the image record with the public path
            $image = Image::create(['path' => 'images/' . $imageName]);
    
            // Attach the image to the product
            $product->images()->attach($image->id);
        }
    
        session()->flash('message', 'Product added successfully.');
    
        // Reset the form fields after successful submission
        $this->reset(['name', 'description', 'price', 'category_id', 'in_stock', 'image']);
    }

    public function render()
    {
        return view('livewire.add-product');
    }
}
