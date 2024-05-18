@extends('adminpanel.master')
@section('content')
    {{\Illuminate\Support\Facades\Session::has('message')}}


    {{\Illuminate\Support\Facades\Session::get('message')}}

    <div class="container">
        <div>
            <a href="{{route('admin.users.create')}}" class="btn btn-primary">Foydalanuvchi qoshish</a>
        </div>
        <h6 class="fill-sky-600">Role</h6>

        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
            <tr>
                <th>Role Name</th>
                <th>Email</th>
{{--                <th>action</th>--}}


            </tr>
            </thead>
            <tbody>
         @foreach($users as $role)
             <tr>
                 <td>
                     <div class="d-flex align-items-center">
                         <div class="ms-3">
                             <p class="fw-bold mb-1">{{$role['name']}}</p>

                         </div>
                     </div>
                 </td>
                 <td>
                     <div class="d-flex align-items-center">
                         <div class="ms-3">
                             <p class="fw-bold mb-1">{{$role['email']}}</p>

                         </div>
                     </div>
                 </td>

                 <td>
                     <div class="d-flex align-items-center">
                         <div class="ms-3 d-flex">
                             <a href="{{route('admin.users.show',$role)}}" class="btn btn-success m-1" >Role</a>
{{--                             <a href="" class="btn btn-info m-1" >Permission</a>--}}

                             <form action="{{route('admin.users.destroy',$role->id)}}" method="post" class="m-1" onsubmit="return confirm('Rosdanham ochirmoqchimisiz ?')">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger bg-black" style="background-color: red"><i class="fas fa-trash"></i></button>

                             </form>
                         </div>
                     </div>
                 </td>
             </tr>

         @endforeach

            </tbody>
        </table>
    </div>

    @endsection
