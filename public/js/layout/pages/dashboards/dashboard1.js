
// profil
const Cekstrong = (CekString) => {
    switch (CekString) {
        case 1:
            $(".strong").css({
                width: "55%",
                "background-color": "#FF0000",
            });
            break;
        case 2:
            $(".strong").css({
                width: "100%",
                "background-color": "#32CD32",
            });
            break;
        default:
            $(".strong").css({
                width: "0%",
                "background-color": "#ffff",
            });
            break;
    }
};
$(document).ready(function () {
    $(".pascek").keyup(function (e) {
        CekString = 0;
        let pas = $(this).val();
        const FilterRegex = new RegExp("(?=.*[a-zA-Z])(?=.*[0-9])");
        if (FilterRegex.test(pas)) CekString += 1;
        if (pas.length > 5) CekString += 1;
        Cekstrong(CekString);
    });
    $("#foto").change(function (e) {
        e.preventDefault();
        const File = this.value;
        const Filter = File.substring(File.lastIndexOf(".") + 1).toLowerCase();
        if (Filter == "png" || Filter == "jpg" || Filter == "jpeg") {
            const reader = new FileReader();
            reader.onload = function (e) {
                let ukuran = new Image();
                ukuran.src = e.target.result;
                ukuran.onload = function () {
                    const width = this.width;
                    const height = this.height;
                    if (width < 4000 || height < 4000) {
                        $(".view_foto").attr("src", e.target.result);
                        $(".view_foto").hide();
                        $(".view_foto").fadeIn();
                    } else {
                        $(".closed").removeClass("d-none");
                    }
                };
            };
            reader.readAsDataURL(e.target.files[0]);
        } else {
            $(".close").removeClass("d-none");
        }
    });
    $(".cek").click(function () {
        const Password = $(".show");
        if (Password.attr("type") == "password") {
            $(Password).attr("type", "text");
        } else {
            $(Password).attr("type", "password");
        }
    });
});
const tutup = () => {
    $(".close").addClass("d-none");
    $(".closed").addClass("d-none");
};

// hapus user
// const DeleteUser = (id) => {
//     const token = $('meta[name="csrf-token"]').attr("content");
//     Swal.fire({
//         title: "Apa Anda Ingin Hapus ?",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 method: "delete",
//                 url: "user/" + id,
//                 data: {
//                     _token: token,
//                     id: id,
//                 },
//                 dataType: "json",
//                 success: function (response) {
//                     if (response.status == 200) {
//                         Swal.fire({
//                             icon: "success",
//                             timer: 3000,
//                             title: response.title,
//                             showConfirmButton: false,
//                         });
//                         setTimeout(() => {
//                             location.reload();
//                         }, 3000);
//                     }
//                 },
//             });
//         }
//     });
// };

// update user
// const UpdateUser = (id) => {
//     const token = $('meta[name="csrf-token"]').attr("content");
//     $.ajax({
//         type: "get",
//         url: "view/" + id,
//         data: {
//             _token: token,
//             id: id,
//         },
//         dataType: "json",
//         success: function (data) {
//             $.each(data, function (index, value) {
//                 $(".id_view").val(value.id);
//                 $(".view_nama").val(value.nama_lengkap);
//                 $(".view_email").val(value.email);
//                 document.getElementById("role").innerHTML = value.role;
//             });
//         },
//     });
// };

