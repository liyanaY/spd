@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Edit Pencalonan : {{ $calon->name }}</h1><br><br>

        @include('common.alert')
        @include('common.form_error')

        <form method="POST" action="{{ route('pencalonan.update', $calon->id) }}">
          {{ method_field('PUT') }}
          <!-- @method('PUT')-->
          
          @include('backend.pencalonan_form')

          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </div>
          </div>
        </form>
      <!--</div>
    </section>-->

@endsection