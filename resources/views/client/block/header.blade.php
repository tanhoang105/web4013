<header>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
           <a class="navbar-brand" href="{{route('user.home')}}">Home</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="{{route('user.update-user')}}">Update</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{route('user.me')}}">About me</a>
               </li>
               
               <li class="nav-item">
                 <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
               </li>
             </ul>
             <form class="d-flex">
               <input name="key" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <a href="{{route('user.cate')}}"><button class="btn btn-success">Search</button></a>
              </form>
           </div>
         </div>
       </nav>
 </header>