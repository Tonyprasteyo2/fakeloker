$(document).ready(function () {
    $(".login").submit(function (e) {
        e.preventDefault();
        const email = $(".email").val();
        const password = $(".password").val();
        const filterEmail =
            /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
        const csrfToken = $('meta[name="csrf-token"]').attr("content");
        if (email == "" && password == "") {
            Swal.fire({
                title: "Gagal",
                text: "Harap masukan email dan password",
                timer:3000,
                icon: "info",
            });
        }
        if (filterEmail.test(email)) {
            $.ajax({
                type: "post",
                url: "logiuser",
                data: {
                    _token: csrfToken,
                    email: email,
                    password: password,
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            timer: 3000,
                            title: response.judul,
                        });
                        setTimeout(() => {
                            location.href = "masterweb";
                        }, 3000);
                    }else if (response.status == 300) {
                        Swal.fire({
                            icon: "success",
                            timer: 3000,
                            title: response.judul,
                        });
                        setTimeout(() => {
                            location.href = "member";
                        }, 3000);
                    }else if (response.status == "gagal") {
                        document.getElementById('alert').innerHTML = "<p class='p-2 py-2 text-lg tracking-wider rounded text-white mb-2 mt-1' style='background-color: rgb(220 38 38);'>Password Anda Tidak Beres,Silakan Lapor ke Admin</p>"
                    } else {
                        Swal.fire({
                            icon: "info",
                            timer: 3000,
                            title: "Password Salah",
                            showConfirmButton: false,
                            timer:3000
                        });
                    }
                },
            });
        }
    });
});
