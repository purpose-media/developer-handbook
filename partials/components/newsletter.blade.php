<div class="newsletter-box">
    {!! Form::open( [ 'route' => 'post.mailing-list.add' ] ) !!}
        {!! Form::email( 'email_address', null, [ 'placeholder' => 'Join the list...', 'class' => 'newsletter-box__email-address' ]) !!}
        <button class="newsletter-box__button" type="submit">Submit</button>
    {!! Form::close() !!}
</div>
