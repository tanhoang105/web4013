@extends('layout')
@section('content')
{{-- <div class="alert alert-success">{{$title}}</div> --}}
<table class="table table-bordered">
     <thead>
       <tr>
         <th scope="col">Name</th>
         <th scope="col">Adress</th>
         <th scope="col">Status</th>
         <th scope="col">Delete</th>
         <th scope="col">Update</th>
       </tr>
     </thead>
     <tbody>
          @if (!empty($teachers))
              @foreach ($teachers as $item)
               <tr>
                    <th scope="row">{{$item->nameTeaher}}</th>
                    <td>{{$item->address}}</td>
                    <td>{{$item->status}}</td>
                    <td><a href=""><button class="btn btn-danger">DELETE</button></a></td>
                    <td><a href=""><button class="btn btn-warning">UPDATE</button></a></td>
                    
               </tr>
              @endforeach   
          @endif
     </tbody>
   </table>
@endsection