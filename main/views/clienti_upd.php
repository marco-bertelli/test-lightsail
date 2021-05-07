<div id="<?=$modulo?>_upd">
       
            <!--dynamic table-->
                <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
                <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
                <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />
                
               


                    <!-- page start-->

                    <div class="row" id='nome-espositore' data-nome='<?=$item['nome']?>'>
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading blue">
                                    <?=$item['nome']?> - Numero: <?=$item['id']?> 
                                     <span style="margin-left:10px;" class="pull-right">
                                         <a href="javascript:;" class="freccia fa fa-arrow-left"></a> 
                                     </span>
                                    <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-up"></a>
                                        <a href="javascript:;" class="fa fa-cog"></a>
                                       
                                     </span>
                                     
                                </header>                   
                                    <div class="panel-body">
                                    
                                     <form id="clienti_<?=$item['id']?>" class="disabilita" role="form"  action="javascript:routine('clienti', 'edit','<?=$item['id'];?>');" method="POST" >
                                        <div class="col-lg-6">
                                            
                                               
                                            
                                            <div class="form-group">
                                                <label for="nome">Ragione Sociale:</label>
                                               <input type="text" class="form-control" id ='nome' name="nome" value="<?=$item['nome']?>" disabled />
                                            </div>                                                                                                   
                                            <div class="form-group">
                                                <label for="codice_univoco">Codice Univoco</label>
                                               <input type="text"  class="form-control" id ='codice_univoco' name="codice_univoco" value="<?=$item['codice_univoco']?>" disabled />
                                            </div>
                                     
                                             <div class="form-group col-md-6" style='padding-left:0px'>
                                                <label for="cod_fiscale">Codice Fiscale</label>
                                               <input type="text"  class="form-control" id ='cod_fiscale' name="cod_fiscale" value="<?=$item['cod_fiscale']?>" disabled />
                                            </div>
                                            <div class="form-group col-md-6" style='padding-right:0px'>
                                                <label for="ultimo_contatto">Partita Iva</label>
                                               <input type="text"  class="form-control" id ='piva' name="piva" value="<?=$item['piva']?>" disabled />
                                            </div>
                                             <div class="form-group">
                                                <label for="mail">Mail Aziendale</label>
                                               <input type="text"  class="form-control" id ='mail' name="mail" value="<?=$item['mail']?>"  disabled />
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="mail">PEC</label>
                                               <input type="text"  class="form-control" id ='pec' name="pec" value="<?=$item['pec']?>"  disabled />
                                            </div>
                                            
                                            <div class="form-group col-md-6" style='padding-left:0px'>
                                                <label for="mail">Telefono</label>
                                               <input type="text"  class="form-control" id ='telefono1' name="telefono1" value="<?=$item['telefono1']?>" disabled />
                                            </div>
                                            
                                            <div class="form-group col-md-6" style='padding-right:0px'>
                                                <label for="mail">Fax</label>
                                               <input type="text"  class="form-control" id ='telefono2' name="telefono2" value="<?=$item['telefono2']?>"  disabled />
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="attivita">Attività</label>
                                               <textarea id ='attivita' class="form-control" rows="6"  name="attivita" disabled ><?=$item['attivita']?></textarea>
                                            </div>
                                                                                                                                        
                                        </div>
                                        <div class="col-lg-6">
                                        
                                           
                                           
                                            <div class="form-group">
                                                <label for="via">Via</label>
                                               <input type="text" class="form-control" id ='via' name="via" value="<?=$item['via']?>"  disabled />
                                            </div>
                                             <div class="form-group">
                                                <label for="citta">Città</label>
                                               <input type="text" class="form-control" id ='citta' name="citta" value="<?=$item['citta']?>" disabled />
                                            </div>
                                            <div class="form-group">
                                                   <label class="control-label">Provincia</label>
                                                            
                                                       <select id ='provincia' name="provincia" class="form-control" disabled >
                                                       <option value=""></option>
                                                            <option style="color:red;" value="<?=$item['provincia']?>" selected='selected' ><?=$item['provincia']?></option>
                                                            <? require("provincie.php");?> 
                                                       </select>                                    
                                            </div>                                                                                                  
                                            <div class="form-group">
                                                   <label class="control-label">Regione</label>                                               
                                                       <select id ='regione' name="regione" class="form-control" disabled  >
                                                       <option value=""></option>
                                                            <option value="<?=$item['regione']?>" selected='selected' ><?=$item['regione']?></option>

                                                            <?php $dbregione = $item['regione'];?>
                                                            <?php foreach ($regioni as $regione) :  ?>
                                                            <option value="<?=$regione?>" <?php if ($dbregione == $regione ) echo "selected='selected'";?> ><?=$regione?></option>
                                                            
                                                             <?php endforeach;  ?>  
                                                       </select>                                    
                                            </div>
                                       
                                                          
                                            <div class="form-group">
                                                <label for="cap">Cap</label>
                                               <input type="text" class="form-control" id ='cap' name="cap" value="<?=$item['cap']?>" disabled   />
                                            </div>
                                            <div class="form-group">
                                                <label for="nazione">Nazione</label>
                                               <input type="text" class="form-control" id ='nazione' name="nazione" value="<?=$item['nazione']?>"   disabled   />
                                            </div> 
                                            
                                            
                                       
                                                                                                                                                               
                                            <div class="form-group">
                                                <label for="note">Note:</label>
                                               <textarea id ='note' class="form-control" rows="6"  name="note" disabled ><?=$item['note']?></textarea>
                                            </div>
                                                                                                                                                                         
                                        </div>
                                        <a style="display:none;" id='salva'  href="javascript:localStorage.setItem('save_module', 'clienti');localStorage.setItem('save_id', '<?=$item['id'];?>');routine('confirm', 'modal','edit');" class="btn btn-info link pull-right"><i class="fa fa-refresh">&nbsp</i>Salva</a>
                                        <a id='edit' href="javascript:;" class="btn btn-danger link pull-right" data-id='<?=$item["id"]?>'><i class="fa fa-refresh">&nbsp</i>Modifica</a>
                                        <!--a href="javascript:localStorage.setItem('idAzienda', '<?=$item['id'];?>');routine('agenti', 'modal','create');" type="submit " class="btn btn-primary confirm2 pull-left "><i class="fa fa-plus">&nbsp</i>Crea Cliente</a-->                                                           
										<a href="javascript:localStorage.setItem('idAzienda', '<?=$item['id'];?>');routine('agenti', 'modal','create');" type="submit " class="btn btn-primary confirm2 pull-left "><i class="fa fa-plus">&nbsp</i>Crea Contatti</a>
                                      </form>
                                    </div>
                            </section>

                        </div>
                        
                    </div>  
					 <!--AGENTI-->
		<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading verde">
                        CONTATTI
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:routine('clienti', 'goback', 'home');" class="fa fa-arrow-left"></a>
                         </span>
                    </header>              
                    <div class="panel-body">
                        <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table3">
                        <thead>
                        <tr>
                            <th>Cod Contatto</th>
                             <th>Ruolo</th>
                            <th>Cognome</th>
                            <th>Nome</th>
                            <th>Mail</th>
                            <th>Tel</th>
                           
                           
                            <th class="hidden-phone">Apri</th>
                            <th class="hidden-phone">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($items_agenti as $items_agente) {?>
                            
                        <tr class="gradeX <? if ($item["inuse"]=='1') echo "inuse"?>" id='<?=$items_agente['id'];?>'>
                            <td><?=$items_agente['id'];?></td>
                             <td><?=$items_agente['settore'];?></td>
                            <td><?=$items_agente['cognome'];?></td>
                            <td><?=$items_agente['nome']?></td>
                            <td><? if ($items_agente['mail']!=''){?><a href="mailto:<?=$items_agente['mail']?>">  <?=$items_agente['mail']?> <i class="fa fa-envelope">&nbsp</i> </a><?}?></td>
                            <td><?=$items_agente['telefono'];?></td>
                            
                            <td class="center hidden-phone"><a href="javascript:routine('agenti', 'goto_inner','<?=$items_agente['id'];?>')" class="btn btn-info goto_inner link"><i class="fa fa-refresh ">&nbsp</i>Apri</a></td>
                            <td class="center hidden-phone"><a href="javascript:localStorage.setItem('delete_module', 'agenti');localStorage.setItem('delete_id', '<?=$items_agente['id'];?>');routine('confirm', 'modal','delete');" class="btn btn-warning confirm_delete" data-target="<?=$item['id'];?>" ><i class="fa fa-trash-o" >&nbsp</i>Elimina</a></td>
                            
                        </tr>
                        
                      <?}?>
                        </tbody>
                        </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>         <!-- FINE AGENTI-->                   
                    
            
                <!--main content end-->
             
             <!--Modal go back -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_back" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Torna indietro ?</span></h4>
                        </div>
                        <div class="modal-body">
                        Sei sicuro di voler tornare indietro ?<br>
                        Perderai tutti le modifiche non salvate.<br><br>
                             <a href="javascript:routine(localStorage.modulo, 'goback','');" id="YES"  class="btn btn-warning btn-sm "><span name="lbl" caption="Edit">Si</span></a>
                             <a href="javascript:;" id="NO" data-dismiss="modal" class="btn btn-warning btn-sm "><span name="lbl" caption="No">No</span></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--/Modal-->
                
              <script>
                jQuery(document).ready(function() {
                    
                    console.log ("ready di clientiupd");
                    
                    //PICK PER PRENDERE IL GRUPPO DEL CLIENTE
                    
                      $("#clienti_upd").on ('click', '.pick_list', function (){
         
                             
                             $("#modal_scegli_clienti").remove();
                             $PickC_Id= $(this).attr("id");
                             //alert($PickC_Id);
                             $.ajax({
                                 type:'POST',
                                 url:'ajax/clienti.php',
                                 data:{modulo:"clienti",  metodo:"pick", target:$PickC_Id},
                                 success: function(response){
                                 $("#module").append(response);
                                 //alert("fatto giro ajax");
                                 }
                             });
        
                    });
                    
                    
                    
                    //auto refresh modifica
                   
                      function count() {
                           localStorage.setItem('testAjax', false); //tolgo il frullino di ajax
                           $.ajax({
                            type:'POST',
                            url:'ajax/clienti.php',
                            data:{modulo:'clienti',  metodo:'refresh', target:localStorage.goto_id},
                            success: function(response){
                             // console.log(response);
                                      var data = $.parseJSON(response);
                              $("input").each(function( replace ) {
                                  var pointer = $(this).attr("name");
                                //  console.log("pointer", pointer  ); 
                                   $(this).val(data[pointer]);
                                });
                                 $("select").each(function( replace2 ) {
                                  var pointer2 = $(this).attr("name");
                                 // console.log("pointer2", pointer2 ); 
                                   $(this).val(data[pointer2]);
                                }); 
                            }
                        });
                           
                      }
                        //$auto_refresh = setInterval(function() { count() }, 5000);
                       //count();  
                       
                    
                    
                    //Controllo su sblocco per modifica
                    $("#edit").on("click", function (){
                        var target=localStorage.goto_id;
                       // clearInterval($auto_refresh);
                        //alert($target);
                        $.ajax({
                            type:'POST',
                            url:'ajax/controllo.php',
                            data:{metodo:'check', target:target, modulo:"clienti"},
                            success: function(response){
                                
                            $("#module").append(response);
                            
                           // console.log (localStorage.blocked_id+" diverso da target ? "+$target);        
                            if (localStorage.blocked_id != target){
                                console.log("procedo modifica");
                                localStorage.setItem("controllo","attivo");
                                $(".disabilita input, .disabilita select, .disabilita textarea").removeAttr("disabled");
                                $(".pick_list").removeAttr("disabled");
                                $.ajax({
                                    type:'POST',
                                    url:'ajax/controllo.php',
                                    data:{metodo:'block', target:target, modulo:'clienti'},
                                    success: function(response){
                                        //alert ("bloccato" + target);
                                        $("#module").append(response);
                                        $("#edit").hide();
                                       
                                        $("#salva").css("display", "block");
                                       // alert("fatto giro ajax");
                                    }
                                });
                                    
                                
                            }
                            else {
                                console.log("bloccato");
                                 $.ajax({
                                        type:'POST',
                                        url:'modals/cliente_aperto.php',
                                        data:{modulo:"clienti", target:target},
                                        success: function(response){
                                            $("#module").append(response);
                                            $("#modal_aperto").modal("show");
                                            //se il cliente ? bloccato rimando il controllo al server del setinterval
                                             //$auto_refresh = setInterval(function() { count() }, 5000);
                                        }
                                    });
                            }
                            }
                        });
                    });
                  
                    //controllo interesse in page non credo serva piu 
                    $(".interesse").click(function (){
                        localStorage.setItem('id_interesse', $(this).attr("id"));
                        $("#modal_interessi").modal('show');
                        
                    });
                    $("#YES").click(function (){
                        //alert("YES");
                        $.ajax({
                            type:'POST',
                            url:'ajax/agenti.php',
                            data:{modulo:'agenti',  metodo:'del_interesse', target:localStorage.id_interesse},
                            success: function(response){
                                $("#module").append(response);
                                $("#"+localStorage.id_interesse).fadeOut();
                                $("#modal_interessi").modal('hide');
                            }
                        });

                    });
                    $("#NO").click(function (){
                        $("#modal_interessi").modal('hide');
                    });
                    
                    //chiudo e chevron
                    
                      $('.panel .tools .fa').click(function () {
                        
                        var el = $(this).parents(".panel").children(".panel-body");
                        if (c("fa-chevron-up")) {
                            $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
                            
                            el.slideUp(200);
                        } else {
                            $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
                           
                            el.slideDown(200); }
                    });
                    
                    var chiudo =  $('.chiudo').parents(".panel").find("a.fa-chevron-up");
                    if (chiudo.hasClass("fa-chevron-up")) {
                        chiudo.removeClass("fa-chevron-up").addClass("fa-chevron-down");
                        $('.chiudo').hide();
                     }
                     
                     //MANDO AL MODULO DELLE SPEDIZIONI
                    $(".spedizione").on("click", function (){
                         var spedizione =  $(this).parent().attr('id');
                         //alert(spedizione);
                         $.ajax({
                                        type:'POST',
                                        url:'ajax/stand.php',
                                        data:{modulo:"stand", metodo:'spedizione', target:spedizione,  },
                                        success: function(response){
                                            $("#module").empty();
                                            $("#module").append(response);
                                           
                                            //se il cliente ? bloccato rimando il controllo al server del setinterval
                                             //$auto_refresh = setInterval(function() { count() }, 5000);
                                        }
                                  }); 
                         
                    });
                     
                   
                    
                });
            </script>
             
            <!--il nostro imp che lavora sodo! e valida le form-->
            <script src="js_sw/imp_validation.js"></script>
            <script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
            <script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
            <!--dynamic table initialization -->
            <script src="js/dynamic_table_init_2.js"></script> 

 </div> 



