@extends('admin.layout.main')
@section('title', 'Agent Listing')
@section('section')

<div class="errors">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">

            <div class="add" style="display: flex; align-items: center;">
                <div class="btns" style="margin-left: auto;">
                    <a id="openModalBtn" href="{{ route('sliders.create') }}" class="btn btn-secondary mb-2">Add Slider</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="mb-0 table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%" scope="col">Sr. No.</th>
                            <th style="width: 20%" scope="col">Image</th>
                            <th style="width: 15%" scope="col">Status</th>
                            <th style="width: 15%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $slider->image }}" width="400" height="200">
                                </td>
                                <td>
                                    <button class="btn btn-sm status-toggle clickable" data-id="{{ $slider->id }}" data-status="{{ $slider->status ? '1' : '0' }}" onclick="toggleStatus(this)">
                                        @if ($slider->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </button>
                                </td>
                                <td>
                                    <!-- Add delete icon with a form for deleting the slider -->
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No sliders found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


