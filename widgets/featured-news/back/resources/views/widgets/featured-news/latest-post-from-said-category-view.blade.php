<div class="item form-group ">
    <label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
    <div class="col-md8 col-sm-8 col-xs-12">
        <div style="border:none; margin: 0; padding: 0;" class="c-ajax-filter">
            {!! Form::select( null, $categories, isset( $category ) ? $category : '', [ 'data-name' => 'category-' . $iteration, 'class' => 'form-control' ] ) !!}
        </div>
    </div>
</div>
