@extends('layout')
@section('content')
{{-- <div class="alert alert-success">{{$title}}</div> --}}
<table class="table table-bordered">
     <thead>
       <tr>
          <th>ID</th>
         <th scope="col">Name</th>
         <th scope="col">Desc</th>
       </tr>
     </thead>
     <tbody>
          @if (!empty($cates))
              @foreach ($cates as $item)
               <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->desc}}</td>
                    <td><a href=""><button class="btn btn-danger">DELETE</button></a></td>
                    <td><a href=""><button class="btn btn-warning">UPDATE</button></a></td>
                    
               </tr>
              @endforeach   
          @endif
     </tbody>
   </table>
@endsection