<div>  
    <button type="submit"
            wire:click="delete_rows"
            wire:confirm="Are you sure, you want to delete this row(s)?">
        Delete row(s)
    </button>
    <div>
        changes here
    </div>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" wire:model="isChecked" wire:click="checkbox">
                </th>
                <th>Name</th>
                <th>Product</th>
                <th>Price</th>
                <th>Total Due</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>
                    <input type="checkbox" 
                            {{ $isChecked ? 'checked' : '' }}
                            wire:model="selectedRows"
                            value="{{ $payment->id }}"> 
                </td>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->product }}</td>
                <td>{{ $payment->price }}</td>
                <td>{{ $payment->total_due }}</td>
                <td>
                    <button type="button" 
                            wire:click="fillout_edit({{ $payment->id }})"> 
                        edit
                    </button>
                    <button type="button"
                            wire:click="delete_row({{ $payment->id }})"
                            wire:confirm="Are you sure, you want to delete this row(s)?">
                        delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    <livewire:payment-form /> 
</div>