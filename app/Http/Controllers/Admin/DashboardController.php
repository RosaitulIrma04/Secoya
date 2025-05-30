<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product; // Pastikan menggunakan Product (huruf P besar) jika itu nama model Anda
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// Request tidak digunakan di index() ini, bisa dihapus jika tidak ada rencana penggunaan
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Utama Admin (KPI).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $kpiData = $this->getKpiData();

        // KOREKSI: Pastikan 'admin.dashboard' adalah nama file Blade untuk KPI Anda
        // (misal, resources/views/admin/dashboard.blade.php)
        return view('admin.dashboard', $kpiData);
    }

    /**
     * Helper function untuk mengambil data KPI.
     *
     * @return array
     */
    private function getKpiData()
    {
        // Inisialisasi default untuk mencegah error jika model/data tidak ada
        $totalProducts = 0;
        $totalOrders = 0;
        $totalSellers = 0;
        $totalBuyers = 0;
        $adminName = 'Admin';

        try {
            // Pastikan nama model Product konsisten (Product vs product)
            $totalProducts = product::count();
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
            // Opsional: Log error jika terjadi
            // \Log::error("Error fetching KPI data in DashboardController: " . $e->getMessage());
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
