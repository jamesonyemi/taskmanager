@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            {{-- <span class="pull-left">
                <h4 class="mt-5 mb-5">New Project</h4>
            </span> --}}

           {{--  <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('projects.project.index') }}" class="btn btn-primary" title="Show All Project">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">New Project</span>
                </a>
            </div> --}}

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('projects.project.store') }}" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('projects.create_project')

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        {{-- <input class="btn btn-primary" type="submit" value="Add"> --}}
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


