@php
  $isRegisterTab = session('active_tab') === 'register' || old('name') !== null || $errors->has('name') || $errors->has('password_confirmation');
@endphp

<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Sign In & Sign Up
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
      </div>
      <section>
        <div class="modal-body">
          <div class="w3_login_module">
            <div class="module form-module">
              <div class="toggle"><i class="fa fa-times fa-pencil"></i>
              <div class="tooltip">Click Me</div>
              </div>
              <div class="form">
              <h3>Login to your account</h3>
              @if ($errors->any() && !$isRegisterTab)
                <div class="alert alert-danger" style="margin-bottom: 15px; text-align: left; font-size: 13px;">
                  <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('login.post') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <div style="margin: -10px 0 15px; text-align: left;">
                  <label style="font-weight: normal; color: #212121; cursor: pointer; font-size: 13px;">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                  </label>
                </div>
                <input type="submit" value="Login">
              </form>
              </div>
              <div class="form">
              <h3>Create an account</h3>
              @if ($errors->any() && $isRegisterTab)
                <div class="alert alert-danger" style="margin-bottom: 15px; text-align: left; font-size: 13px;">
                  <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('register.post') }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required="">
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                <input type="submit" value="Register">
              </form>
              </div>
              <div class="cta"><a href="#">Forgot your password?</a></div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<script>
  $('.toggle').click(function(){
    // Switches the Icon
    $(this).children('i').toggleClass('fa-pencil');
    // Switches the forms  
    $('.form').animate({
    height: "toggle",
    'padding-top': 'toggle',
    'padding-bottom': 'toggle',
    opacity: "toggle"
    }, "slow");
  });

  @if ($errors->any() || session('open_login_modal'))
    $(document).ready(function() {
      function showAuthModal() {
        if (typeof $.fn.modal !== 'undefined') {
          $('#myModal').modal('show');
          @if ($isRegisterTab)
            $('.form-module .form').first().hide();
            $('.form-module .form').last().show();
            $('.toggle').children('i').removeClass('fa-pencil');
          @endif
        } else {
          setTimeout(showAuthModal, 50);
        }
      }
      showAuthModal();
    });
  @endif
</script>
