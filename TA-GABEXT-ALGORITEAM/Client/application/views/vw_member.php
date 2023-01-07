<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>">
</head>
<body>
    <!-- buat menu / tombol-->
    <nav class="area-tombol">
        <button class="btn-primary" id="btn_tambah">Tambah Data</button>
        <button class="btn-secondary" id="btn_refresh" onclick= "setRefresh()">Refresh Data</button>
    </nav>

    <!-- buat table data member-->
    <table>
       <thead>
       <tr>
        <th style = "width: 10%;">Aksi</th>
        <th style = "width: 5%;">No.</th>
        <th style = "width: 10%;">Id Member</th>
        <th style = "width: 45%;">Nama Member</th>
        <th style = "width: 15%;">Email</th>
        <th style = "width: 15%;">No HP</th>
       </tr>
        </thead> 
       <!-- buat isi table -->
       <!-- mulai looping -->
       <tbody>
       <?php
        $no = 1;
        foreach($tampil->member as $record)
        { 
       ?>      
       <tr>
        <td style = "text-align: center;">
            <nav class="area-aksi">
                <button class="btn-ubah" id="btn_ubah" title="Ubah Data Member" 
                onclick="return gotoUpdate('<?php echo $record->email; ?>')" >
                <i class="fa-solid fa-pen" ></i>
                </button>
                <button class="btn-hapus" id="btn_hapus" title="Hapus Data Member" 
                onclick="return gotoDelete('<?php echo $record->email; ?>','<?php echo $record->nama_member; ?>')">
                <i class="fa-solid fa-trash"></i>
                </button>
            </nav>  
        </td>
        <td style = "text-align: center;">
        <?php echo $no;?>
        </td>
        <td style = "text-align: justify;">
        <?php echo $record->nama_member;?>
        </td>
        <td style = "text-align: center;">
        <?php echo $record->email;?>
        </td>
        <td style = "text-align: center;">
        <?php echo $record->telepon_member;?>
        </td>
       </tr>
       <!-- akhir looping -->
       <?php 
                $no++;
            }
       ?>  
    </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let btn_tambah = document.getElementById("btn_tambah");
        btn_tambah.addEventListener('click', function(){
        //alert("Tambah Data")
        //btn_tambah.style.background = "#ffffff";
        //btn_tambah.style.color = "#000000";
        //this.style.borderRadius = "0";
        //this.style.fontSize = "10px";

        //this.className ="btn-scondary";
        
        //this.innerHTML = "<strong>Tambah</strong>";
        //this.innerText = "Tambah";
        
        //this.value="Entry Data"
        //this.innerHTML = "<em>Entry Data</em>"
        //this.Text = "Entry Data";

        location.href="<?php echo site_url("Member/addMember/");?>"
        
         })
       
        function setRefresh(){
            location.href="<?php echo base_url();?>"
        }

        function gotoUpdate(no_telp){
            location.href='<?php echo site_url("Member/updateMmber/"); ?> '+'/'+npm;
        }

        function gotoDelete(no_telp,nama_member){
            let keterangan = no_telp + " - " + nama_member;
           if(confirm("Data Member " + keterangan + " Ingin Dihapus ?") === true ){
            // alert("Data Berhasil Dihapus !");
             
                setDelete(no_telp);

           }
        }

        function setDelete(no_telp)
        {
            const data = {
                "no_telp" : no_telp
            }


            fetch('<?php echo site_url("Member/setDelete"); ?>',
            {
                method : "POST",
                headers : {
                    "Content-Type" : "application/json"
                },
                body : JSON.stringify(data)
            })
            .then((response)=>
            {
                return response.json()
            })
            .then(function(data)
            {
                // // jika nilai "err" = 0
                // if(data.err === 0)
                //     alert("Data Berhasil Dihapus")
                // // jika nilai "err" = 1
                // else
                //     alert("Data Gagal Dihapus !")

                alert(data.statusnya);

                // panggil fungsi setRefresh()
                setRefresh();
            })
        }
    </script>
</body>
</html>