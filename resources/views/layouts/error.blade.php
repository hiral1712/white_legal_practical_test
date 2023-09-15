@if ($errors->any())
    <div class="bg-light">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" id="success-alert" role="alert">
                            <p>
                                <span class="icon-minus-sign"></span>
                                <i class="close icon-remove-circle" data-dismiss="alert" aria-label="Close"></i> Error!
                                There was an error processing the request
                            <ul class="error">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
