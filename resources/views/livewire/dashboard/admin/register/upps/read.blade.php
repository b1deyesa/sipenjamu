<x-crud-table 
    :items="$uppses" 
    :searchField="[
        'UPPS Name' => 'name',
        'UPPS Initial' => 'initial',
        'Badge Color' => 'color'
    ]"
    createComponent="dashboard.admin.register.upps.create" 
    updateComponentPrefix="dashboard.admin.register.upps.update" 
    deleteComponentPrefix="dashboard.admin.register.upps.delete"
></x-crud-table>