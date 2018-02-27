
@if( isset( $fixtures ) && ! $fixtures->isEmpty() )
    <section class="latestFixtures">
        <a href="{{ $data->showMoreUr }}" class="button__seeAll">{{ $data->showMoreText }}</a>
        <h2>{{ $data->title }}</h2>
        <div class="slider--four">
            @foreach( $fixtures as $fixture )
                {{--@include( 'components.fixture-block' )--}}
            @endforeach
        </div>
    </section>
@endif
