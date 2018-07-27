@extends('backend.layout')

@section('content')

    <!-- Page Content 
    <section class="py-5">
      <div class="container"> -->
        <h1>Senarai Pencalonan</h1><br/><br/>

        @include('common.alert')
        @include('common.form_error')

        <table class="table">
            <thead>
                <tr>
                    <th>Sesi Name</th>
                    <th>Calon Name</th>
                    <th>IC No</th>
                    <th>Email</th>
                    <th>Asas</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach($calons as $calon)
                    <tr>
                        <td><a href="{{ route('pencalonan.show', $calon->id) }}">{{ $calon->sesi->name }}</a></td>
                        <td>{{ $calon->name }}</td>
                        <td>{{ $calon->ic }}</td>
                        <td>{{ $calon->email }}</td>
                        <td>{{ str_limit($calon->asas, 10) }}</td>
                        <td>{{ $calon->created_at->format('d M y h:i:s') }}</td>
                        <td>{{ $calon->updated_at->format('d M y h:i:s') }}</td>
                        <td>
                            <a href="{{ route('pencalonan.edit', $calon->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('pencalonan.destroy', $calon->id) }}" style="display: inline;">
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