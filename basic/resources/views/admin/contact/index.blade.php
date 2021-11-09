@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        </div>

        <div class="container">
            <div class="row">
                
                <div>
                    <h4>Contact About</h4>
                    <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add About</button></a>
                </div>

                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        

                        <div class="card-header">All Contact Data</div>
                                               
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No</th>
                                    <th scope="col" width="15%">Contact Address</th>
                                    <th scope="col" width="25%">Contact Email</th>
                                    <th scope="col" width="15%">Contact Phone</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php( $i = 1 )
                                @foreach($contacts as $con)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td> {{ $con->address }} </td>
                                    <td> {{ $con->email }} </td>
                                    <td> {{ $con->phone }} </td>
                                    <td> 
                                        @if($con->created_at == NULL )
                                        <span class="text-danger">No Date Set</span>
                                        @else
                                        {{ Carbon\Carbon::parse($con->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td> 
                                        <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('contact/delete/'.$con->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>            
        </div>
    </div>
@endsection
