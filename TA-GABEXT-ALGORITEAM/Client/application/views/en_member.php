<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Member</title>
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>">
</head>
<body>
<nav class="area-tombol">
        <button class="btn-primary" id="btn_lihat">Lihat</button>
        <button class="btn-secondary" id="btn_refresh" onclick= "setRefresh()">Refresh Data</button>
    </nav>
<main class="area-grid">
    <section class="item-label1">
        <label id="lbl_id" for="txt_id">
            ID:
        </label>
    </section>
    <section class="item-input1">
        <input type="text" id="txt_id" class="txt-input" maxLength="9">
    </section>
    <section class="item-error1">
        <p class="info-error" id="err_id"></p>
    </section>

    <section class="item-label2">
        <label id="lbl_nama" for="txt_nama">
            Nama Member:
        </label>
    </section>
    <section class="item-input2">
        <input type="text" id="txt_nama" class="txt-input" maxLength="100">
    </section>
    <section class="item-error2">
        <p class="info-error" id="err_nama"></p>
    </section>

    <section class="item-label3">
        <label id="lbl_email" for="txt_email">
            Email :
        </label></section>
    <section class="item-input3">
        <input type="text" id="txt_email" class="txt-input" maxLength="15">
    </section>
    <section class="item-error3">
        <p class="info-error" id="err_email"></p>
    </section>

    <section class="item-label3">
        <label id="lbl_telepon" for="txt_telepon">
            Telepon :
        </label></section>
    <section class="item-input3">
        <input type="text" id="txt_telepon" class="txt-input" maxLength="15">
    </section>
    <section class="item-error3">
        <p class="info-error" id="err_telepon"></p>
    </section>


    
    
    <section class="item-error4">
        <p class="info-error" id="err_jurusan"></p>
    </section>
</main>
        <nav class="area-tombol">
                <button class="btn-primary" id="btn_simpan">Simpan Data</button>              
        </nav>
<script>
        let btn_lihat = document.getElementById("btn_lihat");
        let btn_simpan = document.getElementById("btn_simpan");
        btn_lihat.addEventListener('click', function(){
         location.href="<?php echo base_url();?>"
         })

         function setRefresh(){
            location.href='<?php echo site_url("Member/addMember/"); ?>';
        }

        btn_simpan.addEventListener('click',
        function(){
            let lbl_id = document.getElementById("lbl_id");
            let txt_id = document.getElementById("txt_id");
            let err_id = document.getElementById("err_id");

            let lbl_nama = document.getElementById("lbl_nama");
            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");

            let lbl_email = document.getElementById("lbl_email");
            let txt_email = document.getElementById("txt_email");
            let err_email = document.getElementById("err_email");

            let lbl_telepon = document.getElementById("lbl_telepon");
            let cbo_telepon = document.getElementById("cbo_telepon");
            let err_telepon = document.getElementById("err_telepon");

            if(txt_id.value === "")
            {
                lbl_id.style.color = "#FF0000"
                txt_id.style.borderColor = "#FF0000"
                err_id.style.display = "unset"
                err_id.innerHTML ="<em>ID Harus Disi!!!</em>"
            }
            else
            {
                lbl_id.style.color = "unset"
                txt_id.style.borderColor = "unset"
                err_id.style.display = "none"
                err_id.innerHTML =""
            }

            const nama = (txt_nama.value === "") ?
            [
                lbl_nama.style.color = "#FF0000",
                txt_nama.style.borderColor = "#FF0000",
                err_nama.style.display = "unset",
                err_nama.innerHTML ="<em>Nama Harus Disi!!!</em>"
            ]
            :
            [
                lbl_nama.style.color = "unset",
                txt_nama.style.borderColor = "unset",
                err_nama.style.display = "none",
                err_nama.innerHTML =""
            ]
            
            const email = (txt_email.value === "") ?
            [
                lbl_email.style.color = "#FF0000",
                txt_email.style.borderColor = "#FF0000",
                err_email.style.display = "unset",
                err_email.innerHTML ="<em>Email Harus Disi!!!</em>"
            ]
            :
            [
                lbl_email.style.color = "unset",
                txt_email.style.borderColor = "unset",
                err_email.style.display = "none",
                err_email.innerHTML =""
            ]
            const telepon = (cbo.jurusan.value === "-") ?
            [
                lbl_telepon.style.color = "#FF0000",
                cbo_telepon.style.borderColor = "#FF0000",
                err_telepon.style.display = "unset",
                err_telepon.innerHTML ="<em>Telepon Harus Disi!!!</em>"
            ]
            :
            [
                lbl_telepon.style.color = "unset",
                cbo_telepon.style.borderColor = "unset",
                err_telepon.style.display = "none",
                err_telepon.innerHTML =""
            ]
            if(err_id.innerHTML === "" && nama [1] === "" && email[1] === "" && telepon[1] === "")
            {
                setSave(txt_id.value,txt_nama.value,txt_email.value,cbo_telepon.value)
            }            
        })
        const setSave = ( id,nama,email,telepon => ){
            let form = new FormData();
            
            form.append("idnya",id);
            form.append("namanya",nama);
            form.append("emailnya",email);
            form.append("teleponnya",telepon);

            fetch('<?php echo site_url("Member/setSave/"); ?>',{
                method : "POST",
                body : form
            })
            .then((response) => response.json())
            .then((result) => alert(result.statusnya))
            .catch((error) => alert("Data gagal di simpan !!"))
        }

         </script>
</body>
</html>