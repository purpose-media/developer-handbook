@if( ! isset( $model_region ) )
    <div data-widget="double-cta" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Single CTA Block</span>
                <a data-for="delete-region-model" href="#" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">

            @include('auth.global.templates.forms.singleField', [
                'label' => 'Background Image',
                'fieldName' => null,
                'fieldValue' => null,
                'fieldType' => 'text',
                'fieldData' => null,
                'fieldValidation' => [
                    'data-for' => 'media-attachment',
                    'data-media-type' => 'images',
                    'data-name' => 'image-1'
                ]
            ])

            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Title</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'title-1', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Content</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::textarea( null, null, [ 'data-name' => 'content-1', 'class' => 'form-control wysiwyg' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Button Text</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'button-text-1', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Button URL</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, null, [ 'data-name' => 'button-url-1', 'class' => 'form-control' ] ) !!}
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
    <div data-widget="double-cta" class="x_panel">
        <div class="x_title content handle">
            <h2>
                <span  class="pull-left"><i class="fa fa-arrows"></i></span>
                <span class="heading">Single CTA Block</span>
                <a data-for="delete-region-model" href="{!! route( 'get.regions.delete-model-region', $model_region['id'] ) !!}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></a>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="content">

            @include('auth.global.templates.forms.singleField', [
                'label' => 'Background Image',
                'fieldName' => null,
                'fieldValue' => isset( $data['image-1']) ? $data['image-1'] : '',
                'fieldType' => 'text',
                'fieldData' => null,
                'fieldValidation' => [
                    'data-for' => 'media-attachment',
                    'data-media-type' => 'images',
                    'data-name' => 'image-1'
                ]
            ])

            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Title</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['title-1']) ? $data['title-1'] : '', [ 'data-name' => 'title-1', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Content</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::textarea( null, isset( $data['content-1']) ? $data['content-1'] : '', [ 'data-name' => 'content-1', 'class' => 'form-control wysiwyg'  ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Button Text</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['button-text-1'] ) ? $data['button-text-1'] : '', [ 'data-name' => 'button-text-1', 'class' => 'form-control' ] ) !!}
                </div>
            </div>
            <div class="item form-group ">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Button URL</label>
                <div class="col-md8 col-sm-8 col-xs-12">
                    {!! Form::text( null, isset( $data['button-url-1'] ) ? $data['button-url-1'] : '', [ 'data-name' => 'button-url-1', 'class' => 'form-control' ] ) !!}
                </div>
            </div>

            {!! Form::text( region_field_name( 'old', get_defined_vars() ), $model_region['data'], [ 'data-for' => 'post-value' ] ) !!}
        </div>
    </div>
@endif
