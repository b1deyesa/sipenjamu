<x-crud-table 
    :items="$program_studis" 
    :search-field="[
        [
            'label' => 'Program Studi Name', 
            'name' => 'name'
        ],
        [
            'label' => 'UPPS', 
            'name' => 'upps.name'
        ],
        [
            'label' => 'Jenjang', 
            'name' => 'jenjang.name'
        ],
    ]"
    create-component="dashboard.admin.register.program-studi.create" 
    update-component-prefix="dashboard.admin.register.program-studi.update" 
    delete-component-prefix="dashboard.admin.register.program-studi.delete"
/>