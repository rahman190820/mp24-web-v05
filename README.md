<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


```txt
Pasien
 register
 approval-> validator/admin( 1x24 )
  Login
  userpass
  update data child
  save
 Transaksi
  request keluhan
   webGL(development)
   online/chatting( jadwal )
   offline/ketemuan( jadwal )
   pilihlokasi dokter
  diagnosa( sesuai manfaat pasien )
    Rawat Inap(RWI)
     Rujukan Lab
     Rujukan RS
    Rawat Jalan(RWJ)
     Resep obat ( QR BArcode )
     Rujukan Lab
    Kacamata(KCM)
     Optional
    Rawat Gigi(RWG)
     Resep obat ( QR BArcode )
     Rujukan Lab
    Paket Khusus(PKH)
     Resep obat ( QR BArcode )
     Rujukan Lab     
  Obat
    Apotek
     Terdekat
     Rujukan
     Scan barcode request resep
     Notif Obat dilanggan
     Buat tagihan ( QR barcode )
     Diantar
      bukti terkirim
	lokasi pasien
	foto penerima
     Diambil 
        Scan barcode tagihan 
  Penerima Obat
     Notifikasi barang sdh sesuai
Close transaksi    

    

```


```cmd
php artisan serve --host 192.168.1.13 --port 8000

php artisan db:seed --class=UsersTableSeeder
php artisan migrate:refresh --seed
php artisan migrate:rollback --step=5
php artisan tinker
   User::factory()->count(50)->create()

<!-- setup katdok buat model untuk akses komunikasi db, "-m" atau migration untuk installasi table dan field -->
php artisan make:model Katdok -m 
php artisan make:seeder CreateKatdokSeeder
php artisan db:seed --class=CreateKatdokSeeder


```

```sql
user_name=# \c testdatabase -- use database
user_name=# \dt -- show tables 
user_name=# \dt+ -- show tables 

user_name=# select * from users;

--create
CREATE TABLE perusahaan(
   id INT PRIMARY KEY     NOT NULL,
   nama           TEXT    NOT NULL,
   umur            INT     NOT NULL,
   alamat        CHAR(50),
   gaji         REAL
);

CREATE TABLE departemen(
   id INT PRIMARY KEY      NOT NULL,
   dept           CHAR(50) NOT NULL,
   pegawai_id         INT      NOT NULL
);

--drop table
user_name=# drop table company;

testdb-# \d company --show table 

select fastens.id, fastens.fastenmedis, fastens.status, fastens.child, fastens.tipe, katdoks.nama_katdok, fastens.koordinat_long, fastens.koordinat_lat from fastens join katdoks on katdoks.id=fastens.tipe ;
--result
 id |               fastenmedis                | status | child | tipe |      nama_katdok       |   koordinat_long   |    koordinat_lat
----+------------------------------------------+--------+-------+------+------------------------+--------------------+---------------------


create or replace view fasten_as_katdok as select fastens.id, fastens.fastenmedis, fastens.status, fastens.child, katdoks.nama_katdok, fastens.koordinat_long, fastens.koordinat_lat from fastens join katdoks on katdoks.id=fastens.tipe ;



dbmp24=# select * from fasten_as_katdok where child > 0;
 id |           fastenmedis            | status | child |      nama_katdok       |   koordinat_long   |    koordinat_lat
----+----------------------------------+--------+-------+------------------------+--------------------+---------------------
  1 | MP 24 UID JTM 1                  | 1      |     2 | Dokter Spesialis Bedah | -7.265643427621421 | 112.74334752556922
  2 | dr EKO / dr DEWANTO              | 1      |     1 | Dokter Gigi            |                    |
 14 | MP 24  SDA 1 KLINIK CITRA HUSADA | 1      |    15 | Dokter Spesialis Bedah | -7.437632691965671 | 112.701138739065
 15 | dr YUDHI                         | 1      |    14 | Dokter Gigi            |                    |
 16 | MP 24  SBY 1 KLINIK BRI MEDIKA   | 1      |    17 | Dokter Spesialis Bedah | -7.332568708469156 | 112.73106089673469
 17 | dr Dewanto                       | 1      |    16 | Dokter Gigi            |                    |
 21 | MP 24  SBY 1 KLINIK TIRTA        | 1      |    22 | Dokter Spesialis Bedah | -7.323394044525655 | 112.74075249673452
 22 | dr EKO                           | 1      |    21 | Dokter Gigi            |                    |
 23 | MP 24 BGR 1                      | 1      |    24 | Dokter Spesialis Bedah | -7.15261163333068, | 11.8909908678973
 24 | dr Pramono                       | 1      |    23 | Dokter Gigi            |                    |
 25 | MP 24 BGR 2 KLINIK DR ERY        | 1      |    26 | Dokter Spesialis Bedah | -7.157026909104212 |  111.87565059673275
 26 | dr ERY                           | 1      |    25 | Dokter Gigi            |                    |
 28 | RS SITI AISYAH                   | 1      |    29 | Dokter Umum            | -7.151580507317302 | 111.87830944947926
 29 | dr Pramono                       | 1      |    28 | Dokter Gigi            |                    |
 43 | MP 24 JBR 3 KLINIK CAMAR MANDIRI | 1      |    44 | Dokter Spesialis Bedah | -8.17405729823485, | 13.70080253907318
 44 | Dr Eko                           | 1      |    43 | Dokter Gigi            |                    |
 56 | RSIA  ALF SUBTIN                 | 1      |    57 | Dokter Umum            | -7.635808519458201 | 111.89481155440853
 57 | AJENG                            | 1      |    56 | Dokter Gigi            |                    |
 58 | RS MATA AYU SIWI                 | 1      |    59 | Dokter Spesialis Mata  | -7.60130605351573, | 11.90863673324358
 59 | ANGGI                            | 1      |    58 | Dokter Gigi            |                    |
(20 rows)

```


