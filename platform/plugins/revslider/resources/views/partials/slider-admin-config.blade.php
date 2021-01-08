@php
$sliders = get_sliders();
@endphp
<div class="form-group">
    <div class="row">
        <label class="control-label col-lg-3 col-md-3">Slider Alias</label>
        <div class="col-lg-9 col-md-9">
            {{-- <input name="alias" data-shortcode-attribute="content" class="form-control"> --}}
            <select name="alias" data-shortcode-attribute="content">
                @foreach ($sliders as $s)
                <option value="{{ $s->alias }}">{{ $s->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
