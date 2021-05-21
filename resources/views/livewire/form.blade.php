<div>
    <form wire:submit.prevent="submitRequest">
        <div class="form-header">
            <h4 class="font-weight-bold text-center">{{ __('Get a quote') }}</h4>
        </div>
        <div class="form-body">
            <div>
                <label for="email">{{ __('Email address') }}*</label>
                <input type="text" class="form-control" id="email" wire:model="email">
                @error('email') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="fname">{{ __('First Name') }}*</label>
                        <input type="text" class="form-control" id="fname" wire:model="fname">
                        @error('fname') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="lname">{{ __('Last Name') }}*</label>
                        <input type="text" class="form-control" id="lname" wire:model="lname">
                        @error('lname') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="company">{{ __('Company Name') }}</label>
                        <input type="text" class="form-control" id="company" wire:model="company">
                        @error('company') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="phone">{{ __('Phone Number') }}*</label>
                        <input type="text" class="form-control" id="phone" wire:model="phone">
                        @error('phone') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mt-3 products-selector-container">
                <label>{{ __('Products') }}</label>
                <div id="products" wire:ignore>
                    <select style="display:none" multiple>
                        @foreach ($categories as $category)
                            <optgroup label="{{ $category->name }}" data-group-id="{{ $category->id }}">
                                @foreach ($category->products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                @error('requestedProducts') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="phone">{{ __('Message') }}*</label>
                <textarea class="form-control" id="message" wire:model="message"></textarea>
                @error('message') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="form-check">
                <div class="d-flex">
                    <label class="form-check-label">{{ __('Accept') }}</label>
                    <input type="checkbox" class="form-check-input" wire:model="privacy">
                </div>
                @error('privacy') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn custom-btn btn-block mt-3">{{ __('Send Request') }}</button>
        </div>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
@push('scripts')
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
        $('button').click(() => {
            setTimeout(() => {
                $('.alert').fadeOut(6500)
            }, 1000)
        })

    </script>
@endpush
