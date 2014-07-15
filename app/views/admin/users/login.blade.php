@section('content')
{{ Form::open(['url' => URL::route('postLogin'), 'method' => 'post', 'class' => 'login-form']) }}
    <h3 class="form-title">{{ trans('admin/users.txt.login_your_account') }}</h3>
    @if (Session::get('global_message'))
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span>{{{Session::get('global_message')}}}</span>
        </div>
    @endif
    <div class="form-group">
        {{ Form::label('username', trans('admin/users.lbl.username'), ['class' => 'control-label visible-ie8 visible-ie9'] ) }}
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            {{ Form::text('username', Input::old('username'), ['class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('admin/users.lbl.username')]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password', trans('admin/users.lbl.password'), ['class' => 'control-label visible-ie8 visible-ie9'] ) }}
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            {{ Form::password('password', ['class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('admin/users.lbl.password')]) }}
        </div>
    </div>
    <div class="form-actions">
        {{ Form::checkbox('remember') }}
        {{ Form::label('remember', trans('admin/users.lbl.remember_me')) }}
        {{ Form::submit( trans('admin/users.btn.login'), ['class' => 'btn green pull-right']) }}
    </div>
    <div class="forget-password">
        <h4>{{ trans('admin/users.txt.forgot_password') }}</h4>
        <p>{{ trans('admin/users.txt.reset_password', ['link_begin' => '<a>', 'link_end' => '</a>']) }}</p>
    </div>
</form>
@stop