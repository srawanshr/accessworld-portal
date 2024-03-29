<div class="text-default-light text-caption no-margin">
    <label>Terms</label>
</div>
<div class="btn-group margin-bottom-1 priceable-button" data-toggle="buttons">
    @foreach( site('terms.all') as $key => $term)
    <label class="btn ink-reaction btn-primary {{ site('terms.default') == $key || $key == old('qty') || (isset($item) && $key == $item['qty']) ? 'active' : '' }}">
        {{ Form::radio('qty', $key, old('qty') || site('terms.default') == $key, ['class' => 'priceable']) }} {{ $term }}
    </label>
    @endforeach
</div>