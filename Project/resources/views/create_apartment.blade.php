@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="container">
      <h2 class="text-center">Inserisci il tuo appartamento</h2>
      <div class="row">
        <div class="col-md-10 mx-auto">
          <form action="{{ route('store_apartment') }}" method="post" enctype="multipart/form-data" role="form">
            @method('POST')
            @csrf

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="title">Titolo</label>
                <input type="text" required name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo dell'appartamento" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-6">
                <label for="address">Indirizzo</label>
                <input type="text" required name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Citta, indirizzo" value="{{ old('address') }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="hidden" id="hidden-lat" name="lat" value="">
                <input type="hidden" id="hidden-lon" name="lon" value="">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <label for="room_number">Numero di stanze</label>
                <input type="number" required name="room_number" id="room_number" class="form-control  @error('room_number') is-invalid @enderror" value="{{ old('room_number') }}">
                @error('room_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-4">
                <label for="bath_number">Numero di bagni</label>
                <input type="number" required name="bath_number" id="bath_number" class="form-control  @error('bath_number') is-invalid @enderror" value="{{ old('bath_number') }}">
                @error('bath_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-4">
                <label for="beds">Posti letto</label>
                <input type="number" required name="beds" id="beds" class="form-control  @error('beds') is-invalid @enderror" value="{{ old('bath_number') }}">
                @error('beds')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="area">Area</label>
                <input type="number" required name="area" id="area" class="form-control @error('area') is-invalid @enderror" value="{{ old('area') }}">
                @error('area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-6">
                <label for="price">Prezzo in €</label>
                <input type="number" required name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="image">Foto copertina appartamento</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-6">
                <label for="image">Carica diverse foto per mostrare il tuo appartamneto</label>
                <input type="file" name="photos[]" id="photos" class="form-control @error('photos') is-invalid @enderror" multiple>
                @error('photos')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-check">
                    <label>Optionals:</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="1">
                    <label for="optionals[]">wi-fi</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="2">
                    <label for="optionals[]">Piscina</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="3">
                    <label for="optionals[]">Sauna</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="4">
                    <label for="optionals[]">Box Auto</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="5">
                    <label for="optionals[]">Vista Mare</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="6">
                    <label for="optionals[]">Portineria</label>
                  </div>
                </div>
              </div>

            <div class="form-group row">
              <div class="col-sm-12">
                <label for="description">Descrizione appartamento</label>
                <textarea rows="4" name="description" required id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrizione"> {{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn ">Crea appartamento</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/createApartment.js') }}"></script>
@endsection
