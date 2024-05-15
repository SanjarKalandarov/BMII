@extends('adminpanel.master')
@section('content')
    <div class="container">
        <h1 class="text-blue">Permissions Create</h1>
        <br>
        <form action="{{route('admin.permissions.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@endsection
