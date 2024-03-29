<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\customer;
use App\Models\detailtran;
use App\Models\produk;
use App\Models\salesman;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\produkrecord;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        //
        $salesman = salesman::all();
        $customer = customer::all();
        $tes = cart::with('produk')->get();
        // $total = $tes->sum('harga');

        // $total = DB::table('cart')
        //     ->join('produk', 'cart.produk_id', '=', 'produk.id')
        //     ->select(DB::raw('SUM(produk.harga * cart.qty) as total_harga'))
        //     ->get()
        //     ->first()->total_harga;


        $data = Transaksi::with('customer', 'salesman', 'produk')->get();

        if ($request->ajax()) {
            $data = Transaksi::with('customer', 'salesman', 'produk')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('transaction.transaksi2')->with('data', $data)->with('salesman', $salesman)->with('customer', $customer);
    }

    public function dateRange(Request $request){

        $fromDate = $request->input('fromdate');
        $toDate = $request->input('todate');

        $data = Transaksi::with('customer', 'salesman', 'produk')
        ->whereBetween('tanggal_transaksi', [$fromDate, $toDate])->get()
        ;

        return view('transaction.transaksi2')->with('data', $data);

    }



    public function addCart(Request $request)
    {


        $validate = $request->all();
        // $select = $validate['produk_id'];
        // $qty =  $validate['qty'];



        cart::create($validate);

        // DB::transaction(function () use ($qty, $select) {
        // });

        return redirect('/transaksi');
    }

    public function DeleteCart(Request $request,  $id)
    {

        $id = cart::findOrFail($id);

        $id->delete();





        return redirect('/transaksi');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $salesman = salesman::all();
        $customer = customer::all();
        $data = produk::all();



        return view('transaction.addtransaksi')->with('salesman', $salesman)->with('customer', $customer)->with('data', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $validate = $request->all();

        // $select = $validate['produk_id'];
        // $qty = $validate['stok_keluar'];





        // $cart = cart::with('produk')->get();

        // foreach($cart as $key => $value){
        //     $product = array(
        //         'transaksi_id' =>$transaksi->id,
        //         'qty' => $value->qty,
        //         'total' => $value->qty * $value->produk->harga,
        //         'created_at' => \Carbon\Carbon::now(),
        //         'updated_at' => \Carbon\Carbon::now()
        //     );

        //     $orderproduct = detailtran::insert($product);

        //     $deletecart = cart::where('id', $value->id)->delete();


        // }

        // DB::transaction(function () use( $transaksi, $qty, $select) {
        //     produk::where('id', $select)->decrement('stok', $qty);



        // });

        DB::beginTransaction();

        try {

            $validate = $request->all();
            $select = $validate['produk_id'];
            $qty = $validate['stok_keluar'];
            $date = $validate['tanggal_transaksi'];





            $produklama =  $validate['stok_lama'];
            Transaksi::create($validate);

            produkrecord::create([
                'produk_id' => $select,
                'stok' => $produklama,
                'tanggal' => $date
            ]);

            produk::where('id', $select)->decrement('stok', $qty);
            // produk_record create
            $queryStatus = 'Data berhasil ditambah';



            // Jika semua query berhasil, simpan perubahan
            DB::commit();
        } catch (\Exception $e) {
            // Tangani kesalahan jika ditemui
            // Rollback untuk membatalkan transaksi
            DB::rollBack();

            $queryStatus = 'Data gagal ditambah. Error: ' . $e->getMessage();
        }

        return redirect('/transaksi');






    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
