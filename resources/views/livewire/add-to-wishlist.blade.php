<div>
    @if ($addedToWishlist)
        <button wire:click="toggleWishlist" class="btn btn-danger">
            <i class="fas fa-heart"></i>
        </button>
    @else
        {{-- <div class="product_fav">
            <button wire:click="toggleWishlist" class="btn btn-outline-danger">

                <i wire:click="toggleWishlist" class="fas fa-heart"></i>
            </button>
        </div> --}}



        <button wire:click="toggleWishlist" class="btn btn-outline-danger">
            <i class="far fa-heart"></i>
        </button>
    @endif
</div>
