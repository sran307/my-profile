$(document).ready(function(){
    $(".mobile-nav-button").on("click",function(){
        $("body").toggleClass("header-active");
        $("body").toggleClass("main");
        $(".mobile-nav-button i").toggleClass("fa fa-bars fa fa-close");
    })
    $(document).click(function(e){
        var container=$(".mobile-nav-button");
        if(!container.is(e.target) && container.has(e.target).length===0){
            if($("body").hasClass("header-active")){
                $("body").removeClass("header-active");
                $("body").removeClass("main");
                $(".mobile-nav-button i").toggleClass("fa fa-bars fa fa-close");
            }
        }
    })

    //-----------mutual fund script-----------//

    function fetch_mutual_fund(){
        $.ajax({
            type: "get",
            url: "/fetch_mutual_fund",
            dataType: "json",
            success: function (response) {
                //console.log(response.mutual_funds);
                $(".table-body").html("");
                $.each(response.mutual_funds, function (key, item) { 
                    $(".table-body").append("<tr>\
                                <td>"+item.id+"</td>\
                                <td>"+item.Name+"</td>\
                                <td>"+item.Date+"</td>\
                                <td>"+item.Type+"</td>\
                                <td>"+item.Amount+"</td>\
                                <td><button type='button' class='btn btn-primary btn-sm update_mutual' value='"+item.id+"'>Update</button></td>\
                                <td><button type='button' class='btn btn-danger btn-sm delete_mutual' value='"+item.id+"'>Delete</button></td>\
                            </tr>");
                });
            }
        });
    }
    fetch_mutual_fund()
    $(document).on("click",".add-mutual", function (e) {
        var data={
            "name":$("#fund-name").val(),
            "date":$("#start-date").val(),
            "type":$("#investment-type").val(),
            "amount":$("#invested-amount").val()
        }
        //console.log(data);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/add_mf_data",
            data: data,
            dataType: "json",
            success: function (response) {
                //console.log(response);
                if(response.status==400){
                    $(".error_ul").html("");
                    $(".error_ul").addClass("alert alert-danger");
                    $("#error_ul1").append('<li>'+response.errors.name+'</li>');
                    $("#error_ul2").append('<li>'+response.errors.date+'</li>');                         
                    $("#error_ul3").append('<li>'+response.errors.amount+'</li>');
                }else{
                    $("#success_ul").html("");
                    $("#success_ul").addClass("alert alert-success");
                    $("#success_ul").append('<li>'+response.message+'</li>');
                    $("#mutual_modal").modal("hide");
                    fetch_mutual_fund()
                }
                
            }
        });
    });
    $(document).on("click",".update_mutual", function (e) {
        $("#update_mutual_modal").modal("show");
        var mutual_id = $(this).val();
        $.ajax({
            type: "get",
            url: "/get_mutual_fund/"+mutual_id,
            success: function (response) {
                //console.log(response.mutual_funds);
                $(".fund-name").val(response.mutual_funds.Name);
                $(".start-date").val(response.mutual_funds.Date);
                $(".investment-type").val(response.mutual_funds.Type);
            }
        });
        
    });
    $(document).on("click",".update-mutual", function (e) {
        
        var data={
            "name":$(".fund-name").val(),
            "amount":$(".installment-amount").val()
        }
        //console.log(data);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "put",
            url: "/updating_amount",
            data: data,
            dataType: "json",
            success: function (response) {
               // console.log(response.message)
               if(response.status==200){
                $("#success_ul").html("");
                $("#success_ul").addClass("alert alert-success");
                $("#success_ul").append('<li>'+response.message+'</li>');
                $("#update_mutual_modal").modal("hide");
                fetch_mutual_fund()
               }else{
                $("#success_ul").html("");
                $("#success_ul").addClass("alert alert-danger");
                $("#success_ul").append('<li>'+response.message+'</li>');
               }
                
            }
        });
    });
    $(document).on("click",".delete_mutual", function () {
        
        var mutual_id = $(this).val();
        $(".fund-id").val(mutual_id);
        $(".delete_modal").modal("show");
    });
    $(document).on("click",".delete_mutual_button", function () {
        var id =$(".fund-id").val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "delete",
            url: "/delete_mutual/"+id,
            success: function (response) {
                //console.log(response);
                $("#success_ul").html("");
                $("#success_ul").addClass("alert alert-success");
                $("#success_ul").append('<li>'+response.message+'</li>');
                $(".delete_modal").modal("hide");
                fetch_mutual_fund();
            }
        });
    });
    //--End of mutual fund---//
    //----nakshathra the remaining amount update script----//

    function customer_name(){
        $.ajax({
            type: "GET",
            url: "/customer_name",
            dataType: "json",
            success: function (response) {
                //console.log(response.amount_got);
                $(".table-tbody").html("");
                $.each(response.customer, function (key,item) {
                    //console.log(items);
                    if(item.Total_amount>item.Amount_got){
                        $(".table-tbody").append("<tr>\
                            <td>"+item.Customer_id+"</td>\
                            <td>"+item.Customer_name+"</td>\
                            <td>"+item.Total_amount+"</td>\
                            <td>"+item.Amount_got+"</td>\
                            <td><button value='"+item.id+"' class='btn btn-outline-light update'>update</button></td>\
                            </tr>"
                        );
                    }
                });
                if(response.sum_total==response.amount_got){
                    $(".table-head").hide();
                    $("#page-message").html("Everyone paid");
                }
            }
        });
    }
    customer_name()
    $(document).on("click",".update", function (e) {
        //e.preventDefault();
        var customer_id = $(this).val();
        //console.log(customer_id);
        $("#update_modal").modal("show");
        $.ajax({
            type: "get",
            url: "/update_data/"+customer_id,
            success: function (response) {
                //console.log(response);  
                $("#customer_id").val(response.customer.Customer_id);
            }
        });
    });
    $(document).on("click",".update_salary", function (e) {
        //e.preventDefault();
        var customer_id=$("#customer_id").val();
        var data={
          "amount_got":$("#amount").val()
        }
        //console.log(amount);
        //csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "put",
            url: "/update_fees/"+customer_id,
            data: data,
            dataType:"json",
            success: function (response) {
                //console.log(response);
                if(response.status==400){
                    $("#error_ul").html("");
                    $("#error_ul").addClass("alert alert-danger");
                    $.each(response.errors, function (key, err_values) { 
                        $("#error_ul").append('<li>'+err_values+'</li>');                         
                    });
                }else{
                   
                    $("#success_ul").html("");
                    $("#success_ul").addClass("alert alert-success");
                    $("#success_ul").append('<li>'+response.message+'</li>');       
                    $("#update_modal").modal("hide");
                    customer_name()                  
                }
                
            }
        });
    });
    //--end of nakshathra amount update--//
    //-----registration----------// 
    //when we click the register button it takes all the values form the form and sent the data 
    // to the controller
    $(".register-button").click(function (e) { 
        e.preventDefault();
        //assigning all the data into a variable
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
       var data={
           "first_name":$("#first_name").val(),
           "last_name":$("#last_name").val(),
           "email":$("#email").val(),
           "mobile_number":$("#mobile_number").val(),
           "country":$("#country").val(),
           "gender":$("input[name='gender']:checked").val(),
           "interest":val,
           "job":$("#job").val(),
           "user_id":$("input[name='user_id']").val(),
           "password":$("input[name='password']").val(),
           "confirm_password":$("input[name='confirm_password']").val()
        };
        //console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/registration_form",
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status==200){
                    //$("#email_message").html(response.message);
                }
                if(response.status==400){
                    //console.log(response.errors.first_name);
                    //display this error messages to our registration form
                    //empty the previous classes
                    $(".error").html("");
                    //checking status. If it is undefined then remove and not undefined then add class
                    if(response.errors.first_name!=undefined){
                        $(".error_1").addClass("alert alert-danger");
                        $(".error_1").text(response.errors.first_name);
                    }else{
                        $(".error_1").removeClass("alert alert-danger");
                    }
                    if(response.errors.last_name!=undefined){
                        $(".error_2").addClass("alert alert-danger");
                        $(".error_2").text(response.errors.last_name);
                    }else{
                        $(".error_2").removeClass("alert alert-danger");
                    }
                    if(response.errors.email!=undefined){
                        $(".error_3").addClass("alert alert-danger");
                        $(".error_3").text(response.errors.email);
                    }else{
                        $(".error_3").removeClass("alert alert-danger");
                    }
                    if(response.errors.mobile_number!=undefined){
                        $(".error_4").addClass("alert alert-danger");
                        $(".error_4").text(response.errors.mobile_number);
                    }else{
                        $(".error_4").removeClass("alert alert-danger");
                    }
                    if(response.errors.country!=undefined){
                        $(".error_5").addClass("alert alert-danger");
                        $(".error_5").text(response.errors.country);
                    }else{
                        $(".error_5").removeClass("alert alert-danger");
                    }
                    if(response.errors.gender!=undefined){
                        $(".error_6").addClass("alert alert-danger");
                        $(".error_6").text(response.errors.gender);
                    }else{
                        $(".error_6").removeClass("alert alert-danger");
                    }
                    if(response.errors.interest!=undefined){
                        $(".error_7").addClass("alert alert-danger");
                        $(".error_7").text(response.errors.interest);
                    }else{
                        $(".error_7").removeClass("alert alert-danger");
                    }
                    if(response.errors.job!=undefined){
                        $(".error_8").addClass("alert alert-danger");
                        $(".error_8").text(response.errors.job);
                    }else{
                        $(".error_8").removeClass("alert alert-danger");
                    }
                    if(response.errors.user_id!=undefined){
                        $(".error_9").addClass("alert alert-danger");
                        $(".error_9").text(response.errors.user_id);
                    }else{
                        $(".error_9").removeClass("alert alert-danger");
                    }
                    if(response.errors.password!=undefined){
                        $(".error_10").addClass("alert alert-danger");
                        $(".error_10").text(response.errors.password);
                    }else{
                        $(".error_10").removeClass("alert alert-danger");
                    }
                    if(response.errors.confirm_password!=undefined){
                        $(".error_11").addClass("alert alert-danger");
                        $(".error_11").text(response.errors.confirm_password);
                    }else{
                        $(".error_11").removeClass("alert alert-danger");
                    }
                    
                }else if(response.status==200){
                    //checking email is used or not
                    //console.log(response.console)
                        $(".error_3").html("");
                        $(".error_3").addClass("alert alert-danger");
                        $(".error_3").text(response.message);
                }else if(response.status==201){
                    //checking user id used or not
                    //here add a reomve class for removing previous class of email id
                    //console.log(response.message)
                    $(".error_3").removeClass("alert alert-danger");
                    $(".error_3").html("");
                    $(".error_9").html("");
                    $(".error_9").addClass("alert alert-danger");
                    $(".error_9").text(response.message);
                }else if(response.status==401){
                    //checking the password and confirm password are matching or not
                    //console.log(response)
                    $(".error_9").removeClass("alert alert-danger");
                    $(".error_9").html("");
                    $(".error_11").html("");
                    $(".error_11").addClass("alert alert-danger");
                    $(".error_11").text(response.error);
                }else if(response.status==205){
                    $(".success_register").html("");
                    $(".success_register").addClass("alert alert-success");
                    $(".success_register").text(response.message);
                    window.location.href=response.url;
                }
            }
        });
    });


})