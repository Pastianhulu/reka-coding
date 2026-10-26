Penjelasan Logika Sistem Produk REKAC Coding
1. Ringkasan

Sistem ini menjual dan membagikan source code dengan dua jenis produk:

Gratis: semua member yang sudah login bisa mengunduh melalui link_github.
Premium: hanya bisa diakses jika member punya membership aktif atau sudah membeli produk tersebut (beli satuan).

Admin mengelola produk. Setiap produk memiliki pemilik (id_user). Admin id 1 (superadmin) melihat dan mengelola semua produk. Admin lain hanya melihat dan mengelola produk miliknya sendiri.
di sistem ini sebenar tidak istilah super admin hanya membatasi permison saja cuman saja id satu tidak di batasi

Tidak ada tabel grup. Produk langsung disimpan di tbl_produk dan dikelompokkan dengan m_kategori.

2. Nama Tabel
Tabel	Keterangan
users	Akun admin dan member. Kolom tambahan: membership_until
m_kategori	Master jenis produk (Laravel, PHP, Bootstrap)
tbl_produk	Item yang dijual
tbl_produk_gambar	Galeri screenshot per produk
pembelian	Pembelian produk satuan (transfer manual)
m_cara_bayar	Rekening dan metode transfer (sudah ada)
m_profil	Identitas situs dan harga membership (sudah ada)

Yang dihapus:

m_source_code (grup), tidak dipakai lagi.
3. Hak Akses
Aktor	Hak akses
Admin id 1	Melihat dan mengelola semua produk, memilih developer, mengatur membership_until, memverifikasi pembelian
Admin id 2–5	Melihat dan mengelola produk miliknya sendiri
Member	Melihat semua produk aktif, mengunduh sesuai akses, membeli, dan upgrade membership
Publik	Melihat katalog dan detail produk. Download wajib login

Aturan teknis:

Halaman admin dijaga permission Spatie (Master Produk, Master User, dan seterusnya).
Member tidak memakai permission. Akses download dicek di controller dengan kode.
Admin id 1 dicek lewat satu helper, misalnya isAdminUtama(), bukan Auth::id() == 1 yang tersebar.
Semua pengecekan dilakukan di server. Menyembunyikan tombol di Blade saja tidak cukup.
4. Struktur Tabel tbl_produk
Kolom	Tipe	Keterangan
id	bigint unsigned, PK	ID produk
id_user	bigint unsigned, FK users.id, index	Pemilik produk. Diisi dari Auth::id(), bukan dari form (kecuali admin id 1 yang boleh memilih developer)
id_kategori	bigint unsigned, FK m_kategori.id, nullable	Kategori produk
judul	varchar(255), NOT NULL	Nama produk
slug	varchar(255), UNIQUE, NOT NULL	Dari judul, untuk URL
deskripsi	longtext, NOT NULL	HTML dari Summernote, wajib diisi
tipe	enum(‘gratis’,’premium’), NOT NULL	Menentukan aturan akses
harga	int unsigned, NULL	Harga beli satuan, hanya untuk premium
thumbnail	varchar(255), NULL	Nama file gambar utama
link_github	varchar(255), NULL	Link download untuk produk gratis
link_drive	varchar(255), NULL	Link download untuk produk premium
status	enum(‘Y’,’T’), NOT NULL, default ‘T’	Y tampil, T tidak tampil
id_hapus	timestamp, NULL	Soft delete, diisi saat produk dihapus
created_at, updated_at	timestamp, NULL	Waktu dibuat dan diubah

Catatan:

Nama developer tidak disimpan. Diambil dari users.name lewat join.
slug unik. Jika judul sama, tambahkan akhiran -2, -3, dan seterusnya.
File ZIP tidak diupload ke server. Yang disimpan hanya link.
5. Struktur Tabel tbl_produk_gambar
Kolom	Tipe	Keterangan
id	bigint unsigned, PK	ID gambar
id_produk	bigint unsigned, FK tbl_produk.id, cascade delete	Produk induk
path	varchar(255), NOT NULL	Nama file gambar
urutan	int, default 0	Urutan tampil, diatur lewat drag and drop
created_at, updated_at	timestamp, NULL	Waktu dibuat dan diubah

Aturan:

Thumbnail disimpan di tbl_produk.thumbnail, galeri di tbl_produk_gambar.
Saat gambar dihapus, file di public/produk/galeri ikut dihapus.
Saat thumbnail diganti, file lama di public/produk/thumbnail dihapus.
6. Tabel users (kolom yang relevan)

Kolom yang dipakai:

