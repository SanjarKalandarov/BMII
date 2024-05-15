@extends('adminpanel.master')
@section('content')

    <div class="container">

        <h1>Permission</h1>
        <div class="flex justify-content-end">
            <a href="{{route('admin.permissions.create')}}" class="btn btn-primary">Create</a>
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
         @foreach($permissions as $role)
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
                             <a href="{{route('admin.permissions.edit',$role->id)}}" class="btn btn-success" ><i class="fas fa-pen"></i></a>

                         </div>
                     </div>
                 </td>
                 <td>
                     <div class="d-flex align-items-center">
                         <div class="ms-3">
                             <form action="{{route('admin.permissions.destroy',$role->id)}}" method="post" onsubmit="return confirm('Rosdanham ochirmoqchimisiz ?')">
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
