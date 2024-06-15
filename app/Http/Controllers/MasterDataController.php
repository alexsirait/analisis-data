<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MasterDataController extends Controller
{
    public function masterdata()
    {
        return view('masterdata');
    }

    public function insert(Request $req)
    {
        try {

            DB::beginTransaction();

            DB::table('masterdata')->delete();

            foreach ($req->dataImport as $r) {
                DB::table('masterdata')->insert([
                    "timestamp" => $r['timestamp'],
                    "name" => $r['name'],
                    "umur" => $r['umur'],
                    "gender" => $r['gender'],
                    "provinsi" => $r['provinsi'],
                    "jurusan" => $r['jurusan'],
                    "kebersihan" => $r['kebersihan'],
                    "ruang" => $r['ruang'],
                    "pelayanan" => $r['pelayanan'],
                    "makanan" => $r['makanan'],
                    "fasilitas" => $r['fasilitas'],
                ]);
            }

            DB::commit();

            return response()->json('SUCCESS');

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function umur(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT umur, COUNT(*) AS jumlah_umur
                                FROM masterdata
                                GROUP BY umur");

            DB::commit();

            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function gender(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT 
                                    gender,
                                    COUNT(*) AS jumlah_gender,
                                    ROUND(COUNT(*) * 100.0 / SUM(COUNT(*)) OVER(), 0) AS persentase
                                FROM 
                                    masterdata
                                WHERE 
                                    gender LIKE '%Laki-laki%' OR gender LIKE '%Perempuan%'
                                GROUP BY 
                                    gender");
                                    
            DB::commit();

            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function provinsi(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT 
                                    provinsi,
                                    COUNT(*) AS jumlah_provinsi
                                FROM 
                                    masterdata
                                GROUP BY 
                                    provinsi");

            DB::commit();

            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function pekerjaan(Request $req)
    {
        try {

            DB::beginTransaction();

            $staff = DB::select("SELECT
                                    COUNT(masterdata.name) AS count
                                FROM masterdata
                                WHERE (
                                    masterdata.jurusan IS NULL OR
                                    masterdata.jurusan = '' OR
                                    UPPER(masterdata.jurusan) = UPPER('staff')
                                )");

            $dosen = DB::select("SELECT
                                    COUNT(masterdata.name) AS count
                                FROM masterdata
                                WHERE (
                                    masterdata.jurusan IS NULL OR
                                    masterdata.jurusan = '' OR
                                    UPPER(masterdata.jurusan) = UPPER('dosen')
                                )");

            $mhs = DB::select("SELECT
                                    COUNT(masterdata.name) AS count
                                FROM masterdata
                                WHERE (
                                    masterdata.jurusan IS NOT NULL
                                ) AND UPPER(masterdata.jurusan) <> UPPER('dosen') AND UPPER(masterdata.jurusan) <> UPPER('staff') AND masterdata.jurusan <> ''");

            DB::commit();

            return response()->json([
                'mhs' => $mhs,
                'dosen' => $dosen,
                'staff' => $staff,
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    private function countWordsInDataWordFreq($data)
    {
        $wordCounts = [];
        foreach ($data as $row) {
            $words = explode(' ', $row);
            foreach ($words as $word) {
                $word = strtolower($word);
                if (!isset($wordCounts[$word])) {
                    $wordCounts[$word] = 1;
                } else {
                    $wordCounts[$word]++;
                }
            }
        }
        return $wordCounts;
    }

    public function wordFrequency(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('masterdata')->get()->pluck('fasilitas');

            $wordCounts = $this->countWordsInDataWordFreq($data);
            arsort($wordCounts);
            $top5Words = array_slice($wordCounts, 0, 5);

            DB::commit();

            return response()->json($top5Words);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    private function countWordsInDataKepuasan($data)
    {
        $wordCounts = [
            'Sangat Baik' => 0,
            'Baik' => 0,
            'Cukup' => 0,
            'Kurang' => 0,
            'Sangat Kurang' => 0
        ];

        foreach ($data as $row) {
            $words = explode(' ', strtolower($row));

            foreach ($wordCounts as $word => $count) {
                $wordCounts[$word] += substr_count($row, $word);
            }
        }

        return $wordCounts;
    }

    public function jenisKebersihan(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('masterdata')->get()->pluck('kebersihan');

            $wordCounts = $this->countWordsInDataKepuasan($data);

            DB::commit();

            return response()->json($wordCounts);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    private function countWordsInDataKepuasanRuang($data)
    {
        $wordCounts = [
            'Sangat Luas' => 0,
            'Luas' => 0,
            'Cukup' => 0,
            'Kurang' => 0,
            'Sangat Kurang' => 0
        ];

        foreach ($data as $row) {
            $words = explode(' ', strtolower($row));

            foreach ($wordCounts as $word => $count) {
                $wordCounts[$word] += substr_count($row, $word);
            }
        }

        return $wordCounts;
    }

    public function jenisRuang(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('masterdata')->get()->pluck('ruang');

            $wordCounts = $this->countWordsInDataKepuasanRuang($data);

            DB::commit();

            return response()->json($wordCounts);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    private function countWordsInDataKepuasanPelayanan($data)
    {
        $wordCounts = [
            'Sangat Baik' => 0,
            'Baik' => 0,
            'Cukup' => 0,
            'Kurang' => 0,
            'Sangat Kurang' => 0
        ];

        foreach ($data as $row) {
            $words = explode(' ', strtolower($row));

            foreach ($wordCounts as $word => $count) {
                $wordCounts[$word] += substr_count($row, $word);
            }
        }

        return $wordCounts;
    }

    public function jenisPelayanan(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('masterdata')->get()->pluck('pelayanan');

            $wordCounts = $this->countWordsInDataKepuasanPelayanan($data);

            DB::commit();

            return response()->json($wordCounts);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    private function countWordsInDataKepuasanMakanan($data)
    {
        $wordCounts = [
            'Sangat Memuaskan' => 0,
            'Memuaskan' => 0,
            'Biasa Saja' => 0,
            'Kurang Memuaskan' => 0,
            'Sangat Kurang Memuaskan' => 0
        ];

        foreach ($data as $row) {
            $words = explode(' ', strtolower($row));

            foreach ($wordCounts as $word => $count) {
                $wordCounts[$word] += substr_count($row, $word);
            }
        }

        return $wordCounts;
    }

    public function jenisMakanan(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('masterdata')->get()->pluck('makanan');

            $wordCounts = $this->countWordsInDataKepuasanMakanan($data);

            DB::commit();

            return response()->json($wordCounts);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function wordCloud(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT 
                                    GROUP_CONCAT(
                                        CONCAT_WS('', 
                                            masterdata.fasilitas
                                        ) SEPARATOR ' '
                                    ) AS combined_column
                                FROM masterdata;");

            DB::commit();

            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function checkBox(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT * FROM (
                                    SELECT 
                                    provinsi,
                                    COUNT(*) AS jumlah_provinsi,
                                    ROUND(COUNT(*) * 100.0 / SUM(COUNT(*)) OVER(), 0) AS persentase
                                    FROM 
                                    masterdata
                                    GROUP BY 
                                    provinsi
                                ) AS DATA 
                                ORDER BY DATA.persentase DESC");

            DB::commit();

            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }
}