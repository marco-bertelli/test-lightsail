//datetime picker start

//$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd -  hh:ii', autoclose: true});
//$(".form_datetime").datetimepicker({format: 'dd-mm-yyyy hh:ii', todayBtn: true, autoclose: true});


/*$(".form_datetime-component").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true
});

$(".form_datetime-adv").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true,
    todayBtn: true,
    //startDate: "2013-02-14 10:00",
    minuteStep: 10
});

$(".form_datetime-meridian").datetimepicker({
    format: "dd MM yyyy - HH:ii P",
    showMeridian: true,
    autoclose: true,
    todayBtn: true
});      */

window.prettyPrint && prettyPrint();
      
  //DATEPIKER 1-2 CONTROLLO E DISABILITO LE DATE PRECEDENTI   


var checkin1 = $('#dp1').datetimepicker({

     format: 'dd-mm-yyyy hh:ii',
     todayBtn: true,
     autoclose: true

}).on('changeDate', function (ev) {
    console.log("ev", ev)


        var newDate = new Date(ev.date);
        //newDate.setDate(newDate.getDate() + 1 );  mette un giorno in piu del piker 1
        newDate.setDate(newDate.getDate() );   //mette la stessa data del picker 1
        console.log("newDate", newDate);
        checkout1.datetimepicker("update", newDate);


    $('#dp2')[0].focus();
});


var checkout1 = $('#dp2').datetimepicker({
    beforeShowDay: function (date) {
        console.log("date", date);
        if (!checkin1.datetimepicker("getDate").valueOf()) {
            return date.valueOf() >= new Date().valueOf();
        } else {
            return date.valueOf() > checkin1.datetimepicker("getDate").valueOf();
        }
    },
    format: 'dd-mm-yyyy hh:ii',
     todayBtn: true,
     autoclose: true

}).on('changeDate', function (ev) {});


//datetime picker end

