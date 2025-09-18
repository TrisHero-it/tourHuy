<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use mysqli;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();
        if ($request->filled('search')) {
            $orders->where('phone', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $orders->where('status', $request->status);
        }

        $orders = $orders->with('tour')->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }


    public function export(Request $request)
    {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        if (ob_get_length()) ob_end_clean();

        $conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $conn->set_charset("utf8mb4");

        $query = "
        SELECT orders.name, orders.phone, orders.price_now, orders.status, tours.name as tour_name
        FROM orders
        JOIN tours ON orders.tour_id = tours.id
        ";

        if ($request->filled('status')) {
            $query .= " WHERE orders.status = '" . $request->status . "'";
        }

        $result = $conn->query($query);
        if (!$result || $result->num_rows == 0) {
            die("Không có dữ liệu hoặc lỗi SQL.");
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Tên khách hàng');
        $sheet->setCellValue('B1', 'Số điện thoại');
        $sheet->setCellValue('C1', 'Giá tour');
        $sheet->setCellValue('D1', 'Trạng thái');
        $sheet->setCellValue('E1', 'Tour');
        $sheet->setCellValue('F1', 'Email');
        $row = 2;
        while ($data = $result->fetch_assoc()) {
            $sheet->setCellValue("A{$row}", $data['name']);
            $sheet->setCellValue("B{$row}", $data['phone']);
            $sheet->setCellValue("C{$row}", $data['price_now']);
            $sheet->setCellValue("D{$row}", $data['status']);
            $sheet->setCellValue("E{$row}", $data['tour_name']);
            $sheet->setCellValue("F{$row}", $data['email']);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="orders-sinh-travel.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
