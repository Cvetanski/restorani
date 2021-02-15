<div class="form-group text-center">
    <label class="form-control-label" for="input-name">{{ $image['label'] }}</label>
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="{{ $image['style'] }}">
            <img src="{{ $image['value'] }}" alt="..."/>
        </div>
            <div>
                <span class="btn btn-outline-secondary btn-file">
                <span class="fileinput-new">{{ __('Избери Слика') }}</span>
                <span class="fileinput-exists">{{ __('Change') }}</span>
                <input type="file" name="{{ $image['name'] }}" accept="image/x-png,image/gif,image/jpeg">
                </span>
                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">{{ __('Remove') }}</a>
            </div>
        </div>
    </div>
</div>
