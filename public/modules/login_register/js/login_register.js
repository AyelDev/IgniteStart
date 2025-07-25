$(document).ready(function(){

    //after successful register, redirect to login
    const registerMsg = localStorage.getItem("registerSuccess");
    if(registerMsg){
        showSuccess(registerMsg);
        localStorage.removeItem("registerSuccess");
    }
    //END

    let response;

    //LOGIN 
    $("#login").on("click",async function(e){
    
        const inputIDs = ['email', 'password'];

        e.preventDefault();

        loadForm('.login-form', 'facebook', 'Logging in  ');

        response = await sendRequest(getInputIDs(inputIDs), 'authenticate', 'POST');

        if(response){

            let errorMsg = '';

            switch(response.sts_code){
                case 0:
                    let errors = response.message;
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMsg += `• ${errors[key]}<br>`;
                        }
                    }   
                    $('.login-form').waitMe('hide');
                    showError(errorMsg);
                break;

                case 1:
                    if(response.user_type == 1){
                        window.location.href = 'admin/dashboard';
                    }

                    if(response.user_type == 2){
                         window.location.href = 'user/dashboard';
                    }
                break;

                default:
                    $('.login-form').waitMe('hide');
                    showWarning('Unexpected response from server');
            }
        }
    });

    //LOGIN END


// REGISTER
$("#register").on("click", async function(e){

    const inputIDs = ['name', 'email', 'password'];

    e.preventDefault();

    loadForm('.register-form', 'facebook', 'Regestering User...');

    response =  await sendRequest(getInputIDs(inputIDs), 'register', 'POST');
   
    if (response) {
       
        let errorMsg = '';
      

        switch(response.sts_code){
            case 0:
                let errors = response.message;
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMsg += `• ${errors[key]}<br>`;
                    }
                }
                $('.register-form').waitMe('hide');
                showError(errorMsg);
                break;
            case 1:
                $('.register-form').waitMe('hide');
                localStorage.setItem("registerSuccess", response.message);
                window.location.href = '/';
                break;
            default:
                $('.register-form').waitMe('hide');
                showWarning('Unexpected response from server');
        }
    }else{
        showError('No response from server');
    }

});

// REGISTER END

});


function getInputIDs(inputIDs) {
    if (!inputIDs) return [];
    let formData = {};

    inputIDs.forEach(function(item){
        formData[item] = $('#'+ item).val().trim();
    });

    return formData;
}

// END DOCUMENT READY FUNCTION



