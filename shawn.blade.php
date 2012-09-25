// controllers/admin/series.php

class Admin_Series_Controller extends Admin_Base_Controller
{

	public function get_add()
	{
		$this->layout->content = View::make( 'admin.series.add' );
	}

	public function post_add()
	{
		if( !SeriesForm::is_valid() )
		{
			return Redirect::back()->with_input()->with_errors( SeriesForm::$validation );
		}

		$series = new Series( Input::all() );

		if( !$series->is_valid() )
		{
			return Redirect::back()->with_input()->with_errors( $series->$validation );
		}

		$series->save();

		return Redirect::to_action( 'admin.series@index' )->with( 'success', 'The series ' . $series->name . ' has been added.' );

	}

	public function get_edit( $series_id )
	{
		$series = Series::find( $series_id );

		if( is_null( $series ))
		{
			return Redirect::to_action( 'admin.series@index' )->with_errors( 'The requested series could not be found.' );
		}

		SeriesForm::load( $series );

		$this->layout->content = View::make( 'admin.series.edit' );
	}

	public function post_edit( $series_id )
	{
		$series = Series::find( $series_id );

		if( is_null( $series ))
		{
			return Redirect::to_action( 'admin.series@index' )->with_errors( 'There was an error saving the series.' );
		}

		if( !SeriesForm::is_valid() )
		{
			return Redirect::back()->with_input()->with_errors( SeriesForm::$validation );
		}

		$series->fill( Input::all() );

		if( !$series->is_valid() )
		{
			return Redirect::back()->with_input()->with_errors( $series::$validation );
		}

		$series->save();

		return Redirect::to_action( 'admin.series@index' )->with( 'success', 'The series ' . $series->name . ' has been updated.' );
	}

}

// views/admin/series/add.blade.php

<div class="page-header">
    <h1>Add Series</h1>
</div>

@include( 'admin.series._series_form' )

// views/admin/series/edit.blade.php

<div class="page-header">
    <h1>Edit Series</h1>
</div>

@include( 'admin.series._series_form' )

// views/admin/series/_series_form.blade.php

{{ Form::open() }}

    <div class="row">
        <div class="span7">

            <div class="control-group {{ $errors->has( 'name' ) ? 'error' : '' }}">
                {{ Form::label( 'name', 'Name', array( 'class' => 'control-label' )) }}
                <div class="controls">
                    {{ Form::text( 'name', SeriesForm::old( 'name' ), array( 'class' => 'input-xxlarge' )) }}
                    {{ $errors->first( 'name', '<span class="help-inline">:message</span>' ) }}
                </div>
            </div>

            <div class="control-group {{ $errors->has( 'short_description' ) ? 'error' : '' }}">
                {{ Form::label( 'short_description', 'Short Description', array( 'class' => 'control-label' )) }}
                <div class="controls">
                    {{ Form::textarea( 'short_description', SeriesForm::old( 'short_description' ), array( 'class' => 'input-xxlarge', 'rows' => '3' )) }}
                    {{ $errors->first( 'short_description', '<span class="help-inline">:message</span>' ) }}
                </div>
            </div>

            <div class="control-group {{ $errors->has( 'price' ) ? 'error' : '' }}">
                {{ Form::label( 'price', 'Price', array( 'class' => 'control-label' )) }}
                <div class="controls">
                    <div class="input-prepend input-append">
                        <span class="add-on">$</span>{{ Form::text( 'price', SeriesForm::old( 'price' ), array( 'class' => 'input-mini' )) }}<span class="add-on">.00</span>
                    </div>
                    {{ $errors->first( 'price', '<span class="help-inline">:message</span>' ) }}
                </div>
            </div>

        </div> <!-- span7 -->
        <div class="span5">
            <div class="well">
                {{ Form::submit( 'Save Series', array( 'class' => 'btn btn-primary btn-large', 'style' => 'width:100%' )) }}
            </div>
        </div><!-- span5 -->
    </div><!-- row -->

{{ Form::close() }}
