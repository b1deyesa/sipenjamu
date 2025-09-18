<x-crud-table 
    :items="$users" 
    :searchField="[
        'Name' => 'name',
        'Email' => 'email',
    ]"
    createComponent="dashboard.admin.register.user.create" 
    updateComponentPrefix="dashboard.admin.register.user.update" 
    deleteComponentPrefix="dashboard.admin.register.user.delete"
></x-crud-table>