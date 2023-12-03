<div>
    <style>
        label {
            display: block;
        } 
    </style> 
    <br> 
    <form wire:submit="process_payment">
        <input type="hidden" wire:model="row_id">
        <div>
            <label for="name">Name</label>
            <input type="text" 
                    wire:model="name">
            @error('name') {{ $message }} @enderror
        </div>
        <div>
            <label for="product">Product</label>
            <input type="text" 
                    wire:model="product">
            @error('product') {{ $message }} @enderror
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" 
                    wire:model="price"
                    maxlength="11">
            @error('price') {{ $message }} @enderror
        </div>
        <div>
            <label for="total_due">Total Due</label>
            <input type="number" 
                    wire:model="total_due"
                    maxlength="11">
            @error('total_due') {{ $message }} @enderror
        </div>
        <br>
        <button type="submit">Save</button>
    </form>
</div>