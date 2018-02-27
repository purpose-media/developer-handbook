
# Left Content Right Advert Registration

## Front Application

Register this method in the Application Service Provider via the boot method (`$this->registerWidgets( $this->app );`);

```php
/**
 * @param $app
 * @use Application\Front\Widgets\LeftContentRightAdvert
 * @use Purposemedia\FrontRegions\Libs\Registrar as RegionsRegistrar
 * @return void
 */
private function registerWidgets( $app )
{
    if( $app->bound( RegionsRegistrar::class ) ) {
        $app->booted( function( $app ) {
            $app[ RegionsRegistrar::class ]->registerRenderer( 'widgets.left-content-right-advert', new LeftContentRightAdvert );
        } );
    }
}
```

## Back Application

Register this method in the Application Service Provider via the boot method (`$this->registerWidgets( $this->app );`);

```php
/**
 * @param $app
 * @use Application\Back\Widgets\LeftContentRightAdvert
 * @use Purposemedia\AdminRegions\Libs\Registration
 * @return void
 */
private function registerWidgets( $app )
{
    if( $app->bound( Registration::class ) ) {
        $app->booted( function( $app ) {
            $app[ Registration::class ]->addWidget( new LeftContentRightAdvert );
        });
    }
}
```

>Please make sure you change the `Application` in the the namespace to the correct one for your application

>Don't forget to run gulp on the back application
