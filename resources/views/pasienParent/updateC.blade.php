@extends('layouts.apps')
@section('konten')
    <div class="row">
        <div class="col s12">
            <ul class="collapsible categories-collapsible">
                <li >
                  {{-- <li class="active"> --}}
                  <div class="collapsible-header">Orang tua 1<i class="material-icons">
                      keyboard_arrow_right </i></div>
                  <div class="collapsible-body">
                    <?php
                    if ($datas['DataUser']->noKartu == null) {
                     ?>
                     <form id="accountForm" action="{{ route('person.update', $datas['DataUser']->id) }}" method="post">
                   <?php
                   } else {
                     ?>
                     <form>
                 <?php
                   }
                       
                   ?>
                  
                   
                     @csrf
                     {{ method_field('PUT') }}
                     <div class="row">
                       <div class="col s12 m6">
                         <div class="row">
                           <div class="col s12 input-field">
                             <input id="noKartu" name="noKartu" type="text" class="validate" value="{{ $datas['DataUser']->noKartu }}"
                               data-error=".errorTxt1" required>
                             <label for="noKartu">Nomer Kartu</label>
                             <small class="errorTxt1"></small>
                           </div>
                           <div class="col s12 input-field">
                             <input id="noPeserta" name="noPeserta" type="text" class="validate" value="{{ $datas['DataUser']->noPeserta; }}"
                               required >
                             <label for="noPeserta">Nomer Peserta</label>
                             <small class="errorTxt2"></small>
                           </div>
                           <div class="col s12 input-field">
                             <input id="nama" name="nama" type="text" class="validate" value="{{ $datas['DataUser']->nama; }}"  required>
                             <label for="nama">Nama Lengkap</label>
                           </div>
                           <div class="col s12 input-field">
                             <input id="tanggalLahir" name="tanggalLahir" type="date" class="validate" value="{{ $datas['DataUser']->tanggalLahir; }}" required>
                             <label for="tglLahir">Tanggal Lahir</label>
                           </div>
                           <div class="col s12 input-field">
                             <p>
                               <label>
                                 <input class="with-gap" name="group1" type="radio" value="L" {{ $datas['DataUser']->jenisKelamin == 'L' ? '':'checked' ; }}  required/>
                                 <span>Laki Laki</span>
                                 
                               </label>
                             </p>
             
                             <p>
                               <label>
                                 <input class="with-gap" name="group1" type="radio" value="P" {{ $datas['DataUser']->jenisKelamin  == 'P' ? 'checked':'' ; }} required/>
                                 <span>Perempuan</span>
                               </label>
                             </p>
                             
                           </div>
                           <div class="col s12 input-field">
                             <input id="noHP" name="noHP" type="text" class="validate nomer" value="{{ $datas['DataUser']->noHP; }}">
                             <label for="noHP">No HP</label>
                           </div>
                           <div class="col s12 input-field">
                             <input id="email" name="email" type="text" class="validate" value="{{ $datas['DataUser']->email}}" >
                             <label for="email">Email</label>
                           </div>
                           
                         </div>
                       </div>
                       <div class="col s12 m6">
                         <div class="row">
                           <div class="col s12 input-field">
                             <input id="alamat" name="alamat" type="text" class="validate" value="{{ $datas['DataUser']->alamat ? $datas['DataUser']->alamat:'' ; }}"
                                required>
                             <label for="alamat">Alamat</label>
                             <small class="errorTxt2"></small>
                           </div>
                           <div class="col s12 input-field">
                             <input id="kodepos" name="kodepos" type="text" class="validate" value="{{ $datas['DataUser']->kodepos; }}"
                                required>
                             <label for="kodepos">kodepos</label>
                             <small class="errorTxt2"></small>
                           </div>
                         
                           {{-- <div class="col s12 input-field">
                             <input id="company" name="company" type="text" class="validate" required>
                             <label for="company">Company</label>
                           </div> --}}
                         </div>
                       </div>
                     
                       <div class="col s12 display-flex justify-content-end mt-3">
                         <?php
                         if ($datas['DataUser']->noKartu == null) {
                          ?>
                           <button type="submit" class="btn indigo">
                           Save changes</button>
                       <?php
                        } else {
                          ?>
                          
                      <?php
                        }
                            
                        ?>
                        
                           
                           &nbsp;
                         <button type="button" class="btn btn-light">Cancel</button>
                       </div>
                     </div>
                   </form>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Orang Tua 2<i class="material-icons">
                      keyboard_arrow_right </i></div>
                  <div class="collapsible-body">
                    <p>test</p>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Anak Pertama<i class="material-icons">
                      keyboard_arrow_right </i></div>
                  <div class="collapsible-body">
                    <p>test</p>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Anak Kedua<i class="material-icons">
                      keyboard_arrow_right </i></div>
                  <div class="collapsible-body">
                    <p>test</p>
                  </div>
                </li>
               
              </ul>
        </div>
    </div>



@include('v_part.kananSidebar')
@endsection