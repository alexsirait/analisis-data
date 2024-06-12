@extends('layouts.app')

@section('title', 'Master Data')

@section('content')
<div class="wrappers" style="background-color: hsl(252, 29%, 97%);">
    <div class="wrapper_content">
        <div class=" me-1">
            <div class="col-sm-12">
                <div>
                    <h3 class=" mt-2 fw-bold">Master Data</h3>
                </div>
            </div>

            <div class="col-sm-12 mt-3" id="loginCard">
                <div class="container centered-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <form id="loginSub">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3 d-none" id="importCard">
                <div class="container centered-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <form>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="importFileExcel" name="importFileExcel" accept=".xlsx, .xls, .csv">
                                    <div id="output" style="max-height: 300px; overflow-y: scroll; overflow-x:hidden; margin-top: 10px;"></div>
                                </div>
                                <button type="button" id="btnImportFileExcel" class="btn btn-secondary" data-bs-dismiss="modal">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('submit', '#loginSub', function (e) {
        e.preventDefault();

        const email = $("#exampleInputEmail1").val();
        const pass = $("#exampleInputPassword1").val();

        if (email.toString() === "admin@gmail.com" && pass.toString() === "admin") {
            showMessage('success', 'Anda berhasil masuk!');
            $("#loginCard").addClass('d-none');
            $("#importCard").removeClass('d-none');
        } else {
            showMessage('error', 'Akun anda tidak terdaftar!');
            return;
        }
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
<script>
$(document).on('change',"#importFileExcel", function (e) {
    e.preventDefault();
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var data = new Uint8Array(e.target.result);
        var workbook = XLSX.read(data, {type: 'array'});
        var sheetName = workbook.SheetNames[0];
        var sheet = workbook.Sheets[sheetName];
        var columnData = XLSX.utils.sheet_to_json(sheet, { header: 1 })
            .slice(1)
            .map(row => ({
                timestamp: row[0].toString(),
                name: row[1].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                umur: row[2].toString().substring(0, 2),
                gender: (/laki|pria/i.test(row[3]) ? "Laki-Laki" : /perempuan|wanita/i.test(row[3]) ? "Perempuan" : row[3].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() })),
                provinsi: row[4].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                jurusan: row[5].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                kebersihan: row[6].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                ruang: row[7].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                pelayanan: row[8].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                makanan: row[9].toString().replace(/\b\w/g, function(l){ return l.toUpperCase() }),
                fasilitas: row[10].toString(),
            }));
        var outputDiv = document.getElementById('output');
        outputDiv.innerHTML = "<h5 class='mt-3'>Hasil:</h5><pre>" + JSON.stringify(columnData, null, 2) + "</pre>";
        dataImport = columnData;
    };
    reader.readAsArrayBuffer(file);
})
</script>
<script>
$(document).on('click', '#btnImportFileExcel', function (e) {
    e.preventDefault();
    const fileEx = $("#importFileExcel").val();
    if (fileEx == '') {
        showMessage('error', 'File Upload Required!');
        return;
    }
    Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "{{ route('insert') }}",
                data: {dataImport},
                dataType: "JSON",
                success: function (RES) {
                    console.log(RES);
                    Swal.fire("Saved!", "", "success").then(function (e) {
                        window.location.href = '/';
                    });
                    
                }
            });
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
})
</script>
@endsection