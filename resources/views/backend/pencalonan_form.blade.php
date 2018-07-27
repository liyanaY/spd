@csrf
<div class="form-group row">
  <label class="col-sm-2 col-form-label">Sesi</label>
  <div class="col-sm-8">
    <select name="sesi_id" class="form-control">

      @foreach($sesis as $sesi)
        @if(isset($calon->sesi->id) && old('sesi_id', $sesi->id) == $calon->sesi->id)
          <option value="{{ $sesi->id }}" selected>{{ $sesi->name }}</option>
        @else
          <option value="{{ $sesi->id }}">{{ $sesi->name }}</option>
        @endif
      @endforeach

    </select>
  </div>
</div>

<fieldset class="form-group">
  <legend>Calon</legend>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Candidate Name</label>
    <div class="col-sm-8">
      <input name="name" type="text" class="form-control" placeholder="Candidate Name" value="{{ old('name', $calon->name) }}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">IC No</label>
    <div class="col-sm-8">
      <input name="ic" type="text" class="form-control" placeholder="Candidate IC No" value="{{ old('ic', $calon->ic) }}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input name="email" type="email" class="form-control" placeholder="Candidate Email" value="{{ old('email', $calon->email) }}">
    </div>
  </div>
</fieldset>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Asas</label>
    <div class="col-sm-8">
      <textarea name="asas" class="form-control">{{ old('asas', $calon->asas) }}</textarea>
    </div>
  </div>