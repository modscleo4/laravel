@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css')
    @yield('css')
@stop

@section('auth_header', __('adminlte::adminlte.password_change_message'))

@section('auth_body')
    @include('sweetalert::alert')

    <form action="{{ route('user.password.update') }}" method="post">
        @csrf
        @method('PUT')

        @if(\App\Auth::user()->password_change_at != null)
            <div class="form-group has-feedback {{ $errors->has('current_password') ? 'has-error' : '' }}">
                <input type="password" name="current_password" class="form-control"
                       placeholder="{{ __('adminlte::adminlte.current_password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('current_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('current_password') }}</strong>
                        </span>
                @endif
            </div>
        @endif

        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control"
                   placeholder="{{ __('adminlte::adminlte.new_password') }}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))
                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if($errors->has('password_confirmation'))
                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">
            {{ __('adminlte::adminlte.change_password') }}
        </button>

        <input type="hidden" id="inputPrevious" name="previous"
               value="{{ old('previous') ?? url()->previous() }}">
    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ url()->previous() }}">
            <i class="fa fa-fw fa-arrow-left"></i> {{ __('pagination.back') }}
        </a>
    </p>
@endsection
