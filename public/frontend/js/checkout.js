$(document).ready(function () {
    $('.paycredit_btn').click(function (e) { 
        e.preventDefault();
        
        var name = $('.name').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        // var address2 = $('.address2').val();
        var ward = $('.ward').val();
        var district = $('.district').val();
        var city = $('.city').val();
        var pincode = $('.pincode').val();
 
        if(!name){
            name_error = "Name is required";
           $('#name_error').html('');
           $('#name_error').html(name_error);
        }else{
            name_error = "";
            $('#name_error').html('');
        }

        if(!email){
            email_error = "Email is required";
           $('#email_error').html('');
           $('#email_error').html(email_error);
        }else{
            email_error = "";
            $('#email_error').html('');
        }

        if(!phone){
            phone_error = "Phone is required";
           $('#phone_error').html('');
           $('#phone_error').html(phone_error);
        }else{
            phone_error = "";
            $('#phone_error').html('');
        }

        if(!address1){
            address1_error = "Address1 is required";
           $('#address1_error').html('');
           $('#address1_error').html(address1_error);
        }else{
            name_error = "";
            $('#address1_error').html('');
        }

        if(!ward){
            ward_error = "Ward is required";
           $('#ward_error').html('');
           $('#ward_error').html(ward_error);
        }else{
            ward_error = "";
            $('#ward_error').html('');
        }

        if(!district){
            district_error = "District is required";
           $('#district_error').html('');
           $('#district_error').html(district_error);
        }else{
            district_error = "";
            $('#district_error').html('');
        }

        if(!city){
            city_error = "City is required";
           $('#city_error').html('');
           $('#city_error').html(city_error);
        }else{
            city_error = "";
            $('#city_error').html('');
        }

        if(!pincode){
            pincode_error = "Pincode is required";
           $('#pincode_error').html('');
           $('#pincode_error').html(pincode_error);
        }else{
            pincode_error = "";
            $('#pincode_error').html('');
        }

       if(name != '' || email != '' || phone != '' || address1 != '' || ward != '' || district != '' || city != '' || pincode != ''){
        return false;
       }else{
            var data = {    
                'name':name,
                'email':email,
                'phone':phone,
                'address1':address1,
                'ward':ward,
                'district':district,
                'city':city,
                'pincode':pincode,
            }

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: "data",
                success: function (response) {
                    alert(response.total_price)
                }
            });
       }
    });
});