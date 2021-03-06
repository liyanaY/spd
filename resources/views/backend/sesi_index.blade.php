@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Senarai Sesi</h1><br/><br/>

        @include('common.alert')
        @include('common.form_error')

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Pingat</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sesis as $sesi)
                    <tr>
                        <td>{{ $sesi->id }}</td>
                        <td><a href="{{ route('sesi.show', $sesi->id) }}">{{ $sesi->name }}</a></td>
                        <td>{{ $sesi->status ? 'Open' : 'Close' }}</td>
                        <td>{{ $sesi->pingat }}</td>
                        <td>{{ $sesi->created_at_format }}</td>
                        <td>{{ $sesi->updated_at_format }}</td>
                        <td>
                            <a href="{{ route('sesi.edit', $sesi->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('sesi.destroy', $sesi->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-link" value="Delete"
                                 onclick="return confirm('Are you sure to delete?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
      <!--</div>
    </section>-->

@endsection