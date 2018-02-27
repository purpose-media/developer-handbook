<div class="item form-group ">
    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nth Latest Post</label>
    <div class="col-md8 col-sm-8 col-xs-12">
        <div style="border:none; margin: 0; padding: 0;" class="c-ajax-filter">
            {!! Form::selectRange( null, 1, 20, isset( $nth ) ? $nth : 1, [ 'data-name' => 'nth-post-' . $iteration, 'class' => 'form-control' ] ) !!}
        </div>
    </div>
</div>
