$(document).ready(function(){

    //after successful register, redirect to login
    const registerMsg = localStorage.getItem("registerSuccess");
    if(registerMsg){
        showSuccess(registerMsg);
        localStorage.removeItem("registerSuccess");
    }

    let response;

$("#login").on("submit",function(e){
    
    e.preventDefault();

    response = sendRequest($(this), 'login', 'POST');

});

$("#register").on("click", async function(e){

    const inputIDs = ['name', 'email', 'password'];

    e.preventDefault();
    response =  await sendRequest(getInputIDs(inputIDs), 'register', 'POST');
   
    if (response) {
       
        let errorMsg = '';
      

        switch(response.sts_code){
            case 0:
                let errors = response.message;
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMsg += `${errors[key]}\n`;
                    }
                }
                showError(errorMsg);
                break;
            case 1:
                localStorage.setItem("registerSuccess", response.message);
                window.location.href = '/';
                break;
            default:
                showWarning('Unexpected response from server');
        }
    }else{
        showError('No response from server');
    }

});

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



