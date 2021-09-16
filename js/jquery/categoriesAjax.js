$(document).ready(function () {
    function getMycontent(msg) {
        //alert(msg);

        var myData = JSON.parse(msg);
        //alert('heyyyyy');
        console.log(msg);
        var con ='';
        var i =0;
        //making the html ------------------------------------------------------------------------------------------------
        for (row in myData){
            i++;
            var id = myData[row]['item_id'].toString();
            var title = myData[row]['item_title'].toString();
            if (i%3==1){
                con = con +'<div class="row">';
            }
            con = con + '<div class="col-sm-4 sec-content">'+
                '<a href="myItem.php?sid='+id+'">'+
                '<h4>'+title+'</h4>'+
                '<img src="../uploads/'+id+'.jpeg">'+
                '</div>';

            //console.log(myData[row]['story_content']);
            //con = con + myData[row]['story_content'];
            //con = con + '  ';

            if (i%3==0){
                con = con +'</div>';
            }
        }
        if (i%3==1){
            con = con+'<div class="col-sm-4 sec-content"></div>' +
                '<div class="col-sm-4 sec-content"></div>' +
                '</div>';
        }
        else if (i%3==2){
            con = con+'<div class="col-sm-4 sec-content"></div></div>';
        }
        //alert(i);
        console.log(con);
        $('#sec_rapper').append(con);
        $("#sec_rapper").fadeIn();

    }




    //alert('dj');

    //item 1 ---------------------------------------------------------
    $("#i_1").on("click",function () {
        $("#i_1").addClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');


        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=1',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 2 ---------------------------------------------------------
    $("#i_2").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").addClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');


        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=2',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 3 -------------------------------------
    $("#i_3").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").addClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');


        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=3',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 4 --------------------------------------
    $("#i_4").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").addClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=4',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 5 --------------------------------------
    $("#i_5").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").addClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=5',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 6 --------------------------------------
    $("#i_6").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").addClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=6',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 7 --------------------------------------
    $("#i_7").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").addClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").removeClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=7',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 8 --------------------------------------
    $("#i_8").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").addClass('li-active');
        $("#i_9").removeClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=8',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });
    //item 9 --------------------------------------
    $("#i_9").on("click",function () {
        $("#i_1").removeClass('li-active');
        $("#i_2").removeClass('li-active');
        $("#i_3").removeClass('li-active');
        $("#i_4").removeClass('li-active');
        $("#i_5").removeClass('li-active');
        $("#i_6").removeClass('li-active');
        $("#i_7").removeClass('li-active');
        $("#i_8").removeClass('li-active');
        $("#i_9").addClass('li-active');

        $("#sec_rapper").fadeOut();
        $("#sec_rapper").html("");
        $.ajax({
            type: 'GET',
            url : '../php/ajax.php',
            data : 'c=9',
            success: function (msg) {
                getMycontent(msg)
            }
        });
    });


});
