<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
           
            <li>
                <a  href="javascript:routine('ricerca', 'stampa','');"   >
                    <i class="fa fa-search"></i>
                    <span>Ricerca</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>Clienti</span>
                </a>
                <ul class="sub">               
                    <li><a href="javascript:routine('clienti', 'modal','create');">Crea Nuovo</a></li>                
                    <li><a href="javascript:routine('clienti', 'stampa','');">Tutti</a></li>
                    <? if ($_SESSION['role'] == "admin") {?><li><a id='downloadList' href="javascript:;">Scarica CSV</a></li><?}?>
                    <!--li><a href="javascript:routine('archivio', 'stampa','');">Archivio</a></li-->
                </ul>
            </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-users"></i>
                        <span>Eventi</span>
                    </a>
                    <ul class="sub">
                        <!--li><a href="javascript:routine('eventi', 'modal','create');">Crea Nuovo</a></li-->
                        <li><a href="javascript:routine('eventi', 'stampa','');">Tutti</a></li>

                    </ul>
                </li>


           
            <li class="sub-menu">
                <a href="index.php" >
                    <i class="fa fa-calendar"></i>
                    <span>Calendario</span>
                </a>
            </li>
			<!--li class="sub-menu">
                <a href="index.php?c=test" >
                    <i class="fa fa-calendar"></i>
                    <span>Calendario Test</span>
                </a>
            </li-->
			
           
             <li class="sub-menu">
                <a href="javascript:routine('settings', 'stampa','');" >
                    <i class="fa fa-cog"></i>
                    <span>Impostazioni</span>
                </a>
               
            </li>
             
        </ul>
        </div>        
<!-- sidebar menu end-->
    </div>
</aside>
<script type="text/javascript">jQuery(document).ready(function() {
	$listtodownload = {};
$("#sidebar .sub a, #logouter").click (function (){
    
    if ( localStorage.getItem("controllo") == "attivo")
    {
        console.log("sblocco elemento da sidebar");
        var sblocco="";
		if (localStorage.position=='1')  sblocco=localStorage.goto_id;
		else if (localStorage.position=='2')  sblocco=localStorage.gotoInner_id;
	 
        $.ajax({
            type:'POST',
            url:'ajax/controllo.php',
            data:{metodo:'unblock', target:sblocco , modulo:localStorage.modulo_attuale},
            success: function(response){
                //alert ("bloccato" + target);
                $("#module").append(response);
                console.log (localStorage.goto_id+" sbloccato");
                localStorage.removeItem("goto_id");
                localStorage.removeItem("gotoInner_id");
                localStorage.removeItem("controllo");
                
                //alert("fatto giro ajax");
            }
        });
    }
	localStorage.removeItem("goto_id");
	localStorage.removeItem("gotoInner_id");
	});
});

$("#downloadList").on ("click", function (){
	$.ajax({
            type:'POST',
            url:'ajax/clienti.php',
            data:{metodo:'tocsv', target:"" , modulo:"clienti"},
            success: function(response){
                //alert ("bloccato" + target);
               // console.log("download", response);
			   // alert ("Lista scaricata");
			  
	
			   $listtodownload = JSON.parse($.trim(response));
			   console.log($listtodownload);
              downloadCSV({ filename: "export.csv" })
            }
        });
});

 function convertArrayOfObjectsToCSV(args) {
        var result, ctr, keys, columnDelimiter, lineDelimiter, data;
        data = args.data || null;
        if (data == null || !data.length) {
            return null;
        }

        columnDelimiter = args.columnDelimiter || ';';
        lineDelimiter = args.lineDelimiter || '\n';

        keys = Object.keys(data[0]);

        result = '';
        result += keys.join(columnDelimiter);
        result += lineDelimiter;

        data.forEach(function(item) {
            ctr = 0;
            keys.forEach(function(key) {
                if (ctr > 0) result += columnDelimiter;

                result += item[key];
                ctr++;
            });
            result += lineDelimiter;
        });

		console.log ("inside data", result);
        return result;
    }
	function downloadCSV(args) {
        var data, filename, link;

        var csv = convertArrayOfObjectsToCSV({
            data: $listtodownload
        });
        if (csv == null) return;

        filename = args.filename || 'export.csv';

        if (!csv.match(/^data:text\/csv/i)) {
            csv = 'data:text/csv;charset=utf-8,' + csv;
        }
        data = encodeURI(csv);

        link = document.createElement('a');
        link.setAttribute('href', data);
        link.setAttribute('download', filename);
        link.click();
    }
</script>
<!--sidebar end-->