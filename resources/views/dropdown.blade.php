<!DOCTYPE html>
<html>

<head>
    <title>Laravel Dynamic Dependent Dropdown</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Add Shipping Information</h1>
        <form action="{{ url('/save-user-order-info') }}" method="POST">
            @csrf



            <div class="form-group">
                <label>Country:</label>
                <select name="country_id" id="country_id" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>State:</label>
                <select name="state_id" id="state_id" class="form-control" required>
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="form-group">
                <label>City:</label>
                <select name="city_id" id="city_id" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Address Line:</label>
                <input type="text" name="address_line" class="form-control" required>
            </div>

            <div class="form-group">
                <label>User Name:</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#country_id').on('change', function() {
                var countryID = this.value;
                $("#state_id").html('');
                $.ajax({
                    url: "{{ url('fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: countryID,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state_id').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state_id").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                        $('#city_id').html('<option value="">Select City</option>');
                    }
                });
            });

            $('#state_id').on('change', function() {
                var stateID = this.value;
                $("#city_id").html('');
                $.ajax({
                    url: "{{ url('fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: stateID,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city_id').html('<option value="">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city_id").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
