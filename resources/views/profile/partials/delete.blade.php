<form style="width: 100%" class="form p-4" method="post" action="/profile/delete" name="delete">
        @csrf
        
        <h2>Delete account</h2>
        <div class="form-group">
            <label class="form-label  {{$errors->has('password')? 'is-invalid' : ''}}" for="password">Password:</label>
            <input 
                class="form-control  {{$errors->has('password')? 'is-invalid' : ''}}" 
                type="password" 
                id="password" 
                name="password"
                placeholder="Enter your password"
            >
            @if ($errors->has('password'))
                <small class="text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label class="form-label  {{$errors->has('password_confirm')? 'is-invalid' : ''}}" for="password_confirm">Confirm your password:</label>
            <input 
                class="form-control  {{$errors->has('password_confirm')? 'is-invalid' : ''}}" 
                type="password" 
                id="password_confirm" 
                name="password_confirm"
                placeholder="Enter your password again"
            >
            @if ($errors->has('password_confirm'))
                <small class="text-danger">{{ $errors->first('password_confirm') }}</small>
            @endif
        </div>
        
        <button class="btn float-right btn-lg btn-danger float-right">delete profile</button>
</form>