$(document).ready(function () {

get_users();


});

async function get_users(){

    await $('#myTable').DataTable({
    ajax: {
        url: 'getUsers',
        type: 'GET',
        dataSrc: 'data',
        error: function (xhr, error, thrown) {
         showError('Failed to load data.');
        }
    },
    columns: [ 
        { data: 'name' },
        { data: 'email' },
        { data: 'user_status', orderable: false,
            render: data => (data == 1 ? 'Active' : 'Inactive')
         },
        { data: 'created_at' },
        { data: 'id', orderable: false,
            render: function(data, type, row, meta){
                const status = row.user_status;
                const statusText = status == 1 ? 'Active' : 'Inactive';
                return `<button data-id="${data}">Assign Task</button> 
                <button data-id="${data}">View</button>
                <button data-id="${data}">${statusText}</button>
                <button data-id="${data}">Delete</button>   
                `;
            }
        },
      
    ]
});
}