
# Registration

## Front Application

Register this method in the Application Service Provider via the boot method (`$this->registerWidgets( $this->app );`);

```php
/**
 * @param $app
 * @use Application\Front\Widgets\DoubleCTA
 * @use Application\Front\Widgets\SingleCTA
 * @use Purposemedia\FrontRegions\Libs\Registrar as RegionsRegistrar
 * @return void
 */
private function registerWidgets( $app )
{
    if( $app->bound( RegionsRegistrar::class ) ) {
        $app->booted( function( $app ) {
            $app[ RegionsRegistrar::class ]->registerRenderer( 'widgets.double-cta', new DoubleCTA );
            $app[ RegionsRegistrar::class ]->registerRenderer( 'widgets.single-cta', new SingleCTA );
        } );
    }
}
```

## Back Application

Register this method in the Application Service Provider via the boot method (`$this->registerWidgets( $this->app );`);

```php
/**
 * @param $app
 * @use Application\Back\Widgets\DoubleCTA
 * @use Application\Back\Widgets\SingleCTA
 * @use Purposemedia\AdminRegions\Libs\Registration
 * @return void
 */
private function registerWidgets( $app )
{
    if( $app->bound( Registration::class ) ) {
        $app->booted( function( $app ) {
            $app[ Registration::class ]->addWidget( new DoubleCTA );
            $app[ Registration::class ]->addWidget( new SingleCTA );
        });
    }
}
```

>Please make sure you change the `Application` in the the namespace to the correct one for your application

>Don't forget to run gulp on the back application
