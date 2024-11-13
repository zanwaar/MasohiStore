<?php

namespace App\Livewire\Panel\Product;

use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class DataProduct extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $titlemodal = 'TAMBAH PRODUCT';
    public $name;
    public $description;
    public $price;
    public $is_active = true;
    public $in_stock = true;
    public $images;
    public $kategori;
    public $product_foto;
    public $product_id;
    public $merchant_id;
    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function mount()
    {
        $umkm = Merchant::where('user_id', auth()->user()->id)->first();
        if ($umkm) {
            $this->merchant_id = $umkm->id;
        }
    }
    public function getProductsProperty()
    {
        return Product::where(function ($query) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        })
            ->where('merchant_id', $this->merchant_id) // Filter by the user's merchant ID
            ->latest()
            ->paginate(10);
    }
    public function close()
    {
        $this->reset();
        $this->dispatch('hide');
    }
    public function add()
    {
        $this->titlemodal = "TAMBAH PRODUCT";
        $this->dispatch('show');
    }
    public function showdelete($product)
    {
        $this->product_id = $product['id'];
        $this->dispatch('show-delete');
    }
    public function edit($product)
    {
        $this->product_id = $product['id'];
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->is_active = (bool) $product['is_active'];

        $this->in_stock = (bool)  $product['in_stock'];
        $this->product_foto = $product['images'];
        // dd($this->product_id);
        $this->titlemodal = "EDIT PRODUCT";
        $this->dispatch('show');
    }
    public function updatedPrice($value)
    {
        // Menghilangkan format uang dan menyimpan sebagai angka
        $this->price = str_replace(['.', ','], ['', '.'], $value);
    }

    public function delete()
    {
        $product = Product::findOrFail($this->product_id);
        $filePath = 'products/' . $product->images;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        $product->delete();
        $this->dispatch('hide');
        $this->alert('success', 'Delete successfully.', [
            'position' => 'top',
            'timer' => 2000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
    public function save()
    {

        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            // 'images' => 'image|max:20480',
        ]);


        DB::beginTransaction();

        try {
            if ($this->images) {
                $this->product_foto  = $this->images->getClientOriginalName();
                $this->images->storeAs(path: 'public/products', name: $this->product_foto);
            }
            if ($this->product_id) {
                Product::where('id', $this->product_id)->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'price' => $this->price,
                    'is_active' => $this->is_active,
                    'in_stock' => $this->in_stock,
                    'images' =>  $this->product_foto,
                ]);
            } else {
                Product::create([
                    'merchant_id' => $this->merchant_id,
                    'name' => $this->name,
                    'slug' => $this->createUniqueSlug($this->name, Product::class),
                    'description' => $this->description,
                    'price' => $this->price,
                    'is_active' => $this->is_active,
                    'in_stock' => $this->in_stock,
                    'images' =>  $this->product_foto,
                ]);
            }
            DB::commit();
            $this->name = '';
            $this->description = '';
            $this->price = '';
            $this->is_active = '';
            $this->in_stock = '';
            $this->product_foto = '';
            $this->dispatch('hide');
            $this->alert('success', 'Product saved successfully.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);

            $this->alert('success', 'Failed to save Product.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    function createSlug($string)
    {
        // Ubah teks menjadi lowercase
        $slug = strtolower($string);

        // Ganti karakter non-alphanumeric dengan tanda hubung
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);

        // Hapus tanda hubung di awal atau akhir string
        $slug = trim($slug, '-');

        return $slug;
    }

    function createUniqueSlug($string, $model)
    {
        $slug = $this->createSlug($string);
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah ada di database
        while ($model::where('slug', $slug)->exists()) {
            // Tambahkan angka di akhir slug untuk membuatnya unik
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
    public function render()
    {
        return view('livewire.panel.product.data-product', ['products' => $this->products]);
    }
}
