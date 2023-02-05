
    <!-- public function UserData(Request $request)
    {
        $title = "Data User";
        $data = DB::table('useradmins')->select()->join('aktifasis', 'aktifasis.user_id', '=', 'useradmins.id')->get();
        return view("masterweb.user", compact("title", "data"));
    }

    // delete user member
    public function DeleteUser(Request $request)
    {
        $id = $request->input('id');
        $hapus = DB::table('aktifasis')->leftJoin("useradmins", "aktifasis.user_id", "=", "useradmins.id")->where("user_id", $id);
        DB::table('useradmins')->where("id", $id)->delete();
        $hapus->delete();
        return response()->json([
            "status" => 200,
            "title" => "Berhasil Hapus User"
        ]);
    }

    // view user member
    public function ViewUser(Request $request)
    {
        $update = htmlspecialchars($request->input('id'));
        $view = DB::table('useradmins')->where('id', $update)->get();
        return json_encode($view);
    }

    // update user member
    public function UpdateMember(Request $request)
    {
        $this->validate($request, [
            "view_pass" => "required",
            "view_level" => "required"
        ]);
        $id = $request->input('id_member');
        $namaMember = htmlspecialchars($request->input('nama_member'));
        $emailMember = $request->input('view_email');
        $passwordMember = $request->input('view_pass');
        $roleMember = $request->input('view_level');
        if (filter_var($emailMember, FILTER_VALIDATE_EMAIL)) {
            $update = DB::table('useradmins')->where('id', $id)->update([
                "nama_lengkap" => $namaMember,
                "email" => $emailMember,
                "password" => Hash::make($passwordMember),
                "role" => $roleMember,
            ]);
            $dataEmail = [
                "email" => $emailMember,
                "password" => $passwordMember,
            ];
            Mail::to($emailMember)->send(new SendMail($dataEmail));
            return response()->json([
                "status" => 200,
                "title" => "Sukses",
                "text" => "Berhasil Update User"
            ]);
        } else {
            return response()->json([
                "status" => 300,
                "title" => "Gagal",
                "text" => "Silakan Coba Kembali"
            ]);
        }
    }



public function Informasi()
{
    $title = "Add Informasi";
    return view('masterweb.add', compact("title"));
}

// add user 
public function AddUserNew(Request $request)
{
    $this->validate($request, [
        "namanew" => "required",
        "pasnew" => "required"
    ]);
    $namauserbaru = htmlspecialchars($request->input('namanew'));
    $emailuserbaru = $request->input('emailnew');
    $passwordusernew = htmlspecialchars($request->input('pasnew'));
    $roleusernew = $request->input('role_member');
    if (filter_var($emailuserbaru, FILTER_VALIDATE_EMAIL)) {
        if (preg_match("/(?=.*[a-zA-Z])(?=.*[0-9])/", $passwordusernew)) {
            $addusernew = DB::table('useradmins')->insert([
                "nama_lengkap" => $namauserbaru,
                "email" => $emailuserbaru,
                "password" => Hash::make($passwordusernew),
                "role" => $roleusernew,
                "foto" => "user.png"
            ]);
            return response()->json([
                "status" => 200,
                "title" => "Berhasil",
                "text" => "Sukses Buat Akun"
            ]);
        }
    }
}



$.ajax({
                type: "post",
                url: "addalamat",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    'judul': judulubah,
                    'statusloker': statusLoker,
                    'alamatpt': alamatpt,
                    'titlelink': titlegugel,
                    'link': linkkebenaran,

                },
                dataType: "json",
                success: function (res) {
                    if (res.status == 200) {
                        Swal.fire({
                            icon: "success",
                            text: "sukses Add Alamat",
                            timer: 2500,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 3300);

                    } else {
                        Swal.fire({
                            icon: "warning",
                            text: "Alamat Sudah Ada,Silakan Cek Kembali",
                            timer: 2500,
                            showConfirmButton: false
                        });
                    }
                }
            });