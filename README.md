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


1. dokter -> pasien terima resep ->  pasien pilih aptotik terdekat dan upload resep -> apotik terima resep  -> pilih ambil atau kirim