                    $(document).ready(function(){

                                          //filterdata
                    $("#keyword").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#kelas tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    //end filterdata

                    //viewajax
                    $.ajax({
                          url: "<?php echo base_url("kelas/viewajax");?>",
                          type: "POST",
                          cache: false,
                          success: function(data){
                              //alert(data);
                              $('#kelas').html(data); 
                          }
                    });
                    //endviewajax

                    //showmodal
                    function showmodaltambahdata(){
                      $("#formtambahdata").modal();
                    }
                    //endshowmodal

                    //closemodaltambah
                    function closemodaltambahdata(){
                      $('#namakelasinput').val("");
                      $("#formtambahdata").modal('toggle');
                    }
                    //endclosemodaltambah
       
                    //fungsibuttonsimpan
                    $('#btnsimpan').on('click', function(event){
                      var namakelas = $('#namakelasinput').val();
                      if (namakelas!=""){
                        // alert(namakelas);
                        $.ajax({
                                  type  : 'POST',
                                  url   : '<?php echo base_url('Kelas/savedata');?>',
                                  cache : false,
                                  data  : {
                                            type        : 2,
                                            namakelas   : $('#namakelasinput').val()   
                                  },
                                  success : function(dataResult){
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode==404){
                                      alert('Data Sudah Ada !');
                                    }else{
                                      $.ajax({
                                                url     : "<?php echo base_url("Kelas/viewajax");?>",
                                                type    : "POST",
                                                cache   : false,
                                                success : function(data){
                                                  $('#kelas').html(data);
                                                }
                                      });
                                      alert('Data Berhasil Dismpan');
                                      $('#namakelasinput').val("");
                                    }

                                  }
                        });

                        
                      }else{
                        alert('Data Kosong Harap Isi Data Terlebih Dahulu !');
                      }
                    });
                    //endfungsibuttonsimpan
                    
                    //tampilmodaledit
                    $('#updatekelas').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkelas');
                      var modal = $(this);
                      modal.find('#idmodal').val(id);
                      modal.find('#namakelasmodal').val(name);
                    });
                    //endtampilmodaledit

                    $('#btnubahdata').on('click', function(){
                      var namakelasedit = $('#namakelasmodal').val();
                      if (namakelasedit != ""){
                        // alert(namakelasedit);
                        $.ajax({
                                  url   : "<?php echo base_url("Kelas/updaterecords");?>",
                                  type  : "POST",
                                  cache : false,
                                  data  : {
                                            type      : 3,
                                            idkelas   : $('#idmodal').val(),
                                            namakelas : $('#namakelasmodal').val()
                                  },
                                  success:function(dataResult){
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode==404){
                                      alert('Data Sudah Ada, Tidak Diubah !');
                                      $('#updatekelas').modal('toggle');
                                    }else{
                                      $.ajax({
                                                url     : "<?php echo base_url("Kelas/viewajax");?>",
                                                type    : "POST",
                                                cache   : false,
                                                success : function(data){
                                                  $('#kelas').html(data);
                                                }
                                      });
                                      alert('Data Berhasil Dismpan');
                                      $('#namakelasmodal').val("");
                                      $('#updatekelas').modal('toggle');
                                    }
                                  }
                        });
                      }else{
                        alert('Data Kosong, Harap Di isi Terlebih Dahulu !');
                      }
                    });

                    //tampilmodalhapus
                    $('#deletekelas').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkelas');
                      var modal = $(this);
                      modal.find('#idkelashapus').val(id);
                      modal.find('#namakelashapus').val(name);
                    });
                    //endtampilmodalhapus

                    //fungsionclickhapusdatakelas
                    $(document).on("click",".btn-hapus",function(){
                      //ajaxfungsihapusdata
                      $.ajax({
                                url   : "<?php echo base_url("kelas/deleterecords")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type      :   4,
                                          idkelas   :   $('#idkelashapus').val(),
                                          namakelas :   $('#namakelashapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("kelas/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#kelas').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#deletekelas').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                      });
                      //endajaxfungsihapusdata
                    });
                    //endfungsionclickhapusdatakelas

                    var nmkelasinput = document.getElementById('namakelasinput');
                    nmkelasinput.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnsimpan").click();
                      }
                    });

                    var nmkelasupdate = document.getElementById('namakelasmodal');
                    nmkelasupdate.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnubahdata").click();
                      }
                    });

                    // var keyword = document.getElementById('keyword');
                    // var tombolcari = document.getElementById('btn-search');
                    // var container = document.getElementById('container');

                    // // tombolcari.addEventListener('mouseover', function(){
                    // //  alert('mantab');
                    // // });
                    // keyword.addEventListener('keyup', function(){
                    //    //buatobjekajax
                    //    var xhr = new XMLHttpRequest();
                    //    //cekkesiapanajax
                    //    xhr.onreadystatechange = function(){
                    //      if (xhr.readyState == 4 && xhr.status == 200) {
                    //        // console.log(xhr.responseText);
                    //        container.innerHTML = xhr.responseText;
                    //      }
                    //    }

                    //    xhr.open('GET','<?php //echo base_url('Kelas/searchrecords');?>?keyword='+keyword.value,true);
                    //    xhr.send();
                    // })

                    });