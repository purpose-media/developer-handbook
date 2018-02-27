@if( ! isset( $model_region ) )
    <div data-widget="latest-news" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Latest News Block</span>
                <a data-for="delete-region-model" href="#" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Title</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'title', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::select( null, [ 0 => 'All News' ] + $categories, null, [ 'data-name' => 'category', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Display</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::select( null, $display, null, [ 'data-name' => 'display', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            <hr />
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Show More Text</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'show-more-text', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Show More URL</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'show-more-url', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <hr />
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Amount</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::selectRange( null, 4, 20, null, [ 'data-name' => 'amount', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            {!! Form::text( region_field_name( 'new', get_defined_vars() ), '', [ 'data-for' => 'post-value' ] ) !!}
        </div>
    </div>
@else
    @php
        $data = [];
        $_data = (array) @json_decode($model_region['data']);
        foreach( $_data as $obj ) {
            $data[$obj->name] = $obj->value;
        }
    @endphp
    <div data-widget="latest-news" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Latest News Block</span>
                <a data-for="delete-region-model" href="{!! route( 'get.regions.delete-model-region', $model_region['id'] ) !!}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Title</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['title']) ? $data['title'] : '', [ 'data-name' => 'title', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::select( null, [ 0 => 'All News' ] + $categories, isset( $data['category']) ? $data['category'] : '', [ 'data-name' => 'category', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Display</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::select( null, $display, isset( $data['display']) ? $data['display'] : '1', [ 'data-name' => 'display', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            <hr />
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Show More Text</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['show-more-text']) ? $data['title'] : '', [ 'data-name' => 'show-more-text', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Show More URL</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['show-more-url']) ? $data['show-more-url'] : '', [ 'data-name' => 'show-more-url', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <hr />
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Amount</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::selectRange( null, 4, 20, isset( $data['amount']) ? $data['amount'] : '', [ 'data-name' => 'amount', 'class' => 'form-control', 'style' => 'margin-bottom:4px' ] ) !!}
                </div>
            </div>
            {!! Form::text( region_field_name( 'old', get_defined_vars() ), $model_region['data'], [ 'data-for' => 'post-value' ] ) !!}
        </div>
    </div>
@endif
