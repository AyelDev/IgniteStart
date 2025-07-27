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
                const statusText = status == 1 ? '<span class="icon lock-icon" title="lock user"></span>' : '<span class="icon unlock-icon" title="unlock user"></span>';
                return `<button data-id="${data}"><span class="icon assign-icon" title="assign user"></span></button> 
                <button data-id="${data}"><span class="icon view-open-icon" title="view user"></span></button>
                <button data-id="${data}">${statusText}</button>
                <button data-id="${data}"><span class="icon delete-icon" title="delete user"></span></button>   
                `;
            }
        },
      
    ]
});
}