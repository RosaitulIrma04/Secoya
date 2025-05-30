<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('sku', 'like', "%{$search}%") // Tambah pencarian berdasarkan SKU
                             ->orWhere('id', $search);
            })
            ->latest() // Urutkan berdasarkan yang terbaru
            ->paginate(10); // 10 produk per halaman

        // Data KPI untuk ditampilkan di layout (jika diperlukan di setiap halaman admin)
        // Ini bisa dioptimalkan dengan View Composer jika banyak halaman yang butuh data ini.
        $kpiData = $this->getKpiData();

        return view('admin.products', [
            'show_section' => 'manage_products',
            'products' => $products,
            'search' => $search,
        ] + $kpiData); // Gabungkan dengan data KPI
    }

    public function destroy(Product $product) // Laravel akan otomatis inject model Product berdasarkan ID dari route
    {
        // Logika tambahan jika ada file terkait yang perlu dihapus dari storage, dll.
        $productName = $product->name; // Simpan nama untuk pesan sukses
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', "Produk '{$productName}' berhasil dihapus.");
    }

    // Helper function untuk mengambil data KPI (agar tidak duplikasi kode)
    private function getKpiData()
    {
        return [
            'totalProducts' => Product::count(),
            'totalOrders' => Order::where('status', '!=', 'deleted_by_admin')->count(),
            'totalSellers' => User::where('role', 'seller')->count(),
            'totalBuyers' => User::where('role', 'buyer')->count(),
            'adminName' => Auth::guard('admin')->user()->name ?? 'Admin',
        ];
    }
}
