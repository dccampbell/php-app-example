<fieldset>

    <div class="mb-3">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        <div class="invalid-feedback">Please enter your name.</div>
    </div>

    <div class="mb-3">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
        <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>

    <div class="mb-3">
        {!! Form::label('street', 'Street Address') !!}
        {!! Form::text('street', null, ['class' => 'form-control', 'required']) !!}
        <div class="invalid-feedback">Please enter your street address.</div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
            <div class="invalid-feedback">Please enter your city.</div>
        </div>
        <div class="col-md-4 mb-3">
            {!! Form::label('state', 'State') !!}
            {!! Form::select('state', [
                'AL' => 'Alabama',      'AK' => 'Alaska',         'AZ' => 'Arizona',
                'AR' => 'Arkansas',     'CA' => 'California',     'CO' => 'Colorado',       'CT' => 'Connecticut',
                'DC' => 'D.C.',         'DE' => 'Delaware',       'FL' => 'Florida',        'GA' => 'Georgia',
                'HI' => 'Hawaii',       'ID' => 'Idaho',          'IL' => 'Illinois',       'IN' => 'Indiana',
                'IA' => 'Iowa',         'KS' => 'Kansas',         'KY' => 'Kentucky',       'LA' => 'Louisiana',
                'ME' => 'Maine',        'MD' => 'Maryland',       'MA' => 'Massachusetts',  'MI' => 'Michigan',
                'MN' => 'Minnesota',    'MS' => 'Mississippi',    'MO' => 'Missouri',       'MT' => 'Montana',
                'NE' => 'Nebraska',     'NV' => 'Nevada',         'NH' => 'New Hampshire',  'NJ' => 'New Jersey',
                'NM' => 'New Mexico',   'NY' => 'New York',       'NC' => 'North Carolina', 'ND' => 'North Dakota',
                'OH' => 'Ohio',         'OK' => 'Oklahoma',       'OR' => 'Oregon',         'PA' => 'Pennsylvania',
                'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota',   'TN' => 'Tennessee',
                'TX' => 'Texas',        'UT' => 'Utah',           'VT' => 'Vermont',        'VA' => 'Virginia',
                'WA' => 'Washington',   'WV' => 'West Virginia',  'WI' => 'Wisconsin',      'WY' => 'Wyoming'
            ], null, ['class'=>'custom-select d-block w-100', 'placeholder' => 'Choose...', 'required']) !!}
            <div class="invalid-feedback">Please select a state.</div>
        </div>
        <div class="col-md-3 mb-3">
            {!! Form::label('zip', 'Zip Code') !!}
            {!! Form::text('zip', null, ['class' => 'form-control', 'required']) !!}
            <div class="invalid-feedback">Please enter a valid zip code.</div>
        </div>
    </div>
    <div class="custom-control custom-checkbox">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', 1, null, ['id' => 'active', 'class' => 'custom-control-input']) !!}
        {!! Form::label('active', 'Active Customer', ['class' => 'custom-control-label']) !!}
    </div>
</fieldset>