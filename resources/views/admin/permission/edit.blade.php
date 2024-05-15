@extends('adminpanel.master')
@section('content')
    <div class="container">
        <h1>Permission edit</h1>
        <div class="max-w-xl">
            <form action="{{route('admin.permissions.update',$permissions->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$permissions->name}}" placeholder="Name"
                           name="name">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <div class="mt-6 p-2">
            <h2 class="text-2xl font-semibold">
                Role Permissions
            </h2>
            <div class="flex mt-4">

                @if($permissions->roles)
                    {{--@dd($role->permissions)--}}
                    @foreach($permissions->roles as $permission_role)
                        <form action="{{route('admin.permissions.roles.remove',[$permissions->id,$permission_role->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger m-2">{{$permission_role->name}}</button>
                        </form>


                    @endforeach
                @endif
            </div>
            <div class="max-w-x3l">
                <form action="{{route('admin.permissions.roles',$permissions->id)}}" method="post">
                    @csrf


                    <label for="role">Roles :</label>
                    <select class="form-select" aria-label="Default select example" name="role" id="role">
                        {{--                        <option selected>Huquq tanlash</option>--}}
                        @foreach($roles as $role)

                            <option value="{{$role->name}}">{{$role->name}}</option>

                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Assign</button>
                </form>
            </div>
        </div>
    </div>

@endsection
