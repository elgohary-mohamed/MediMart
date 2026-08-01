<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

new class extends Component {
    use WithPagination;

    public function render()
    {
        return view('components.shop-by-categories', [
            'categories' => Category::latest()->paginate(4),
        ]);
    }
};

?>

<div>
    <div class="shop-by-categories" style="margin-bottom: 34px;">

        <h2 style="text-align: center">Shop By Categories</h2>

        <div style=" display: flex;align-items: center;justify-content: space-around;">

            <button wire:click="previousPage"  @disabled(!$categories->previousPageUrl())> <img class="img_next" src="{{ asset('img/54240.png') }}"
                    alt=""style="width: 30px;height: 30px;transform: scaleX(-1);">
            </button>
            @foreach ($categories as $category)
                <div>
                    <li>
                        <img src="{{ asset('storage/' . $category->image) }}" alt="" width="205px"height="205px">
                    </li>
                    <li style="margin-top: 20px;">

                        {{ $category->name }}
                    </li>
                </div>
            @endforeach
            <button wire:click="nextPage"  @disabled(!$categories->nextPageUrl())> <img class="img_previous" src="{{ asset('img/54240.png') }}"
                    alt=""style="width: 30px;height: 30px;"></button>




        </div>


    </div>
</div>
