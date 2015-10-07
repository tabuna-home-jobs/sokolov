@extends('_layout/site')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h2>Not Found</h2>

                    <div class="error-details">
                        Sorry, an error has occured, Requested search not found!
                    </div>
                    <div class="error-actions">
                        <a href="/" class="btn btn-default btn-lg"><span
                                    class="glyphicon glyphicon-home"></span> Take Me Home </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection