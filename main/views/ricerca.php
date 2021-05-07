 
 
 
 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start--> 
    <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading verde">
                        Ricerca in Potenziali:
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        
                         <form role="search" class="form-inline" name="ricerca" action="index.php?s=potenziali" method="post">
                         
                            <input type="text" name="stringa" class="form-control" placeholder="Ricerca ">
                            
                            <select class="form-control" name='target'>
                              <option value="nome">Nome</option>
                              <option value="tipologia">Tipologia</option>
                              <option value="citta">Città</option>
                              <option value="provincia">Provincia</option>
                              
                            </select>
                            <input  type="submit" class="btn btn-info"  name="ok" value="Cerca">
                            
                        </form>
                    </div>
                </section>
            </div>
        </div>
    <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading blue">
                        Ricerca in Clienti:
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        
                         <form role="search" class="form-inline" name="ricerca" action="index.php?s=clienti" method="post">
						 
							<input type="text" name="stringa" class="form-control" placeholder="Ricerca ">
							
							<select class="form-control" name='target'>
							  <option value="nome">Nome</option>
							  <option value="tipologia">Tipologia</option>
							  <option value="citta">Città</option>
							  <option value="provincia">Provincia</option>
							  
							</select>
							<input  type="submit" class="btn btn-info"  name="ok" value="Cerca">
							
						</form>
                    </div>
                </section>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading blue">
                        Ricerca in Contatti:
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <form role="search" class="form-inline" name="ricerca" action="index.php?s=agenti" method="post">
				            <input type="text" name="stringa" class="form-control" placeholder="Ricerca">
				            
				            <select class="form-control" name='target'>
				              <option value="cognome">Cognome</option>
                              <option value="ruolo">Ruolo</option>
				              <option value="mail">Mail</option>
				            </select>
                            <input  type="submit"  class="btn btn-info" name="ok" value="Cerca">
                            
                           </form>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading rosso">
                        Ricerca sui carrelli:
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                      
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        
                         <form role="search" class="form-inline" name="ricerca" action="" method="post">
                         
                            <input type="text" name="stringa" class="form-control" placeholder="Ricerca ">
                            
                            <select class="form-control" name='target'>
                                <option value="*">Cerca in tutti</option>
                              <option value="nome">Marca</option>
                              <option value="tipologia">Tipologia</option>
                              <option value="citta">Modello</option>
                              <option value="provincia">Portata</option>
                              <option value="provincia">Montante</option>
                              <option value="provincia">Sollevamento</option>
                              <option value="provincia">Anno</option>
                              
                            </select>
                            
                            <input type="text" name="stringa2" class="form-control" placeholder="Ricerca ">
                            
                            <label class="control-label"></label>
                            <select class="form-control" name='target2'>
                             <option value="*">Cerca in tutti</option>
                             <option value="nome">Costruttore</option>
                              <option value="tipologia">Asseganzione</option>
                              <option value="citta">Matricola</option>
                              <option value="provincia">Sede</option>
                              <option value="provincia">Canone</option>
                              <option value="provincia">Scadenza</option>
                               <option value="provincia">Manutenzione</option>
                              
                                  
                            </select>
                            <input  type="submit" class="btn btn-info"  name="ok" value="Cerca">
                            
                        </form>
                    </div>
                </section>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading blue">
                        Ricerca in Offerte:
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        
                         <form role="search" class="form-inline" name="ricerca" action="index.php?s=corsi_carrellistici" method="post">
						 
							<input type="text" name="stringa" class="form-control" placeholder="Ricerca">
							
							<select class="form-control" name='target'>
							  <option value="ragione_sociale">Ragione Sociale</option>
							  <option value="tipologia">Tipologia</option>
							  <option value="data">Data</option>
							  
							</select>
							<input  type="submit" class="btn btn-info"  name="ok" value="Cerca">
							
						</form>
                    </div>
                </section>
            </div>
        </div>
			
  
      </section>
    </section>
    
    
            <!--Core js-->

<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>


<!--common script init for all pages-->
<script src="js/scripts.js"></script>