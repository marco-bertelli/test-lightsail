	<div id="search">
			 
		
			
		</div>		 
		<div class="row" >
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading blue">
						<i class="fa fa-users"></i> Ricerca in Clienti:
						<span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-up"></a>
							<a href="javascript:;" class="fa fa-cog"></a>
							<a href="javascript:;" class="fa fa-times"></a>
						 </span>
					</header>
					<div class="panel-body">
						
						 <form role="search" id='ricerca_clienti' class="form-inline" name="ricerca" action="javascript:routine('ricerca', 'search','clienti');" method="post">
						 
							<input type="hidden" id='fieldset' name="table" class="form-control" value='clienti' >
							<input type="text" name="stringa" class="form-control" placeholder="Ricerca" >
							
							<select class="form-control" name='target' >
							  <option value="nome">Ragione Sociale</option>
							  <option value="citta">Città</option>
							  <option value="provincia">Provincia</option>
							  <option value="mail">Mail</option>
							  <option value="telefono1">Telefono</option>
							  <option value="piva">P.IVA</option>
							  <option value="id">Codice Db</option>
							  
							</select>
							<!--input  type="submit" class="btn btn-info"  name="ok" value="Cerca"-->
							 <a  href="javascript:routine('ricerca', 'search','clienti');" class="btn btn-info link">
							 <i class="fa fa-refresh">&nbsp</i>Cerca
							 </a>
						</form>
					</div>
				</section>
			</div>
		</div>
		
		
		
		
	</div>