id, name, email, password, status, is_blocked, deleted_at
membership_until (datetime, NULL)

Aturan membership:

Membership aktif jika membership_until tidak NULL dan tanggalnya belum lewat.
Admin mengisi atau mengubah membership_until dari halaman User.
Perpanjangan: tanggal ditambah dari tanggal berakhir lama, bukan dari hari ini.
Tidak memakai kolom is_premium dan tidak memakai role/permission untuk premium.
7. Tabel pembelian (beli satuan)
Kolom	Tipe	Keterangan
id	bigint unsigned, PK	ID pembelian
id_user	bigint unsigned, FK users.id	Pembeli
id_produk	bigint unsigned, FK tbl_produk.id	Produk yang dibeli
status	enum(‘pending’,’lunas’), default ‘pending’	Status pembayaran
created_at, updated_at	timestamp, NULL	

Alur:

Member pilih produk premium yang punya harga beli satuan, transfer, lalu kirim bukti.
Admin cek mutasi, lalu mengubah status pembelian menjadi lunas.
Produk itu langsung bisa diakses member dan muncul di Produk Saya.

Tabel pesanan dengan verifikasi bukti dan status lengkap ditunda. Dibuat hanya jika pembayaran sudah otomatis (payment gateway).

8. Aturan Kepemilikan Produk

Admin biasa hanya bisa melihat dan mengelola produk dengan id_user = Auth::id(). Admin id 1 melihat semua.

Filter daftar admin:

php
$query = DB::table('tbl_produk')->whereNull('id_hapus');

if (! $this->isAdminUtama()) {
    $query->where('id_user', Auth::id());
}

$produks = $query->orderBy('id', 'desc')->paginate(10);

Cek kepemilikan (dipasang di edit_produk, update_produk, destroy_produk, destroyGambar, urutanGambar):

php
$produk = DB::table('tbl_produk')->where('id', $id)->whereNull('id_hapus')->first();

if (! $produk) abort(404);
if (! $this->isAdminUtama() && $produk->id_user !== Auth::id()) abort(403);

Saat simpan produk:

php
'id_user' => $this->isAdminUtama() && $request->filled('id_user')
    ? $request->id_user
    : Auth::id(),

Admin biasa tidak bisa mengirim id_user lain, karena server selalu memakai Auth::id() untuk mereka.

Nama developer di halaman publik dan admin:

php
DB::table('tbl_produk')
    ->leftJoin('users', 'users.id', '=', 'tbl_produk.id_user')
    ->select('tbl_produk.*', 'users.name as developer_name');
9. Alur Admin
9.1 Daftar produk
Hanya id_hapus IS NULL.
Admin id 1 melihat semua, admin lain hanya miliknya.
Filter: tipe, id_kategori, status.
Kolom: thumbnail, judul, developer, kategori, tipe, harga, status, aksi.
9.2 Tambah produk

Form berisi: judul, kategori, deskripsi (Summernote), tipe, harga (hanya premium), thumbnail, link GitHub, link Drive, galeri, status (select Y/T), developer (khusus admin id 1).

Validasi utama:

judul: wajib, maksimal 255.
deskripsi: wajib.
tipe: gratis atau premium.
harga: wajib jika premium, minimal 0.
link_github: wajib jika gratis, format URL.
link_drive: wajib jika premium, format URL.
thumbnail: gambar, maksimal 2 MB.
gambar.*: gambar, maksimal 2 MB per file.
status: Y atau T.

Urutan saat simpan:

Validasi.
Buat slug unik.
Tentukan id_user.
Simpan produk.
Simpan thumbnail dan galeri, lalu catat galeri di tbl_produk_gambar.
9.3 Edit dan update
Cek kepemilikan.
Thumbnail baru menggantikan file lama (file lama dihapus).
Galeri baru ditambahkan, galeri lama tetap.
Admin biasa tidak boleh mengubah id_user.
9.4 Hapus produk
Cek kepemilikan.
Soft delete: isi id_hapus = now().
Produk tidak tampil di admin maupun publik.
9.5 Galeri
Urutan diatur dengan drag and drop, lalu dikirim ke urutanGambar.
Hapus gambar lewat tombol X, lalu dikirim ke destroyGambar.
Keduanya wajib cek kepemilikan produk induk.
10. Alur Publik

Halaman /produk

Hanya status = 'Y' dan id_hapus IS NULL.
Semua produk aktif dari semua admin tampil.
Menampilkan developer, kategori, tipe, harga, dan thumbnail.
Filter kategori dan tipe, serta pencarian judul.

