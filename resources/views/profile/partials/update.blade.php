<div style="width: 100%" class="p-4 row d-flex flex-column align-items-center">
    <div class="cover bg-fit {{ !Auth::user()->cover? 'bg-gradient' : '' }}" style="background-image: url({{ asset(Auth::user()->getCoverURL()) }}) !important"></div>

    <div class="avatar-container">
        <div class="avatar-icon"><i class="icofont-ui-camera"></i></div>
        <img 
            src="{{ asset(Auth::user()->getAvatarURL()) }}"
            id="avatar"
            alt=""
            class="bg-secondary rounded-circle"
            style="width: 250px; height: 250px; margin: 0 auto; object-fit: cover"
        >
    </div>
</div>

<form style="width: 100%" class="form p-4" method="post" action="/profile/edit" name="edit" enctype="multipart/form-data">
    @csrf

    <h2>Edit profile</h2>
    
    <div class="form-group">
        <label 
            class="form-label {{$errors->has('first_name')? 'text-danger' : ''}}" 
            for="first_name"
        >
            First name
        </label>
        <input 
            class="form-control {{$errors->has('first_name')? 'is-invalid' : ''}}" 
            type="text" 
            id="first_name" 
            name="first_name" 
            placeholder="First name"
            value="{{ Auth::user()->first_name ?? Request::old('first_name')}}"
        >
        @if ($errors->has('first_name'))
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label 
            class="form-label {{$errors->has('last_name')? 'text-danger' : ''}}" 
            for="last_name"
        >
            Last name
        </label>
        <input 
            class="form-control {{$errors->has('first_name')? 'is-invalid' : ''}}" 
            type="text" 
            id="last_name" 
            name="last_name" 
            placeholder="Last name"
            value="{{ Auth::user()->last_name ?? Request::old('last_name')}}"
        >
        @if ($errors->has('last_name'))
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label 
            class="form-label {{$errors->has('location')? 'text-danger' : ''}}" 
            for="location"
        >
            Location
        </label>
        <input 
            class="form-control {{$errors->has('location')? 'is-invalid' : ''}}" 
            type="text" 
            id="location" 
            name="location" 
            placeholder="Location"
            value="{{ Auth::user()->location ?? Request::old('location')}}"
        >
        @if ($errors->has('location'))
            <span class="text-danger">{{ $errors->first('location') }}</span>
        @endif
    </div>

    
    <input type="file" style="display: none" name="avatar" id="inputavatar">
    <input type="file" style="display: none" name="cover" id="inputcover">

    <button class="btn float-right btn-lg btn-success float-right">save</button>
    <div class="clearfix"></div>

</form>