 <!-- Sidebar -->
 @include('layouts/head')
 <div class="container">
     <ul class="nav flex-column">
         <li class="nav-item">
             <a href="{{ route('admin.adminhome') }}">
                 <button class="btn btn-outline-dark"><i class="bi bi-person-circle me-2"></i>
                     Welcome, {{ Auth::user()->name }}</button>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{ route('admin.AddProducts') }}">
                 <button class="btn btn-outline-dark"><i class="bi bi-plus-circle me-2"></i>
                     Add Product</button>
             </a>
         </li>
         <li class="nav-item">
             <a href="#">
                 <button class="btn btn-outline-dark"><i class="bi bi-people-fill me-2"></i>
                     Manage Roles</button>
             </a>
         </li>
         <li class="nav-item">
             <a href="#">
                 <button class="btn btn-outline-dark"><i class="bi bi-box-seam me-2"></i>
                     Manage Inventory</button>
             </a>
         </li>
     </ul>
 </div>