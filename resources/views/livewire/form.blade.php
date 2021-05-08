<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="email">{{ __('Email address') }}*</label>
            <input type="email" class="form-control" id="email" wire:model="email">
        </div>
        <div class="form-group">
            <label for="fname">{{ __('First Name') }}*</label>
            <input type="text" class="form-control" id="fname" wire:model="fname">
        </div>
        <div class="form-group">
            <label for="lname">{{ __('Last Name') }}*</label>
            <input type="text" class="form-control" id="lname" wire:model="lname">
        </div>
        <div class="form-group">
            <label for="company">{{ __('Company Name') }}</label>
            <input type="text" class="form-control" id="company" wire:model="company">
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Phone Number') }}*</label>
            <input type="text" class="form-control" id="phone" wire:model="phone">
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Message') }}*</label>
            <textarea class="form-control" id="message" wire:model="message"></textarea>
        </div>
        <div id="products">
            <select style="display:none"  wire:model="requestedProducts" multiple>
              @foreach ($categories as $category)
              <optgroup label="{{ $category->name }}" data-group-id="{{ $category->id }}">
                @foreach ($category->products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
              </optgroup>
              @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">{{ __('Send Request') }}</button>
    </form>
</div>