```sql
select id,nama, stts_approval_user from users;
-- update users set stts_approval_user='Y' where id =6;

```


```txt
set timezone Config\App.php
chage 'UTC' to 'Asia/Jakarta'
```


```txt
create notification
refenfi : https://blog.quickadminpanel.com/laravel-notifications-with-database-driver-internal-messages/
```



## migrtasi

```txt
PS C:\mp24\webapp\mp24-app>
 php artisan migrate:rollback --path=/database/migrations/2022_06_04_133847_create_pasien_table.php
PS C:\mp24\webapp\mp24-app> php artisan migrate --path=/database/migrations/2022_06_04_133847_create_pasien_table.php
php artisan db:seed --class=UsersTableSeeder
```


```txt
- php artisan make:model Pasien -c -m
- 

- php artisan make:model Pasien -mcr
  php artisan make:factory PasienFactory --model=Pasien
  
```



```txt
1. auth
    > composer require laravel/ui
    > php artisan ui bootstrap --auth
    > npm install
    > npm run dev
    > php artisan migrate

2. membuat model,controller(resource),migration
    > php artisan make:model Pasien -mcr
        > isi migrate berdasrakan kolom
    > php artisan migrate
    > file route 
        > use controller name
        > resoure route
        

3. tinker
    > php artisan make:factory PasienFactory --model=Pasien
    > open database, factory
        > faker
    > composer dump-autoload
    > php artisan tinker
    > Pasien::factory()->count(1)->create()

4. view blde
    > result json
    > result view ,compct , notice 


```


login register

C:\Users\vcopy\Downloads\iofrmtemplates\iofrmtemplates\iofrm-by-brandio\Template

theme

C:\Users\vcopy\Downloads\materializeadmin-74 (1)\materializeadmin-74\materialize-material-design-admin-template-v7.4\html-version\materialize-html-admin-template\html\ltr\vertical-modern-menu-template


```txt
package facedes erro line
app\config -> alias
```

```html
  <div class="col s12 input-field">
                <select>
                  <option>Dokter</option>
                  <option>Apotik</option>
                  <option>validator</option>
                  <option>Klinik</option>
                  <option>Manejemen</option>
                  <option>Admin</option>
                  <option>Adminstrator</option>
                </select>
                <label>Role</label>
              </div>
              <div class="col s12 input-field">
                <select>
                  <option>Active</option>
                  <option>Banned</option>
                  <option>Close</option>
                </select>
                <label>Status</label>
              </div>
```

