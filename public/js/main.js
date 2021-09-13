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
           "user_id":$("#user_id").val(),
           "password":$("input[name='password']").val(),
           "confirm_password":$("input[name='confirm_password']").val()
        };
        console.log(data);
        $.ajax({
            type: "patch",
            url: "/check_register",
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status==200){
                    $("#email_message").html(response.message);
                }
            }
        });
    });


})