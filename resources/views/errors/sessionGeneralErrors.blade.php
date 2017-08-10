<div class="text-center">
    @if(Session::has('success'))
        <div class="container-fluid">
            <div class="alert alert-success col-md-5 col-md-offset-5" style="margin-top: 20px;">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    @if(Session::has('fail'))
        <div class="container-fluid">
            <div class="alert alert-danger col-md-5 col-md-offset-5" style="margin-top: 20px;">
                {{ Session::get('fail') }}
            </div>
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="container-fluid">
            <div class="alert alert-danger col-md-5 col-md-offset-5" style="margin-top: 20px;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

</div>