Halaman /produk/{slug}

Menampilkan detail, galeri, developer, kategori, harga, dan deskripsi.
Tombol download:
Belum login: arahkan ke login.
Gratis: arahkan ke link_github.
Premium: cek akses, lalu tampilkan tombol beli atau upgrade jika belum punya akses.
11. Alur Member dan Download

Urutan pengecekan saat member klik download:

Produk harus status = 'Y' dan id_hapus IS NULL.
tipe = gratis → arahkan ke link_github.
Membership aktif (membership_until >= now()) → arahkan ke link_drive.
Ada baris pembelian dengan id_produk dan status = 'lunas' untuk user itu → arahkan ke link_drive.
Selain itu → arahkan ke halaman upgrade.
php
public function download($slug)
{
    $user = auth()->user();

    $produk = DB::table('tbl_produk')
        ->where('slug', $slug)
        ->where('status', 'Y')
        ->whereNull('id_hapus')
        ->first();

    if (! $produk) abort(404);

    if ($produk->tipe === 'gratis') {
        return redirect()->away($produk->link_github);
    }

    $membershipAktif = $user->membership_until && $user->membership_until >= now();

    $sudahBeli = DB::table('pembelian')
        ->where('id_user', $user->id)
        ->where('id_produk', $produk->id)
        ->where('status', 'lunas')
        ->exists();

    if ($membershipAktif || $sudahBeli) {
        return redirect()->away($produk->link_drive);
    }

    return redirect()->route('member.upgrade')
        ->with('info', 'Produk ini butuh membership aktif atau pembelian.');
}

Jangan tampilkan link_drive di HTML sebelum akses dicek. Di Blade, tampilkan tombol download hanya dengan kondisi yang sama.

Produk Saya (member/produk-saya): berisi produk gratis yang pernah diunduh, dan produk dari pembelian yang lunas.

12. Alur Pembayaran (Manual)

Membership

Member membuka halaman upgrade, melihat nominal dari m_profil.harga_membership dan rekening dari m_cara_bayar.
Member transfer, lalu mengirim bukti (WhatsApp atau email).
Admin cek mutasi, lalu membuka halaman User, dan mengisi membership_until 30 hari ke depan.
Member refresh, dan akses premium aktif.

Beli satuan

Member memilih produk, transfer sesuai harga produk, lalu mengirim bukti.
Admin cek mutasi, lalu mengubah pembelian menjadi lunas.
Produk bisa diunduh dan muncul di Produk Saya.

Pembayaran otomatis (payment gateway) belum ada di tahap ini.

13. Soft Delete, Status, dan Keamanan
id_hapus IS NULL: produk aktif. Setiap query wajib memakai whereNull('id_hapus').
status: Y tampil di publik, T hanya terlihat admin.
Validasi URL untuk link_github dan link_drive.
Sanitasi HTML Summernote saat ditampilkan jika diperlukan.
Jangan ambil id_user dari form untuk admin biasa.
Setiap aksi edit, hapus, dan download admin wajib cek kepemilikan di server.
14. Struktur Folder Controller
app/Http/Controllers/
├── Controller.php
├── HomeController.php
├── Auth/                           ← bawaan Laravel UI
├── Dashboard/
│   └── DashboardController.php     ← dashboard admin
├── Master/
│   ├── KategoriController.php      ← m_kategori
│   ├── CaraBayarController.php     ← m_cara_bayar
│   └── ProfilController.php        ← m_profil (identitas situs, harga membership)
├── Produk/
│   └── ProdukController.php        ← admin: CRUD produk, urutanGambar, destroyGambar
├── Pembelian/
│   └── PembelianController.php     ← admin: ubah status pembelian menjadi lunas
├── Member/
│   ├── DashboardController.php     ← dashboard member
│   ├── ProdukController.php        ← daftar, detail, download produk
│   ├── MembershipController.php    ← halaman upgrade, kirim bukti
│   └── PembelianController.php     ← produk saya, riwayat pembelian
├── Public/
│   ├── ProdukController.php        ← katalog /produk dan /produk/{slug}
│   ├── BlogController.php          ← (nanti)
│   └── ContactController.php       ← kontak, FAQ, layanan
└── User/
    ├── UserController.php          ← CRUD user, termasuk isi membership_until
    ├── RoleController.php
    └── PermissionController.php

Catatan:

