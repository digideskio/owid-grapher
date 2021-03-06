@if (isset($subcategory))
	{!! Form::model( $subcategory, array( 'method' => $method, 'route' => $route, 'class' => 'col-sm-12 col-md-6 p0' ) ) !!}
@else
	{!! Form::open( array( 'method' => $method, 'route' => $route, 'class' => 'col-sm-12 col-md-6 p0' ) ) !!}
@endif
	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required' ) ) !!}
	</div>
	<div class="form-group">
		{!! Form::label('fk_dst_cat_id', 'Subcategories ID:') !!}
		{!! Form::select('fk_dst_cat_id', $categories, $category, array('class' => 'form-control', 'required' => 'required' ) ) !!}
	</div>
	<div class="form-group">
		{!! Form::submit( $submitLabel, ['class'=>'btn btn-success']) !!}
	</div>
{!! Form::close() !!}