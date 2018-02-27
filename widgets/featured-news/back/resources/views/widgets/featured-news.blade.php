@if( ! isset( $model_region ) )
    <div data-widget="featured-news" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Featured News Block</span>
                <a data-for="delete-region-model" href="#" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, null, [ 'data-name' => 'type-1', 'data-iteration' => '1', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result"></div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, null, [ 'data-name' => 'type-2', 'data-iteration' => '2', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result"></div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, null, [ 'data-name' => 'type-3', 'data-iteration' => '3', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result"></div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, null, [ 'data-name' => 'type-4', 'data-iteration' => '4', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result"></div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, null, [ 'data-name' => 'type-5', 'data-iteration' => '5', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result"></div>
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
    <div data-widget="featured-news" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Featured News Block</span>
                <a data-for="delete-region-model" href="{!! route( 'get.regions.delete-model-region', $model_region['id'] ) !!}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, isset( $data['type-1'] ) ? $data['type-1'] : '', [ 'data-name' => 'type-1', 'data-iteration' => '1', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result start">
                    @include( 'widgets.featured-news.result', [ 'iteration' => 1 ] )
                </div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, isset( $data['type-2'] ) ? $data['type-2'] : '', [ 'data-name' => 'type-2', 'data-iteration' => '2', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result start">
                    @include( 'widgets.featured-news.result', [ 'iteration' => 2 ] )
                </div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, isset( $data['type-3'] ) ? $data['type-3'] : '', [ 'data-name' => 'type-3', 'data-iteration' => '3', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result start">
                    @include( 'widgets.featured-news.result', [ 'iteration' => 3 ] )
                </div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, isset( $data['type-4'] ) ? $data['type-4'] : '', [ 'data-name' => 'type-4', 'data-iteration' => '4', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result start">
                    @include( 'widgets.featured-news.result', [ 'iteration' => 4 ] )
                </div>
            </div>
            <hr />
            <div class="sub-container">
                <div class="item form-group ">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Type</label>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        {!! Form::select( null, $types, isset( $data['type-5'] ) ? $data['type-5'] : '', [ 'data-name' => 'type-5', 'data-iteration' => '5', 'class' => 'form-control type' ] ) !!}
                    </div>
                </div>
                <div class="result start">
                    @include( 'widgets.featured-news.result', [ 'iteration' => 5 ] )
                </div>
            </div>
            {!! Form::text( region_field_name( 'old', get_defined_vars() ), $model_region['data'], [ 'data-for' => 'post-value' ] ) !!}
        </div>
    </div>
@endif
