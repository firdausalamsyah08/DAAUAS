 
### **Business Requirement Document (BRD)**  
**Project Name:** Aplikasi Pendataan Supir  
**Platform:** Laravel (Localhost)  

---

### **1. Latar Belakang**  
Perusahaan membutuhkan sistem untuk mengelola data supir. Admin perusahaan bertugas untuk memanipulasi data supir, sedangkan supir hanya diberi akses untuk melihat data yang telah ditambahkan.  

---

### **2. Tujuan**  
- Mempermudah perusahaan mengelola data supir.  
- Menyediakan antarmuka yang intuitif untuk admin dan supir.  
- Membatasi akses berdasarkan peran (admin dan supir).  

---

### **3. Fungsi Utama**  

#### **3.1. Fitur untuk Admin:**  
- **Menambahkan Data Supir**  
  Admin dapat menambahkan data supir, dengan atribut berikut:  
  - Nama  
  - Nomor kendaraan  
  - Jenis kendaraan  

- **Menghapus Data Supir**  
  Admin dapat menghapus data supir dari database.  

#### **3.2. Fitur untuk User (Supir):**  
- **Melihat Data Supir**  
  Supir hanya dapat melihat data yang sudah ditambahkan oleh admin.  

---

### **4. Peran dan Akses**  
| **Role**  | **Fitur**                                               |  
|-----------|----------------------------------------------------------|  
| **Admin** | - Menambahkan data supir                                 |  
|           | - Menghapus data supir                                   |  
|           | - Melihat semua data supir                               |  
| **Supir** | - Melihat data supir (read-only)                         |  

---

### **5. Spesifikasi Teknis**  

1. **Model:**  
   - Nama Model: `Driver`  
   - Fields:  
     - `id` (Primary Key)  
     - `name` (String)  
     - `vehicle_number` (String)  
     - `vehicle_type` (String)  
     - `created_at` (Timestamp)  
     - `updated_at` (Timestamp)  

2. **Migration:**  
   - Buat tabel `drivers` untuk menyimpan data supir.  

3. **Routes:**  
   - **Admin:**  
     - `POST /drivers` (Menambahkan data supir)  
     - `DELETE /drivers/{id}` (Menghapus data supir)  
     - `GET /drivers` (Melihat semua data supir)  
   - **User (Supir):**  
     - `GET /drivers` (Melihat semua data supir)  

4. **Role Management:**  
   **Alternatif Implementasi:**  
   - **Middleware:** Periksa email untuk membedakan admin dan supir:  
     - Admin: Hanya email `admin@company.com`.  
     - Supir: Hanya email `user@company.com`.  
   - **Alternatif Lain:**  
     - **Field Role:** Tambahkan atribut `role` di tabel `users` untuk membedakan akses.  
     - **Policy:** Gunakan Laravel Policy untuk membatasi akses di controller.  

5. **Tampilan (Views):**  
   - Admin:  
     - Halaman untuk menambahkan data supir.  
     - Tombol untuk menghapus data supir.  
   - User (Supir):  
     - Halaman untuk melihat data supir dalam bentuk tabel.  

---

### **6. Alur Proses**  

#### **6.1. Admin Login:**  
1. Admin login menggunakan email dan password.  
2. Sistem memverifikasi peran admin berdasarkan email atau role.  
3. Admin masuk ke dashboard untuk mengelola data supir.  

#### **6.2. Supir Login:**  
1. Supir login menggunakan email dan password.  
2. Sistem memverifikasi peran supir berdasarkan email atau role.  
3. Supir diarahkan ke halaman untuk melihat data supir.  

---
