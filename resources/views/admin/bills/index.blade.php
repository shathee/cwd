@extends('layouts.app')

@section('content')
    
<div class="card">
  <div class="card-header">
   Bills
  </div>  
  <div class="card-body">
    <h5 class="card-title text-right">
    <a href="{{ url('/admin/bills/create') }}" class="btn btn-success btn-sm" title="Add New Bill">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    </h5>
    <form method="GET" action="{{ url('/admin/bills') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                    <th>#</th><th>Contract Id</th><th>Bill No</th><th>Bill Date</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($bills as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->contract->contract_no }}</td>
                    <td>{{ $item->bill_no }}</td>
                    <td>{{ $item->bill_date }}</td>
                    <td>{{ $item->contract->id }}</td>
                    <td>
                        <a href="{{ url('/admin/bills/' . $item->id) }}" title="View Bill"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                        <a href="{{ url('/admin/bills/' . $item->id . '/edit') }}" title="Edit Bill"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/admin/bills' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Bill" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $bills->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
   

    

  </div>
</div>

@endsection
