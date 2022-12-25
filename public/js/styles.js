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
                let st = '';
                if (result.status === "Hoax") {
                    let sta = "<label class='bg-yellow-500 p-2 p-2 rounded text-white'>Hoax</label>";    
                    st +=sta;
                }else if (result.status == "Real"){
                    let sta = "<label class='bg-green-500 p-2 rounded text-white'>Real</label>";
                    st +=sta;
                }else{
                    let sta = "<label class='bg-green-500 p-2 rounded text-white'>Waspada</label>";
                    st +=sta;
                }
                let hasila ="<tr class='border-t first:border-t-0 flex p-1 md:p-3 hover:bg-gray-100 md:table-row flex-col w-full flex-wrap' ><td class='p-1 md:p-3'>"+result.nama_perusahaan+"</td><td class='p-1 md:p-3 font-roboto'>"+resalamat+"</td></td><td class='p-1 md:p-3 font-roboto inline-block'>"+st+"  |  <a class='bg-sky-500 p-2 rounded text-white' target='_blank' href="+result.url+">Url</a></td></tr>";
                hasil += hasila;
            });
            $("#showalamat").html(hasil);
           }
        }
    });
})