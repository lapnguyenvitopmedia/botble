{{-- <div class="form-group">
    <div class="row">
        <label class="control-label col-lg-3 col-md-3">Form RevSlider</label>
        <div class="col-lg-9 col-md-9">
            <input name="alias" data-shortcode-attribute="content" class="form-control" placeholder="Type here">
        </div>
    </div>
</div> --}}


{{-- show data dropdown --}}
@php
    $data=get_slider();
@endphp
<div class="form-group">
    <div class="row">
        <label class="control-label col-lg-3 col-md-3">Form RevSlider</label>
        <div class="col-lg-9 col-md-9">
            <select name="slid" id="slid" data-shortcode-attribute="content">
                @foreach($data as $v)
                    <option   value="{{$v->alias}}">{{$v->title}}</option>
                @endforeach
            </select>

        </div>
    </div>
</div>
