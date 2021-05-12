<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="submitRequest">
        <div>
            <label for="email">{{ __('Email address') }}*</label>
            <input type="text" class="form-control" id="email" wire:model="email">
            @error('email') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>
        <div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="fname">{{ __('First Name') }}*</label>
                    <input type="text" class="form-control" id="fname" wire:model="fname">
                    @error('fname') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="lname">{{ __('Last Name') }}*</label>
                    <input type="text" class="form-control" id="lname" wire:model="lname">
                    @error('lname') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="company">{{ __('Company Name') }}</label>
                    <input type="text" class="form-control" id="company" wire:model="company">
                    @error('company') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="phone">{{ __('Phone Number') }}*</label>
                    <input type="text" class="form-control" id="phone" wire:model="phone">
                    @error('phone') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div class="form-group mt-3 products-selector-container">
            <label>{{ __('Products') }}</label>
            <div id="products" wire:ignore>
                <select style="display:none"  multiple>
                    @foreach ($categories as $category)
                        <optgroup label="{{ $category->name }}" data-group-id="{{ $category->id }}">
                            @foreach ($category->products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            @error('requestedProducts') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Message') }}*</label>
            <textarea class="form-control" id="message" wire:model="message"></textarea>
            @error('message') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Send Request') }}</button>
    </form>
</div>
@section('scripts')
    <script>
        $('#products').dropdown({
            multipleMode: 'label',
            input: '<input type="text" placeholder="Search">',
            searchNoData: '<li style="color:#ddd">No Results</li>',
            //on change populate selected products and pass it to backend
            choice: () => {
                let selectedProducts = []
                let products = document.querySelectorAll('.dropdown-selected');
                products.forEach((element) => {
                    selectedProducts.push(element.innerText);
                })
                @this.requestedProducts = selectedProducts;
            }
        })
    </script>
@endsection
