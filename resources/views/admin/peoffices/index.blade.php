@extends('layouts.app')

@section('content')
    
<div class="card">
  <div class="card-header">
   Peoffices
  </div>  
  <div class="card-body">
    <h5 class="card-title text-right">
    <a href="{{ url('/admin/peoffices/create') }}" class="btn btn-success btn-sm" title="Add New Peoffice">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    </h5>
    <form method="GET" action="{{ url('/admin/peoffices') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>#</th><th>Name</th><th>Zone Id</th><th>Circle Id</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($peoffices as $item)
                <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->zone->name }}</td>
                    <td>{{ $item->circle->name }}</td>
                    
                    <td>
                        <a href="{{ url('/admin/peoffices/' . $item->id) }}" title="View Peoffice"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                        <a href="{{ url('/admin/peoffices/' . $item->id . '/edit') }}" title="Edit Peoffice"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/admin/peoffices' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Peoffice" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $peoffices->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
   

    

  </div>
</div>

@endsection
