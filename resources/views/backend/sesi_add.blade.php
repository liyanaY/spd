@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Tambah Sesi</h1><br><br>

        @include('common.alert')
        @include('common.form_error')

        <form method="POST" action="{{ route('sesi.store') }}">
          
          @include('backend.sesi_form')

          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Add Session</button>
            </div>
          </div>
        </form>
      <!--</div>
    </section>-->

@endsection