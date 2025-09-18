<x-crud-table 
    :items="$roles" 
    :searchField="[
        'Role Name' => 'display_name',
        'Slug' => 'name'
    ]"
    createComponent="dashboard.admin.register.role.create" 
    updateComponentPrefix="dashboard.admin.register.role.update" 
    deleteComponentPrefix="dashboard.admin.register.role.delete"
></x-crud-table>