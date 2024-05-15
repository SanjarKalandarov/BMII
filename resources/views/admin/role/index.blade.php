@extends('adminpanel.master')
@section('content')
{{--    {{\Illuminate\Support\Facades\Session::has('message')}}--}}


{{--    {{\Illuminate\Support\Facades\Session::get('message')}}--}}

    <div class="container">
        <h6 class="fill-sky-600">Role</h6>
        <div class="flex justify-content-end">
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Create</a>
        </div>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>edit</th>
                <th>delete</th>


            </tr>
            </thead>
            <tbody>
         @foreach($roles as $role)
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
                             <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-success" ><i class="fas fa-pen"></i></a>

                         </div>
                     </div>
                 </td>
                 <td>
                     <div class="d-flex align-items-center">
                         <div class="ms-3">
                             <form action="{{route('admin.roles.destroy',$role->id)}}" method="post" onsubmit="return confirm('Rosdanham ochirmoqchimisiz ?')">
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
