<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar supplier'
        ];

        $activeMenu = 'supplier';
        $suppliers = Supplier::all();

        return view('supplier.index', compact('breadcrumb', 'page', 'suppliers', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $supplier = Supplier::select('supplier_id', 'nama_supplier', 'alamat_supplier', 'telp_supplier');

        return DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                $btn  = '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/show') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah data supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function create_ajax()
    {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required|min:3|max:100',
            'alamat_supplier' => 'required|min:3|max:255',
            'telp_supplier' => 'required|min:3|max:20',
        ]);

        // Kalau gagal validasi
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ada kesalahan input data!',
                'msgField' => $validator->errors()
            ]);
        }

        // Proses simpan ke database
        try {
            DB::table('suppliers')->insert([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'telp_supplier' => $request->telp_supplier,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data. ' . $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:100',
            'alamat_supplier' => 'required|string|max:255',
            'telp_supplier' => 'required|string|max:20',
        ]);

        Supplier::create($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:100',
            'alamat_supplier' => 'required|string|max:255',
            'telp_supplier' => 'required|string|max:20',
        ]);

        Supplier::find($id)->update($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    public function edit_ajax($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit_ajax', compact('supplier'));
    }

    public function update_ajax(Request $request, $id)
    {
        // Validasi data
        $rules = [
            'nama_supplier' => 'required|min:3|max:100',
            'alamat_supplier' => 'required|min:2|max:100',
            'telp_supplier' => 'required|min:2|max:20',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        // Kalau AJAX, respon JSON
        if ($request->ajax() || $request->wantsJson()) {
            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
    
            $supplier = Supplier::find($id);
            if (!$supplier) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan.'
                ]);
            }
    
            $supplier->update([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'telp_supplier' => $request->telp_supplier,
            ]);
    
            return response()->json([
                'status'  => true,
                'message' => 'Data supplier berhasil diupdate.'
            ]);
        }
    
        // Kalau BUKAN AJAX (form biasa)
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return redirect('/supplier')->with('error', 'Data tidak ditemukan.');
        }
    
        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'telp_supplier' => $request->telp_supplier,
        ]);
    
        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            Supplier::destroy($id);
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (QueryException $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena terkait data lain');
        }
    }

    public function confirm_ajax(string $id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.confirm_ajax', ['supplier' => $supplier]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $supplier = Supplier::find($id);
            if ($supplier) {
                $supplier->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/supplier');
    }
}
