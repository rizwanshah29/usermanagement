@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            @if(Session::has('flash_message'))
                <script>
                    swal('Success!', '{{ Session::get('flash_message') }}', 'success');
                </script>
            @endif
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        @can('write-post')
                        <a href="{{ url('/admin/posts/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endcan

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/posts', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Content</th><th>Category</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->content }}</td><td>{{ $item->category }}</td>
                                        <td>
                                            <a href="{{ url('/admin/posts/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @can('delete-post')
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/posts', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'button',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Post',
                                                        'onclick'=>'return confirmdel("'.$item->id.'")'
                                                )) !!}
                                            {!! Form::close() !!}
                                                @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.posts.deletescript');
@endsection
