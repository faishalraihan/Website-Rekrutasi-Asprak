<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Function: index
    // return page listSoal with data Soal.
    public function index()
    {
        $soals = Soal::all();
        return view('pages.listSoal')->with('soals', $soals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Function: create

    Function Untuk Mengalihkan ke page pembuatan soal buatSoal.blade.php

    Parameters:

      $request - request dari halaman web dipakai untuk session

    Returns:

      return pages buatSoal untuk pembuatan soal beserta data session
    */
    public function create(Request $request)
    {
        $data['nim'] = $request->session()->get('nim');
        $data['name'] = $request->session()->get('name');
        return view('pages.buatSoal')->with("data", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* Function: store

    melakukan penyimpanan data  hasil inputan dari page buatSoal

    Parameters:

      $request - Request inputan user dari page buatSoal  untuk disimpan

    Returns:

      jika berhasil data tersimpan ke database, dan redirect ke page buatSoal
      jika gagal return ke page create

    */
    public function store(Request $request)
    {
        $add_soal = new Soal;
        $add_soal->soal = $request->get('soal');
        $add_soal->kunciJawaban = $request->get('kunciJawaban');
        $add_soal->nimPembuat = $request->get('nimPembuat');
        $add_soal->matkul = $request->get('matkul');
        $add_soal->save();
        $add_soal->id_soal = "soal_" . $add_soal->matkul . "_" . $add_soal->id;
        $add_soal->save();
        return redirect()->route('soals.create')->with('success', 'Soal Behasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */

    /* Function: show

    menampilkan halaman soal dan jawaban yang dipilih berdasarkan $id

    Parameters:

      $id - id soal

    Returns:

      page soal dan jawaban suatu matkul sesuai $id

    */
    public function show($id)
    {
        $soal = Soal::findOrFail($id);
        return view('pages.lihatSoal')->with('soal', $soal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */

    /* Function: destroy

<<<<<<< Updated upstream
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
=======
    menghapus data berdasarkan id

    Parameters:

      $id - id soal

    Returns:

      page listSoal beserta flash message "success" jika delete berhasi dan
      flash message "fail" jika delete gagal 
      
    */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();
        return redirect()->route('soals.index')->with('success', 'Soal Berhasil dihapus');
>>>>>>> Stashed changes
    }
}
