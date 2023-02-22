 <!-- Sidebar -->
 @include('layouts/head')
 <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     <div class="sidebar-sticky">
         <ul class="nav flex-column">
             <li class="nav-item">
                 <a class="nav-link active" href="{{ route('admin.adminhome') }}">
                     <i class="bi bi-person-circle me-2"></i>
                     Welcome, {{ Auth::user()->name }}
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('admin.AddProducts') }}">
                     <i class="bi bi-plus-circle me-2"></i>
                     Add Product
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">
                     <i class="bi bi-people-fill me-2"></i>
                     Manage Roles
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">
                     <i class="bi bi-box-seam me-2"></i>
                     Manage Inventory
                 </a>
             </li>
         </ul>
     </div>
 </nav>