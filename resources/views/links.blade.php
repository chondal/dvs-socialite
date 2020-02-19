@if (collect(config('dvs-socialite.socialsNetworks'))->contains('facebook'))
   <a href="{{ route('socialLogin.index', 'facebook') }}" class="btn btn-block btn-facebook">
      <i class="fa fa-facebook"></i> Ingresar con Facebook
   </a>
@endif

@if (collect(config('dvs-socialite.socialsNetworks'))->contains('google'))
   <a href="{{ route('socialLogin.index', 'google') }}" class="btn btn-block btn-google">
      <i class="fa fa-google"></i> Ingresar con Google
   </a>
@endif

@if (collect(config('dvs-socialite.socialsNetworks'))->contains('twitter'))
   <a href="{{ route('socialLogin.index', 'twitter') }}" class="btn btn-block btn-twitter">
      <i class="fa fa-twitter"></i> Ingresar con Twitter
   </a>
@endif

@if (collect(config('dvs-socialite.socialsNetworks'))->contains('github'))
   <a href="{{ route('socialLogin.index', 'github') }}" class="btn btn-block btn-github">
      <i class="fa fa-github"></i> Ingresar con github
   </a>
@endif