// update member profil
// const UserMemberUpdate = (e) => {
//     e.preventDefault();
//     let id = $(".id_view").val();
//     let NamaMember = $(".view_nama").val();
//     NamaMember = NamaMember.split(" ")
//         .map(
//             (NamaMember) =>
//                 NamaMember.substring(0, 1).toUpperCase() + NamaMember.slice(1)
//         )
//         .join(" ");
//     const EmailMember = $(".view_email").val();
//     const PasswordMember = $(".view_pass").val();
//     let Role = $(".view_level").val();
//     if (
//         /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(
//             EmailMember
//         ) &&
//         /^(?=.*[a-zA-Z])/.test(NamaMember)
//     ) {
//         if (PasswordMember == false) {
//             Swal.fire({
//                 icon: "info",
//                 title: "Harap di isi semua",
//                 timer: 29000,
//             });
//         } else {
//             $.ajax({
//                 type: "post",
//                 url: "updatemember",
//                 headers: {
//                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
//                         "content"
//                     ),
//                 },
//                 data: {
//                     id_member: id,
//                     nama_member: NamaMember,
//                     view_email: EmailMember,
//                     view_pass: PasswordMember,
//                     view_level: Role,
//                 },
//                 dataType: "json",
//                 success: function (response) {
//                     if (response.status == 200) {
//                         Swal.fire({
//                             icon: "success",
//                             title: response.title,
//                             text: response.text,
//                             timer: 2900,
//                         });
//                         setTimeout(() => {
//                             location.reload();
//                         }, 2900);
//                     } else {
//                         Swal.fire({
//                             icon: "info",
//                             title: response.title,
//                             text: response.text,
//                             timer: 29000,
//                             showConfirmButton: true,
//                         });
//                     }
//                 },
//             });
//         }
//     } else {
//         Swal.fire({
//             icon: "warning",
//             title: "Gagal",
//             text: "Silakan coba kembali !",
//             timer: 29000,
//         });
//     }
// };

// add user new
// const addusernew = (e) => {
//     e.preventDefault();
//     let namamembernew = $(".namanew").val();
//     let emailnew = $(".emailnew").val();
//     let pasnew = $(".pasnew").val();
//     let rolenew = $(".rolenew").val();
//     namamembernew = namamembernew
//         .split(" ")
//         .map(
//             (namamembernew) =>
//                 namamembernew.substring(0, 1).toUpperCase() +
//                 namamembernew.slice(1)
//         )
//         .join(" ");
//     let filterpas = new RegExp("(?=.*[a-zA-Z])(?=.*[0-9])");
//     if (namamembernew == "" && emailnew == "" && pasnew == "") {
//         console.log("harus di isi");
//     }
//     if (
//         /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(
//             emailnew
//         ) &&
//         /^(?=.*[a-zA-Z])/.test(namamembernew) &&
//         filterpas.test(pasnew)
//     ) {
//         $.ajax({
//             type: "post",
//             url: "addusernew",
//             data: {
//                 _token: $('input[name="_token"]').val(),
//                 namanew: namamembernew,
//                 emailnew: emailnew,
//                 pasnew: pasnew,
//                 role_member: rolenew,
//             },
//             dataType: "json",
//             success: function (res) {
//                 if (res.status == 200) {
//                     Swal.fire({
//                         icon: "success",
//                         title: res.title,
//                         text: res.text,
//                         timer: 3000
//                     });
//                     setTimeout(() => {
//                         location.reload();
//                     }, 3000);
//                 }
//             },
//         });
//     } else {
//         Swal.fire({
//             icon: "warning",
//             title: "Gagal",
//             text: "Password Harus Berupa Huruf Besar dan angka",
//             timer: 2500
//         });
//     }
// }

// get url
const carigugel = (e) => {
    const token = $('meta[name="csrf-token"]').attr("content");
    e.preventDefault();
    let search = $(".ketik_gugel").val();
    if (search !="") {
        $.ajax({
            type: "get",
            url: '/search_gugel',
            data: {
                '_token': token,
                'gugel': search
            },
            dataType: "json",
            success: function (data) {
                let respon = JSON.parse(data);
                let tes = [respon];
                tes.forEach(element => {
                    let er = element['organic'];
                    for (let index = 1; index < er.length; index++) {
                        const site = er[index];
                        document.querySelector('#judul_title').innerHTML += '<option value="' + site.title + '">"' + site.title + '"</option>';
                        document.querySelector('#url_web_kebenaran').innerHTML += '<option value="' + site.link + '">' + site.link + '</option>';
                    }
                });
            }
        });
    } else {
        document.getElementById("alert_search").innerHTML="<header class='bg-info p-1 rounded'><span onclick='tutupalertsearch()' style='cursor:pointer;' class='d-block'><i class='fas fa-times text-white' style='font-size:20px;'></i><p class='text-white d-inline-block position-relative' style='left:5px;font-size:23px;'>Harap Di isi Form Search</header>";
    }

}
const tutupalertsearch = ()=>{
    setTimeout(() => {
        document.getElementById("alert_search").remove();
    }, 50);
}

