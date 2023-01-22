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
                 let hasila ="<tr class='border-t first:border-t-0 flex md:p-3 hover:bg-gray-100 md:table-row flex-col w-full flex-wrap' ><td class='p-2 md:p-3'>"+result.nama_perusahaan+"</td><td class='p-2 md:p-3 font-roboto'>"+resalamat+"</td></td><td class='p-1 md:p-2 font-roboto flex text-center position-relative'>"+statusview+" |&nbsp;<a style='background-color:#0000FF;color:white;padding:5px;border-radius:6.5px;' target='_blank' href='"+result.url+"' class='w-100'>Url</a></td></tr>";
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