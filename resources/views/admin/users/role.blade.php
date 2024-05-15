@extends('adminpanel.master')
@section('content')
    <div class="container">
        <div><a href="{{route('admin.users.index')}}" class="btn btn-primary">Usser</a></div>
        <div class="max-w-xl">
            <div>{{$user->name}}</div>
            <div>{{$user->email}}</div>
            <div class="mt-6 p-2">
                <h2 class="text-2xl font-semibold">
                    Roless
                </h2>
                <div class="flex mt-4">

                    @if($user->roles->isNotEmpty())
                        @foreach($user->roles as $user_role)

                            <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger m-2">{{ $user_role->name }}</button>
                            </form>
                        @endforeach
                    @endif

                </div>
                <div class="max-w-x3l">
                    <form action="{{route('admin.users.roles',$user->id)}}" method="post">
                        @csrf


                        <label for="role">Roles :</label>
                        <select class="form-select" aria-label="Default select example" name="role" id="role">
                            {{--                        <option selected>Huquq tanlash</option>--}}
                            @foreach($roles as $role)
{{--@dd($role)--}}
                                <option value="{{$role->name}}">{{$role->name}}</option>

                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Assign</button>
                    </form>
                </div>
            </div>
            <div class="mt-6 p-2">
                <h2 class="text-2xl font-semibold">
                    User Permissions
                </h2>
                <div class="flex mt-4">

                    @if($user->permissions)
{{--                        @dd($user->permissions)--}}
                        {{--@dd($role->permissions)--}}
                        @foreach($user->permissions as $permission)
                            <form action="{{route('admin.users.permission.remove',[$user->id,$permission->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger m-2">{{$permission->name}}</button>
                            </form>


                        @endforeach
                    @endif
                </div>
                <div class="max-w-x3l">
                    <form action="{{route('admin.users.permissions',$user->id)}}" method="post">
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

    </div>

@endsection