// add informasi alamat lowongan
const addinformasi = (e) => {
    e.preventDefault();
    const titlegugel = $("#judul_title").val();
    const linkkebenaran = $("#url_web_kebenaran").val();
    let judulpt = $("#namapt").val();
    judulpt = judulpt.split(" ").map(
        (judulpt) => judulpt.substring(0, 1).toUpperCase() + judulpt.slice(1)
    ).join(" ");
    let statusLoker = $(".statuspt").val();
    const alamatpt = $(".alamatpt").val();
    if (alamatpt === "" && judulpt === "" && linkkebenaran === "") {
        Swal.fire({
            icon: "info",
            text: "Form Harus Terisi",
            timer: 2500,
            showConfirmButton: false
        });
    }
    if (judulpt.match("[A-Z]")) {
        if (statusLoker == "") {
            Swal.fire({
                icon: "info",
                text: "Harap isi status kebenaran",
                timer: 2500,
                showConfirmButton: false
            });
        } else {
            let ubahjudulpt = judulpt.split(" ");
            let hasilubahjudul = ubahjudulpt[0].toUpperCase();
            let judulubah = hasilubahjudul + "." + ubahjudulpt.slice(1).join(" ");
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
        }
    }
}

// delete informasi
const deleteinformasi = (id)=>{
     $.ajax({
         type: "delete",
         url: "deletealamat/"+id,
         data: {
              _token: $('meta[name="csrf-token"]').attr("content"),
             id:id,
         },
         dataType: "json",
         success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: "success",
                    text: "Sukses Hapus Alamat",
                    timer: 2500,
                    showConfirmButton: false
                });
                setTimeout(() => {
                    location.reload();
                }, 3300);
            }
         }
     });
}

// update informasi alamat
$(".updateinformasialamat").submit(function (e) { 
    e.preventDefault();
    const id = document.getElementById("idalamat").value;
    let Titlebaru = document.getElementById("judul_title").value;
    let Urlbaru = document.getElementById("url_web_kebenaran").value;
    const Statusbaru = document.getElementsByClassName("statuspt")[0].value;
    if (Statusbaru.match("[a-zA-Z]")) {
        let Namaperusahaanbaru = document.getElementById("namaptbaru").value.toLowerCase();
       let pisahpt = [...new Set(Namaperusahaanbaru.split(" "))].join(" ");
       let ptedit = pisahpt.replace(/pt/g,"PT");
       let namaptedit = ptedit.split(" ").map(
        (ptedit)=> ptedit.substring(0,1).toUpperCase() + ptedit.slice(1)
       ).join(" ");
       let alamatedit = document.getElementById("viewalamat").value;
       if (namaptedit.match("[a-zA-Z]")) {
            $.ajax({
                type: "POST",
                url: "/updatealamat",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    "juduledit":namaptedit,
                    "id":id,
                    "titlebaru":Titlebaru,
                    "urledit":Urlbaru,
                    "alamatedit":alamatedit,
                    "status":Statusbaru,
                },
                dataType: "json",
                success: function (res) {
                    if (res.status === "gagalform") {
                        Swal.fire({
                            icon: "warning",
                            text: "Form Harus Terisi",
                            timer: 2500,
                            showConfirmButton: false
                        });
                    }else if (res.status === "sama") {
                        Swal.fire({
                            icon: "info",
                            text: "Alamat Sudah Ada,Silakan coba kembali",
                            timer: 2500,
                            showConfirmButton: false
                        });
                    }else{
                        Swal.fire({
                            icon: "success",
                            text: "Berhasil Update Alamat",
                            timer: 2500,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 2500);
                    }
                }
            });
       } 
    }else{
        Swal.fire({
            icon: "info",
            text: "Pilih Status Kebenaran",
            timer: 2500,
            showConfirmButton: false
        });
    }
});