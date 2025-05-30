<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product; // Menggunakan Product (PascalCase) - sesuaikan jika model Anda 'product' (lowercase)
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan info admin yang login

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk untuk dikelola oleh admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query untuk mengambil produk
        $productsQuery = Product::query(); // Mulai query builder

        // Jika ada parameter pencarian
        if ($search) {
            $productsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('sku', 'like', "%{$search}%")
                      ->orWhere('id', 'like', "%{$search}%");
            });
        }

        // Ambil produk dengan paginasi, urutkan dari yang terbaru
        $products = $productsQuery->latest()->paginate(10); // 10 produk per halaman

        // Ambil data KPI untuk ditampilkan di layout (jika diperlukan di setiap halaman admin)
        $kpiData = $this->getSharedAdminData();

        // Kirim data ke view admin utama (dashboard.blade.php Anda)
        // dengan flag untuk menampilkan bagian 'manage_products'
        return view('admin.products', [ // Ganti 'admin.dashboard' dengan 'dashboard' jika itu nama file Anda
            'show_section' => 'manage_products',
            'products' => $products,
            'search' => $search,
        ] + $kpiData); // Gabungkan dengan data KPI
    }

    /**
     * Menghapus produk dari database.
     *
     * @param  \App\Models\Product  $product // Route Model Binding
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(product $product)
    {
        $productName = $product->name; // Simpan nama untuk pesan sukses

        // Logika tambahan sebelum menghapus jika ada:
        // - Hapus gambar terkait dari storage
        // - Hapus relasi lain jika perlu (misalnya, item di wishlist yang merujuk ke produk ini)
        //   Namun, berdasarkan model Product Anda, relasi wishlists() akan ditangani oleh database
        //   jika Anda mengatur onDelete('cascade') pada foreign key di migrasi wishlists.
        //   Jika tidak, Anda mungkin perlu menghapus entri wishlist secara manual di sini.

        $product->delete();

        return redirect()->route('admin.products.index') // Kembali ke halaman daftar produk
                         ->with('success', "Produk '{$productName}' berhasil dihapus.");
    }

    /**
     * Helper function untuk mengambil data yang sering digunakan di berbagai halaman admin.
     * Misalnya, data untuk KPI di header atau sidebar.
     *
     * @return array
     */
    private function getSharedAdminData(): array
    {
        // Inisialisasi dengan nilai default jika model tidak ada atau terjadi error
        $totalProducts = 0;
        $totalOrders = 0;
        $totalSellers = 0;
        $totalBuyers = 0;
        $adminName = 'Admin';

        try {
            $totalProducts = Product::count();
            // Pastikan model Order dan User ada dan memiliki field 'status' dan 'role'
            if (class_exists(Order::class)) {
                $totalOrders = Order::where('status', '!=', 'deleted_by_admin')->count();
            }
            if (class_exists(User::class)) {
                $totalSellers = User::where('role', 'seller')->count();
                $totalBuyers = User::where('role', 'buyer')->count();
            }
            if (Auth::guard('admin')->check()) {
                $adminName = Auth::guard('admin')->user()->name;
            }
        } catch (\Exception $e) {
            // Log error jika terjadi masalah saat mengambil data KPI
            // Log::error('Error fetching KPI data for admin: ' . $e->getMessage());
            // Biarkan nilai default yang digunakan
        }

        return [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalSellers' => $totalSellers,
            'totalBuyers' => $totalBuyers,
            'adminName' => $adminName,
        ];
    }
}
