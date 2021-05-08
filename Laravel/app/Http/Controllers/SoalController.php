<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{

    // Function: index
    // return page listSoal with data Soal.
    public function index()
    {
        $soals = Soal::all();
        return view('pages.listSoal')->with('soals', $soals);
    }

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
        return redirect()->route('soals.create')->with('success', 'Soal Behasil Dibuat');
    }

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
        return view('pages.testTulis', ['soal' => $soal]);
    }

    /* Function: edit

   menampilkan halaman update soal dan jawaban yang dipilih berdasarkan $id

   Parameters:

      $id - id soal

   Returns:

      page edit soal dan jawaban suatu matkul sesuai $id
      
*/
    public function edit(Soal $soal)
    {
        //
    }

    /* Function: update

    melakukan update data hasil inputan dari page edit buatSoal

   Parameters:

      $id - id soal

   Returns:

      page listSoal beserta flash message "success" jika update berhasi dan
      flash message "fail" jika delete gagal
      
*/
    public function update(Request $request, Soal $soal)
    {
        //
    }

    /* Function: destroy

   menghapus data berdasarkan id

   Parameters:

      $id - id soal

   Returns:

      page listSoal beserta flash message "success" jika delete berhasi dan
      flash message "fail" jika delete gagal 
      
*/
    public function destroy(Soal $soal)
    {
        //
    }
}
