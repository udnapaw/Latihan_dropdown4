<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 - onChange event using ajax dropdown list</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstreapcdn.com/bootstrap/3.3.7/css/
    bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>    
</head>

<body>
<div class="container">
    <h1>Laravel 6 - Dynamic Dependent Select Box using JQuery Ajax Example</h1>

    {!! Form::open() !!}
    <div class="form-group">
        <label>Select Country</label>
        {!! Form::select('id_country', ['' => '--- Select Country ---']+$countries, null, ['class' => 
        'form-control']) !!}
    </div>

    <div class="form-group">
            <label>Select State</label>
            {!! Form::select('id_state', ['' => '--- Select State ---'], null, ['class' => 
            'form-control']) !!}
    </div>

    <div class="form-group">
            <label>Select District</label>
            {!! Form::select('id_district', ['' => '--- Select District ---'], null, ['class' => 
            'form-control']) !!}
    </div>

    <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
    </div>

    {!! Form::close() !!}
</div>

<script type="text/javascript">
    $("select[name='id_country']").change(function(){
        var id_country = $(this).val();
        var token = $("input[name = '_token'").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_country:id_country, _token:token},
            success: function(data){
                $("select[name = 'id_state']").html('');
                $("select[name = 'id_state']").html(data.options);
            }
        });
    });

    $("select[name='id_state']").change(function(){
        var id_state = $(this).val();
        var token = $("input[name = '_token'").val();
        $.ajax({
            url: "<?php echo route('select-district') ?>",
            method: 'POST',
            data: {id_state:id_state, _token:token},
            success: function(data){
                $("select[name = 'id_district']").html('');
                $("select[name = 'id_district']").html(data.options);
            }
        });
    });
</script>
</body>
</html>