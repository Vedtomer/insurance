@extends('admin.layout.main')
@section('section')


        <style>
          
            body {
                font-family: Arial, sans-serif;
            }
    
            .login-container {
        min-width: 500px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    
            /* Styles for the modal container */
            .modal-container {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
            }
    
            /* Styles for the modal content */
            .modal-content {
                background: #fff;
                padding: 20px;
                border-radius: 5px;
                width: 300px;
                text-align: center;
            }
    
            /* Styles for the form inside the modal */
            form {
                display: flex;
                flex-direction: column;
            }
    
            /* Style for the close button */
            .close-btn {
                cursor: pointer;
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 18px;
            }
      
           
    
            .w3-container.w3-teal h1 {
                display: block;
            }
            .card-body{
                height: 200px;
                width: 400px;
            }
    
            
        
        </style>
        <div class="login-container">
<!-- Button to open the modal -->

<button id="openModalBtn" class="btn btn-info">Add User</button>

<br><br>
<h5 class="card-title">Table responsive</h5>
<!-- Modal container -->
<div class="modal-container" id="myModal">
    
    <!-- Modal content -->
    <div class="modal-content">
        <!-- Close button -->
        <span class="close-btn " onclick="closeModal()">&times;</span>


        <!-- Form inside the modal -->

    <div class="container">
        <div class="errors">
            @if ($errors->any())
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">
                {{$error}}   
            </div>
            @endforeach    
            @endif
        </div>
        <form action="{{route('userdata')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required >
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


    <h2>user data</h2>
   
</div>

{{-- @php
    print_r($userdata);
@endphp
{{--  --}}
@if(count($data) > 0)
        
<div class="table-responsive">
    <table class="mb-0 table">
                <thead>
                    <tr>
                        {{-- <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                      
                      
                        <th scope="col">View</th>
                        <th scope="col">update</th>
                        <th scope="col">Delete</th> --}}
                        <th>#</th>
                        <th>Table heading</th>
                        <th>Table heading</th>
                        <th>Table heading</th>
                        <th>Table heading</th>
                        <th>Table heading</th>
                        <th>Table heading</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $id=> $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                     
                            <td><a class="btn btn-primary" href="{{route('newview',$user->id)}}">View</a></td>
                            <td><a class="btn btn-success" href="{{route('newedit',$user->id)}}">Update</a></td>
                            <td><a class="btn btn-danger" href="{{route('delete',$user->id)}}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No user data available.</p>
        @endif
    </div>


 
    
<script>
    // Function to open the modal
    function openModal() {
        document.getElementById("myModal").style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Event listener for the open modal button
    document.getElementById("openModalBtn").addEventListener("click", openModal);
</script>

@endsection