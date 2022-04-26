<html>
<head>
    <title>Events</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <b>Events</b>
            <hr>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12 text-right">
            <button class="btn btn-success btn-sm pull-right export-events">
                Export to CSV
            </button>
        </div>
        <div class="col-md-3">
            <label class="font-weight-bold">Select Start Date</label>
            {{
                html()
                    ->text('date')
                    ->class('form-control start-date')
                    ->id('date-select')
                    ->placeholder('YYYY-MM-DD')
            }}
        </div>
        <div class="col-md-3">
            <label class="font-weight-bold">Select End Date</label>
            {{
                html()
                    ->text('date')
                    ->class('form-control end-date')
                    ->id('date-select')
                    ->placeholder('YYYY-MM-DD')
            }}
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            {!! $html->table(['class' => 'table table-striped']) !!}
        </div>
    </div>
</div>
</body>
</html>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{!! $html->scripts() !!}

<script>
    $('.start-date, .end-date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $('.start-date, .end-date').on('change', function () {
        LaravelDataTables["dataTableBuilder"].ajax.url('{{ request()->url() }}?start_date=' + $('.start-date').val() + '&end_date=' + $('.end-date').val()).load();
    });

    $('.export-events').on('click', function () {
        window.open('{{ route('events.export') }}?start_date=' + $('.start-date').val() + '&end_date=' + $('.end-date').val(), '_blank');
    });
</script>
