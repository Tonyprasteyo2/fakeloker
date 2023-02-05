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
                type: "POST",
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
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.href = "masterweb";
                        }, 3000);
                    }else if (response.status == 300) {
                        Swal.fire({
                            icon: "success",
                            timer: 3000,
                            title: response.judul,
                            showConfirmButton: false
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

const show = ()=>{
    let password = document.getElementById("password");
    if (password.type === "password") {
        password.type ="text";
    }else{
        password.type="password";
    }
}

// reset password
let resepas = document.getElementById("resetpas");
resepas.addEventListener("submit",function(e){
    e.preventDefault();
    let emailres = document.querySelector(".resemail").value.toLowerCase();
    const validemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (validemail.test(emailres)) {
        $.ajax({
            type: "get",
            url: "cekemail",
            data: {"emailres":emailres},
            dataType: "json",
            success: function (res) {
                if (res.status ==="ok") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                      
                      Toast.fire({
                        icon: 'success',
                        title: 'silakan cek email anda'
                      })
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                      
                      Toast.fire({
                        icon: 'warning',
                        title: 'akun tidak ditemukan'
                      })
                }
            }
        });
    }
})

let inputalamat = document.getElementById("carialamat");
inputalamat.addEventListener("keyup",function(e){
    e.preventDefault();
    let alamat = $(this).val().toLowerCase();
    $.ajax({
        type: "get",
        url: "cekloker",
        data: {
            '_token':$('meta[name="csrf-token"]').attr("content"),
            'alamat':alamat,
        },
        dataType:'json',
        beforeSend:function(){
           $("#load").fadeIn(300)
        },
        complete: function(){
           $("#load").fadeOut(500);
        },
        success: function (res) {
           if (res.status == 300) {
            $(".alamatshow").removeClass('hidden');
            $(".alamatshow").addClass('block');
            $("#showalamat").html(" ");
           } else {
            $(".alamatshow").removeClass('hidden');
            $(".alamatshow").addClass('block');
            let hasil = '';
            res.forEach(result => {
                let pisah = result.alamat;
                let resalamat = pisah.replace(/</g,'');
                alamatres = resalamat.substring(0,100);
                let statusview = "";
                if (result.status === "Waspada") {
                   let statustes = "<p style='background-color:yellow;color:white;padding:5px;border-radius:6.5px;'>Waspada</p>";
                   statusview += statustes;
                }else if (result.status === "Hoax") {
                   let statustes = "<p style='background-color:red;color:white;padding:5px;border-radius:6.5px;'>Hoax</p>";
                   statusview += statustes;
                }else if(result.status === "Real"){
                   let statustes = "<p style='background-color:#00FF00;color:white;padding:5px;border-radius:6.5px;'>Real</p>";
                   statusview += statustes;
                }
                let hasila ="<tr><td class='px-5 py-5 border-b border-gray-200 bg-white text-sm font-roboto'><p class='text-gray-900 whitespace-no-wrap'>"+result.nama_perusahaan+"</p></td><td class='px-5 py-5 border-b border-gray-200 bg-white text-sm font-roboto'>"+alamatres+"</td></td><td class='px-5 py-5 border-b border-gray-200 bg-white text-base font-roboto flex text-center position-relative justify-center'>"+statusview+" |&nbsp;<a style='background-color:#0000FF;color:white;padding:5px;border-radius:6.5px;' target='_blank' href='"+result.url+"' class='w-100'>Url</a></td></tr>";
                hasil += hasila;
            });
            $("#showalamat").html(hasil);
           }
        }
    });
})

const Menu = (e)=>{
   let ul = document.querySelector('ul');
   if (e.name === "menu") {
       e.name="close";
       ul.classList.remove('opacity-0');
       ul.classList.add('top-20')
       ul.classList.add('transition-all');
       ul.classList.add('ease-in');
       ul.classList.add('duration-500')
   }else{
       e.name="menu";
       ul.classList.add('opacity-0')
       ul.classList.remove('top-20')
       ul.classList.add('transition-all');
       ul.classList.add('ease-in');
       ul.classList.add('duration-500')
   }
}
let mode = document.getElementById("mode");
let sun = document.querySelector(".sun");
let mon = document.querySelector(".mon");
mode.addEventListener("click",modebg);
function modebg() { 
   if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
       mon.classList.add("hidden");
       sun.classList.remove("hidden");
       localStorage.theme = 'light';
       document.documentElement.classList.remove("dark");
   }else{
       sun.classList.add("hidden");
       mon.classList.remove("hidden");
       localStorage.theme = 'dark';
       document.documentElement.classList.add("dark");
   }
}
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) { 
   sun.classList.add("hidden");
   mon.classList.remove("hidden");
   localStorage.theme = 'dark';
   document.documentElement.classList.add("dark");
}