<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
</script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    function allowOnlyNumbers(event) {
      const charCode = (event.which) ? event.which : event.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 37 && charCode !== 39) {
          event.preventDefault();
      }
     
    }
    </script>
    <script>
        function submitForm(form) {
            if (form instanceof HTMLFormElement) {
                form.submit();
            }
        }
    </script>
<script>
    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    // New code for success message
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    // Initialize Toastr
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true
        };
    });

</script>

<script type="text/javascript">
    $(function() {
    
        const urlParams = new URLSearchParams(window.location.search);
    // Retrieve start_date and end_date from the URL parameters
    const startDateParam = urlParams.get('start_date');
    const endDateParam = urlParams.get('end_date');
    const agent_id = urlParams.get('agent_id');
    const payment_mode = urlParams.get('payment_mode');
   
    
    // Set default start and end dates
    var start = moment().startOf('month');
    var end = moment();
    
    // If start_date and end_date parameters are present in the URL, use them
    if (startDateParam && endDateParam && startDateParam !="null") {
        start = moment(startDateParam);
        end = moment(endDateParam);
    }
    
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            var currentUrl = "{{ URL::current() }}"; 
        var dynamicRoute =  currentUrl + '?start_date=' + start.format('YYYY-MM-DD') + '&end_date=' + end.format('YYYY-MM-DD')+'&agent_id='+agent_id +'&payment_mode='+payment_mode;
        window.location.href = dynamicRoute;
    });
    
        cb(start, end);
    
    });
    </script>


<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2({placeholder: "Select a Agent"});
    
    
});


function filterAgent(agentId){
    var currentUrl = "{{ URL::current() }}"; 
    const urlParams = new URLSearchParams(window.location.search);
    const startDateParam = urlParams.get('start_date');
    const endDateParam = urlParams.get('end_date');
    const payment_mode = urlParams.get('payment_mode');

    var dynamicRoute =  currentUrl + '?start_date=' + startDateParam + '&end_date=' + endDateParam + '&payment_mode='+payment_mode +'&agent_id='+agentId ;
    window.location.href = dynamicRoute;

}

</script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2({placeholder: "Select a Agent"});
    
    
});


function filterPayment(payment_mode){
    var currentUrl = "{{ URL::current() }}"; 
    const urlParams = new URLSearchParams(window.location.search);
    const startDateParam = urlParams.get('start_date');
    const endDateParam = urlParams.get('end_date');
    const agent_id = urlParams.get('agent_id');

    var dynamicRoute =  currentUrl + '?start_date=' + startDateParam + '&end_date=' + endDateParam+'&agent_id='+agent_id+'&payment_mode='+payment_mode;
    window.location.href = dynamicRoute;

}

</script>


<script>
    function toggleStatus(button) {
        var sliderId = $(button).data('id');
        var status = $(button).data('status');
        
        // Toggle the status
        status = !status;

        $.ajax({
            url: "sliders/" + sliderId + "/toggle-status", // Use correct route
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Update the UI
                if (response.status) {
                    $(button).html('<span class="badge badge-success">Active</span>');
                } else {
                    $(button).html('<span class="badge badge-danger">Inactive</span>');
                }
                // Update the status attribute
                $(button).data('status', response.status);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

<script>
    function copyCommissionCode(code) {
        // Create a textarea element
        var textarea = document.createElement('textarea');

        // Set the value of the textarea to the commission code
        textarea.value = code;

        // Append the textarea to the document body
        document.body.appendChild(textarea);

        // Select the content of the textarea
        textarea.select();

        // Copy the selected text to the clipboard
        document.execCommand('copy');

        // Remove the textarea from the document body
        document.body.removeChild(textarea);

        // Alert the user that the commission code has been copied
        toastr.success("Commission code copied: " + code);
      
    }
</script>