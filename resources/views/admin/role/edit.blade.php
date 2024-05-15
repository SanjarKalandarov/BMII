@extends('adminpanel.master')
@section('content')
    <div class="container">
        <div class="max-w-xl">
            <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$role->name}}" placeholder="Name"
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

                @if($role->permissions)
{{--@dd($role->permissions)--}}
                    @foreach($role->permissions as $permission)
                        <form action="{{route('admin.role.permissions.revoke',[$role->id,$permission->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger m-2">{{$permission->name}}</button>
                        </form>


                    @endforeach
                @endif
            </div>
            <div class="max-w-x3l">
                <form action="{{route('admin.role.permissions',$role->id)}}" method="post">
                    @csrf


                    <label for="permissions">Permission :</label>
                    <select class="form-select" aria-label="Default select example" name="permission" id="permissions">
                        {{--                        <option selected>Huquq tanlash</option>--}}
                        @foreach($permissions as $permission)

                            <option value="{{$permission->name}}">{{$permission->name}}</option>

                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Assign</button>
                </form>
            </div>
        </div>
    </div>

@endsection
