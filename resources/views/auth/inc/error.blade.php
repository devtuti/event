@if ($errors and count($errors))
    @foreach ($errors->messages() as $error)
        @foreach ($error as $message)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                {{$message ?? ''}}
            </div>
        @endforeach
    @endforeach
@endif