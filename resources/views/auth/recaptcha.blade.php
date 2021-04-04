<div class="py-3 text-xs-center">
    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}">
</div>

@if ($errors->has('g-recaptcha-response'))
    <span class="invalid-feedback" style="display: block;">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
@endif
</div>
