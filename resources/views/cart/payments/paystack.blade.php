<!--<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" id="paystack-payment-form" style="display: {{ env('DEFAULT_PAYMENT','paystack')=="paystack"?"block":"none"}};">
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="{{ count(Cart::getContent()) }}">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success mt-4" type="submit" value="Pay Now">
            {{ __('Place Playstack order') }}
        </button>
    </div>
</form>-->
<div class="text-center" id="paystack-payment-form" style="display: {{ env('DEFAULT_PAYMENT','cod')=="paystack"?"block":"none"}};" >
    <button
        v-if="totalPrice"
        type="submit"
        class="btn btn-success mt-4 paymentbutton"
        onclick="this.disabled=true;this.form.submit();"
    >Кон плаќање</button>
</div>
