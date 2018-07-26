@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Tambah Pencalonan</h1><br><br>

        @include('common.alert')
        @include('common.form_error')

        <form method="POST" action="{{ route('pencalonan.store') }}">
          
          @include('backend.pencalonan_form')

          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Add Candidate</button>
            </div>
          </div>
        </form>
      <!--</div>
    </section>-->

@endsection