<div class="form-group">
    <div class="row">
        <label class="col-lg-3 col-md-3 control-label">{{ trans('plugins/blog::base.number_posts_per_page') }}</label>
        <div class="col-lg-9 col-md-9">
            <input type="number" name="paginate" class="form-control" value="{{ theme_option('number_of_posts_in_a_category', 12) }}" data-shortcode-attribute="attribute" placeholder="{{ trans('plugins/blog::base.number_posts_per_page') }}">
        </div>
    </div>
</div>
