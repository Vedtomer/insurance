@extends('admin.layout.main')
@section('title', 'Agent Listing')
@section('section')



<div class="errors">
    @if ($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
</div>

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="add" style="display: flex; align-items: center;">
                <div class="btns" style="margin-left: auto;">
                    <a id="openModalBtn" href="{{ route('agent') }}" class="btn btn-secondary mb-2">Add Agent</a>
                </div>
              </div>
              
    
        <div class="table-responsive">
            <table class="mb-0 table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th style="width: 5%" scope="col">Agent ID</th>
                        <th style="width: 20%" scope="col">Name</th>
                        <th style="width: 20%" scope="col">Email</th>
                        <th style="width: 20%" scope="col">State</th>
                        <th style="width: 20%" scope="col">City</th>
                        <th style="width: 20%" scope="col">Address</th>
                        <th style="width: 20%" scope="col">Mobile Number</th>
                        <th style="width: 20%" scope="col">Agentcommission</th>
                        <th style="width: 20%" scope="col">Commission</th>
                        <th style="width: 20%" scope="col">Transaction</th>
                        <th style="width: 15%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->mobile_number}}</td>
                            <td>{{ $user->agentcommission->commission }}</td>
                            {{-- <td>{{ $user->commission }}</td>
                            <td>{{ $user->commission_type }}</td> --}}
                            <td >
                                <a class="btn  mr-2" href="{{ route('agent.commission', $user->id) }}"><i class="fa fa-edit" style="font-size:24px"></i>
                                </a>
                                {{-- <a class="btn btn-secondary mr-2" href="{{ route('admin.commission', $user->commission->id) }}">View
                                </a> --}}
                            </td>
                            <td>
                                <a class="btn  mr-2" href="{{ route('transaction', $user->id) }}"><i class="metismenu-icon pe-7s-look" title="Download" style="font-size:30px;text-align: center;"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn " href="{{ route('agent.edit', $user->id) }}"><i class="fa fa-edit" style="font-size:24px"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        </div>
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