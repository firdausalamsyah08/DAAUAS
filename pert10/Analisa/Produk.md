1. Model
Category Model
- Fungsi: Mewakili tabel `categories`.
- Properti Penting: 
  - `$fillable` untuk mengizinkan pengisian `name` melalui mass assignment.
- Relasi: `hasMany(Product::class)` menunjukkan bahwa satu kategori bisa memiliki banyak produk.

Product Model
- Fungsi: Mewakili tabel `products`.
- Properti Penting:
  - `$fillable` untuk mengizinkan pengisian `name`, `price`, dan `category_id`.
- Relasi: `belongsTo(Category::class)` menunjukkan bahwa setiap produk terhubung ke satu kategori.

2. Migration
Categories Migration
- Membuat tabel `categories` dengan kolom:
  - `id`: Primary key.
  - `name`: Nama kategori.
  - `timestamps`: Kolom waktu pembuatan dan pembaruan otomatis.

Products Migration
- Membuat tabel `products` dengan kolom:
  - `id`: Primary key.
  - `name`: Nama produk.
  - `price`: Harga produk (decimal, max 10 digit).
  - `category_id`: Foreign key ke tabel `categories`, dengan penghapusan *cascade*.
  - `timestamps`: Kolom waktu pembuatan dan pembaruan otomatis.

3. Seeder
CategorySeeder
- Mengisi tabel `categories` dengan:
  - `Sepatu`
  - `Celana`
  - `Baju`

ProductSeeder
- Mengisi tabel `products` dengan produk-produk terkait kategori:
  - `Nike Air Max` (Sepatu)
  - `Adidas Jogger` (Sepatu)
  - `Levi’s Jeans` (Celana)
  - `Zara Shirt` (Baju)

4. Hubungan Antar Tabel
- Kategori ke Produk: Satu kategori bisa memiliki banyak produk (*one-to-many*).
- Produk ke Kategori: Setiap produk wajib terhubung dengan satu kategori menggunakan `category_id`.
