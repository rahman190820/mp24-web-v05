@extends('layouts.apps')
@section('konten')

@push('panggil_css')
    
@endpush

    <div class="cards-extended">
        <div class="card">
            <div class="card-content">
              <h4 class="card-title">Selamat Datang {{ auth('fastens')->user()->fastenmedis }}</h4>
              <p>
                Innformasi
                {{-- <a href="css-color.html" target="_blank"> css-color.html</a>. --}}
              </p>
              <div class="row">
                <div class="col s12 m3">
                  <div class="card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3">
                    <div class="card-content center">
                      <img src="{{ asset('app-assets/images/icon/apple-watch.png') }}" alt="images" class="width-40">
                      <h5 class="white-text lighten-4">KCM</h5>
                      <p class="white-text lighten-4">ada <b>{{ 0 }}</b></p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m3">
                  <div class="card gradient-shadow gradient-45deg-red-pink border-radius-3">
                    <div class="card-content center">
                      <img src="{{ asset('app-assets/images/icon/printer.png') }}" alt="images" class="width-40">
                      <h5 class="white-text lighten-4">RWI</h5>
                      <p class="white-text lighten-4">ada <b>{{ 0 }}</b></p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m3">
                  <div class="card gradient-shadow gradient-45deg-amber-amber border-radius-3">
                    <div class="card-content center">
                      <img src="{{ asset('app-assets/images/icon/laptop.png') }}" alt="images" class="width-40">
                      <h5 class="white-text lighten-4">RWJ</h5>
                      <p class="white-text lighten-4">ada <b>{{ 0 }}</b></p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m3">
                  <div class="card gradient-shadow gradient-45deg-green-teal border-radius-3">
                    <div class="card-content center">
                      <img src="{{ asset('app-assets/images/icon/bowling.png') }}" alt="images" class="width-40">
                      <h5 class="white-text lighten-4">PKH</h5>
                      <p class="white-text lighten-4">ada <b>{{ 0 }}</b></p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m3">
                  <div class="card gradient-shadow gradient-45deg-green-teal border-radius-3">
                    <div class="card-content center">
                      <img src="{{ asset('app-assets/images/icon/bowling.png') }}" alt="images" class="width-40">
                      <h5 class="white-text lighten-4">RWG</h5>
                      <p class="white-text lighten-4">ada <b>{{ 0 }}</b></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="gradient-Analytics">
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-deep-orange-orange gradient-shadow white-text padding-4 mt-5">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
                      <p>Peserta Aktif</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0 white-text">690</h5>
                      <p class="no-margin">New</p>
                      <p>6,00,00</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-blue-indigo gradient-shadow white-text padding-4 mt-5">
                    <div class="col s8 m8">
                      <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
                      <p>Peserta Pensiun</p>
                    </div>
                    <div class="col s4 m4 right-align">
                      <h5 class="mb-0 white-text">1885</h5>
                      <p class="no-margin">&nbsp</p>
                      <p>2,900</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-purple-deep-orange gradient-shadow white-text padding-4 mt-5">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5 mb-5">timeline</i>
                      <p>Total Keluhan</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0 white-text">&nbsp</h5>
                      <p class="no-margin">&nbsp</p>
                      <p>3,42,230</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-purple-deep-purple gradient-shadow white-text padding-4 mt-5">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5 mb-5">attach_money</i>
                      <p>Tagihan</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0 white-text">$890</h5>
                      <p class="no-margin">Today</p>
                      <p>$25,000</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="gradient-Analytics">
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-deep-orange-orange gradient-shadow white-text padding-4 mt-5">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
                      <p>Kelas Layanan</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0 white-text">690</h5>
                      <p class="no-margin">New</p>
                      <p>6,00,00</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3 card-width">
                  <div class="card row gradient-45deg-blue-indigo gradient-shadow white-text padding-4 mt-5">
                    <div class="col s8 m8">
                      <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
                      <p>Fasilitas Medis</p>
                    </div>
                    <div class="col s4 m4 right-align">
                      <h5 class="mb-0 white-text">1885</h5>
                      <p class="no-margin">&nbsp</p>
                      <p>2,900</p>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
    </div>

<div class="row">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title" >Pasien aktif <small>* filter minggu,bln,trwi bln,smstr,thn</small></h4>
            <table>
                <thead>
                <tr>
                  <th>NO> PESERTA</th>
                  <th>NAMA</th>
                  <th>TANGGAL MASUK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>22-02-2022</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


<div class="row">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title" >apotik <small>* filter minggu,bln,trwi bln,smstr,thn</small></h4>
            <table>
                <thead>
                <tr>
                  <th>NO PESERTA</th>
                  <th>NAMA</th>
                  <th>TANGGAL MASUK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>22-02-2022</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title" >dokter <small>* filter minggu,bln,trwi bln,smstr,thn</small></h4>
            <table>
                <thead>
                <tr>
                  <th>NO PESERTA</th>
                  <th>NAMA</th>
                  <th>TANGGAL MASUK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>22-02-2022</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title" >rumah sakit <small>* filter minggu,bln,trwi bln,smstr,thn</small></h4>
            <table>
                <thead>
                <tr>
                  <th>NO PESERTA</th>
                  <th>NAMA</th>
                  <th>TANGGAL MASUK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>22-02-2022</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title" >lab <small>* filter minggu,bln,trwi bln,smstr,thn</small></h4>
            <table>
                <thead>
                <tr>
                  <th>NO PESERTA</th>
                  <th>NAMA</th>
                  <th>TANGGAL MASUK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>22-02-2022</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


@push('panggil_js')
    
@endpush

@endsection