Tidak ada folder Membership/ di admin. Membership diatur dari User/UserController, dan halaman upgrade ada di Member/.
Pembelian/ boleh ditunda jika verifikasi masih manual lewat halaman produk.
SourceCode/ dihapus setelah migrasi.
15. Struktur Folder View
resources/views/
├── auth/
├── layouts/
│   ├── backend.blade.php           ← layout admin
│   ├── public.blade.php            ← layout publik dan member
│   ├── navbar.blade.php
│   └── sidebar.blade.php
├── dashboard/                      ← dashboard admin
├── master/
│   ├── kategori/                   ← index, create, edit
│   ├── cara-bayar/                 ← index, create, edit
│   └── profil/                     ← edit (satu halaman)
├── produk/                         ← admin
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── pembelian/                      ← admin (opsional)
│   └── index.blade.php
├── user/
│   ├── user/                       ← index, create, edit (membership_until di sini)
│   ├── role/                       ← index, create, edit
│   └── permission/                 ← index, create, edit
├── public/                         ← halaman publik
│   ├── home.blade.php
│   ├── produk.blade.php
│   ├── produk-detail.blade.php
│   ├── blog.blade.php
│   ├── layanan.blade.php
│   ├── faq.blade.php
│   └── contact.blade.php
├── member/                         ← sisi member
│   ├── dashboard.blade.php
│   ├── aplikasi.blade.php          ← daftar produk (/member/aplikasi)
│   ├── produk-saya.blade.php       ← produk gratis diunduh dan pembelian lunas
│   ├── upgrade.blade.php           ← harga membership, rekening, form bukti
│   └── profil.blade.php
└── errors/                         ← 403, 404, 419, 500
16. Menu Admin dan Permission

Menu Source Code diganti menjadi Produk:

Produk (semua) → /admin/produk
Produk Gratis → /admin/produk?tipe=gratis
Produk Premium → /admin/produk?tipe=premium
Kategori → /admin/kategori
Pembelian → /admin/pembelian (jika dipakai)

Permission:

Permission	Untuk
Master Produk	CRUD produk (dibatasi kepemilikan)
Master Kategori	CRUD kategori
Master User	Kelola user, termasuk membership_until
Master Role, Master Permission	Hanya admin id 1

Permission Master Source Code diganti menjadi Master Produk.

17. Rencana Migrasi

Sebelum migrasi

Backup database dbrekac_dev.
Backup public/produk/thumbnail dan public/produk/galeri.
Jangan jalankan migrate:fresh.

Langkah SQL

Hapus foreign key grup, lalu hapus kolom dan tabelnya:
sql
   ALTER TABLE `tbl_produk` DROP FOREIGN KEY `tbl_source_code_id_source_code_foreign`;
   ALTER TABLE `tbl_produk` DROP COLUMN `id_source_code`;
   DROP TABLE `m_source_code`;
Ubah kolom produk:
sql
   ALTER TABLE `tbl_produk` ADD COLUMN `tipe` enum('gratis','premium') NOT NULL DEFAULT 'gratis' AFTER `id_kategori`;
   ALTER TABLE `tbl_produk` ADD COLUMN `link_github` varchar(255) NULL, ADD COLUMN `link_drive` varchar(255) NULL;
   ALTER TABLE `tbl_produk` MODIFY `harga` int unsigned NULL DEFAULT NULL;
   ALTER TABLE `tbl_produk` MODIFY `status` enum('Y','T') NOT NULL DEFAULT 'T';
   ALTER TABLE `tbl_produk` MODIFY `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL;
   ALTER TABLE `tbl_produk` DROP COLUMN `gambar`, DROP COLUMN `file_produk`, DROP COLUMN `link_download`;
Tambah tabel pembelian dan kolom membership:
sql
   ALTER TABLE `users` ADD COLUMN `membership_until` datetime NULL DEFAULT NULL;

   CREATE TABLE `pembelian` (
     `id` bigint unsigned NOT NULL AUTO_INCREMENT,
     `id_user` bigint unsigned NOT NULL,
     `id_produk` bigint unsigned NOT NULL,
     `status` enum('pending','lunas') NOT NULL DEFAULT 'pending',
     `created_at` timestamp NULL DEFAULT NULL,
     `updated_at` timestamp NULL DEFAULT NULL,
     PRIMARY KEY (`id`),
     KEY `pembelian_id_user_foreign` (`id_user`),
     KEY `pembelian_id_produk_foreign` (`id_produk`),
     CONSTRAINT `pembelian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
     CONSTRAINT `pembelian_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id`) ON DELETE CASCADE
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
Data lama: 7 produk dengan id_hapus terisi dibiarkan terhapus, sesuai keputusan.

Setelah migrasi

Hapus route dan view source-code.
Ganti controller SourcodeController menjadi Produk/ProdukController.
Ganti permission Master Source Code menjadi Master Produk.
Update sidebar sesuai menu di bagian 16.
Jalankan php artisan optimize:clear dan php artisan route:list.
18. Checklist Pengujian
 Admin id 1 melihat semua produk.
 Admin id 2 hanya melihat produk dengan id_user = 2.
 Admin id 2 ditolak (403) saat membuka edit, update, hapus, atau galeri produk admin id 1 lewat URL.
 Produk baru otomatis memakai id_user = Auth::id() untuk admin biasa.
 Admin id 1 bisa memilih developer.
 Nama developer tampil dari users.name.
 Produk gratis mengarahkan ke link_github.
 Produk premium tanpa akses mengarahkan ke upgrade.
 Membership aktif membuka link_drive.
 Pembelian lunas membuka link_drive untuk produk itu.
 Produk status = T tidak tampil di publik.
 Produk dengan id_hapus terisi tidak tampil di admin maupun publik.
 Slug unik saat judul sama.
 Galeri bisa diurutkan dan gambarnya bisa dihapus, file fisiknya ikut terhapus.
 Thumbnail lama terhapus saat diganti.
 php artisan route:list tidak error.
19. Asumsi
Nama tabel tetap: tbl_produk, m_kategori, tbl_produk_gambar.
Soft delete memakai id_hapus (kolom yang sudah ada), bukan deleted_at.
Membership hanya memakai users.membership_until, tanpa is_premium.
Beli satuan memakai tabel pembelian. Tabel pesanan ditunda.
Upload ZIP tidak dipakai. Produk hanya menyimpan link GitHub dan Drive.
Download gratis tetap wajib login.

6A. Pemisahan Admin dan Member (Role)

Semua user disimpan di tabel users. Pemisahan admin dan member dilakukan lewat role Spatie (roles, model_has_roles), bukan dengan tabel terpisah.

Role	Keterangan
admin	Akun pengelola (termasuk admin id 1). Punya permission seperti Master Produk.
member	Akun pembeli dan pengguna. Tidak punya permission admin.

Aturan:

Setiap user wajib punya tepat satu role utama (admin atau member).
Halaman admin hanya menampilkan user dengan role admin.
Halaman membership (atur membership_until) hanya menampilkan user dengan role member.
Admin id 1 tidak tampil di daftar user admin, sehingga tidak bisa diedit dari sana.
Scope di model User

Di app/Models/User.php:

php
public function scopeAdmin($query)
{
    return $query->role(['admin'])->where('id', '!=', 1);
}

public function scopeMember($query)
{
    return $query->role(['member']);
}

Pemakaian:

php
// Daftar user admin (halaman User)
$users = User::admin()->paginate(30);

// Daftar member (atur membership_until)
$members = User::member()->paginate(30);

Dengan scope ini:

Controller tidak perlu tahu cara memfilter role.
Aturan pemisahan cukup diubah di satu tempat.
Tidak ada join manual yang bisa lupa diberi filter.
Pemberian role otomatis

Setiap user baru (register, login Google/GitHub, seeder, tinker, atau dibuat dari admin) harus otomatis punya role. Dipusatkan di event created model User:

php
protected static function booted()
{
    static::created(function ($user) {
        if (! $user->hasAnyRole(['admin', 'member'])) {
            $user->assignRole('member');
        }
    });
}

Cara kerja:

User yang daftar sendiri otomatis dapat member.
User yang dibuat dari halaman admin tetap menerima member dulu, lalu di controller admin role diganti dengan syncRoles(['admin']) jika memang admin.

Contoh di UserController@store (admin):

php
$user = User::create([...]);
$user->syncRoles(['admin']);

Catatan: syncRoles menggantikan role sebelumnya, jadi user tidak akan punya dua role sekaligus.

Member lama

Jalankan sekali untuk user yang belum punya role (misalnya data sebelum aturan ini):

php
User::doesntHave('roles')->get()->each->assignRole('member');
Hak akses vs role
Role menentukan jenis akun (admin atau member).
Permission (Master Produk, Master User, dan seterusnya) menentukan apa yang boleh dilakukan admin.
Admin id 1 tetap superadmin lewat pengecekan isAdminUtama(), bukan lewat role khusus.

Dengan bagian ini, aturan pemisahan user sudah tercatat jelas: pemisahan lewat role, pemakaian lewat scope, dan pemberian role lewat event created. Di bagian 16 (Menu Admin), halaman User memakai User::admin() dan halaman Membership memakai User::member().