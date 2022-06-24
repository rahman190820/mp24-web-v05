@extends('layouts.apps')
@section('konten')

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Keluhan</h4>
                    <form action="#" method="post">
                        @csrf
                        <input class="form-controller" type="text" name="id_pasien" id="id_pasien" value="{{ $datas->id }}" >
                        <input class="form-controller" type="text" name="id_dokter" id="id_dokter" >
                        <select name="id_dokter" id="id_dokter">
                            @foreach ($datas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <textarea class="form-controller" name="" id="" cols="30" rows="10">

                        </textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection