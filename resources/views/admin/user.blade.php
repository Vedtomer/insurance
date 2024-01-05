@extends('admin.layout.main')
@section('title', 'Agent Listing')
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

    .card-body {
        height: 200px;
        width: 400px;
    }

    .btns {
        float: right;
        margin-bottom: 8px;
    }

    .btn {
        border-radius: 0px;
    }
</style>



<div class="errors">
    @if ($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
</div>
<div class="login-container">




    <div class="add" style="display: flex; align-items: center;">
    
        <div class="btns" style="margin-left: auto;">
            <a id="openModalBtn" href="{{ route('useradd') }}" class="btn btn-secondary">Add Agent</a>
        </div>
    </div>
    {{-- <div class="btns" style="margin-left: auto;">


    </div> --}}

    {{-- <h5 class="card-title">Table responsive</h5> --}}
    <!-- Modal container -->
    <div class="modal-container" id="myModal">

        <!-- Modal content -->
        <div class="modal-content">
            <!-- Close button -->
            <span class="close-btn " onclick="closeModal()">&times;</span>
        

            <!-- Form inside the modal -->

            <div class="container">
              
                <form action="{{ route('user.save') }}" method="post">

                    @csrf
                    <div class="mb-3">
                        <h3>ADD AGENT</h3>
                
                        <input type="text" class="form-control" name="name" placeholder="Enter username" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                
                    <div class="mb-3">
                        <input type="text" class="form-control" name="state" placeholder="Enter state" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="city" placeholder="Enter city" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="mobile_number" placeholder="Enter mobile number" required>
                    </div>
                    <div class="mb-3">
                        {{-- <label for="commission">Commission Type:</label> --}}
                        <select class="form-control" id="commission" name="commission_type" required>
                            <option value="" disabled selected>Commission Type</option>
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" class="form-control" name="commission" placeholder="Enter commission" required>
                    </div>
                
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>


        {{-- <h2>Agent data</h2> --}}

    </div>

    {{-- @php
    print_r($userdata);
    @endphp
    {{-- --}}
    {{-- @if(count($data) > 0) --}}

    <div class="table-responsive">
        {{-- <h2>Agent List</h2> --}}
       @if(isset($data) && count($data) > 0)
            <table class="mb-0 table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%" scope="col">ID</th>
                        <th style="width: 20%" scope="col">Name</th>
                        <th style="width: 20%" scope="col">Email</th>
                        {{-- <th style="width: 20%" scope="col">password</th> --}}
                        <th style="width: 20%" scope="col">state</th>
                        <th style="width: 20%" scope="col">city</th>
                        <th style="width: 20%" scope="col">address</th>
                        <th style="width: 20%" scope="col">moblie-number</th>
                        <th style="width: 20%" scope="col">comission</th>
                        <th style="width: 20%" scope="col">comission-type</th>
                     
                        {{-- <th style="width: 10%" scope="col">View</th> --}}
                        <th style="width: 15%" scope="col">Action</th>
                        {{-- <th style="width: 15%" scope="col">Delete</th> --}}
                        <!-- Adjust the widths as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->mobile_number}}</td>
                            <td>{{ $user->commission }}</td>
                            <td>{{ $user->commission_type }}</td>
                            <td><a class="btn btn-success" href="{{route('useredit',$user->id)}}">Update</a></td>
                            {{-- <td><a class="btn btn-danger" href="{{route('userdelete',$user->id)}}">Delete</a></td> --}}
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No users found.</p>
        @endif
    </div>
    
    
                    {{-- <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td><a class="btn btn-primary" href="{{route('newview',$user->id)}}">View</a></td>
                    <td><a class="btn btn-success" href="{{route('newedit',$user->id)}}">Update</a></td>
                    <td><a class="btn btn-danger" href="{{route('delete',$user->id)}}">Delete</a></td> --}}
               
                {{-- @endforeach --}}
            {{-- </tbody>
        </table> --}}
        {{-- @else --}}
        {{-- <p>No user data available.</p> --}}
        {{-- @endif --}}
  

 

{{-- 
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
    </script> --}}

    @endsection