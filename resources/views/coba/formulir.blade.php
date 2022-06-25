{!! Form::open(['url' => 'foo/bar']) !!}
    {{-- echo Form::open(['route' => 'route.name']) --}}
@php
    echo Form::label('email', 'E-Mail Address');
    echo Form::label('email', 'E-Mail Address', ['class' => 'awesome']);
    echo Form::text('email', 'example@gmail.com');
    echo Form::password('password', ['class' => 'awesome']);
    // echo Form::email($name, $value = null, $attributes = []);
    // echo Form::file($name, $attributes = []);
    echo Form::checkbox('name', 'value');

echo Form::radio('name', 'value');
echo Form::checkbox('name', 'value', true);

echo Form::radio('name', 'value', true);
echo Form::number('name', 'value');

echo Form::date('name', \Carbon\Carbon::now());
echo Form::file('image');
echo Form::select('size', ['L' => 'Large', 'S' => 'Small']);
echo Form::select('size', ['L' => 'Large', 'S' => 'Small'], 'S');
echo Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']);
echo Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard'],
    'Dogs' => ['spaniel' => 'Spaniel'],
]);

echo Form::selectRange('number', 10, 20);
echo Form::selectMonth('month');

echo Form::submit('Click Me!');




@endphp
<textarea name="te" id="te" cols="30" rows="10"></textarea>
<div class="form-group">
    {{ Form::label('dt', null, ['class' => 'control-label']) }}
    {{ Form::text('dt', 'selamat', array_merge(['class' => 'form-control'])) }}
</div>
{{-- {{ Form::bsText('first_name') }} --}}
{!! Form::close() !!}
