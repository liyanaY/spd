@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Show Sesi : {{ $sesi->name }}</h1><br><br>

        @include('common.alert')
        @include('common.form_error')

        
        Name: {{ $sesi->name }} <br>
        Name: {{ $sesi->status ? 'Open' : 'Close' }} <br>
        Name: {{ $sesi->pingat }} <br><br>

        <a href="{{ url()->previous() }}" class="btn btn-warning">Back to Session List</a>
        
      <!--</div>
    </section>-->

@endsection

@push('css')
     <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush

@push('js')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@endpush

