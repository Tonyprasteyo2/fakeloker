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
const DeleteUser = (id) => {
    const token = $('meta[name="csrf-token"]').attr("content");
    Swal.fire({
        title: "Apa Anda Ingin Hapus ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "delete",
                url: "user/" + id,
                data: {
                    _token: token,
                    id: id,
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            timer: 3000,
                            title: response.title,
                            showConfirmButton: false,
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                },
            });
        }
    });
};
const UpdateUser = (id) => {
    const token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "get",
        url: "view/" + id,
        data: {
            _token: token,
            id: id,
        },
        dataType: "json",
        success: function (data) {
            $.each(data, function (index, value) {
                $(".id_view").val(value.id);
                $(".view_nama").val(value.nama_lengkap);
                $(".view_email").val(value.email);
                document.getElementById("role").innerHTML = value.role;
            });
        },
    });
};
const UserMemberUpdate = (e) => {
    e.preventDefault();
    let id = $(".id_view").val();
    let NamaMember = $(".view_nama").val();
    NamaMember = NamaMember.split(" ")
        .map(
            (NamaMember) =>
                NamaMember.substring(0, 1).toUpperCase() + NamaMember.slice(1)
        )
        .join(" ");
    const EmailMember = $(".view_email").val();
    const PasswordMember = $(".view_pass").val();
    let Role = $(".view_level").val();
    if (
        /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(
            EmailMember
        ) &&
        /^(?=.*[a-zA-Z])/.test(NamaMember)
    ) {
        if (PasswordMember == false) {
            Swal.fire({
                icon: "info",
                title: "Harap di isi semua",
                timer: 29000,
            });
        } else {
            $.ajax({
                type: "post",
                url: "updatemember",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id_member: id,
                    nama_member: NamaMember,
                    view_email: EmailMember,
                    view_pass: PasswordMember,
                    view_level: Role,
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            title: response.title,
                            text: response.text,
                            timer: 2900,
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 2900);
                    } else {
                        Swal.fire({
                            icon: "info",
                            title: response.title,
                            text: response.text,
                            timer: 29000,
                            showConfirmButton: true,
                        });
                    }
                },
            });
        }
    } else {
        Swal.fire({
            icon: "warning",
            title: "Gagal",
            text: "Silakan coba kembali !",
            timer: 29000,
        });
    }
};
const addusernew = (e) => {
    e.preventDefault();
    let namamembernew = $(".namanew").val();
    let emailnew = $(".emailnew").val();
    let pasnew = $(".pasnew").val();
    let rolenew = $(".rolenew").val();
    namamembernew = namamembernew
        .split(" ")
        .map(
            (namamembernew) =>
                namamembernew.substring(0, 1).toUpperCase() +
                namamembernew.slice(1)
        )
        .join(" ");
    let filterpas = new RegExp("(?=.*[a-zA-Z])(?=.*[0-9])");
    if (namamembernew == "" && emailnew == "" && pasnew == "") {
        console.log("harus di isi");
    }
    if (
        /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(
            emailnew
        ) &&
        /^(?=.*[a-zA-Z])/.test(namamembernew) &&
        filterpas.test(pasnew)
    ) {
        $.ajax({
            type: "post",
            url: "addusernew",
            data: {
                _token:$('input[name="_token"]').val(),
                namanew: namamembernew,
                emailnew: emailnew,
                pasnew: pasnew,
                role_member: rolenew,
            },
            dataType: "json",
            success: function (res) {
                if (res.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title:res.title,
                        text: res.text,
                        timer: 3000
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
            },
        });
    } else {
        Swal.fire({
            icon: "warning",
            title:"Gagal",
            text: "Password Harus Berupa Huruf Besar dan angka",
            timer: 2500
        });
    }
}
const carigugel = (e) => {
    const token = $('meta[name="csrf-token"]').attr("content");
    e.preventDefault();
    let search = $(".ketik_gugel").val();
    $.ajax({
        type: "get",
        url: "search_gugel",
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
                for (let index = 0; index < er.length; index++) {
                    const site = er[index];
                    document.querySelector('#judul_web_gugel').innerHTML += '<option value="'+site.title +'">"' + site.title + '"</option>';
                    document.querySelector('#url_web_kebenaran').innerHTML += '<option value="'+site.link +'">' + site.link + '</option>';
                }
            });
        }
    });
    
}

// add informasi alamat lowongan
const addinformasi = (e) => {
    e.preventDefault();
    const titlegugel = $("#judul_web_gugel").val();
    const linkkebenaran = $("#url_web_kebenaran").val();
    let judulpt = $("#namapt").val();
    judulpt = judulpt.split(" ").map(
        (judulpt) => judulpt.substring(0, 1).toUpperCase() + judulpt.slice(1)
    ).join(" ");
    let statusLoker = $(".statuspt").val();
    const alamatpt = $(".alamatpt").val();
    if (judulpt.match("[A-Z]")) {
        if (statusLoker == "") {
            console.log('harus di isi');
        } else {
            let ubahjudulpt = judulpt.split(" ");
            let hasilubahjudul = ubahjudulpt[0].toUpperCase();
            let judulubah = hasilubahjudul + "." + ubahjudulpt.slice(1).join(" ");
            $.ajax({
                type: "post",
                url: "addalamat",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    title: titlegugel,
                    linkurl: linkkebenaran,
                    judul: judulpt,
                    statuskebenaran: statusLoker,
                    ptalamat:alamatpt
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
    } else {
        console.log('s');
    }
}