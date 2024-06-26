@extends('admin.layout.main')
@section('title', 'Add Commission of ' . ($data ? $data->name : 'Default Title'))

@section('section')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <form action="{{ $data ? route('agent.commission', ['id' => $data->id]) : '#' }}" method="POST"
                    id="fix">
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <div class="add" style="display: flex; align-items: center;">
                        <div class="btns" style="margin-left: auto;">
                            <button id="addCommissionBtn" class="btn btn-success"><i class="fa fa-plus"
                                    style="font-size:16px"></i></button>
                            <button id="removeCommissionBtn" class="btn btn-danger"><i class="fa fa-minus"
                                    style="font-size:16px"></i></button>
                        </div>
                    </div>

                    @forelse ($commissiondata as $record)
                        <div  id="commissionContainer" class="commissionContainer mb-3 row">
                            <input type="hidden" class="form-control" name="id[]" value="{{ $record->id }}" required>
                            <div class="col-md-5">
                                <label>Commission</label>
                                <input type="number" class="form-control" name="commission[]" value="{{ $record->commission }}"  required>
                            </div>
                            <div class="col-md-5">
                                <label>Commission-Type</label>
                                <select class="form-control" name="commission_type[]" required>
                                    <option value="" disabled>Select Type</option>
                                    <option value="fixed" {{ $record->commission_type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                                    <option value="percentage" {{ $record->commission_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                </select>
                            </div>
                            <!-- Exclude delete button from being cloned -->
                            <div class="col-md-2 d-flex align-items-center">
                                <a href="{{ route('delete.commission', ['id' => $record->id]) }}" class="text-danger">Delete</a>
                            </div>
                        </div>
                    @empty
                        <div id="commissionContainer" class="mb-3 row">
                            <div class="col-md-6">
                                <label>Commission</label>
                                <input type="number" class="form-control" name="commission[]" value="{{ $data->commission ?? '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label>Commission-Type</label>
                                <select class="form-control" name="commission_type[]" required>
                                    <option value="fixed" {{ isset($data) && $data->commission_type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                                    <option value="percentage" {{ isset($data) && $data->commission_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                </select>
                            </div>
                        </div>
                    @endforelse

                </form>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" onclick="submitForm(fix)">Submit</button>
                    <a href="{{ route('agent.list') }}" class="btn btn-secondary ml-2">Back</a>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addCommissionBtn").click(function(event) {
                event.preventDefault();
                // Clone the commission inputs and append them to the form
                var clonedInputs = $("#commissionContainer").clone();
                // Remove delete button from the cloned inputs
                clonedInputs.find(".d-flex.align-items-center").remove();
                clonedInputs.find("input, select").val(""); // Clear the input values
                $("form").append(clonedInputs);
            });

            $("#removeCommissionBtn").click(function(event) {
                event.preventDefault();
                // Check if there is more than one set before removing
                if ($("form").children(".commissionContainer").length > 1) {
                    $("form").children(".commissionContainer").last().remove();
                }
            });
        });
    </script>

@endsection
