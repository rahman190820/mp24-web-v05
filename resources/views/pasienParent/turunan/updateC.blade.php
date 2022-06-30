@extends('layouts.apps')
@section('konten')
    <div class="row">
        <div class="col s12">
            <ul class="collapsible categories-collapsible">
                <li >
                  {{-- <li class="active"> --}}
                  <div class="collapsible-header">Orang tua 1<i class="material-icons">
                      keyboard_arrow_right </i></div>
                    @include('pasienParent.turunan.formulir')
                </li>
                <li>
                  <div class="collapsible-header">Orang Tua 2<i class="material-icons">
                      keyboard_arrow_right </i></div>
                      @include('pasienParent.turunan.formulir')
                </li>
                <li>
                  <div class="collapsible-header">Anak Pertama<i class="material-icons">
                      keyboard_arrow_right </i></div>
                      @include('pasienParent.turunan.formulir')
                </li>
                <li>
                  <div class="collapsible-header">Anak Kedua<i class="material-icons">
                      keyboard_arrow_right </i></div>
                      @include('pasienParent.turunan.formulir')
                </li>
               
              </ul>
        </div>
    </div>



@include('v_part.kananSidebar')
@endsection