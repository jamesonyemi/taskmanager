@extends('layouts.master')

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

    <div class="panel panel-default card">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{-- {{ 'Assest Management' }} --}}</h4>
            </div><br>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('asset_categories.asset_category.create') }}" class="btn btn-success" title="Create New Asset Category">New Asset
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($assetCategories) == 0)
            <div class="panel-body text-center">
                <h4>No Asset Categories Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table card-header">
            <div class="table-responsive">

                <table class="table mb-0 table-bordered table-hover">
                    <thead>
                        <div class="card-header">
                        <tr  style="background-color: teal; color:white;">
                            <th>Name</th>
                             <th>Description</th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </div>
                    </thead>
                    <tbody>
                    @foreach($assetCategories as $assetCategory)
                        <tr>
                            <td>{{ $assetCategory->name }}</td>
                            <td>{{ $assetCategory->description }}</td>
                            <td> 

                                @switch($assetCategory->is_active)
                                    @case(1)
                                       <div class="tag tag-default tag-success">Active</div>
                                        @break

                                    @case(0)
                                       <div class="tag tag-default tag-warning">In active</div>
                                        @break

                                    @default
                                        <div class="tag tag-default tag-danger">No Status</div>
                                @endswitch
                            
                           </td>

                            <td>

                                <form method="POST" action="{!! route('asset_categories.asset_category.destroy', $assetCategory->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('asset_categories.asset_category.show', $assetCategory->id ) }}" class="btn btn-info" title="Show Asset Category">View
                                            <span class="icon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('asset_categories.asset_category.edit', $assetCategory->id ) }}" class="btn btn-primary" title="Edit Asset Category">Edit
                                            <span class="icon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Asset Category" onclick="return confirm(&quot;Delete Asset Category?&quot;)">Delete
                                            <span class="icon-trash-o" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {{-- {!! $assetCategories->render() !!} --}}
            {{ $assetCategories->links('vendor.pagination.bootstrap-4') }}
        </div>
        
        @endif
    
    </div>
@endsection