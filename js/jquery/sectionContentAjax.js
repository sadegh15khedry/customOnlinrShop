$(document).ready(function () {
    //alert("attached");
    $.ajax({
        type: 'GET',
        url : '../php/ajax.php',
        data : 'c=0',
        success: function (msg) {
            var myData = JSON.parse(msg);
            console.log();
            //alert(myData.);
            var con ='';
            var i =0;
            //making the html ------------------------------------------------------
            for (row in myData){
                i++;
                var id = myData[row]['item_id'].toString();
                var title = myData[row]['item_title'].toString();
                //alert(id);

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

            //console.log(con);
            $('#sec_rapper').append(con);

            /*
             <div class="col-sm-4 sec-content">
             <a href="myItem.php?sid=1">
             <h4>نام اثر</h4>
             <p>خلاصه ی متن خلاصه ی متن خلاصه ی متن خلاصه ی متن خلاصه ی متن خلاصه ی متن خلاصه ی متن  خلاصه ی متن خلاصه ی متن خلاصه ی متن </p>
             <h5>نویسنده : نام نویسنده</h5>
             </a>
             </div>
             */

        }
    })
});


/*
 <option value="1" >ماجراجویی</option>
 <option value="2">طنز</option>
 <option value="3">درام</option>
 <option value="4">تاریخی</option>
 <option value="5">ترسناک</option>
 <option value="6">تخیلی</option>
 <option value="7">عاشقانه</option>
 <option value="8">تراژدی</option>
 <option value="9">جنایی</option>
 */