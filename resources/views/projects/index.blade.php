@extends('layouts.default')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Projects</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                   Create
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($projects) == 0)
            <div class="panel-body text-center">
                <h4>No Projects Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Assignee</th>
                            <th>Priority</th>
                            <th>Watchers</th>
                            <th>Status</th>
                            {{-- <th>Assigned By</th> --}}

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       {{--  Loop through the lists of Projects --}}
                    @foreach($projects as $project)
                          {{-- check if the current user has been assigned a ticket --}}
                      @if ($project->assigned_by === (int) Auth::user()->id)
                        
                     
                        <tr>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->assignee }}</td>
                            <td>{{ $project->priority }}</td>
                            <td>{{ $project->watchers }}</td>
                            <td>{{ $project->status }}</td>
                           {{--  <td>{{  isset($project->assignedBy->id) ? $project->assignedBy->id : ''  }}</td> --}}
                           
                            <td>

                                <form method="POST" action="{!! route('projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('projects.project.show', $project->id ) }}" class="btn btn-info" title="Show Project">
                                            
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">View</span>
                                        </a>
                                        <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary" title="Edit Project">
                                           
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"> Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Project" onclick="return confirm(&quot;Delete Project?&quot;)">
                                            
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $projects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection