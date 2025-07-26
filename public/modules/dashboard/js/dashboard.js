$(document).ready(async function () {

    let activeUsers = $('#activeUsers');
    let inactiveUsers = $('#inactiveUsers');

    let auCount = 0;
    let iauCount = 0;

    try {
        let response = await sendRequest('', 'getUsers', 'GET');

        if (response && Array.isArray(response.data)) {
            response.data.forEach(user => {
                
                switch(user.user_status){
                    case '1': auCount++;
                    break;
                    case '0': iauCount++;
                    break;
                }   
                
            });
        } else {
            console.error('Failed to load users:', response);
        }

        activeUsers.text(auCount);
        inactiveUsers.text(iauCount);

    } catch (error) {
        console.error('Error in request:', error);
    }
});
