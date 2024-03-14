<?php

use App\Models\Product;
?>

<x-layouts.main>
    <div class="container mt-5">
        <h2>Your Cart</h2>
        @if($cartContent->isEmpty())
        <p>Your cart is empty.</p>
        @else
        @foreach ($cartContent as $item)
        <?php
        $product = Product::findOrFail($item->id);
        ?>
        
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <img width="170" src="/storage/{{ $product->photos->first()->path ?? null }}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Price: {{ $item->price }}</p>
                        <div class="input-group mb-3">
                        <form action="{{ route('updateCartItem') }}" method="POST">
                            @csrf
                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                            <button class="btn btn-outline-secondary" type="submit" name="action" value="decrement">-</button>
                            <input type="text" class="form-control" value="{{ $item->qty }}" readonly>
                            <button class="btn btn-outline-secondary" type="submit" name="action" value="increment">+</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                    <form action="{{ route('deleteCartItem') }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                            <button type="submit" class="btn btn-square btn-outline-danger m-2"><i class="fa-solid fa-trash"></i></button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <p>{{ $total }}</p>
    </div>
</x-layouts.main>

<script>
    function updateQuantity(itemId, action) {
        const inputField = document.getElementById('quantity_' + itemId);
        let quantity = parseInt(inputField.value);

        if (action === 'increment') {
            quantity++;
        } else if (action === 'decrement' && quantity > 1) {
            quantity--;
        }

        inputField.value = quantity;

        // Send an AJAX request to update the quantity in the cart
        axios.post('/update-cart', {
                itemId: itemId,
                quantity: quantity
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }

    
</script>