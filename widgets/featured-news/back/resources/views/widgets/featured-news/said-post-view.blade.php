<div class="item form-group ">
    <label class="control-label col-md-2 col-sm-2 col-xs-12">Said Post</label>
    <div class="col-md8 col-sm-8 col-xs-12">
        <div style="border:none; margin: 0; padding: 0;" class="c-ajax-filter">
            {!! Form::text( null, isset( $title ) ? $title : '', [ 'data-name' => 'said-post-name-' . $iteration, 'data-for' => 'search-posts', 'class' => 'form-control c-ajax-filter__input' ] ) !!}
        </div>
        {!! Form::hidden( null, isset( $id ) ? $id : '', [ 'data-name' => 'said-post-id-' . $iteration ] ) !!}
    </div>
</div>
