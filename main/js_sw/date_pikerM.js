/*date picker start

if (top.location != location) {
    top.location.href = document.location.href ;
} */
$(function(){
    window.prettyPrint && prettyPrint();
      
  //DATEPIKER 1-2 CONTROLLO E DISABILITO LE DATE PRECEDENTI   


var checkin1 = $('#dp1').datepicker({

     format: 'dd-mm-yyyy',
    autoclose: true

}).on('changeDate', function (ev) {
    if (ev.date.valueOf() > checkout1.datepicker("getDate").valueOf() || !checkout1.datepicker("getDate").valueOf()) {
         //console.log("datavento1", ev.date.valueOf());
        var newDate = new Date(ev.date);
        //newDate.setHours(newDate.getHours()-2);
        //newDate.setDate(newDate.getDate() + 1 );  mette un giorno in piu del piker 1
        //newDate.setDate(newDate.getDate() );   //mette la stessa data del picker 1
        checkout1.datepicker("update", newDate);

    }
    $('#dp2')[0].focus();
});


var checkout1 = $('#dp2').datepicker({
    beforeShowDay: function (date) {
        if (!checkin1.datepicker("getDate").valueOf()) {
            return date.valueOf() >= new Date().valueOf();
        } else {
            return date.valueOf() > checkin1.datepicker("getDate").valueOf();
        }
    },
     format: 'dd-mm-yyyy',
    autoclose: true

}).on('changeDate', function (ev) {});


  

 
});