```php
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

```txt
- ajax notif (composer)
<<<<<<< HEAD
- pdf (composer) [http://127.0.0.1:8000/pdf http://127.0.0.1:8000/pdf1]
=======
- pdf (composer)
- signature 
>>>>>>> 1afc77b5042f840830d2c28738dd2f85704d8637
- detech device (composer)
- ocr (composer)
- qrcode (composer) 
- print thermal (composer)
- sub query
```

```sql


dbmp24=# select a.id as child , b.child as parent, b.fastenmedis , b.tipe from (select id from fastens union select child from fastens) as a left join fastens as b on a.id = b.id where b.child>0 ;

dbmp24=# select id,fastenmedis,child from fastens where fastenmedis like 'MP%';
dbmp24=# select id,fastenmedis,child from fastens where fastenmedis like 'MP%SBY%';
dbmp24=# select id,fastenmedis,child from fastens where fastenmedis like 'MP%MDN%';



```


```txt
catatan
- ketika daftar masukan jumlah anak
- dan istri /suami
```

```txt
dbmp24=# explain analyze select nama from coba_inputs where nama like 'Gatra Tomi Pranowo';
dbmp24=# alter table coba_inputs alter column nama type varchar(40);
dbmp24=# create index idx_nama on coba_inputs(nama);


-- load data keluhan dengan join users dan fasten
--- load data request keluhan pasien diterima dokter
dbmp24=# select u.nama, kp.dokter_id, ftm.fastenmedis
dbmp24-# from keluhan_pasiens as kp
dbmp24-# left join users as u on u.id = kp.pasien_id
dbmp24-# right join fastens as ftm on ftm.id = kp.dokter_id
dbmp24-# where kp.dokter_id=4;
```


1. dokter -> pasien terima resep ->  pasien pilih aptotik terdekat dan upload resep -> apotik terima resep 


 -> pilih ambil atau kirim



 ```txt
select fastenmedis,parent,child,tipe from fastens;

---menampilkan parent saja-----
select fastenmedis,parent,child,tipe 
from public.fastens
where parent=0 and tipe=5;

---menampilkan child saja-----
select fastenmedis,parent,child,tipe 
from public.fastens
where child=0;
 ```

```php

namaModel::where('namaField',namaVariable)->get();
namaModel::where('namaField',namaVariable)->first();

namaModel::where('namaField',namaVariable)->join('namaTabel','nama','=','')->get();
// or
use Illuminate\Support\Facades\DB;
$datas0 = DB::table('users')->get();
$datas1 = DB::table('users')->where('namafeld', namavariable)->first();
$datas2 = DB::table('users')->select('nama', 'email as user_email')->get();
$datas3 = DB::table('users')->join('namaTabel','nama','=','')->get();


// jika get()
// maka cara load data
foreach($datas0 as $item){
  $item->id;
  $item->nama;
}

// jika first()
// maka cara load data
$datas1->id;
$datas1->nama;

$h0 = DB::table('users')->count();
$h0 = DB::table('users')->min('harga');
$h0 = DB::table('users')->max('harga');
$h0 = DB::table('users')->avg('harga');
$h0 = DB::table('users')->sum('harga');

//union
//whereJsonContains
//whereJsonLength
// whereDate('created_at','2022-01-21')
// whereMonth('created_at','5')
// whereDay('created_at','31')
// whereYear('created_at','31')
// whereTime('created_at','=','11:20:30')


// controller
1. middleware
1. resources
1. resources partial
1. apiResources
1. resources naming route parameter (alias route web)

/*
documentation 
- the basic (route aggrement controller to view blade , session, validation, error handling)
- digging deeper (helper laravel [ artisan console, broadcasting, chace ,dll ])
- database (controller call model)
- security (auth and register)
- eloquent (relation table)
- security (auth and register)
- testing ( php unit via terminal)
- api documentation ( desc class on laravel )
*/


/*
pasien piliha manffat,
*/
 /*
            status = 
            0(defautl), 
            1(pasien keluhan),
            2(pilih dokter langgan(*.0) atau (*.1)non-langgan)
            3.0 (diterima doktr),
            3.1 (pasien upload kwitansi dokter dan ressep)
            4.0 (ditangani dokter),
            5.0 (resepdkter dtrm pasien),
            6.0 (pasien pilih apotik -> upload resp),
            7.0 (resrp diterima apotik),
            8.0 (resrp dtgni apotik), 7 ke 8 untuk estimasi penanganan
            9.0 (apttk kirim stts siap diambil),
            10.0(psin pilih diambil atau dikirim),
            
            */


```

```sql
dbmp24=# select * from manfaats;
 id | nama_manfaat | kode_manfaat |     created_at      |     updated_at
----+--------------+--------------+---------------------+---------------------
  1 | Kacamata     | KCM          | 2022-07-11 09:43:56 | 2022-07-11 09:43:56
  2 | Rawat Inap   | RWI          | 2022-07-11 09:43:57 | 2022-07-11 09:43:57
  3 | Paket Khusus | MCU          | 2022-07-11 09:43:57 | 2022-07-11 09:43:57
  4 | Rawat Gigi   | RWG          | 2022-07-11 09:43:57 | 2022-07-11 09:43:57
  5 | Rawat Jalan  | RWJ          | 2022-07-11 09:43:57 | 2022-07-11 09:43:57
(5 rows)

dbmp24=# select * from klslyns;
 id | kelas |     created_at      |     updated_at
----+-------+---------------------+---------------------
  1 | KLS1  | 2022-07-11 09:48:48 | 2022-07-11 09:48:48
  2 | KLS2  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
  3 | KLS3  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
  4 | VIP1  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
  5 | VIP2  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
  6 | VIP3  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
  7 | PREM  | 2022-07-11 09:48:49 | 2022-07-11 09:48:49
(7 rows)

dbmp24=# select * from klslyn_manfaats;
 id | klslyn_id | manfaat_id | created_at | updated_at
----+-----------+------------+------------+------------
(0 rows)

dbmp24=# select * from katdoks;
 id |                   nama_katdok                    |     created_at      |     updated_at
----+--------------------------------------------------+---------------------+---------------------
  1 | Dokter Umum                                      | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  2 | Dokter Gigi                                      | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  3 | Dokter Spesialis Paru                            | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  4 | Dokter Spesialis Anak                            | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  5 | Dokter Spesialis Bedah                           | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  6 | Dokter Spesialis Penyakit Dalam                  | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  7 | Dokter Patologo Klinik                           | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  8 | Dokter Spesilais Syaraf                          | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
  9 | Dokter Spesialis Mata                            | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
 10 | Dokter Spesialis Anastesi dan Perawatan Intensif | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
 11 | Dokter Spesialis Penyakit Kulit dan Kelamin      | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
 12 | Dokter Spesialis THT-KL                          | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
 13 | Dokter Spesialis Kebidanan dan Kandungan         | 2022-07-04 22:19:43 | 2022-07-04 22:19:43
(13 rows)

dbmp24=# select * from obats;
 id |             nama_obat             |     created_at      |     updated_at
----+-----------------------------------+---------------------+---------------------
  1 | Abbotic granule 30ml              | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  2 | Abbotic Granule 60 - ml           | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  3 | Abbotic tab 500                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  4 | Abilify Oral 10mg                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  5 | Abilify Oral 5mg                  | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  6 | Acarbose Tab 50 mg (G)            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  7 | Acetensa 50 mg Tab                | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  8 | Acetylcysteine 200 mg (G)         | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
  9 | Acetylsalicylic Acid (G)          | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 10 | Actos 15 mg Tab                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 11 | Actos 30 mg Tab                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 12 | Actrapid « HM Penfill             | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 13 | Acyclovir 200 (G)                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 14 | Acyclovir 400 (G)                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 15 | Acyclovir Cream (G)               | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 16 | Adalat Oros 30 mg Tab             | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 17 | Adona (AC-17) tab                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 18 | Adona Forte tab                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 19 | Aerius tab 5 mg                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 20 | Akilen 200                        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 21 | Albendazole 400 mg (G)            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 22 | Alegysal eye drop                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 23 | Alerfed Syr 60 mL                 | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 24 | Alerfed tab                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 25 | Alergine 10                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 26 | Alganax 0,25                      | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 27 | Alganax 0,5                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 28 | Alganax 1                         | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 29 | Allopurinol 100 (G)               | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 30 | Allopurinol 300 (G)               | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 31 | Alloris syr                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 32 | Alloris tab                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 33 | Alluric 100mg                     | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 34 | Alluric 300mg                     | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 35 | Alprazolam 0.5mg (G)              | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 36 | Alprazolam 1mg (G)                | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 37 | Alxil 500                         | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 38 | alxil syrup 125mg/5 ml            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 39 | alxil syrup 250mg/5 ml            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 40 | Amaglu 2                          | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 41 | Amaglu 3                          | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 42 | Ambiopi 500                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 43 | Ambroxol Syr (G)                  | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 44 | Ambroxol Syr 15mg/5 ml (G)        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 45 | Ambroxol Syr 15mg/5 ml (G)        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 46 | Ambroxol Syr 30mg/5 ml (G)        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 47 | Ambroxol Syr 30mg/5 ml (G)        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 48 | Ambroxol tab 30mg (G)             | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 49 | Ambroxol tab 30mg (G)             | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 50 | Amiclav 500                       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 51 | Aminophilin 200 mg tab (G)        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 52 | Amiodarone (G)                    | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 53 | Amitriptyline 25Mg (G)            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 54 | Amlocor 5                         | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 55 | Amlodipin + Telmisartan (G)       | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 56 | Amlodipin + Valsartan (G)         | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 57 | Amlodipin 10 (G)                  | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 58 | Amlodipin 5 (G)                   | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 59 | Amobiotic drops 100mg/ml          | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 60 | Amoxan 250                        | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 61 | Amoxan DS 125 mg                  | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 62 | Amoxan forte DS 250 mg            | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 63 | Amoxicillin + Clavulanic Acid (G) | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 64 | Amoxicillin 100/ml Drops (G)      | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 65 | Amoxicillin 500 (G)               | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 66 | Amoxicillin DS 125mg/5ml (G)      | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 67 | Amoxicillin syr 250mg/5ml (G)     | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 68 | Amoxsan Drop                      | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 69 | Amoxycillin 250 (G)               | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
 70 | Ampicillin 125 mg/5 mL DS (G)     | 2022-06-25 19:13:59 | 2022-06-25 19:13:59
(70 rows)

```


```sql

dbmp24=# select fastens.id, fastens.fastenmedis, katdoks.nama_katdok from fastens join katdoks on katdoks.id=fastens.tipe;

 id  |               fastenmedis                |      nama_katdok
-----+------------------------------------------+------------------------
 161 | MP 24 BWG 1                              | Dokter Spesialis Bedah
 162 | MP 24 BWG 2 KLINIK BRAWIJAYA             | Dokter Spesialis Bedah
 163 | MP 24 JBR 1                              | Dokter Spesialis Bedah
 164 | MP 24 JBR 2 KLINIK  AL FURQON            | Dokter Spesialis Bedah
 165 | MP 24 JBR 3 KLINIK CAMAR MANDIRI         | Dokter Spesialis Bedah
 123 | MP 24 UID JTM 1                          | Dokter Spesialis Bedah
 124 | dr EKO / dr DEWANTO                      | Dokter Gigi
 125 | Dr dr. T.P HUTAPEA Sp P.DTCE.MARS        | Dokter Gigi
 126 | dr DIAH FITRIARTANTRI TUNJUNGSARI        | Dokter Gigi
 127 | dr ALIF RODHIANA                         | Dokter Gigi
 128 | dr HERNI KRESNOADI                       | Dokter Gigi
 129 | dr NI NYOMAN WIDIAWATI                   | Dokter Gigi
 130 | dr SIGIT JUNI WARDOYO                    | Dokter Gigi
 131 | dr JUDYA SUKMANA SUKAMTO M Kes           | Dokter Gigi
 132 | dr NI NYOMAN KARMAWATI                   | Dokter Gigi
 133 | dr BERLIAN ANIEK HERLINA                 | Dokter Gigi
 134 | Drg LESTARI                              | Dokter Spesialis Anak
 135 | MP 24  SBU 1                             | Dokter Spesialis Bedah
 136 | MP 24  SDA 1 KLINIK CITRA HUSADA         | Dokter Spesialis Bedah
 137 | dr YUDHI                                 | Dokter Gigi
 138 | MP 24  SBY 1 KLINIK BRI MEDIKA           | Dokter Spesialis Bedah
 139 | dr Dewanto                               | Dokter Gigi
 140 | MP 24 SBY 2 KLINIK FKTP                  | Dokter Spesialis Bedah
 141 | MP 24 SBY 3 KLINIK GRACIA                | Dokter Spesialis Bedah
 142 | MP 24 SBY 3 KLINIK PRANA                 | Dokter Spesialis Bedah
 143 | MP 24  SBY 1 KLINIK TIRTA                | Dokter Spesialis Bedah
 144 | dr EKO                                   | Dokter Gigi
 145 | MP 24 BGR 1                              | Dokter Spesialis Bedah
 146 | dr Pramono                               | Dokter Gigi
 147 | MP 24 BGR 2 KLINIK DR ERY                | Dokter Spesialis Bedah
 148 | dr ERY                                   | Dokter Gigi
 149 | dr MEI RIA RAHAYU                        | Dokter Gigi
 150 | RS SITI AISYAH                           | Dokter Umum
 151 | dr Pramono                               | Dokter Gigi
 152 | MP 24 PSR 1                              | Dokter Spesialis Bedah
 153 | MP 24 PSR 2 KLINIK AL AZIZ               | Dokter Spesialis Bedah
 154 | dr ENDANG ASTOETI                        | Dokter Gigi
 155 | dr HJ DWINARTI ARTAWARDANI               | Dokter Gigi
 156 | dr WIWIK WINARNINGSIH ADNAN MARS         | Dokter Gigi
 157 | dr DIMAS YUDHISTIRA ASTURA               | Dokter Gigi
 158 | dr ADI WIDIANTO                          | Dokter Gigi
 159 | MP 24 STB 1                              | Dokter Spesialis Bedah
 160 | MP 24 STB 2 KLINIK AS SYIFA              | Dokter Spesialis Bedah
 166 | Dr Eko                                   | Dokter Gigi
 167 | MP 24 MLG 1 PELKES KPRI PELITA SEJAHTERA | Dokter Spesialis Bedah
 168 | MP 24 MLG 2 KLINIK  ELLISA               | Dokter Spesialis Bedah
 169 | dr RANDY SUKMANA                         | Dokter Gigi
 170 | dr CORNELI DWI PRAMISA                   | Dokter Gigi
 171 | dr FRILLYA WASKITA WAHYUNINGROEM         | Dokter Gigi
 172 | dr DIAN DAHLIA DHAMAYANTI                | Dokter Gigi
 173 | MP 24 KDR 1                              | Dokter Spesialis Bedah
 174 | MP 24 KDR 2 KLINIK  MEDIKA KELUARGA      | Dokter Spesialis Bedah
 175 | MP 24 MDN 1                              | Dokter Spesialis Bedah
 176 | MP 24 MDN 2 PELKES KPRI SEJAHTERA        | Dokter Spesialis Bedah
 177 | MP 24 MDN 2                              | Dokter Spesialis Bedah
 178 | RSIA  ALF SUBTIN                         | Dokter Umum
 179 | AJENG                                    | Dokter Gigi
 180 | RS MATA AYU SIWI                         | Dokter Spesialis Mata
 181 | ANGGI                                    | Dokter Gigi
 182 | MP 24 MJK 1                              | Dokter Spesialis Bedah
 183 | MP 24 MJK 2 KLINIK CIKKO PRIMA HUSADA    | Dokter Spesialis Bedah
(61 rows)

dbmp24=# select wilayah from fastens group by wilayah order by wilayah;
 wilayah                                    
-----------------------------------------------------------------------------------------------------------
 Banyuwangi                                                                                                                                                             
 Bojonegoro                                                                                                                                                             
 Jember                                                                                                                                                                 
 Kediri                                                                                                                                                                 
 Madiun                                                                                                                                                                 
 Malang                                                                                                                                                                 
 Pasuruan                                                                                                                                                               
 Situbondo                                                                                                                                                              
 Surabaya                                                                                                                                                               

(10 rows)

dbmp24=# select wilayah, count(wilayah) as total from fastens group by wilayah order by wilayah;

dbmp24=# select  katdoks.nama_katdok ,count(fastens.tipe)as total  from fastens join katdoks on katdoks.id=fastens.tipe group by katdoks.nama_katdok;
      nama_katdok       | total
------------------------+-------
 Dokter Gigi            |    29
 Dokter Spesialis Bedah |    28
 Dokter Spesialis Anak  |     1
 Dokter Spesialis Mata  |     1
 Dokter Umum            |     2
(5 rows)


dbmp24=# select fastens.wilayah,count(fastens.tipe) as "Dokter_Spesialis_Bedah" from fastens join katdoks on katdoks.id=fastens.tipe where tipe IN (select tipe from fastens where tipe=5 ) group by fastens.wilayah;
wilayah       | Dokter_Spesialis_Bedah
-------------------------------------------------------------------------------------------------------------------------------------+------------------------
 Jember                                                                                                                                                                                                                                                          |                      3
 Madiun                                                                                                                                                                                                                                                          |                      3
 Malang                                                                                                                                                                                                                                                          |                      2
 Bojonegoro                                                                                                                                                                                                                                                      |                      2
 Situbondo                                                                                                                                                                                                                                                       |                      2
 Kediri                                                                                                                                                                                                                                                          |                      2
 Pasuruan                                                                                                                                                                                                                                                        |                      2
                                                                                                                                                                                                                                                                 |                      2
 Surabaya                                                                                                                                                                                                                                                        |                      8
 Banyuwangi                                                                                                                                                                                                                                                      |                      2
(10 rows)


```


```sql
dbmp24=# explain analyze [QUERY];

```

```sql
-- case pivot
-- kendala id katdok mulai null atau 1
select
 wilayah as w,
 count(case when tipe = 2 then k.id end) as "Dokter Umum",
count(case when tipe = 3 then k.id end) as "Dokter Gigi",
count(case when tipe = 4 then k.id end) as "Dokter Spesialis Paru",
count(case when tipe = 5 then k.id end) as "Dokter Spesialis Anak",
count(case when tipe = 6 then k.id end) as "Dokter Spesialis Bedah",
count(case when tipe = 7 then k.id end) as "Dokter Spesialis Penyakit Dalam",
count(case when tipe = 8 then k.id end) as "Dokter Patologo Klinik",
count(case when tipe = 9 then k.id end) as "Dokter Spesilais Syaraf",
count(case when tipe = 10 then k.id end) as "Dokter Spesialis Mata"
 from fastens as f 
 join katdoks as k on k.id = f.tipe
 group by w
;


-- case recursive
-- asli = kendala id
with recursive pc as (
  select id, fastenmedis, child from fastens where id = 1
  union all
  select p.id, p.fastenmedis, p.child from fastens as p
  inner join pc c on c.id = p.child 
)select * from pc

-- selesai 
-- select * from fastens
-- UPDATE katdoks SET id = '1' WHERE id = 123;
with recursive pc as (
  select id, fastenmedis, parent,child from fastens where parent = 1

  union all
  select p.id, p.fastenmedis, p.parent,p.child from fastens as p
  inner join pc c on c.id = p.child 
)select * from pc

-- case tapil lat lng
-- select * from fastens
-- UPDATE katdoks SET id = '1' WHERE id = 123;
with recursive pc as (
  select id, fastenmedis, parent,child , replace(koordinat_lat,',','') as lat, replace(koordinat_long,',','') as lng from fastens where parent = 1

  union all
  select p.id, p.fastenmedis, p.parent,p.child, replace(p.koordinat_lat,',','') as lat,replace(p.koordinat_long,',','') as lng from fastens as p
  inner join pc c on c.id = p.child 
)select * from pc

-- batasi string lat long
-- select * from fastens
-- UPDATE katdoks SET id = '1' WHERE id = 123;
with recursive pc as (
  select id, fastenmedis, parent,child , substring(replace(koordinat_lat,',',''),0,10) as lat, substring(replace(koordinat_long,',',''),0,10) as lng from fastens where parent = 1

  union all
  select p.id, p.fastenmedis, p.parent,p.child, substring(replace(p.koordinat_lat,',',''),0,10) as lat,substring(replace(p.koordinat_long,',',''),0,10) as lng from fastens as p
  inner join pc c on c.id = p.child 
)select * from pc

```
